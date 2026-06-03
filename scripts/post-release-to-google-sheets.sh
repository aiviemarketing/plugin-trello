#!/usr/bin/env bash
# Synced release helper. Edit the root bin/aivie/scripts copy, then run
# bin/aivie/sync-release-scripts.sh to update plugin scripts/ copies.
set -euo pipefail

RELEASE_NOTES_FILE="${1:-release_notes.md}"

if [[ -z "${SHEETS_WEBHOOK_URL:-}" || -z "${SHEETS_WEBHOOK_TOKEN:-}" ]]; then
  echo "Missing SHEETS_WEBHOOK_URL or SHEETS_WEBHOOK_TOKEN" >&2
  exit 1
fi

if [[ ! -f "$RELEASE_NOTES_FILE" ]]; then
  echo "Missing release notes file: $RELEASE_NOTES_FILE" >&2
  exit 1
fi

TAG_NAME="${TAG_NAME:-${VERSION:-${NEW_VERSION:-}}}"
TAG_NAME="${TAG_NAME#refs/tags/}"

if [[ -z "$TAG_NAME" ]]; then
  echo "TAG_NAME, VERSION, or NEW_VERSION is required" >&2
  exit 1
fi

if [[ "$TAG_NAME" != v* ]]; then
  VERSION_NUMBER="$TAG_NAME"
  TAG_NAME="v$TAG_NAME"
else
  VERSION_NUMBER="${TAG_NAME#v}"
fi

GITHUB_SERVER_URL="${GITHUB_SERVER_URL:-https://github.com}"
DEFAULT_BRANCH="${DEFAULT_BRANCH:-${GITHUB_REF_NAME:-${RELEASE_BRANCH:-main}}}"

if [[ -z "${GITHUB_REPOSITORY:-}" ]]; then
  echo "GITHUB_REPOSITORY is required" >&2
  exit 1
fi

RELEASE_NOTES="$(cat "$RELEASE_NOTES_FILE")"
RELEASE_URL="${GITHUB_SERVER_URL}/${GITHUB_REPOSITORY}/releases/tag/${TAG_NAME}"
CHANGELOG_URL="${GITHUB_SERVER_URL}/${GITHUB_REPOSITORY}/blob/${DEFAULT_BRANCH}/CHANGELOG.md"
COMPARE_URL="${GITHUB_SERVER_URL}/${GITHUB_REPOSITORY}/commits/${DEFAULT_BRANCH}"

response="$(
  jq -n \
    --arg token "$SHEETS_WEBHOOK_TOKEN" \
    --arg tag_name "$TAG_NAME" \
    --arg repository "$GITHUB_REPOSITORY" \
    --arg repo "$GITHUB_REPOSITORY" \
    --arg branch "$DEFAULT_BRANCH" \
    --arg version "$VERSION_NUMBER" \
    --arg release_url "$RELEASE_URL" \
    --arg tagUrl "$RELEASE_URL" \
    --arg changelogUrl "$CHANGELOG_URL" \
    --arg compare_url "$COMPARE_URL" \
    --arg release_notes "$RELEASE_NOTES" \
    '{
      token: $token,
      tag_name: $tag_name,
      repository: $repository,
      repo: $repo,
      branch: $branch,
      version: $version,
      release_url: $release_url,
      tagUrl: $tagUrl,
      changelogUrl: $changelogUrl,
      compare_url: $compare_url,
      release_notes: $release_notes,
      notes: $release_notes
    }' \
    | curl -fsSL -H "Content-Type: application/json" --data @- "$SHEETS_WEBHOOK_URL"
)"

echo "$response"

if ! jq -e '.ok == true' >/dev/null 2>&1 <<< "$response"; then
  error="$(jq -r '.error // "unknown error"' <<< "$response" 2>/dev/null || echo "unknown error")"
  echo "Google Sheets webhook failed: $error" >&2
  exit 1
fi
