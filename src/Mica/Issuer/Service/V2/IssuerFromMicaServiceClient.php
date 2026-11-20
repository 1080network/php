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
 * Operations Mica calls on the Issuer. The Issuer hosts this service at the callback address configured with
 * IssuerAdministrationService.UpdateFromMicaClientCallbackAddress, and Mica authenticates with the client certificate
 * enabled through that administration service.
 *
 * Each value operation asks the Issuer to move value on one of its instruments for a network transaction. The
 * operations correspond to those on AcceptorToMicaValueService.
 *
 * Every value operation runs in two steps, identified by `transaction_identifier` and the instrument, so that Mica can
 * apply a transaction completely or not at all. The request's `phase` says which step it is:
 *   "PREFLIGHT" - check that the operation can be applied and reserve what it needs, without applying it
 *   "COMMIT"    - apply the operation, for the amount approved at preflight
 *   "ROLLBACK"  - release what the preflight reserved; nothing is applied
 * Reject a request whose `phase` is anything else. A request whose preflight result Mica did not receive is always
 * rolled back. Mica may repeat a COMMIT or ROLLBACK it did not get an answer to, so apply each only once.
 *
 * The Issuer reports its decision in the response. A failure to process the request at all, rather than a decline, is
 * reported as a gRPC status code, and an operation the Issuer does not support returns UNIMPLEMENTED.
 */
class IssuerFromMicaServiceClient extends \Grpc\BaseStub {

    /**
     * @param string $hostname hostname
     * @param array $opts channel options
     * @param \Grpc\Channel $channel (optional) re-use channel object
     */
    public function __construct($hostname, $opts, $channel = null) {
        parent::__construct($hostname, $opts, $channel);
    }

    /**
     * Asks the Issuer to take value from the instrument for a payment. The Issuer may approve less than `amount` at
     * preflight.
     * @param \Mica\Issuer\Service\V2\ObtainValueRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall<\Mica\Issuer\Service\V2\ObtainValueResponse>
     */
    public function ObtainValue(\Mica\Issuer\Service\V2\ObtainValueRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/mica.issuer.service.v2.IssuerFromMicaService/ObtainValue',
        $argument,
        ['\Mica\Issuer\Service\V2\ObtainValueResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * Asks the Issuer to reverse an earlier ObtainValue in full, returning everything it took to the instrument.
     * @param \Mica\Issuer\Service\V2\ReverseObtainValueRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall<\Mica\Issuer\Service\V2\ReverseObtainValueResponse>
     */
    public function ReverseObtainValue(\Mica\Issuer\Service\V2\ReverseObtainValueRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/mica.issuer.service.v2.IssuerFromMicaService/ReverseObtainValue',
        $argument,
        ['\Mica\Issuer\Service\V2\ReverseObtainValueResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * Asks the Issuer to credit the instrument with part or all of an earlier payment, for example for a returned
     * item.
     * @param \Mica\Issuer\Service\V2\RefundValueRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall<\Mica\Issuer\Service\V2\RefundValueResponse>
     */
    public function RefundValue(\Mica\Issuer\Service\V2\RefundValueRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/mica.issuer.service.v2.IssuerFromMicaService/RefundValue',
        $argument,
        ['\Mica\Issuer\Service\V2\RefundValueResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * Asks the Issuer to credit the instrument for a payout: value sent to the user that does not refer to an earlier
     * payment.
     * @param \Mica\Issuer\Service\V2\PayoutValueRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall<\Mica\Issuer\Service\V2\PayoutValueResponse>
     */
    public function PayoutValue(\Mica\Issuer\Service\V2\PayoutValueRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/mica.issuer.service.v2.IssuerFromMicaService/PayoutValue',
        $argument,
        ['\Mica\Issuer\Service\V2\PayoutValueResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * Asks the Issuer to reserve value on the instrument until `expiration`. The hold is later captured with
     * ObtainHoldValue, released with ReleaseHoldValue, or left to expire.
     * @param \Mica\Issuer\Service\V2\HoldValueRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall<\Mica\Issuer\Service\V2\HoldValueResponse>
     */
    public function HoldValue(\Mica\Issuer\Service\V2\HoldValueRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/mica.issuer.service.v2.IssuerFromMicaService/HoldValue',
        $argument,
        ['\Mica\Issuer\Service\V2\HoldValueResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * Asks the Issuer to release an earlier hold in full without capturing it, returning all of the reserved value to
     * the instrument.
     * @param \Mica\Issuer\Service\V2\ReleaseHoldValueRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall<\Mica\Issuer\Service\V2\ReleaseHoldValueResponse>
     */
    public function ReleaseHoldValue(\Mica\Issuer\Service\V2\ReleaseHoldValueRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/mica.issuer.service.v2.IssuerFromMicaService/ReleaseHoldValue',
        $argument,
        ['\Mica\Issuer\Service\V2\ReleaseHoldValueResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * Asks the Issuer to take value against an earlier hold, once the final amount is known. This settles the hold.
     * @param \Mica\Issuer\Service\V2\ObtainHoldValueRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall<\Mica\Issuer\Service\V2\ObtainHoldValueResponse>
     */
    public function ObtainHoldValue(\Mica\Issuer\Service\V2\ObtainHoldValueRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/mica.issuer.service.v2.IssuerFromMicaService/ObtainHoldValue',
        $argument,
        ['\Mica\Issuer\Service\V2\ObtainHoldValueResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * Informs the Issuer about steps of value operations that Mica could not complete with the Issuer, for example a
     * COMMIT the Issuer did not answer in time. The Issuer should acknowledge promptly and reconcile afterwards, undoing
     * any value movement it applied for a transaction the network declined. Not sent by the current network release.
     * @param \Mica\Issuer\Service\V2\ValueAdviceRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall<\Mica\Issuer\Service\V2\ValueAdviceResponse>
     */
    public function ValueAdvice(\Mica\Issuer\Service\V2\ValueAdviceRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/mica.issuer.service.v2.IssuerFromMicaService/ValueAdvice',
        $argument,
        ['\Mica\Issuer\Service\V2\ValueAdviceResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * Lets Mica check that the Issuer's service is reachable and that the mTLS connection works. Mica calls this when
     * the Issuer tests connectivity with IssuerAdministrationService.PingExternal or enables a new client certificate.
     * @param \Mica\Issuer\Service\V2\IssuerFromMicaServicePingRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall<\Mica\Issuer\Service\V2\IssuerFromMicaServicePingResponse>
     */
    public function Ping(\Mica\Issuer\Service\V2\IssuerFromMicaServicePingRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/mica.issuer.service.v2.IssuerFromMicaService/Ping',
        $argument,
        ['\Mica\Issuer\Service\V2\IssuerFromMicaServicePingResponse', 'decode'],
        $metadata, $options);
    }

}
