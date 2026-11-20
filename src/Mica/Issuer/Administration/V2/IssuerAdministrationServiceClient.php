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
namespace Mica\Issuer\Administration\V2;

/**
 * Administration of an Issuer's Mica instance: the client certificates and callback address Mica uses to call the
 * Issuer's IssuerFromMicaService, connectivity tests, and data extraction statistics.
 *
 * To set up the connection from Mica to the Issuer: call GenerateFromMicaClientCertificate to have Mica create a key
 * pair and certificate signing request (CSR), sign the CSR with a CA the Issuer's server trusts, upload the signed
 * certificate with UpdateFromMicaClientCertificate, set the callback address with
 * UpdateFromMicaClientCallbackAddress, then call EnableFromMicaClientCertificate.
 */
class IssuerAdministrationServiceClient extends \Grpc\BaseStub {

    /**
     * @param string $hostname hostname
     * @param array $opts channel options
     * @param \Grpc\Channel $channel (optional) re-use channel object
     */
    public function __construct($hostname, $opts, $channel = null) {
        parent::__construct($hostname, $opts, $channel);
    }

    /**
     * Creates a new client key pair and certificate signing request (CSR) that Mica will use to authenticate when it
     * calls the Issuer. The private key stays with Mica; the response carries the CSR for the Issuer to sign.
     * @param \Mica\Issuer\Administration\V2\GenerateFromMicaClientCertificateRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall<\Mica\Issuer\Administration\V2\GenerateFromMicaClientCertificateResponse>
     */
    public function GenerateFromMicaClientCertificate(\Mica\Issuer\Administration\V2\GenerateFromMicaClientCertificateRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/mica.issuer.administration.v2.IssuerAdministrationService/GenerateFromMicaClientCertificate',
        $argument,
        ['\Mica\Issuer\Administration\V2\GenerateFromMicaClientCertificateResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * Uploads the certificate the Issuer signed from the CSR, together with the root CA bundle Mica should trust for the
     * Issuer's server. Can also update the display name.
     * @param \Mica\Issuer\Administration\V2\UpdateFromMicaClientCertificateRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall<\Mica\Issuer\Administration\V2\UpdateFromMicaClientCertificateResponse>
     */
    public function UpdateFromMicaClientCertificate(\Mica\Issuer\Administration\V2\UpdateFromMicaClientCertificateRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/mica.issuer.administration.v2.IssuerAdministrationService/UpdateFromMicaClientCertificate',
        $argument,
        ['\Mica\Issuer\Administration\V2\UpdateFromMicaClientCertificateResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * Makes a certificate the one Mica uses to call the Issuer. Mica first pings the Issuer with it and fails the call if
     * the ping fails. Only one certificate is enabled at a time, so enabling one disables the previous one.
     * @param \Mica\Issuer\Administration\V2\EnableFromMicaClientCertificateRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall<\Mica\Issuer\Administration\V2\EnableFromMicaClientCertificateResponse>
     */
    public function EnableFromMicaClientCertificate(\Mica\Issuer\Administration\V2\EnableFromMicaClientCertificateRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/mica.issuer.administration.v2.IssuerAdministrationService/EnableFromMicaClientCertificate',
        $argument,
        ['\Mica\Issuer\Administration\V2\EnableFromMicaClientCertificateResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * Returns all client certificates Mica holds for calling the Issuer.
     * @param \Mica\Issuer\Administration\V2\SearchFromMicaClientCertificateRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall<\Mica\Issuer\Administration\V2\SearchFromMicaClientCertificateResponse>
     */
    public function SearchFromMicaClientCertificate(\Mica\Issuer\Administration\V2\SearchFromMicaClientCertificateRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/mica.issuer.administration.v2.IssuerAdministrationService/SearchFromMicaClientCertificate',
        $argument,
        ['\Mica\Issuer\Administration\V2\SearchFromMicaClientCertificateResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * Returns the settings Mica uses to call the Issuer: the callback address and how Mica authenticates.
     * @param \Mica\Issuer\Administration\V2\GetFromMicaClientSettingsRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall<\Mica\Issuer\Administration\V2\GetFromMicaClientSettingsResponse>
     */
    public function GetFromMicaClientSettings(\Mica\Issuer\Administration\V2\GetFromMicaClientSettingsRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/mica.issuer.administration.v2.IssuerAdministrationService/GetFromMicaClientSettings',
        $argument,
        ['\Mica\Issuer\Administration\V2\GetFromMicaClientSettingsResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * Sets the address at which Mica calls the Issuer's IssuerFromMicaService.
     * @param \Mica\Issuer\Administration\V2\UpdateFromMicaClientCallbackAddressRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall<\Mica\Issuer\Administration\V2\UpdateFromMicaClientCallbackAddressResponse>
     */
    public function UpdateFromMicaClientCallbackAddress(\Mica\Issuer\Administration\V2\UpdateFromMicaClientCallbackAddressRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/mica.issuer.administration.v2.IssuerAdministrationService/UpdateFromMicaClientCallbackAddress',
        $argument,
        ['\Mica\Issuer\Administration\V2\UpdateFromMicaClientCallbackAddressResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * Returns statistics for every data extraction job on the Issuer's instance.
     * @param \Mica\Issuer\Administration\V2\SearchDataExtractionStatisticsRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall<\Mica\Issuer\Administration\V2\SearchDataExtractionStatisticsResponse>
     */
    public function SearchDataExtractionStatistics(\Mica\Issuer\Administration\V2\SearchDataExtractionStatisticsRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/mica.issuer.administration.v2.IssuerAdministrationService/SearchDataExtractionStatistics',
        $argument,
        ['\Mica\Issuer\Administration\V2\SearchDataExtractionStatisticsResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * Returns statistics for one data extraction job, by name.
     * @param \Mica\Issuer\Administration\V2\GetDataExtractionStatisticsRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall<\Mica\Issuer\Administration\V2\GetDataExtractionStatisticsResponse>
     */
    public function GetDataExtractionStatistics(\Mica\Issuer\Administration\V2\GetDataExtractionStatisticsRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/mica.issuer.administration.v2.IssuerAdministrationService/GetDataExtractionStatistics',
        $argument,
        ['\Mica\Issuer\Administration\V2\GetDataExtractionStatisticsResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * Tests that Mica can reach the Issuer: Mica calls the Issuer's Ping operation with the currently enabled
     * certificate. The call fails with a gRPC error if the ping fails.
     * @param \Mica\Issuer\Administration\V2\PingExternalRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall<\Mica\Issuer\Administration\V2\PingExternalResponse>
     */
    public function PingExternal(\Mica\Issuer\Administration\V2\PingExternalRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/mica.issuer.administration.v2.IssuerAdministrationService/PingExternal',
        $argument,
        ['\Mica\Issuer\Administration\V2\PingExternalResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * Tests that Mica can reach the Issuer using a specific certificate, whether or not it is enabled. Use it to check a
     * new certificate before enabling it. The call fails with a gRPC error if the ping fails.
     * @param \Mica\Issuer\Administration\V2\PingExternalWithCertificateRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall<\Mica\Issuer\Administration\V2\PingExternalWithCertificateResponse>
     */
    public function PingExternalWithCertificate(\Mica\Issuer\Administration\V2\PingExternalWithCertificateRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/mica.issuer.administration.v2.IssuerAdministrationService/PingExternalWithCertificate',
        $argument,
        ['\Mica\Issuer\Administration\V2\PingExternalWithCertificateResponse', 'decode'],
        $metadata, $options);
    }

}
