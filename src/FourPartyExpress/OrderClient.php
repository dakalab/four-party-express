<?php

namespace Dakalab\FourPartyExpress;

class OrderClient extends Client
{
    public $wsdl = 'http://api.4px.com/OrderOnlineService.dll?wsdl';

    /**
     * Create and pre-alert order service
     *
     * sample success response:
     * Array
     * (
     *     [ack] => Success
     *     [referenceNumber] => FAKE-ORDER-NO
     *     [timestamp] => 2018-11-18 17:08:15
     *     [trackingNumber] => FAKE-TRACKING-NO
     * )
     *
     * @param  array                       $customerParameter
     * @throws InvalidArgumentException
     * @return array
     */
    public function createAndPreAlertOrderService($customerParameter)
    {
        $declareInvoice = [
            'declareNote'     => '',
            'declarePieces'   => '',
            'declareUnitCode' => '',
            'eName'           => '',
            'name'            => '',
            'unitPrice'       => '',
        ];

        if (empty($customerParameter['declareInvoice'])) {
            throw new \InvalidArgumentException('declareInvoice array is empty');
        }

        $declareInvoiceArray = [];
        foreach ($customerParameter['declareInvoice'] as $value) {
            $declareInvoiceArray[] = self::mergeArray($declareInvoice, $value);
        }

        $createAndPreAlertOrder = [
            'buyerId'                => '',
            'cargoCode'              => '',
            'city'                   => '',
            'consigneeCompanyName'   => '',
            'consigneeEmail'         => '',
            'consigneeFax'           => '',
            'consigneeName'          => '',
            'consigneePostCode'      => '',
            'consigneeTelephone'     => '',
            'customerWeight'         => '',
            'destinationCountryCode' => '',
            'initialCountryCode'     => '',
            'insurType'              => '',
            'insurValue'             => '',
            'orderNo'                => '',
            'orderNote'              => '',
            'paymentCode'            => '',
            'pieces'                 => '',
            'productCode'            => '',
            'returnSign'             => '',
            'shipperAddress'         => '',
            'shipperCompanyName'     => '',
            'shipperFax'             => '',
            'shipperName'            => '',
            'shipperPostCode'        => '',
            'shipperTelephone'       => '',
            'stateOrProvince'        => '',
            'street'                 => '',
            'trackingNumber'         => '',
            'transactionId'          => '',
        ];

        $createAndPreAlertOrder = self::mergeArray($createAndPreAlertOrder, $customerParameter);

        $createAndPreAlertOrderArray = self::toObject($createAndPreAlertOrder);

        $createAndPreAlertOrderArray[0]->declareInvoice = $declareInvoiceArray;

        return $this->_request(__FUNCTION__, $createAndPreAlertOrderArray);
    }

    /**
     * Find Order Service
     *
     * @param  array   $params
     * @return array
     */
    public function findOrderService($params)
    {
        $findOrder = [
            'orderNo'   => '',
            'startTime' => '',
            'endTime'   => '',
            'status'    => '',
        ];

        $findOrder = self::mergeArray($findOrder, $params);

        return $this->_request(__FUNCTION__, $findOrder);
    }
}
