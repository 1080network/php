<?php

declare(strict_types=1);

namespace Mica\Sdk;

use Grpc\ChannelCredentials;

/**
 * Connect to the Mica network with mutual TLS.
 *
 * Every connection to Mica uses mutual TLS: the client presents a certificate issued by Mica and verifies Mica's
 * server certificate (including its host name) against the root certificate authority Mica provides.
 *
 * Requires the grpc PHP extension.
 *
 *     $credentials = Mtls::credentialsFromFiles('rootca.crt', 'client.crt', 'client.key');
 *     $ping = new \Mica\Member\Ping\V1\PingServiceClient('api.example.mica.io:443', Mtls::options($credentials));
 */
final class Mtls
{
    /** Builds channel credentials from PEM strings. */
    public static function credentials(string $certificateAuthorities, string $certificate, string $key): ChannelCredentials
    {
        return ChannelCredentials::createSsl($certificateAuthorities, $key, $certificate);
    }

    /** Builds channel credentials from PEM files on disk. */
    public static function credentialsFromFiles(string $certificateAuthoritiesFile, string $certificateFile, string $keyFile): ChannelCredentials
    {
        return self::credentials(
            self::read($certificateAuthoritiesFile),
            self::read($certificateFile),
            self::read($keyFile),
        );
    }

    /**
     * The options array to pass as the second argument of any generated client.
     *
     * @param array<string, mixed> $extra further gRPC channel options
     * @return array<string, mixed>
     */
    public static function options(ChannelCredentials $credentials, array $extra = []): array
    {
        return ['credentials' => $credentials] + $extra;
    }

    private static function read(string $file): string
    {
        $contents = @file_get_contents($file);
        if ($contents === false) {
            throw new \RuntimeException("Unable to read $file");
        }
        return $contents;
    }
}
