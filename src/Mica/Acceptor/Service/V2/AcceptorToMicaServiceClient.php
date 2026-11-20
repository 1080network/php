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
 * The service an Acceptor calls to manage its own details and its organizations. Links are in
 * AcceptorToMicaLinkService, payments in AcceptorToMicaValueService, and the connectivity check in
 * mica.member.ping.v1.PingService.
 *
 * Most operations report their outcome in the response's status, with details in error. A request that breaks a
 * validation rule, carries a malformed key or omits a required identifier is rejected with the gRPC status
 * INVALID_ARGUMENT; a caller not permitted to use an operation gets PERMISSION_DENIED, and an unexpected server
 * failure INTERNAL.
 */
class AcceptorToMicaServiceClient extends \Grpc\BaseStub {

    /**
     * @param string $hostname hostname
     * @param array $opts channel options
     * @param \Grpc\Channel $channel (optional) re-use channel object
     */
    public function __construct($hostname, $opts, $channel = null) {
        parent::__construct($hostname, $opts, $channel);
    }

    /**
     * Returns the details Mica holds about you, the calling Acceptor.
     * @param \Mica\Acceptor\Acceptor\V2\GetAcceptorRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall<\Mica\Acceptor\Acceptor\V2\GetAcceptorResponse>
     */
    public function GetAcceptor(\Mica\Acceptor\Acceptor\V2\GetAcceptorRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/mica.acceptor.service.v2.AcceptorToMicaService/GetAcceptor',
        $argument,
        ['\Mica\Acceptor\Acceptor\V2\GetAcceptorResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * Creates an organization: a business you accept payments for. It is created inactive; call ActivateOrganization
     * before using it. Returns Mica's organization_key and the version to pass to later changes.
     * @param \Mica\Acceptor\Service\V2\CreateOrganizationRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall<\Mica\Acceptor\Service\V2\CreateOrganizationResponse>
     */
    public function CreateOrganization(\Mica\Acceptor\Service\V2\CreateOrganizationRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/mica.acceptor.service.v2.AcceptorToMicaService/CreateOrganization',
        $argument,
        ['\Mica\Acceptor\Service\V2\CreateOrganizationResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * Retrieves one of your organizations by its organization_key or organization_ref. Setting neither is rejected
     * with INVALID_ARGUMENT.
     * @param \Mica\Acceptor\Service\V2\GetOrganizationRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall<\Mica\Acceptor\Service\V2\GetOrganizationResponse>
     */
    public function GetOrganization(\Mica\Acceptor\Service\V2\GetOrganizationRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/mica.acceptor.service.v2.AcceptorToMicaService/GetOrganization',
        $argument,
        ['\Mica\Acceptor\Service\V2\GetOrganizationResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * Replaces an organization's name, address, categories and phone; a field left empty is cleared. Pass the
     * organization's current version: if it has changed since you read it, the update is rejected with
     * STATUS_VERSION_MISMATCH.
     * @param \Mica\Acceptor\Service\V2\UpdateOrganizationRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall<\Mica\Acceptor\Service\V2\UpdateOrganizationResponse>
     */
    public function UpdateOrganization(\Mica\Acceptor\Service\V2\UpdateOrganizationRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/mica.acceptor.service.v2.AcceptorToMicaService/UpdateOrganization',
        $argument,
        ['\Mica\Acceptor\Service\V2\UpdateOrganizationResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * Activates an inactive organization. Activating an organization that is already active succeeds without changing
     * it. Pass the organization's current version.
     * @param \Mica\Acceptor\Service\V2\ActivateOrganizationRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall<\Mica\Acceptor\Service\V2\ActivateOrganizationResponse>
     */
    public function ActivateOrganization(\Mica\Acceptor\Service\V2\ActivateOrganizationRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/mica.acceptor.service.v2.AcceptorToMicaService/ActivateOrganization',
        $argument,
        ['\Mica\Acceptor\Service\V2\ActivateOrganizationResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * Deactivates an active organization. Deactivating an organization that is already inactive succeeds without
     * changing it. Pass the organization's current version.
     * @param \Mica\Acceptor\Service\V2\DeactivateOrganizationRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall<\Mica\Acceptor\Service\V2\DeactivateOrganizationResponse>
     */
    public function DeactivateOrganization(\Mica\Acceptor\Service\V2\DeactivateOrganizationRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/mica.acceptor.service.v2.AcceptorToMicaService/DeactivateOrganization',
        $argument,
        ['\Mica\Acceptor\Service\V2\DeactivateOrganizationResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * Lists your organizations, optionally filtered by name and category. With no criteria it returns all of them.
     * @param \Mica\Acceptor\Service\V2\SearchOrganizationRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall<\Mica\Acceptor\Service\V2\SearchOrganizationResponse>
     */
    public function SearchOrganization(\Mica\Acceptor\Service\V2\SearchOrganizationRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/mica.acceptor.service.v2.AcceptorToMicaService/SearchOrganization',
        $argument,
        ['\Mica\Acceptor\Service\V2\SearchOrganizationResponse', 'decode'],
        $metadata, $options);
    }

}
