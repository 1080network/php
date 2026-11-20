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
 * Operations the Issuer calls on Mica, authenticated with the Issuer's mTLS client certificate.
 *
 * Before Mica can route payments to the Issuer, the Issuer registers each user with RegisterUser and each of that
 * user's instruments (accounts) with RegisterInstrument. Mica returns its own key for every record it creates
 * (`issuer_user_key`, `issuer_instrument_key`); most operations accept either that key or the Issuer's own reference
 * (`issuer_user_ref`, `issuer_instrument_ref`). The Issuer then provisions UUEKs for an instrument with
 * ProvisionIssuerUUEK and hands them to its users to pay at Acceptors.
 *
 * The instrument link operations let a user connect one of their instruments to another member (for example, to save
 * a payment method at a merchant).
 */
class IssuerToMicaServiceClient extends \Grpc\BaseStub {

    /**
     * @param string $hostname hostname
     * @param array $opts channel options
     * @param \Grpc\Channel $channel (optional) re-use channel object
     */
    public function __construct($hostname, $opts, $channel = null) {
        parent::__construct($hostname, $opts, $channel);
    }

    /**
     * Returns the Issuer's own member record at Mica.
     * @param \Mica\Issuer\Issuer\V2\GetIssuerRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall<\Mica\Issuer\Issuer\V2\GetIssuerResponse>
     */
    public function GetIssuer(\Mica\Issuer\Issuer\V2\GetIssuerRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/mica.issuer.service.v2.IssuerToMicaService/GetIssuer',
        $argument,
        ['\Mica\Issuer\Issuer\V2\GetIssuerResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * Registers one of the Issuer's users with Mica and returns Mica's key for the user. This registers the user only;
     * register each of the user's instruments separately with RegisterInstrument. Returns STATUS_DUPLICATE if
     * `issuer_user_ref` is already registered.
     * @param \Mica\Issuer\User\V2\RegisterUserRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall<\Mica\Issuer\User\V2\RegisterUserResponse>
     */
    public function RegisterUser(\Mica\Issuer\User\V2\RegisterUserRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/mica.issuer.service.v2.IssuerToMicaService/RegisterUser',
        $argument,
        ['\Mica\Issuer\User\V2\RegisterUserResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * Returns a registered user, looked up by Mica's user key or the Issuer's user reference.
     * @param \Mica\Issuer\User\V2\GetUserRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall<\Mica\Issuer\User\V2\GetUserResponse>
     */
    public function GetUser(\Mica\Issuer\User\V2\GetUserRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/mica.issuer.service.v2.IssuerToMicaService/GetUser',
        $argument,
        ['\Mica\Issuer\User\V2\GetUserResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * Updates the demographic data Mica holds for a user. Pass the `version` last returned for the user; a stale version
     * returns STATUS_VERSION_MISMATCH.
     * @param \Mica\Issuer\User\V2\UpdateUserRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall<\Mica\Issuer\User\V2\UpdateUserResponse>
     */
    public function UpdateUser(\Mica\Issuer\User\V2\UpdateUserRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/mica.issuer.service.v2.IssuerToMicaService/UpdateUser',
        $argument,
        ['\Mica\Issuer\User\V2\UpdateUserResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * Removes a user from Mica, typically when the user ends their relationship with the Issuer (for example, closes
     * their account). Once removed, the user's `issuer_user_ref` can be registered again.
     * @param \Mica\Issuer\User\V2\RemoveUserRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall<\Mica\Issuer\User\V2\RemoveUserResponse>
     */
    public function RemoveUser(\Mica\Issuer\User\V2\RemoveUserRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/mica.issuer.service.v2.IssuerToMicaService/RemoveUser',
        $argument,
        ['\Mica\Issuer\User\V2\RemoveUserResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * Registers one of a user's instruments (accounts) with Mica and returns Mica's key for the instrument. The user must
     * already be registered. Returns STATUS_DUPLICATE if the user already has an instrument with this
     * `issuer_instrument_ref`.
     * @param \Mica\Issuer\Instrument\V2\RegisterInstrumentRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall<\Mica\Issuer\Instrument\V2\RegisterInstrumentResponse>
     */
    public function RegisterInstrument(\Mica\Issuer\Instrument\V2\RegisterInstrumentRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/mica.issuer.service.v2.IssuerToMicaService/RegisterInstrument',
        $argument,
        ['\Mica\Issuer\Instrument\V2\RegisterInstrumentResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * Returns a registered instrument, looked up by Mica's instrument key or by the Issuer's user and instrument
     * references.
     * @param \Mica\Issuer\Instrument\V2\GetInstrumentRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall<\Mica\Issuer\Instrument\V2\GetInstrumentResponse>
     */
    public function GetInstrument(\Mica\Issuer\Instrument\V2\GetInstrumentRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/mica.issuer.service.v2.IssuerToMicaService/GetInstrument',
        $argument,
        ['\Mica\Issuer\Instrument\V2\GetInstrumentResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * Removes an instrument from Mica. Once removed, its `issuer_instrument_ref` can be registered again.
     * @param \Mica\Issuer\Instrument\V2\RemoveInstrumentRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall<\Mica\Issuer\Instrument\V2\RemoveInstrumentResponse>
     */
    public function RemoveInstrument(\Mica\Issuer\Instrument\V2\RemoveInstrumentRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/mica.issuer.service.v2.IssuerToMicaService/RemoveInstrument',
        $argument,
        ['\Mica\Issuer\Instrument\V2\RemoveInstrumentResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * Returns all instruments registered for a user.
     * @param \Mica\Issuer\Instrument\V2\SearchInstrumentRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall<\Mica\Issuer\Instrument\V2\SearchInstrumentResponse>
     */
    public function SearchInstrument(\Mica\Issuer\Instrument\V2\SearchInstrumentRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/mica.issuer.service.v2.IssuerToMicaService/SearchInstrument',
        $argument,
        ['\Mica\Issuer\Instrument\V2\SearchInstrumentResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * Creates a UUEK for one of the Issuer's instruments. The Issuer gives the UUEK to its user, who presents it to an
     * Acceptor to pay from that instrument. The request controls how long, how often and for how much the UUEK can be
     * used.
     * @param \Mica\Issuer\Uuek\V2\ProvisionIssuerUUEKRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall<\Mica\Issuer\Uuek\V2\ProvisionIssuerUUEKResponse>
     */
    public function ProvisionIssuerUUEK(\Mica\Issuer\Uuek\V2\ProvisionIssuerUUEKRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/mica.issuer.service.v2.IssuerToMicaService/ProvisionIssuerUUEK',
        $argument,
        ['\Mica\Issuer\Uuek\V2\ProvisionIssuerUUEKResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * Starts linking one of a user's instruments to another member by returning a linking code. The user enters the code
     * at the other member (for example, a merchant) to save the instrument as a persistent payment method there.
     * @param \Mica\Issuer\Instrument\V2\ProvisionInstrumentLinkingCodeRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall<\Mica\Issuer\Instrument\V2\ProvisionInstrumentLinkingCodeResponse>
     */
    public function ProvisionInstrumentLinkingCode(\Mica\Issuer\Instrument\V2\ProvisionInstrumentLinkingCodeRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/mica.issuer.service.v2.IssuerToMicaService/ProvisionInstrumentLinkingCode',
        $argument,
        ['\Mica\Issuer\Instrument\V2\ProvisionInstrumentLinkingCodeResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * Completes a link that another member started: the user brings a linking code from the other member, and the
     * Issuer submits it here together with the user and instrument the link should attach to.
     * @param \Mica\Issuer\Instrument\V2\CompleteLinkingWithCodeRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall<\Mica\Issuer\Instrument\V2\CompleteLinkingWithCodeResponse>
     */
    public function CompleteLinkingWithCode(\Mica\Issuer\Instrument\V2\CompleteLinkingWithCodeRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/mica.issuer.service.v2.IssuerToMicaService/CompleteLinkingWithCode',
        $argument,
        ['\Mica\Issuer\Instrument\V2\CompleteLinkingWithCodeResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * Returns one instrument link by its `link_key`.
     * @param \Mica\Issuer\Instrument\V2\GetInstrumentLinkRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall<\Mica\Issuer\Instrument\V2\GetInstrumentLinkResponse>
     */
    public function GetInstrumentLink(\Mica\Issuer\Instrument\V2\GetInstrumentLinkRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/mica.issuer.service.v2.IssuerToMicaService/GetInstrumentLink',
        $argument,
        ['\Mica\Issuer\Instrument\V2\GetInstrumentLinkResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * Returns the established instrument links for a user, an instrument, or both.
     * @param \Mica\Issuer\Instrument\V2\SearchInstrumentLinksRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall<\Mica\Issuer\Instrument\V2\SearchInstrumentLinksResponse>
     */
    public function SearchInstrumentLinks(\Mica\Issuer\Instrument\V2\SearchInstrumentLinksRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/mica.issuer.service.v2.IssuerToMicaService/SearchInstrumentLinks',
        $argument,
        ['\Mica\Issuer\Instrument\V2\SearchInstrumentLinksResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * Removes an instrument link. Mica also notifies the member on the other side of the link so it is removed there.
     * @param \Mica\Issuer\Instrument\V2\RemoveInstrumentLinkRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall<\Mica\Issuer\Instrument\V2\RemoveInstrumentLinkResponse>
     */
    public function RemoveInstrumentLink(\Mica\Issuer\Instrument\V2\RemoveInstrumentLinkRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/mica.issuer.service.v2.IssuerToMicaService/RemoveInstrumentLink',
        $argument,
        ['\Mica\Issuer\Instrument\V2\RemoveInstrumentLinkResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * Returns the records of a past transaction by Mica's global transaction id or the Issuer's transaction reference.
     * Intended for pre-production testing: Mica purges transactions from its operational store shortly after they
     * complete, and this call only reads that store. `oldest_transaction_time` in the response says how far back data is
     * still available.
     * @param \Mica\Issuer\Value\V2\GetValueRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall<\Mica\Issuer\Value\V2\GetValueResponse>
     */
    public function GetValue(\Mica\Issuer\Value\V2\GetValueRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/mica.issuer.service.v2.IssuerToMicaService/GetValue',
        $argument,
        ['\Mica\Issuer\Value\V2\GetValueResponse', 'decode'],
        $metadata, $options);
    }

}
