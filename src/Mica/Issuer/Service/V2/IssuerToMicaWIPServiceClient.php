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
 * Work-in-progress and experimental operations the Issuer calls on Mica. They may change, or become standard product
 * features, in future releases.
 */
class IssuerToMicaWIPServiceClient extends \Grpc\BaseStub {

    /**
     * @param string $hostname hostname
     * @param array $opts channel options
     * @param \Grpc\Channel $channel (optional) re-use channel object
     */
    public function __construct($hostname, $opts, $channel = null) {
        parent::__construct($hostname, $opts, $channel);
    }

    /**
     * Returns the recurring payments set up against a user's instruments.
     * @param \Mica\Issuer\Service\V2\SearchRecurringPaymentsRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall<\Mica\Issuer\Service\V2\SearchRecurringPaymentsResponse>
     */
    public function SearchRecurringPayments(\Mica\Issuer\Service\V2\SearchRecurringPaymentsRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/mica.issuer.service.v2.IssuerToMicaWIPService/SearchRecurringPayments',
        $argument,
        ['\Mica\Issuer\Service\V2\SearchRecurringPaymentsResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * @deprecated
     * Sends value from one of the Issuer's users to the holder of a UUEK (person-to-person).
     * Deprecated.
     * @param \Mica\Issuer\Service\V2\SendValueRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall<\Mica\Issuer\Service\V2\SendValueResponse>
     */
    public function SendValue(\Mica\Issuer\Service\V2\SendValueRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/mica.issuer.service.v2.IssuerToMicaWIPService/SendValue',
        $argument,
        ['\Mica\Issuer\Service\V2\SendValueResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * Starts a session in Mica's embedded web experience for one of the Issuer's users and returns a token for it. Fails
     * with gRPC UNIMPLEMENTED if the embedded experience is not enabled for the Issuer, NOT_FOUND if the user does not
     * exist, and PERMISSION_DENIED if the user is not active.
     * @param \Mica\Issuer\Service\V2\InitializeWebSessionRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall<\Mica\Issuer\Service\V2\InitializeWebSessionResponse>
     */
    public function InitializeWebSession(\Mica\Issuer\Service\V2\InitializeWebSessionRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/mica.issuer.service.v2.IssuerToMicaWIPService/InitializeWebSession',
        $argument,
        ['\Mica\Issuer\Service\V2\InitializeWebSessionResponse', 'decode'],
        $metadata, $options);
    }

}
