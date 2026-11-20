#!/bin/bash
# Regenerate the SDK from the output of the "Generate SDKs" workflow in https://github.com/1080network/proto.
#
# Usage: scripts/update-from-proto.sh <version> <generated-dir>
#   <version>        release tag the code was generated from: vX.Y.Z or vX.Y.Z-preN
#   <generated-dir>  the downloaded workflow artifact (the directory containing php/)
#
# Download the generated code for a release with:
#   gh run download <run-id> -R 1080network/proto -n generated-sdks-<version>
set -euo pipefail

VERSION=${1:?usage: $0 <version> <generated-dir>}
GEN=${2:?usage: $0 <version> <generated-dir>}
ROOT=$(cd "$(dirname "$0")/.." && pwd)

if [[ ! "$VERSION" =~ ^v([0-9]+\.[0-9]+\.[0-9]+)(-pre([0-9]+))?$ ]]; then
    echo "version '$VERSION' must look like v1.2.3 or v1.2.3-pre0" >&2
    exit 1
fi
# Composer does not recognise "-pre": its pre-release stabilities are dev, alpha, beta and RC. v2.0.0-pre0 is tagged v2.0.0-RC0.
PHP_TAG="v${BASH_REMATCH[1]}"
[[ -n "${BASH_REMATCH[3]}" ]] && PHP_TAG="${PHP_TAG}-RC${BASH_REMATCH[3]}"
if [[ ! -d "$GEN/php/Mica/Issuer" ]]; then
    echo "'$GEN' does not look like generated output (expected php/Mica/Issuer)" >&2
    exit 1
fi

echo "Laying out $VERSION (tag $PHP_TAG) from $GEN"
# Generated code only: hand-written code (src/Mica/Sdk, src/GPBMetadata/Validate, tests) is left alone.
S=$ROOT/src
rm -rf "$S/Mica/Common" "$S/Mica/Member" "$S/Mica/Issuer" "$S/Mica/Acceptor" "$S/Micashared"
mkdir -p "$S/Mica"
cp -r "$GEN/php/Mica/Common" "$GEN/php/Mica/Member" "$GEN/php/Mica/Issuer" "$GEN/php/Mica/Acceptor" "$S/Mica/"
cp -r "$GEN/php/Micashared" "$S/"
# The generated metadata uses \GPBMetadata\... only for validate.proto, which the hand-written stub provides
if [[ -d "$GEN/php/GPBMetadata" ]]; then echo "unexpected top-level GPBMetadata in the generated output" >&2; exit 1; fi

cd "$ROOT"
composer validate --strict
composer update --no-interaction --prefer-dist --quiet
vendor/bin/phpunit

# Install the package into an empty project from this checkout and load a generated client, as a client would
CONSUMER=$(mktemp -d)
(cd "$CONSUMER" && cat > composer.json <<JSON
{ "repositories": [{ "type": "path", "url": "$ROOT", "options": { "symlink": false } }],
  "require": { "1080network/mica-sdk": "@dev" }, "minimum-stability": "dev", "prefer-stable": true }
JSON
composer install --no-interaction --quiet
php -r 'require "vendor/autoload.php";
$c = new \Mica\Common\V1\Currency(); $c->setFiat("USD");
echo "consumer OK: ", get_class($c), " ", $c->getFiat(), " ", class_exists(\Mica\Issuer\Service\V2\IssuerToMicaServiceClient::class) ? "client" : "NO CLIENT", "\n";')
rm -rf "$CONSUMER"
echo "Done. Tag the release $PHP_TAG."
