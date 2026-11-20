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
 * Operations still in development. They may change without notice.
 */
class AcceptorToMicaWIPServiceClient extends \Grpc\BaseStub {

    /**
     * @param string $hostname hostname
     * @param array $opts channel options
     * @param \Grpc\Channel $channel (optional) re-use channel object
     */
    public function __construct($hostname, $opts, $channel = null) {
        parent::__construct($hostname, $opts, $channel);
    }

    /**
     * Work in progress. Creates a recurring payment: standing permission, within the terms you set, to take future
     * payments from a user's linked payment profile. Pass a UUEK provisioned with ProvisionUUEKFromLink on
     * AcceptorToMicaLinkService using the create_recurring_payment intent. Returns a recurring_payment_key for later
     * calls. Creating a recurring payment moves no value; take each payment with ProvisionRecurringPaymentUUEK and
     * ObtainValue.
     * @param \Mica\Acceptor\Service\V2\CreateRecurringPaymentRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall<\Mica\Acceptor\Service\V2\CreateRecurringPaymentResponse>
     */
    public function CreateRecurringPayment(\Mica\Acceptor\Service\V2\CreateRecurringPaymentRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/mica.acceptor.service.v2.AcceptorToMicaWIPService/CreateRecurringPayment',
        $argument,
        ['\Mica\Acceptor\Service\V2\CreateRecurringPaymentResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * Work in progress. Retrieves a recurring payment by its recurring_payment_key. An unknown key is reported as the
     * gRPC status NOT_FOUND.
     * @param \Mica\Acceptor\Service\V2\GetRecurringPaymentRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall<\Mica\Acceptor\Service\V2\GetRecurringPaymentResponse>
     */
    public function GetRecurringPayment(\Mica\Acceptor\Service\V2\GetRecurringPaymentRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/mica.acceptor.service.v2.AcceptorToMicaWIPService/GetRecurringPayment',
        $argument,
        ['\Mica\Acceptor\Service\V2\GetRecurringPaymentResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * Work in progress. Provisions a UUEK for taking one payment under a recurring payment; pass it to ObtainValue on
     * AcceptorToMicaValueService. An unknown key is reported as the gRPC status NOT_FOUND, and a recurring payment that
     * cannot currently be used, for example because its terms are used up, as PERMISSION_DENIED.
     * @param \Mica\Acceptor\Service\V2\ProvisionRecurringPaymentUUEKRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall<\Mica\Acceptor\Service\V2\ProvisionRecurringPaymentUUEKResponse>
     */
    public function ProvisionRecurringPaymentUUEK(\Mica\Acceptor\Service\V2\ProvisionRecurringPaymentUUEKRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/mica.acceptor.service.v2.AcceptorToMicaWIPService/ProvisionRecurringPaymentUUEK',
        $argument,
        ['\Mica\Acceptor\Service\V2\ProvisionRecurringPaymentUUEKResponse', 'decode'],
        $metadata, $options);
    }

}
