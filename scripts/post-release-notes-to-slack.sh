#!/usr/bin/env bash
# Synced release helper. Edit the plugin scaffold copy, then run
# bin/aivie/sync-release-scripts.sh to update plugin scripts/ copies.
set -euo pipefail

PREVIEW_MODE=false
RELEASE_NOTES_FILE="release_notes.md"

while [[ $# -gt 0 ]]; do
  case "$1" in
    --preview)
      PREVIEW_MODE=true
      shift
      ;;
    --help|-h)
      echo "Usage: $0 [--preview] [release_notes_file]" >&2
      exit 0
      ;;
    *)
      RELEASE_NOTES_FILE="$1"
      shift
      ;;
  esac
done

if [[ -z "${GITHUB_REPOSITORY:-}" ]]; then
  echo "GITHUB_REPOSITORY is required" >&2
  exit 1
fi

VERSION="${NEW_VERSION:-${VERSION:-${TAG_NAME:-}}}"
VERSION="${VERSION#refs/tags/}"
VERSION="${VERSION#v}"

if [[ -z "$VERSION" && -f package.json ]]; then
  VERSION="$(jq -r '.version // empty' package.json)"
fi

if [[ -z "$VERSION" ]]; then
  echo "NEW_VERSION, VERSION, TAG_NAME, or package.json version is required" >&2
  exit 1
fi

if [[ "$PREVIEW_MODE" != "true" && -z "${SLACK_WEBHOOK_URL:-}" ]]; then
  echo "Skipping Slack post: SLACK_WEBHOOK_URL is not configured."
  exit 0
fi

DEFAULT_BRANCH="${DEFAULT_BRANCH:-${GITHUB_REF_NAME:-${RELEASE_BRANCH:-main}}}"
GITHUB_SERVER_URL="${GITHUB_SERVER_URL:-https://github.com}"
CHANGELOG_URL="${CHANGELOG_URL:-${GITHUB_SERVER_URL}/${GITHUB_REPOSITORY}/blob/${DEFAULT_BRANCH}/CHANGELOG.md}"
REPO_NAME="${PACKAGE_NAME:-${GITHUB_REPOSITORY##*/}}"
REPO_NAME="${REPO_NAME//-/ }"

format_release_notes_for_slack() {
  local source_file="$1"

  node - "$source_file" <<'JS'
const fs = require('fs');

const text = fs.readFileSync(process.argv[2], 'utf8');

function convertInline(value) {
  return value
    .replace(/\[([^\]]+)\]\(([^)]+)\)/g, '<$2|$1>')
    .replace(/\*\*([^*]+)\*\*/g, '*$1*');
}

const formatted = text
  .split(/\r?\n/)
  .map((rawLine) => {
    let line = rawLine.replace(/\s+$/, '');

    if (/^###\s+/.test(line)) {
      return `*${convertInline(line.replace(/^###\s+/, ''))}*`;
    }

    if (/^##\s+/.test(line)) {
      return `*${convertInline(line.replace(/^##\s+/, ''))}*`;
    }

    if (/^\s*[-*]\s+/.test(line)) {
      return `- ${convertInline(line.replace(/^\s*[-*]\s+/, ''))}`;
    }

    return convertInline(line);
  })
  .join('\n')
  .trim();

process.stdout.write(formatted);
JS
}

header=$(jq -n --arg r "$REPO_NAME" --arg v "$VERSION" \
  '{type:"header",text:{type:"plain_text",text:("New Release: " + $r + " - v" + $v)}}')
divider='{"type":"divider"}'
link=$(jq -n --arg url "$CHANGELOG_URL" '{type:"section",text:{type:"mrkdwn",text:("<" + $url + "|View full changelog>")}}')

if [[ -s "$RELEASE_NOTES_FILE" ]]; then
  notes_text="$(format_release_notes_for_slack "$RELEASE_NOTES_FILE")"
  notes_block=$(jq -n --arg n "$notes_text" '{type:"section",text:{type:"mrkdwn",text:$n}}')
  payload=$(jq -n --argjson h "$header" --argjson d "$divider" --argjson n "$notes_block" --argjson l "$link" \
    '{blocks: [$h, $d, $n, $l]}')
else
  payload=$(jq -n --argjson h "$header" --argjson d "$divider" --argjson l "$link" \
    '{blocks: [$h, $d, $l]}')
fi

if [[ "$PREVIEW_MODE" == "true" ]]; then
  jq . <<<"$payload"
  exit 0
fi

curl -fsS -H "Content-Type: application/json" --data "$payload" "$SLACK_WEBHOOK_URL"
