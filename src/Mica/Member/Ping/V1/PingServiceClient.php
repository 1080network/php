<?php
// GENERATED CODE -- DO NOT EDIT!

// Original file comments:
// Copyright (c) 2022-2024 Mica. All rights reserved. All software, including, without limitation, all source
// code and object code, is the intellectual property of Mica, Inc. and is protected by copyright, trademark and
// other intellectual property laws (collective "Mica Software"). You may not use, copy, reproduce, download, store,
// post, broadcast, transmit, modify, sell or make available to the public content from the Mica Software without a
// valid license or the prior written approval of Mica, Inc. Mica, its logos, slogans, taglines,
// products, feature names, and other trademarks are trademarks of Mica, Inc. and may not be used without
// permission.
//
namespace Mica\Member\Ping\V1;

/**
 * Connectivity check available on every Issuer and Acceptor endpoint.
 */
class PingServiceClient extends \Grpc\BaseStub {

    /**
     * @param string $hostname hostname
     * @param array $opts channel options
     * @param \Grpc\Channel $channel (optional) re-use channel object
     */
    public function __construct($hostname, $opts, $channel = null) {
        parent::__construct($hostname, $opts, $channel);
    }

    /**
     * Checks that you can reach Mica and that your client certificate is accepted. Needs no role beyond a valid
     * certificate, so it is a good first call when setting up a connection.
     * @param \Mica\Member\Ping\V1\PingRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall<\Mica\Member\Ping\V1\PingResponse>
     */
    public function Ping(\Mica\Member\Ping\V1\PingRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/mica.member.ping.v1.PingService/Ping',
        $argument,
        ['\Mica\Member\Ping\V1\PingResponse', 'decode'],
        $metadata, $options);
    }

}
