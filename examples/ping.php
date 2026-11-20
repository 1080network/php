<?php
// Connects to Mica with mutual TLS and calls Ping, a good first check that your certificates and network path work.
// Requires the grpc PHP extension.
//
//   php examples/ping.php api.example.mica.io:443 rootca.crt client.crt client.key

require __DIR__ . '/../vendor/autoload.php';

use Mica\Member\Ping\V1\PingRequest;
use Mica\Member\Ping\V1\PingServiceClient;
use Mica\Sdk\Mtls;

if ($argc !== 5) {
    fwrite(STDERR, "usage: ping.php <host:port> <rootca.crt> <client.crt> <client.key>\n");
    exit(1);
}
[, $target, $ca, $cert, $key] = $argv;

$client = new PingServiceClient($target, Mtls::options(Mtls::credentialsFromFiles($ca, $cert, $key)));
[$response, $status] = $client->Ping(new PingRequest())->wait();
if ($status->code !== \Grpc\STATUS_OK) {
    fwrite(STDERR, "ping failed: {$status->details}\n");
    exit(1);
}
printf("status=%d service=%s version=%s\n", $response->getStatus(), $response->getServiceType(), $response->getBuildVersion());
