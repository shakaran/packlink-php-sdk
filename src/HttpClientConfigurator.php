<?php
namespace Packlink;

use Http\Client\HttpClient;
use Http\Client\Common\PluginClient;
use Http\Discovery\HttpClientDiscovery;
use Http\Discovery\UriFactoryDiscovery;
use Http\Message\UriFactory;
use Http\Client\Common\Plugin;
use PackLink\HttpClient\Plugin\History;
//use PackLink\HttpClient\Plugin\ReplaceUriPlugin;

/**
 * Configure a HTTP client.
 *
 * @desc Configure a HTTP client.
 *
 * @author Ángel Guzmán Maeso <angel@guzmanmaeso.com>
 */
final class HttpClientConfigurator
{
    /**
     * @var string
     */
    private $endpoint = 'https://api.packlink.com';

    /**
     * If debug is true we will send all the request to the endpoint without appending any path.
     *
     * @var bool
     */
    private $debug = false;

    /**
     * @var string
     */
    private $apiKey;

    /**
     * @var UriFactory
     */
    private $uriFactory;

    /**
     * @var HttpClient
     */
    private $httpClient;

    /**
     * @var History
     */
    private $responseHistory;

    public function __construct()
    {
        $this->responseHistory = new History();
    }

    /**
     * @return PluginClient
     */
    public function createConfiguredClient(): PluginClient
    {
        $plugins = [
            new Plugin\AddHostPlugin($this->getUriFactory()->createUri($this->endpoint)),
            new Plugin\HeaderDefaultsPlugin([
                'User-Agent' => 'packlink-php-sdk/v1 (https://github.com/shakaran/packlink-php-sdk)',
                'Authorization' => 'Bearer '. $this->getApiKey(),
                'Content-Type' => 'application/json',
            ]),
            new Plugin\HistoryPlugin($this->responseHistory),
        ];

        if ($this->debug) {
            //$plugins[] = new ReplaceUriPlugin($this->getUriFactory()->createUri($this->endpoint));
        }

        return new PluginClient($this->getHttpClient(), $plugins); // @todo endpoint seems lost here
    }

    /**
     * @param bool $debug
     *
     * @return HttpClientConfigurator
     */
    public function setDebug($debug): self
    {
        $this->debug = $debug;

        return $this;
    }

    /**
     * @param string $endpoint
     *
     * @return HttpClientConfigurator
     */
    public function setEndpoint($endpoint): self
    {
        $this->endpoint = $endpoint;

        return $this;
    }

    /**
     * @return string
     */
    public function getApiKey()
    {
        return $this->apiKey;
    }

    /**
     * @param string $apiKey
     *
     * @return HttpClientConfigurator
     */
    public function setApiKey($apiKey)
    {
        $this->apiKey = $apiKey;

        return $this;
    }

    /**
     * @return UriFactory
     */
    private function getUriFactory()
    {
        if (null === $this->uriFactory) {
            $this->uriFactory = UriFactoryDiscovery::find();
        }

        return $this->uriFactory;
    }

    /**
     * @param UriFactory $uriFactory
     *
     * @return HttpClientConfigurator
     */
    public function setUriFactory(UriFactory $uriFactory)
    {
        $this->uriFactory = $uriFactory;

        return $this;
    }

    /**
     * @return HttpClient
     */
    private function getHttpClient()
    {
        if (null === $this->httpClient) {
            $this->httpClient = HttpClientDiscovery::find();
        }

        return $this->httpClient;
    }

    public function getEndPoint()
    {
        return $this->endpoint;
    }

    /**
     * @param HttpClient $httpClient
     *
     * @return HttpClientConfigurator
     */
    public function setHttpClient(HttpClient $httpClient)
    {
        $this->httpClient = $httpClient;

        return $this;
    }

    /**
     * @return History
     */
    public function getResponseHistory()
    {
        return $this->responseHistory;
    }
}
