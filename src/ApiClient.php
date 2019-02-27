<?php

namespace Packlink;

use PackLink\HttpClientConfigurator;
use PackLink\Api\Register;
use PackLink\Hydrator\ModelHydrator;
use PackLink\Hydrator\Hydrator;
use PackLink\HttpClient\RequestBuilder;
use PackLink\Model\Register\IndexResponse;

/**
 * ApiClient
 *
 * @access public
 *
 * @author Ángel Guzmán Maeso <angel@guzmanmaeso.com>
 * @desc This is the PackLink PHP SDK. This SDK contains methods for
 * easily interacting with the PackLink API.
 *
 * Main APIClient file for instantiate the Http Client with REST calls.
 *
 * @namespace PackLink
 *
 */
class ApiClient
{
    /**
     * @param string $apiKey
     * @param string $endpoint URL to packlink servers
     *
     * @return ApiClient
     */
    public static function create($apiKey, $endpoint = 'https://api.packlink.com')
    {
        $httpClientConfigurator = (new HttpClientConfigurator())
        ->setApiKey($apiKey)
        ->setEndpoint($endpoint);

        return new self($httpClientConfigurator);
    }

    /**
     * @param string              $apiEndpoint
     * @param Hydrator|null       $hydrator
     * @param RequestBuilder|null $requestBuilder
     *
     * @internal Use PackLink::configure or PackLink::create instead.
     */
    public function __construct(
        HttpClientConfigurator $configurator,
        Hydrator $hydrator = null,
        RequestBuilder $requestBuilder = null
        ) {
            $this->requestBuilder = $requestBuilder ?: new RequestBuilder();
            $this->hydrator = $hydrator ?: new ModelHydrator();

            $this->httpClient = $configurator->createConfiguredClient();
            //$this->endpoint = $configurator->getEndPoint(); @todo
            $this->apiKey = $configurator->getApiKey();
            $this->responseHistory = $configurator->getResponseHistory();
    }

    /**
     * Entry point for section Register in PackLink API server.
     *
     * @return IndexResponse
     */
    public function register()
    {
        return new Register($this->httpClient, $this->requestBuilder, $this->hydrator);
    }
}