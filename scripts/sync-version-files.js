#!/usr/bin/env node
// Synced release helper. Edit the root bin/aivie/scripts copy, then run
// bin/aivie/sync-release-scripts.sh to update plugin scripts/ copies.

const fs = require('fs');
const path = require('path');

const root = process.cwd();
const version = process.argv[2] || process.env.NEW_VERSION || readJsonVersion('package.json');

if (!version) {
  fail('Version is required. Pass it as an argument or set NEW_VERSION.');
}

if (!/^[0-9]+\.[0-9]+\.[0-9]+([.-].+)?$/.test(version)) {
  fail(`Version is not semver-like: ${version}`);
}

syncPackageJson(version);
syncPackageLock(version);
syncComposerJson(version);
syncMauticConfig(version);
verifyVersions(version);

console.log(`Synced version files to ${version}`);

function readJsonVersion(relativePath) {
  const filePath = path.join(root, relativePath);

  if (!fs.existsSync(filePath)) {
    return '';
  }

  return JSON.parse(fs.readFileSync(filePath, 'utf8')).version || '';
}

function syncPackageJson(nextVersion) {
  const packagePath = path.join(root, 'package.json');

  if (!fs.existsSync(packagePath)) {
    fail('package.json does not exist');
  }

  const packageJson = JSON.parse(fs.readFileSync(packagePath, 'utf8'));
  packageJson.version = nextVersion;
  writeJson(packagePath, packageJson);
}

function syncPackageLock(nextVersion) {
  const lockPath = path.join(root, 'package-lock.json');

  if (!fs.existsSync(lockPath)) {
    return;
  }

  const packageLock = JSON.parse(fs.readFileSync(lockPath, 'utf8'));
  packageLock.version = nextVersion;

  if (packageLock.packages && packageLock.packages['']) {
    packageLock.packages[''].version = nextVersion;
  }

  writeJson(lockPath, packageLock);
}

function syncComposerJson(nextVersion) {
  const composerPath = path.join(root, 'composer.json');

  if (!fs.existsSync(composerPath)) {
    return;
  }

  const composerJson = JSON.parse(fs.readFileSync(composerPath, 'utf8'));
  composerJson.version = nextVersion;
  writeJson(composerPath, composerJson);
}

function syncMauticConfig(nextVersion) {
  const configPath = path.join(root, 'Config/config.php');

  if (!fs.existsSync(configPath)) {
    return;
  }

  const config = fs.readFileSync(configPath, 'utf8');
  const versionPattern = /('version'\s*=>\s*)'[^']+'/;

  if (!versionPattern.test(config)) {
    fail('Could not find version entry in Config/config.php');
  }

  fs.writeFileSync(configPath, config.replace(versionPattern, `$1'${nextVersion}'`));
}

function verifyVersions(expectedVersion) {
  assertVersion('package.json', readJsonVersion('package.json'), expectedVersion);

  const lockPath = path.join(root, 'package-lock.json');
  if (fs.existsSync(lockPath)) {
    const packageLock = JSON.parse(fs.readFileSync(lockPath, 'utf8'));
    assertVersion('package-lock.json', packageLock.version, expectedVersion);

    if (packageLock.packages && packageLock.packages['']) {
      assertVersion('package-lock.json packages[""]', packageLock.packages[''].version, expectedVersion);
    }
  }

  if (fs.existsSync(path.join(root, 'composer.json'))) {
    assertVersion('composer.json', readJsonVersion('composer.json'), expectedVersion);
  }

  const configPath = path.join(root, 'Config/config.php');
  if (fs.existsSync(configPath)) {
    const match = fs.readFileSync(configPath, 'utf8').match(/'version'\s*=>\s*'([^']+)'/);
    assertVersion('Config/config.php', match && match[1], expectedVersion);
  }
}

function assertVersion(label, actualVersion, expectedVersion) {
  if (actualVersion !== expectedVersion) {
    fail(`${label} version (${actualVersion || 'missing'}) does not match ${expectedVersion}`);
  }
}

function writeJson(filePath, data) {
  fs.writeFileSync(filePath, `${JSON.stringify(data, null, 2)}\n`);
}

function fail(message) {
  console.error(message);
  process.exit(1);
}
