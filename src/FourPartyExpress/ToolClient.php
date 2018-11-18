<?php

namespace Dakalab\FourPartyExpress;

class ToolClient extends Client
{
    public $wsdl = 'http://api.4px.com/OrderOnlineToolService.dll?wsdl';

    /**
     * Charge Calculate Service
     *
     * sample success response:
     * Array
     * (
     *     [ack] => Success
     *     [calculateFee] => Array
     *         (
     *             [currencyCode] => RMB
     *             [deliveryperiod] => 3-7
     *             [freightAmount] => 326.4
     *             [freightOilAmount] => 62.83
     *             [freightOilRmbAmount] => 62.83
     *             [freightRmbAmount] => 326.4
     *             [incidentalAmount] => 0
     *             [incidentalRmbAmount] => 0
     *             [productCName] => DHL出口
     *             [productCode] => A1
     *             [productEName] => HK DHL
     *             [totalAmount] => 389.23
     *             [totalRmbAmount] => 389.23
     *             [tracking] => Yes
     *             [volumn] => 0.002
     *         )
     * )
     *
     * @param  array    $params
     * @return array
     */
    public function chargeCalculateService($params)
    {
        return $this->_request(__FUNCTION__, $params);
    }

    /**
     * Cargo Tracking Service
     *
     * sample success response:
     * Array
     * (
     *     [ack] => Success
     *     [referenceNumber] => JV123456789GB
     *     [timestamp] => 2018-11-18 16:03:16
     *     [tracks] => Array
     *         (
     *             [destinationCountryCode] => GB
     *             [productCode] => FU
     *             [trackInfo] => Array
     *                 (
     *                     [0] => stdClass Object
     *                         (
     *                             [createDate] => 2018-11-17 16:28:54
     *                             [createPerson] => 王安
     *                             [occurAddress] => HONGKONG
     *                             [occurDate] => 2018-11-16 22:57:00
     *                             [trackCode] => FPX_M_HA
     *                             [trackContent] => Hand over to airline.
     *                         )
     *
     *                     [1] => stdClass Object
     *                         (
     *                             [createDate] => 2018-11-17 16:28:47
     *                             [createPerson] => 王安
     *                             [occurAddress] => HONGKONG
     *                             [occurDate] => 2018-11-16 13:25:00
     *                             [trackCode] => FPX_M_AAHK
     *                             [trackContent] => Arrived at Hong Kong hub.
     *                         )
     *                 )
     *
     *             [trackingNumber] => JV123456789GB
     *         )
     * )
     *
     * @param  string   $trackingNO
     * @return array
     */
    public function cargoTrackingService($trackingNO)
    {
        return $this->_request(__FUNCTION__, $trackingNO);
    }

    /**
     * Find TrackingNumber Service
     *
     * @param  string  $orderNO
     * @return array
     */
    public function findTrackingNumberService($orderNO)
    {
        return $this->_request(__FUNCTION__, $orderNO);
    }
}
