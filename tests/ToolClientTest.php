<?php

namespace Dakalab\FourPartyExpress\Tests;

use Dakalab\FourPartyExpress\ToolClient;

/**
 * Test class for Dakalab\FourPartyExpress\ToolClient
 *
 * @coversDefaultClass \Dakalab\FourPartyExpress\ToolClient
 * @runTestsInSeparateProcesses
 */
class ToolClientTest extends TestCase
{
    protected $toolClient;

    protected function setUp()
    {
        parent::setUp();

        $this->toolClient = new ToolClient($this->token);
    }

    public function testListFunctions()
    {
        $res = $this->toolClient->listFunctions();
        $this->assertContains('cargoTrackingServiceResponse cargoTrackingService(cargoTrackingService $parameters)', $res);
    }

    public function testChargeCalculateService()
    {
        $params = [
            // 货物类型(默认：P)(Length = 1)
            'cargoCode'       => 'P',
            // 目的国家二字代码，参照国家代码表(Length = 2)
            'countryCode'     => 'RE',
            // 产品代码,该属性不为空，只返回该产品计费结果，参照产品代码表(Length = 2)
            'productCode'     => ['A1', 'A6'],
            // 计费结果产品显示级别(默认：1)(Length = 1)
            'displayOrder'    => '1',
            // 邮编(Length <= 10)
            'postCode'        => '518000',
            // 起运地ID，参照起运地ID表(Length <= 4)
            'startShipmentId' => '13',
            // 计费重量，单位(kg)(0 < Amount <= [3,3])
            'weight'          => '2.2',
            // 高(0 < Amount <= [3,3])
            'height'          => '2',
            // 长(0 < Amount <= [3,3])
            'length'          => '2',
            // 宽(0 < Amount <= [3,3])
            'width'           => '2',
        ];

        $res = $this->toolClient->chargeCalculateService($params);

        $this->assertArrayHasKey('ack', $res);
        $this->assertEquals('Failure', $res['ack']);
    }

    public function testCargoTrackingService()
    {
        $res = $this->toolClient->cargoTrackingService('fake-tracking-no');

        $this->assertArrayHasKey('ack', $res);
        $this->assertEquals('Failure', $res['ack']);
    }

    public function testFindTrackingNumberService()
    {
        $res = $this->toolClient->findTrackingNumberService('fake-order-no');

        $this->assertArrayHasKey('ack', $res);
        $this->assertEquals('Failure', $res['ack']);
    }
}
