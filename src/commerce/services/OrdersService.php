<?php

namespace mssayyari\commerce\services;

class OrdersService extends BaseService
{
    /**
     * Place Order
     * @param string $b2BUnit
     * @param array $params
     *
     * {
     *  "carrierCode": "nisi enim reprehenderit cillum",
     *  "comments": "magna cillum Duis ",
     *  "country": "culpa consequat veniam",
     *  "customerPurchaseOrder": "ipsum consectetur",
     *  "entries": {
     *  "entry": [
     *      {
     *          "additionalDiscount": -65151204.367488936,
     *          "code": "Ut esse minim",
     *          "comments": "veniam sed minim",
     *          "customerLineNumber": "id qu",
     *          "customerProductCode": "laboris ipsum officia nulla Lorem",
     *          "customerPurchaseOrderItem": "ipsum nisi dolor dolore deserunt",
     *          "deliveryPlant": "eiusmod exercitation id",
     *          "entryNumber": "adipisic",
     *          "manualPrice": 76996143.92371497,
     *          "quantity": 10363450.12570998,
     *          "requiredDelivery": "Lorem enim magna reprehenderit velit",
     *          "storageLocation": "magna consectetur sit dolor exercitation"
     *      },
     *      {
     *          "additionalDiscount": 88475256.51730868,
     *          "code": "aliquip sunt pariatur",
     *          "comments": "incididunt ad voluptate",
     *          "customerLineNumber": "elit repreh",
     *          "customerProductCode": "exercitation magna in eu",
     *          "customerPurchaseOrderItem": "reprehenderit in",
     *          "deliveryPlant": "mollit adipisicing qui",
     *          "entryNumber": "nisi ipsum",
     *          "manualPrice": 97952253.8364268,
     *          "quantity": 63246723.05551714,
     *          "requiredDelivery": "quis Ut voluptate sunt",
     *          "storageLocation": "esse sint Ut cillum"
     *      }
     *  ]
     *  },
     *  "minimumDateBilling": "ea nisi ut consectetur",
     *  "shipTo": {
     *      "accountNumber": "et commodo sint",
     *      "addr1": "magna fugiat minim",
     *      "addr2": "eu id",
     *      "addr3": "dolore incididunt",
     *      "addr4": "nulla Excepteur elit tempor",
     *      "attn": "ea fugiat nostrud veniam",
     *      "city": "nostrud irure reprehenderit",
     *      "country": "labore id nisi tempor",
     *      "name": "aute Ut cupidatat",
     *      "phone": "aliqua laboris",
     *      "state": "mollit in Duis quis ipsum",
     *      "zip": "ex culpa"
     *  },
     *  "shippingCondition": "deserunt",
     *  "supplyType": "aute ut enim eu",
     *  "thirdPartyBilling": {
     *      "accountNumber": "qui",
     *      "addr1": "magna l",
     *      "addr2": "et",
     *      "addr3": "cillum commodo",
     *      "addr4": "eiusmod aute",
     *      "attn": "veniam do",
     *      "city": "non id proident",
     *      "country": "veniam dolor ut reprehenderit sit",
     *      "name": "tempor consectetur eu",
     *      "phone": "minim ut est id sed",
     *      "state": "eu",
     *      "zip": "e"
     *  }
     * }
     *
     * @return array|mixed
     */
    public function placeOrder(string $b2BUnit, array $params)
    {
        $path = '/orders?b2BUnit=' . $b2BUnit;
        $data = $this->post($path, $params);
        return $this->parseResponse($data);
    }

    /**
     *
     * @param array $params
     * @return array|mixed
     *
     *}
     */
    public function getOrdersByThirdParty(array $params = [])
    {
        $path = '/orders/getOrdersByThirdParty';
        $data = $this->get($path, $params);
        return $this->parseResponse($data);
    }

    /**
     * Find an order by Code
     * @param string $code
     * @param string $b2BUnit
     * @param string $language
     * @param string $findBy
     * @return mixed
     */
    public function findOrder(string $code, string $b2BUnit, string $language = 'en', string $findBy = 'CD')
    {
        $path = '/orders/' . $code;
        $params = ['b2BUnit' => $b2BUnit, 'language' => $language, 'findBy' => $findBy];
        $data = $this->get($path, $params);
        return $this->parseResponse($data);
    }
}