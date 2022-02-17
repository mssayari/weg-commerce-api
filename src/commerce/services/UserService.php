<?php

namespace mssayyari\commerce\services;

class UserService extends BaseService
{

    /**
     * Returns customer profile.
     *
     * @param string $baseSiteId
     * @param string $userId
     * @param array $params
     * @return mixed
     */
    public function getCustomerProfile(string $baseSiteId, string $userId, array $params = ['fields' => 'DEFAULT'])
    {
        $path = '/' . $baseSiteId . '/users/' . $userId;
        $data = $this->get($path, $params);
        return $this->parseResponse($data);
    }

    /**
     * Returns all customer groups of a customer
     *
     * @param string $baseSiteId
     * @param string $userId
     * @param array $params
     * @return mixed
     */
    public function getAllCustomerGroupsOfaCustomer(string $baseSiteId, string $userId, array $params = ['fields' => 'DEFAULT'])
    {
        $path = '/' . $baseSiteId . '/users/' . $userId . '/customergroups';
        $data = $this->get($path, $params);
        return $this->parseResponse($data);
    }

    //Returns all customer's sales area

    public function getAllCustomersSalesArea(string $baseSiteId, string $userId, array $params = ['fields' => 'DEFAULT'])
    {
        $path = '/' . $baseSiteId . '/users/' . $userId . '/salesarea';
        $data = $this->get($path, $params);
        return $this->parseResponse($data);
    }
}