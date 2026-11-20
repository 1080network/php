<?php

declare(strict_types=1);

namespace Mica\Tests;

use Google\Protobuf\Internal\Message;
use Mica\Common\V1\Currency;
use PHPUnit\Framework\TestCase;

/**
 * Smoke tests that need no network: every generated message loads, which proves the descriptor metadata is
 * consistent (including the dependency on validate.proto), and messages round-trip through the wire format.
 *
 * PHP's gRPC support is client-only, so a live mutual TLS call cannot be made against an in-process server here.
 */
final class SdkTest extends TestCase
{
    public function testAMessageThatDependsOnValidateRoundTrips(): void
    {
        $currency = new Currency();
        $currency->setFiat('USD');

        $copy = new Currency();
        $copy->mergeFromString($currency->serializeToString());

        $this->assertSame('USD', $copy->getFiat());
    }

    /** @return iterable<string, array{string}> */
    public static function generatedMessages(): iterable
    {
        $root = dirname(__DIR__) . '/src';
        $files = new \RecursiveIteratorIterator(new \RecursiveDirectoryIterator($root, \FilesystemIterator::SKIP_DOTS));
        foreach ($files as $file) {
            $path = $file->getPathname();
            if (!str_ends_with($path, '.php') || str_contains($path, '/GPBMetadata/') || str_ends_with($path, 'Client.php')
                || str_contains($path, '/Sdk/')) {
                continue;
            }
            $relative = substr($path, strlen($root) + 1, -4);
            yield $relative => ['\\' . str_replace('/', '\\', $relative)];
        }
    }

    #[\PHPUnit\Framework\Attributes\DataProvider('generatedMessages')]
    public function testEveryGeneratedMessageLoads(string $class): void
    {
        $this->assertTrue(class_exists($class), "$class does not load");
        $reflection = new \ReflectionClass($class);
        // Generated messages extend Message; enums are plain classes of constants
        if ($reflection->isSubclassOf(Message::class)) {
            $this->assertInstanceOf(Message::class, new $class());
        } else {
            $this->assertNotEmpty($reflection->getConstants(), "$class is neither a message nor an enum");
        }
    }

    public function testClientsLoad(): void
    {
        foreach ([
            \Mica\Issuer\Service\V2\IssuerToMicaServiceClient::class,
            \Mica\Acceptor\Service\V2\AcceptorToMicaServiceClient::class,
            \Mica\Member\Ping\V1\PingServiceClient::class,
        ] as $client) {
            $this->assertTrue(class_exists($client), "$client does not load");
        }
    }
}
