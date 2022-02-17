<?php

namespace mssayyari\tests;

use mssayyari\commerce\services\OrdersService;
use PHPUnit\Framework\TestCase;


class OrderServiceTest extends TestCase
{
    protected ?OrdersService $orderServiceClass = null;

    public function setUp(): void
    {
        parent::setUp();

        if ($this->orderServiceClass === null) {
            $this->orderServiceClass = new OrdersService(null, null, 'https://api.weg.net/wegapi', '66666');
        }
    }

    public function test_place_order()
    {
        $params = [
            'carrierCode' => 'nisi enim reprehenderit cillum',
            'comments' => 'magna cillum Duis',
            'country' => 'culpa consequat veniam',
            'customerPurchaseOrder' => 'ipsum consectetur',
            'entries' => [
                'entry' => [
                    'additionalDiscount' => -65151204.367488936,
                    'code' => 'Ut esse minim',
                    'comments' => 'veniam sed minim',
                    'customerLineNumber' => 'id qu',
                    'customerProductCode' => 'laboris ipsum officia nulla Lorem',
                    'customerPurchaseOrderItem' => 'ipsum nisi dolor dolore deserunt',
                    'deliveryPlant' => 'eiusmod exercitation id',
                    'entryNumber' => 'adipisic',
                    'manualPrice' => 76996143.92371497,
                    'quantity' => 10363450.12570998,
                    'requiredDelivery' => 'Lorem enim magna reprehenderit velit',
                    'storageLocation' => 'magna consectetur sit dolor exercitation'
                ]
            ],
            'minimumDateBilling' => 'ea nisi ut consectetur',
            'shipTo' => [
                'accountNumber' => 'et commodo sint',
                'addr1' => 'magna fugiat minim',
                'addr2' => 'eu id',
                'addr3' => 'dolore incididunt',
                'addr4' => 'nulla Excepteur elit tempor',
                'attn' => 'ea fugiat nostrud veniam',
                'city' => 'nostrud irure reprehenderit',
                'country' => 'labore id nisi tempor',
                'name' => 'aute Ut cupidatat',
                'phone' => 'aliqua laboris',
                'state' => 'mollit in Duis quis ipsum',
                'zip' => 'ex culpa'
            ],
            'shippingCondition' => 'deserunt',
            'supplyType' => 'aute ut enim eu',
            'thirdPartyBilling' => [
                'accountNumber' => 'qui',
                'addr1' => 'magna l',
                'addr2' => 'et',
                'addr3' => 'cillum commodo',
                'addr4' => 'eiusmod aute',
                'attn' => 'veniam do',
                'city' => 'non id proident',
                'country' => 'veniam dolor ut reprehenderit sit',
                'name' => 'tempor consectetur eu',
                'phone' => 'minim ut est id sed',
                'state' => 'eu',
                'zip' => 'e'
            ],
        ];
        $result = $this->orderServiceClass->placeOrder('1212', $params);
        $this->assertIsArray($result);
        $this->assertArrayHasKey('orderCode', $result);
    }

    public function test_get_orders_by_third_party()
    {
        $result = $this->orderServiceClass->getOrdersByThirdParty();
        $this->assertIsArray($result);
    }

    public function test_find_order()
    {
        $result = $this->orderServiceClass->findOrder('1212', '1515');
        $this->assertIsArray($result);
    }
}
