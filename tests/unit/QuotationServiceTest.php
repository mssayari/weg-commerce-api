<?php

namespace mssayyari\tests;

use mssayyari\commerce\services\QuotationService;
use PHPUnit\Framework\TestCase;

class QuotationServiceTest extends TestCase
{
    protected ?QuotationService $quotationServiceClass = null;

    public function setUp(): void
    {
        parent::setUp();

        if ($this->quotationServiceClass === null) {
            $this->quotationServiceClass = new QuotationService(null, null, 'https://api.weg.net/wegapi', '66666');
        }
    }

    public function test_query_on_quotation()
    {
        $params = [
            'creationDateBegin' => '',
            'creationDateEnd' => '',
            'customerId' => '',
        ];
        $result = $this->quotationServiceClass->queryOnQuotation($params);
        $this->assertIsArray($result);
    }

    public function test_quotation_an_code()
    {
        $result = $this->quotationServiceClass->quotationAnCode('1212');
        $this->assertIsArray($result);
        $this->assertArrayHasKey('code', $result);
    }

    public function test_get_quotation_by_user_id()
    {
        $result = $this->quotationServiceClass->getQuotationByUser('1234');
        $this->assertIsArray($result);
        $this->assertArrayHasKey('customer', $result);
    }
}
