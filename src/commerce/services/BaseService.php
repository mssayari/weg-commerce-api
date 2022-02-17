<?php

namespace mssayyari\commerce\services;

use GuzzleHttp\Client;
use mssayyari\commerce\exceptions\ClientException;
use mssayyari\commerce\exceptions\ServerException;
use Psr\Log\LoggerInterface;
use Psr\Log\NullLogger;

class BaseService
{
    /** @var Client */
    protected Client $client;

    /** @var LoggerInterface */
    protected $logger;

    /** @var string */
    protected string $baseUrl;

    /** @var string */
    protected string $token;


    public function __construct(
        Client          $client = null,
        LoggerInterface $logger = null,
                        $baseUrl,
                        $token
    )
    {
        $this->client = new Client();
        $this->logger = $logger ?: new NullLogger();
        $this->baseUrl = $baseUrl;
        $this->token = $token;
    }

    /**
     * @param string $path
     * @param array $params
     * @return string
     */
    protected function get(string $path, array $params = []): string
    {
        return $this->request('get', $path, $params);
    }

    /**
     * @param string $path
     * @param array $params
     * @return string
     */
    protected function post(string $path, array $params = []): string
    {
        return $this->request('post', $path, $params);
    }

    /**
     * @param string $path
     * @param array $params
     * @return string
     */
    protected function put(string $path, array $params = []): string
    {
        return $this->request('put', $path, $params);
    }

    /**
     * @param string $path
     * @param array $params
     * @return string
     */
    protected function delete(string $path, array $params = []): string
    {
        return $this->request('delete', $path, $params);
    }

    /**
     * @param string $method
     * @param string $path
     * @param array $params
     * @return string
     */
    protected function request(string $method, string $path, array $params): string
    {
        $requestParams = [];
        if (in_array($method, ['post', 'put'])) {
            $requestParams['json'] = $params;
        } else {
            $requestParams['query'] = $params;
        }
        try {
            $request = $this->client->{$method}($this->baseUrl . $path, $requestParams);
        } catch (\Exception $e) {
            $message = sprintf('Failed to to perform request (%s).', $e->getMessage());
            $this->logger->error($message);
            throw new ServerException($message);
        }

        $this->logger->debug(sprintf("Response:\n%s", $request->getBody()));
        if (400 <= $request->getStatusCode()) {
            $message = sprintf('Responded with error (%s - %s).', $request->getStatusCode(), $request->getReasonPhrase());
            $this->logger->error($message);
            $message .= "\n" . $request->getBody();
            if (500 <= $request->getStatusCode()) {
                throw new ServerException($message);
            }
            throw new ClientException($message);
        }
        return (string)$request->getBody();
    }

    /**
     * @param string $response
     * @param $modelClas
     * @param bool $singleResult
     * @return mixed
     */
    protected function parseResponse(string $response, bool $singleResult = true)
    {
        $result = json_decode($response, true);
        if ($result === null) {
            $message = sprintf('Responded with an invalid body (%s).', $response);
            $this->logger->error($message);
            throw new ServerException($message);
        }

        if (count($result) == 1 and $singleResult) {
            $result = $result[0];
        }
        return $result;
    }
}