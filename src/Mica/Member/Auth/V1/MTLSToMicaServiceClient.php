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
namespace Mica\Member\Auth\V1;

/**
 * Manages the client certificates ("to Mica" certificates) that a member uses to authenticate its calls to Mica's
 * Issuer and Acceptor APIs over mutual TLS. Each certificate carries a set of roles that decide which calls it may
 * make. You keep the private key: you send Mica a certificate signing request (CSR) and Mica returns the signed
 * certificate.
 *
 * Every call requires a certificate with the matching permission; a caller without it gets the gRPC status
 * `PERMISSION_DENIED`.
 */
class MTLSToMicaServiceClient extends \Grpc\BaseStub {

    /**
     * @param string $hostname hostname
     * @param array $opts channel options
     * @param \Grpc\Channel $channel (optional) re-use channel object
     */
    public function __construct($hostname, $opts, $channel = null) {
        parent::__construct($hostname, $opts, $channel);
    }

    /**
     * Signs a CSR and returns a new client certificate with the requested roles. The certificate is enabled
     * immediately.
     * @param \Mica\Member\Auth\V1\GenerateCertificateRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall<\Mica\Member\Auth\V1\GenerateCertificateResponse>
     */
    public function GenerateCertificate(\Mica\Member\Auth\V1\GenerateCertificateRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/mica.member.auth.v1.MTLSToMicaService/GenerateCertificate',
        $argument,
        ['\Mica\Member\Auth\V1\GenerateCertificateResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * Re-enables a disabled certificate so that it can be used again.
     * @param \Mica\Member\Auth\V1\EnableCertificateRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall<\Mica\Member\Auth\V1\EnableCertificateResponse>
     */
    public function EnableCertificate(\Mica\Member\Auth\V1\EnableCertificateRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/mica.member.auth.v1.MTLSToMicaService/EnableCertificate',
        $argument,
        ['\Mica\Member\Auth\V1\EnableCertificateResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * Disables a certificate: Mica rejects calls made with it until it is enabled again. Use this to revoke access.
     * @param \Mica\Member\Auth\V1\DisableCertificateRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall<\Mica\Member\Auth\V1\DisableCertificateResponse>
     */
    public function DisableCertificate(\Mica\Member\Auth\V1\DisableCertificateRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/mica.member.auth.v1.MTLSToMicaService/DisableCertificate',
        $argument,
        ['\Mica\Member\Auth\V1\DisableCertificateResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * Lists every certificate issued for this member, including disabled and expired ones. Takes no filters. The listed
     * certificates do not include PEM data; use GetCertificate for that.
     * @param \Mica\Member\Auth\V1\SearchCertificateRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall<\Mica\Member\Auth\V1\SearchCertificateResponse>
     */
    public function SearchCertificate(\Mica\Member\Auth\V1\SearchCertificateRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/mica.member.auth.v1.MTLSToMicaService/SearchCertificate',
        $argument,
        ['\Mica\Member\Auth\V1\SearchCertificateResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * Returns one certificate, including its PEM data, by serial number.
     * @param \Mica\Member\Auth\V1\GetCertificateRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall<\Mica\Member\Auth\V1\GetCertificateResponse>
     */
    public function GetCertificate(\Mica\Member\Auth\V1\GetCertificateRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/mica.member.auth.v1.MTLSToMicaService/GetCertificate',
        $argument,
        ['\Mica\Member\Auth\V1\GetCertificateResponse', 'decode'],
        $metadata, $options);
    }

}
