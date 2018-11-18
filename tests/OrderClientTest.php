<?php

namespace Dakalab\FourPartyExpress\Tests;

use Dakalab\FourPartyExpress\OrderClient;

/**
 * Test class for Dakalab\FourPartyExpress\OrderClient
 *
 * @coversDefaultClass \Dakalab\FourPartyExpress\OrderClient
 */
class OrderClientTest extends TestCase
{
    protected $orderClient;

    protected function setUp()
    {
        parent::setUp();

        $this->orderClient = new OrderClient($this->token);
    }

    public function testListFunctions()
    {
        $res = $this->orderClient->listFunctions();
        $this->assertContains('findOrderServiceResponse findOrderService(findOrderService $parameters)', $res);
    }

    /**
     * @expectedException InvalidArgumentException
     */
    public function testCreateAndPreAlertOrderServiceWithEmptyParams()
    {
        $this->orderClient->createAndPreAlertOrderService([]);
    }

    public function testCreateAndPreAlertOrderService()
    {
        $orderNo = 'fake-order-no';

        $params = [
            'buyerId'                => 'chenhb',                            // 买家ID
            'cargoCode'              => 'P',                                 // 货物类型(默认：P)，参照货物类型表
            'city'                   => 'Duncan',                            // 城市 【***】
            'consigneeCompanyName'   => 'Fred Paramore',                     // 收件人公司名称
            'consigneeEmail'         => 'FredParamore@163.com',              // 收件人Email
            'consigneeFax'           => '5802552358',                        // 收件人传真号码
            'consigneeName'          => 'Fred Paramore',                     // 收件人公司名称姓名【***】
            'consigneePostCode'      => '73533',                             // 收件人邮编
            'consigneeTelephone'     => '5802552358',                        // 收件人电话号码
            'customerWeight'         => '50',                                // 客户自己称的重量(单位：KG)
            'destinationCountryCode' => 'US',                                // 目的国家二字代码，参照国家代码表
            'initialCountryCode'     => 'CN',                                // 起运国家二字代码，参照国家代码表【***】
            'insurType'              => '6P',                                // 保险类型，参照保险类型表
            'insurValue'             => '100',                               // 保险价值(单位：USD)0 < Amount <= [10,2]
            'orderNo'                => $orderNo,                            // 客户订单号码，由客户自己定义【***】
            'orderNote'              => 'Test order....',                    // 订单备注信息
            'paymentCode'            => 'P',                                 // 付款类型(默认：P)，参照付款类型表
            'pieces'                 => '2',                                 // 货物件数(默认：1) 0 < Amount <= [10,2]
            'productCode'            => 'B1',                                // 产品代码，指DHL、新加坡小包挂号、联邮通挂号等，参照产品代码表 【***】
            'returnSign'             => 'N',                                 // 小包退件标识 Y: 发件人要求退回 N: 无须退回(默认)
            'shipperAddress'         => 'guang dong shenzhen baoan xixiang', // 发件人地址
            'shipperCompanyName'     => 'chenhb Company',                    // 发件人公司名称
            'shipperFax'             => '0755-29771100',                     // 发件人传真号码
            'shipperName'            => 'chenhb',                            // 发件人姓名
            'shipperPostCode'        => '518000',                            // 发件人邮编
            'shipperTelephone'       => '0755-29771100',                     // 发件人电话号码
            'stateOrProvince'        => 'Oklahoma',                          // 州  /  省 【***】
            'street'                 => '2301 Briarcrest United States',     // 街道【***】
            'trackingNumber'         => '',                                  // 服务跟踪号码【无效时系统自动分配】
            'transactionId'          => '',                                  // 交易ID
            'declareInvoice'         => [
                [
                    'declareNote'     => 'Test declareInvoiceObj', // 配货备注
                    'declarePieces'   => '10',                     // 件数(默认: 1)
                    'declareUnitCode' => 'PCE',                    // 申报单位类型代码(默认:  PCE)，参照申报单位类型代码表
                    'eName'           => 'PEN',                    // 海关申报英文品名
                    'name'            => 'PEN CN',                 // 海关申报中文品名
                    'unitPrice'       => '10',                     // 单价 0 < Amount <= [10,2]【***】
                ],
                [
                    'declareNote'     => 'Test declareInvoiceObj', // 配货备注
                    'declarePieces'   => '10',                     // 件数(默认: 1)
                    'declareUnitCode' => 'PCE',                    // 申报单位类型代码(默认:  PCE)，参照申报单位类型代码表
                    'eName'           => 'PEN',                    // 海关申报英文品名
                    'name'            => 'PEN CN',                 // 海关申报中文品名
                    'unitPrice'       => '10',                     // 单价 0 < Amount <= [10,2]【***】
                ],
                [
                    'declareNote'     => 'Test declareInvoiceObj', // 配货备注
                    'declarePieces'   => '10',                     // 件数(默认: 1)
                    'declareUnitCode' => 'PCE',                    // 申报单位类型代码(默认:  PCE)，参照申报单位类型代码表
                    'eName'           => 'PEN',                    // 海关申报英文品名
                    'name'            => 'PEN CN',                 // 海关申报中文品名
                    'unitPrice'       => '10',                     // 单价 0 < Amount <= [10,2]【***】
                ],
                [
                    'declareNote'     => 'Test declareInvoiceObj', // 配货备注
                    'declarePieces'   => '10',                     // 件数(默认: 1)
                    'declareUnitCode' => 'PCE',                    // 申报单位类型代码(默认:  PCE)，参照申报单位类型代码表
                    'eName'           => 'PEN',                    // 海关申报英文品名
                    'name'            => 'PEN CN',                 // 海关申报中文品名
                    'unitPrice'       => '10',                     // 单价 0 < Amount <= [10,2]【***】
                ],
            ],
        ];

        $res = $this->orderClient->createAndPreAlertOrderService($params);

        $this->assertArrayHasKey('ack', $res);
        $this->assertEquals('Failure', $res['ack']);
    }

    public function testFindOrderService()
    {
        $params = [
            'orderNo'   => 'fake-order-no',
            'startTime' => date('Y-m-d H:i:s'),
            'endTime'   => date('Y-m-d 23:59:59'),
            'status'    => '1',
        ];

        $res = $this->orderClient->findOrderService($params);
        $this->assertArrayHasKey('ack', $res);
    }
}
