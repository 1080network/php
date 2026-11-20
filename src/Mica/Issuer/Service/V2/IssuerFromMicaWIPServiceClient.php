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
namespace Mica\Issuer\Service\V2;

/**
 * Work-in-progress and experimental operations Mica calls on the Issuer, hosted at the same callback address as
 * IssuerFromMicaService. They may change, or become standard product features, in future releases.
 */
class IssuerFromMicaWIPServiceClient extends \Grpc\BaseStub {

    /**
     * @param string $hostname hostname
     * @param array $opts channel options
     * @param \Grpc\Channel $channel (optional) re-use channel object
     */
    public function __construct($hostname, $opts, $channel = null) {
        parent::__construct($hostname, $opts, $channel);
    }

    /**
     * Asks the Issuer to credit the user's instrument for a chargeback. Mica calls this only when a dispute is resolved
     * in the user's favor _and_ the money goes back to the user's instrument; if the dispute ends in a replacement or
     * an in-store credit, the Issuer is not called.
     * @param \Mica\Issuer\Service\V2\ApproveChargebackRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall<\Mica\Issuer\Service\V2\ApproveChargebackResponse>
     */
    public function ApproveChargeback(\Mica\Issuer\Service\V2\ApproveChargebackRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/mica.issuer.service.v2.IssuerFromMicaWIPService/ApproveChargeback',
        $argument,
        ['\Mica\Issuer\Service\V2\ApproveChargebackResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * Asks the Issuer to credit a person-to-person transfer, sent with IssuerToMicaWIPService.SendValue, to one of its
     * users' instruments.
     * @param \Mica\Issuer\Value\V2\ReceiveValueRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall<\Mica\Issuer\Value\V2\ReceiveValueResponse>
     */
    public function ReceiveValue(\Mica\Issuer\Value\V2\ReceiveValueRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/mica.issuer.service.v2.IssuerFromMicaWIPService/ReceiveValue',
        $argument,
        ['\Mica\Issuer\Value\V2\ReceiveValueResponse', 'decode'],
        $metadata, $options);
    }

}
