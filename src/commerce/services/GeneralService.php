<?php

namespace mssayyari\commerce\services;

class GeneralService extends BaseService
{

    /**
     * Get a list of all countries
     * @param array $params
     * @return array|mixed
     */
    public function getAllCountries(array $params = ['language' => 'en'])
    {
        $path = '/commerce/countries';
        $data = $this->get($path, $params);
        return $this->parseResponse($data);
    }

    /**
     * Get all customers by group ID.
     * @param string $groupId
     * @param array $params
     * @return mixed
     */
    public function getAllCustomersByGroupId(string $groupId, array $params = ['fields' => 'DEFAULT'])
    {
        $path = '/group/' . $groupId . '/customers';
        $data = $this->get($path, $params);
        return $this->parseResponse($data);
    }

    /**
     * Validate if JWT is valid
     * @param array $params
     * @return void
     */
    public function validateJWT(array $params)
    {
        $path = '/jwt/validate';
        $data = $this->get($path, $params);
        return $this->parseResponse($data);
    }

    /**
     * get jwt token
     * @param string $username
     * @param string $password
     * @param string $scope
     * @param string $grant_type
     * @return string
     */
    public function authentication(string $username, string $password, string $scope = 'basic', string $grant_type = 'password')
    {
        $path = '/authorizationserver/oauth/token';
        $params = [
            'scope' => $scope,
            'username' => $username,
            'password' => $password,
            'grant_type' => $grant_type,
        ];
        $data = $this->post($path, $params);
        return $data;
    }
}