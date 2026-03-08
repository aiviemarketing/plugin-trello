/**
 * Reads CHANGELOG.md and outputs the first release block (for use as GitHub Release body).
 * Run after standard-version has prepended the new release.
 */
const fs = require('fs');
const path = require('path');

const changelogPath = path.join(__dirname, '..', 'CHANGELOG.md');
if (!fs.existsSync(changelogPath)) {
  process.stderr.write('CHANGELOG.md not found\n');
  process.exit(1);
}

const content = fs.readFileSync(changelogPath, 'utf8');
// First release block: from first "## " to the next "## " or end of file
const match = content.match(/^##\s+\[?[\d.]+\].*?\n\n([\s\S]*?)(?=\n##\s+|\n*$)/m);
const body = match ? match[1].trim() : content.trim();
process.stdout.write(body);
