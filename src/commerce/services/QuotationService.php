<?php

namespace mssayyari\commerce\services;

class QuotationService extends BaseService
{
    /**
     * Query on quotations
     * @param array $params
     * @return mixed
     */
    public function queryOnQuotation(array $params)
    {
        $path = '/quotations';
        $data = $this->post($path, $params);
        return $this->parseResponse($data);
    }


    /**
     * Quotation an code
     * @param string $code
     * @param array $params
     * @return mixed
     */
    public function quotationAnCode(string $code, array $params = [])
    {
        $path = '/quotations/' . $code;
        $data = $this->get($path, $params);
        return $this->parseResponse($data);
    }

    /**
     * Get the quotations from the specified user
     * @param string $code
     * @param array $params
     * @return void
     */
    public function getQuotationByUser(string $userId, array $params = [])
    {
        $path = '/quotations/' . $userId . '/me';
        $data = $this->get($path, $params);
        return $this->parseResponse($data);
    }
}