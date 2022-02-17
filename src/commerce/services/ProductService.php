<?php

namespace mssayyari\commerce\services;

class ProductService extends BaseService
{

    /**
     * Get all products for one country
     * @param array $params
     * @return mixed
     */
    public function getAllByCountry(string $country)
    {
        $path = '/products/listAll';
        $params['country'] = $country;
        $data = $this->get($path, $params);
        return $this->parseResponse($data);
    }



    //Product license renewal (weg digital)

    /**
     * Renewal of a product's subscription
     * @param array $params
     * [product,quantity,client,country,lang]
     *
     * @return string
     */
    public function renewal(array $params)
    {
        $path = '/products/renewal';
        return $this->get($path, $params);
    }

    /**
     * Returns a product with price and quantity or availability
     * @param string $code
     * @param array $params
     * @return mixed
     */
    public function getProduct(string $code, array $params)
    {
        $path = '/products/' . $code;
        $data = $this->get($path, $params);
        return $this->parseResponse($data);
    }

    public function search(array $params)
    {
        $path = '/products/search';
        $data = $this->get($path, $params);
        return $this->parseResponse($data);
    }
}