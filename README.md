# Mica SDK for PHP

A PHP client library for the [Mica](https://mica.io) network. Mica's API is [gRPC](https://grpc.io) over mutual TLS;
the messages and clients in this repository are generated from the [public protos](https://github.com/1080network/proto)
and use [`google/protobuf`](https://packagist.org/packages/google/protobuf) and
[`grpc/grpc`](https://packagist.org/packages/grpc/grpc). PHP 8.1 or later.

## One package, loaded on demand

The package is `1080network/mica-sdk`. Composer packages are one per repository, so unlike the other languages there is
no separate package per role, but PHP only loads the classes you use: if you are an issuer, nothing from
`Mica\Acceptor` is ever loaded.

| Namespace | Contents |
| --- | --- |
| `Mica\Issuer\...` | the services for issuers |
| `Mica\Acceptor\...` | the services for acceptors |
| `Mica\Member\...`, `Mica\Common\...`, `Micashared\...` | shared by every role (including `Ping`) |
| `Mica\Sdk\Mtls` | connects to Mica with mutual TLS |

## Installing

Install the [`grpc` PHP extension](https://grpc.io/docs/languages/php/quickstart/) (`pecl install grpc`), which the client
needs to make calls, and optionally `protobuf` for speed. Then:

```bash
composer require 1080network/mica-sdk
```

Versions follow the proto release. Composer's pre-release suffixes are `dev`, `alpha`, `beta` and `RC`, so the proto
pre-release `v2.0.0-pre0` is tagged `v2.0.0-RC0` here; releases (`v2.0.0`) are tagged the same as the protos.

## Connecting

Mica uses mutual TLS. You need the root CA, and the client certificate and key Mica issued to you, as PEM files. The
server certificate is verified against the root CA and its host name, and the client presents your certificate.

```php
use Mica\Member\Ping\V1\PingRequest;
use Mica\Member\Ping\V1\PingServiceClient;
use Mica\Sdk\Mtls;

$credentials = Mtls::credentialsFromFiles('rootca.crt', 'client.crt', 'client.key');
$client = new PingServiceClient('api.example.mica.io:443', Mtls::options($credentials));

[$response, $status] = $client->Ping(new PingRequest())->wait();
echo $response->getStatus();
```

`Mtls::options` works with any generated client, for example `\Mica\Issuer\Service\V2\IssuerToMicaServiceClient`.

`examples/ping.php` is a complete program that connects and calls `Ping`, a good first check that your certificates and
network path work:

```bash
php examples/ping.php api.example.mica.io:443 rootca.crt client.crt client.key
```

## Repository layout

| Path | Contents |
| --- | --- |
| `src/Mica/{Common,Member,Issuer,Acceptor}`, `src/Micashared` | **generated** messages and clients |
| `src/Mica/Sdk/Mtls.php` | hand-written mutual TLS helper |
| `src/GPBMetadata/Validate/Validate.php` | hand-written: declares `validate/validate.proto` to the protobuf runtime (the generator cannot produce it, and the SDK does not evaluate the rules) |
| `tests/` | tests: every generated message loads, and messages round-trip |
| `examples/` | runnable examples |
| `scripts/update-from-proto.sh` | regenerates the SDK for a proto release, runs the tests, and installs the package into an empty project |

PHP's gRPC support is client-only, so the tests do not make a live mutual TLS call, unlike the other SDKs, which test
against an in-process server. `Mica\Sdk\Mtls` is a thin wrapper over `Grpc\ChannelCredentials::createSsl`.

## Releasing (maintainers)

1. Run the **Generate SDKs** workflow in [1080network/proto](https://github.com/1080network/proto/actions) for the release tag.
2. Download its output: `gh run download <run-id> -R 1080network/proto -n generated-sdks-<version>`.
3. Run `scripts/update-from-proto.sh <version> <download-dir>`. It lays the generated code into `src/`, runs the tests (also against the lowest supported dependencies in CI), and installs the package into an empty project.
4. Open a pull request with the changes and merge it.
5. Tag the merge commit with the tag the script prints (`v2.0.0-RC0` for `v2.0.0-pre0`) and create a GitHub release. [Packagist](https://packagist.org) picks versions up from the repository's tags once the package is registered there.
