<?php

namespace mssayyari\tests;

use mssayyari\commerce\services\GeneralService;
use PHPUnit\Framework\TestCase;


class GeneralServiceTest extends TestCase
{
    protected ?GeneralService $generalServiceClass = null;

    public function setUp(): void
    {
        parent::setUp();

        if ($this->generalServiceClass === null) {
            $this->generalServiceClass = new GeneralService(null, null, 'https://api.weg.net/wegapi', '66666');
        }
    }

    public function test_get_all_countries()
    {
        $result = $this->generalServiceClass->getAllCountries();
        $this->assertIsArray($result);
    }

    public function test_get_all_customers_by_group_id()
    {
        $result = $this->generalServiceClass->getAllCustomersByGroupId('23');
        $this->assertIsArray($result);
    }

    public function test_validate_jwt()
    {
        $result = $this->generalServiceClass->validateJWT(['jwt' => '88888']);
        $this->assertArrayHasKey('username', $result);
    }

    public function test_authenticate()
    {
        $obj = new GeneralService(null, null, 'https://api.weg.net', '66666');
        $result = $obj->authentication('username', 'password');
        $this->assertIsString($result);
    }
}
