<?php

namespace mssayyari\tests;

use mssayyari\commerce\services\ProductService;
use PHPUnit\Framework\TestCase;

class ProductServiceTest extends TestCase
{

    protected ?ProductService $productServiceClass = null;

    public function setUp(): void
    {
        parent::setUp();

        if ($this->productServiceClass === null) {
            $this->productServiceClass = new ProductService(null, null, 'https://api.weg.net/wegapi', '66666');
        }
    }

    public function test_get_all_by_country()
    {
        $result = $this->productServiceClass->getAllByCountry('Turkey');
        $this->assertIsArray($result);
        $this->assertArrayHasKey('product', $result);
    }

    public function test_renewal()
    {
        $params =
            [
                'product' => 'string',
                'quantity' => 'string',
                'client' => 'string',
                'country' => 'USA',
                'lang' => 'en'
            ];
        $result = $this->productServiceClass->renewal($params);
        $this->assertIsString($result);
    }

    public function test_get_product()
    {
        $params =
            [
                'b2BUnitCode' => 'string',
                'country' => 'USA',
                'findBy' => 'CD',
                'responseType' => 'DEFAULT',
                'language' => 'en'
            ];
        $result = $this->productServiceClass->getProduct('12345', $params);
        $this->assertIsArray($result);
        $this->assertArrayHasKey('catalogNumber', $result);
    }

    public function test_search()
    {
        $params =
            [
                'query' => 'string',
                'b2BUnit' => 'string',
                'searchType' => 'CD',
                'responseType' => 'DEFAULT',
                'currentPage' => '0',
                'pageSize' => '30',
                'sortBy' => 'C',
                'orderBy' => 'ASC',
                'queryType' => 'E'
            ];
        $result = $this->productServiceClass->search($params);
        $this->assertIsArray($result);
        $this->assertArrayHasKey('pagination', $result);
    }
}
