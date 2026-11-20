<?php
// GENERATED CODE -- DO NOT EDIT!

namespace Mica\Acceptor\Service\V2;

/**
 * The service an Acceptor calls to move value using UUEKs provisioned from a link on AcceptorToMicaLinkService. It
 * replaces the value operations of the v1 PartnerToMicaService.
 *
 * Unlike the v1 service, failures are reported as gRPC status codes rather than a status enum in the response. A
 * request that breaks a validation rule on its fields is rejected with INVALID_ARGUMENT before it is processed.
 */
class AcceptorToMicaValueServiceClient extends \Grpc\BaseStub {

    /**
     * @param string $hostname hostname
     * @param array $opts channel options
     * @param \Grpc\Channel $channel (optional) re-use channel object
     */
    public function __construct($hostname, $opts, $channel = null) {
        parent::__construct($hostname, $opts, $channel);
    }

    /**
     * Obtains value from the user behind a UUEK to pay for goods or services. Mica may split the payment across several
     * of the user's tenders; the response reports the combined outcome.
     *
     * A business outcome is reported in the response's result: approved (possibly for part of the amount), declined, or
     * error. Once Mica has recorded a transaction, the outcome is normally reported there rather than as a status code.
     *
     * Failures before a transaction is recorded are reported as gRPC status codes:
     *   INVALID_ARGUMENT - the request failed validation, or the UUEK is missing, malformed or cannot be used to pay
     *   INTERNAL         - the UUEK could not be exchanged or the payment could not be started. Other problems with
     *                      the request found during processing, such as an unknown organization or an
     *                      APPROVAL_TYPE_UNSPECIFIED approval_type, currently also surface as INTERNAL.
     * @param \Mica\Acceptor\Service\V2\ObtainValueRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall<\Mica\Acceptor\Service\V2\ObtainValueResponse>
     */
    public function ObtainValue(\Mica\Acceptor\Service\V2\ObtainValueRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/mica.acceptor.service.v2.AcceptorToMicaValueService/ObtainValue',
        $argument,
        ['\Mica\Acceptor\Service\V2\ObtainValueResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * Intended to reverse an earlier ObtainValue, returning the value it obtained to the user.
     * @param \Mica\Acceptor\Service\V2\ReverseObtainValueRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall<\Mica\Acceptor\Service\V2\ReverseObtainValueResponse>
     */
    public function ReverseObtainValue(\Mica\Acceptor\Service\V2\ReverseObtainValueRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/mica.acceptor.service.v2.AcceptorToMicaValueService/ReverseObtainValue',
        $argument,
        ['\Mica\Acceptor\Service\V2\ReverseObtainValueResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * Intended to refund the user, in whole or in part, for an earlier transaction.
     * @param \Mica\Acceptor\Service\V2\RefundValueRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall<\Mica\Acceptor\Service\V2\RefundValueResponse>
     */
    public function RefundValue(\Mica\Acceptor\Service\V2\RefundValueRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/mica.acceptor.service.v2.AcceptorToMicaValueService/RefundValue',
        $argument,
        ['\Mica\Acceptor\Service\V2\RefundValueResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * Intended to send value to the user behind a UUEK without referring to an earlier transaction.
     * @param \Mica\Acceptor\Service\V2\PayoutValueRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall<\Mica\Acceptor\Service\V2\PayoutValueResponse>
     */
    public function PayoutValue(\Mica\Acceptor\Service\V2\PayoutValueRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/mica.acceptor.service.v2.AcceptorToMicaValueService/PayoutValue',
        $argument,
        ['\Mica\Acceptor\Service\V2\PayoutValueResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * Intended to place a hold on value from the user behind a UUEK, to be obtained later with ObtainHoldValue or
     * released with ReleaseHoldValue.
     * @param \Mica\Acceptor\Service\V2\HoldValueRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall<\Mica\Acceptor\Service\V2\HoldValueResponse>
     */
    public function HoldValue(\Mica\Acceptor\Service\V2\HoldValueRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/mica.acceptor.service.v2.AcceptorToMicaValueService/HoldValue',
        $argument,
        ['\Mica\Acceptor\Service\V2\HoldValueResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * Intended to release value held by an earlier HoldValue back to the user.
     * @param \Mica\Acceptor\Service\V2\ReleaseHoldValueRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall<\Mica\Acceptor\Service\V2\ReleaseHoldValueResponse>
     */
    public function ReleaseHoldValue(\Mica\Acceptor\Service\V2\ReleaseHoldValueRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/mica.acceptor.service.v2.AcceptorToMicaValueService/ReleaseHoldValue',
        $argument,
        ['\Mica\Acceptor\Service\V2\ReleaseHoldValueResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * Intended to obtain value held by an earlier HoldValue.
     * @param \Mica\Acceptor\Service\V2\ObtainHoldValueRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall<\Mica\Acceptor\Service\V2\ObtainHoldValueResponse>
     */
    public function ObtainHoldValue(\Mica\Acceptor\Service\V2\ObtainHoldValueRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/mica.acceptor.service.v2.AcceptorToMicaValueService/ObtainHoldValue',
        $argument,
        ['\Mica\Acceptor\Service\V2\ObtainHoldValueResponse', 'decode'],
        $metadata, $options);
    }

}
