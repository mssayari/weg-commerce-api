<?php

namespace mssayyari\tests;

use mssayyari\commerce\services\UserService;
use PHPUnit\Framework\TestCase;

class UserServiceTest extends TestCase
{
    protected ?UserService $userServiceClass = null;

    public function setUp(): void
    {
        parent::setUp();

        if ($this->userServiceClass === null) {
            $this->userServiceClass = new UserService(null, null, 'https://api.weg.net/wegapi', '66666');
        }
    }

    public function test_get_customers_profile()
    {
        $result = $this->userServiceClass->getCustomerProfile('1518', '12');
        $this->assertIsArray($result);
        $this->assertArrayHasKey('currency', $result);
    }

    public function test_get_all_customer_groups_of_a_customer()
    {
        $result = $this->userServiceClass->getAllCustomerGroupsOfaCustomer('1518', '12');
        $this->assertIsArray($result);
        $this->assertArrayHasKey('currentPage', $result);
    }

    public function test_get_all_customers_sales_area()
    {
        $result = $this->userServiceClass->getAllCustomersSalesArea('1518', '12');
        $this->assertIsArray($result);
        $this->assertArrayHasKey('distributionChannels', $result);
    }
}
