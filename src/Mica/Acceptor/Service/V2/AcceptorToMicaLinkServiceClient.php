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
namespace Mica\Acceptor\Service\V2;

/**
 * The service an Acceptor calls to manage links to a user's payment profile: complete a link from a linking code,
 * provision UUEKs from it, look it up and remove it. Payments made with those UUEKs are in AcceptorToMicaValueService.
 *
 * A request that breaks a validation rule on its fields is rejected with INVALID_ARGUMENT before it is processed, and
 * a caller not permitted to use an operation gets PERMISSION_DENIED. CompleteLinkingWithCode and
 * ProvisionUUEKFromLink report every other failure as a gRPC status code; GetLink and RemoveInstrumentLink report
 * their outcome in the response.
 */
class AcceptorToMicaLinkServiceClient extends \Grpc\BaseStub {

    /**
     * @param string $hostname hostname
     * @param array $opts channel options
     * @param \Grpc\Channel $channel (optional) re-use channel object
     */
    public function __construct($hostname, $opts, $channel = null) {
        parent::__construct($hostname, $opts, $channel);
    }

    /**
     * Completes a link to a user's payment profile using the linking code the user gave you, and returns a link_key you
     * can keep and use with ProvisionUUEKFromLink to pay with that profile later. Set create_uuek to also receive a UUEK
     * for an immediate payment.
     *
     * Failures are reported as gRPC status codes:
     *   NOT_FOUND           - the linking code is unknown or has already been used
     *   FAILED_PRECONDITION - the organization or acceptor was not found, or the organization is not active
     *   INVALID_ARGUMENT    - the organization key is malformed
     *   PERMISSION_DENIED   - the caller may not complete links
     * @param \Mica\Acceptor\Service\V2\CompleteLinkingWithCodeRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall<\Mica\Acceptor\Service\V2\CompleteLinkingWithCodeResponse>
     */
    public function CompleteLinkingWithCode(\Mica\Acceptor\Service\V2\CompleteLinkingWithCodeRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/mica.acceptor.service.v2.AcceptorToMicaLinkService/CompleteLinkingWithCode',
        $argument,
        ['\Mica\Acceptor\Service\V2\CompleteLinkingWithCodeResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * Provisions a new UUEK from a link_key returned by CompleteLinkingWithCode. Pass the UUEK to ObtainValue on
     * AcceptorToMicaValueService to pay with the linked payment profile.
     *
     * Failures are reported as gRPC status codes:
     *   NOT_FOUND         - no link exists for this link_key (for example it was removed with RemoveInstrumentLink)
     *   INVALID_ARGUMENT  - the link_key is malformed
     *   PERMISSION_DENIED - the caller may not provision UUEKs
     *   INTERNAL          - the UUEK could not be provisioned
     * @param \Mica\Acceptor\Service\V2\ProvisionUUEKFromLinkRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall<\Mica\Acceptor\Service\V2\ProvisionUUEKFromLinkResponse>
     */
    public function ProvisionUUEKFromLink(\Mica\Acceptor\Service\V2\ProvisionUUEKFromLinkRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/mica.acceptor.service.v2.AcceptorToMicaLinkService/ProvisionUUEKFromLink',
        $argument,
        ['\Mica\Acceptor\Service\V2\ProvisionUUEKFromLinkResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * Retrieves a link by the link_key returned when it was completed.
     * @param \Mica\Acceptor\Instrument\V2\GetLinkRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall<\Mica\Acceptor\Instrument\V2\GetLinkResponse>
     */
    public function GetLink(\Mica\Acceptor\Instrument\V2\GetLinkRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/mica.acceptor.service.v2.AcceptorToMicaLinkService/GetLink',
        $argument,
        ['\Mica\Acceptor\Instrument\V2\GetLinkResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * Removes a link so it can no longer be used to provision UUEKs. Mica deletes the link and, where it can, notifies
     * the other side of the link.
     * @param \Mica\Acceptor\Instrument\V2\RemoveInstrumentLinkRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall<\Mica\Acceptor\Instrument\V2\RemoveInstrumentLinkResponse>
     */
    public function RemoveInstrumentLink(\Mica\Acceptor\Instrument\V2\RemoveInstrumentLinkRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/mica.acceptor.service.v2.AcceptorToMicaLinkService/RemoveInstrumentLink',
        $argument,
        ['\Mica\Acceptor\Instrument\V2\RemoveInstrumentLinkResponse', 'decode'],
        $metadata, $options);
    }

}
