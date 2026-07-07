#!/usr/bin/env bash
# Synced release helper. Edit the plugin scaffold copy, then run
# bin/aivie/sync-release-scripts.sh to update plugin scripts/ copies.
set -euo pipefail

CHANGELOG_FILE="${1:-CHANGELOG.md}"

if [[ ! -f "$CHANGELOG_FILE" ]]; then
  if [[ -n "${NEW_VERSION:-}" ]]; then
    echo "## Release v${NEW_VERSION}"
    exit 0
  fi

  echo "Missing changelog: $CHANGELOG_FILE" >&2
  exit 1
fi

awk '
  function is_version_heading(line) {
    if (line ~ /^##[[:space:]]+\[?[0-9]+\.[0-9]+\.[0-9]+/) return 1
    if (line ~ /^###[[:space:]]+\[?[0-9]+\.[0-9]+\.[0-9]+/) return 1
    return 0
  }
  is_version_heading($0) {
    if (started) exit
    started = 1
  }
  started { print }
' "$CHANGELOG_FILE" | sed '${/^[[:space:]]*$/d;}'
