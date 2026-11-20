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
namespace Mica\Acceptor\Administration\V2;

/**
 * Administrative operations for an Acceptor's own Mica instance.
 */
class AcceptorAdministrationServiceClient extends \Grpc\BaseStub {

    /**
     * @param string $hostname hostname
     * @param array $opts channel options
     * @param \Grpc\Channel $channel (optional) re-use channel object
     */
    public function __construct($hostname, $opts, $channel = null) {
        parent::__construct($hostname, $opts, $channel);
    }

    /**
     * Lists the statistics of every data extractor running for your instance.
     * @param \Mica\Acceptor\Administration\V2\SearchDataExtractionStatisticsRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall<\Mica\Acceptor\Administration\V2\SearchDataExtractionStatisticsResponse>
     */
    public function SearchDataExtractionStatistics(\Mica\Acceptor\Administration\V2\SearchDataExtractionStatisticsRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/mica.acceptor.administration.v2.AcceptorAdministrationService/SearchDataExtractionStatistics',
        $argument,
        ['\Mica\Acceptor\Administration\V2\SearchDataExtractionStatisticsResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * Returns the statistics of one data extractor by name. An unknown name is reported as the gRPC status NOT_FOUND.
     * @param \Mica\Acceptor\Administration\V2\GetDataExtractionStatisticsRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall<\Mica\Acceptor\Administration\V2\GetDataExtractionStatisticsResponse>
     */
    public function GetDataExtractionStatistics(\Mica\Acceptor\Administration\V2\GetDataExtractionStatisticsRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/mica.acceptor.administration.v2.AcceptorAdministrationService/GetDataExtractionStatistics',
        $argument,
        ['\Mica\Acceptor\Administration\V2\GetDataExtractionStatisticsResponse', 'decode'],
        $metadata, $options);
    }

}
