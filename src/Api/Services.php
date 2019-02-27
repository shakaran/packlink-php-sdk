<?php
namespace PackLink\Api;

use PackLink\Model\Register\IndexResponse;
use PackLink\Entity\User;
use PackLink\Exception\HttpClientException;

/**
 * @author Ángel Guzmán Maeso <angel@guzmanmaeso.com>
 */
class Services extends HttpApi
{
    /**
     * Return a token if the user is created sucessfully.
     *
     * @param User $user
     * @return IndexResponse
     */
    public function index()
    {

        $params = [
        ];

        // @todo this should be unnecessary, but HttpClientConfigurator->createConfiguredClient not work properly
        $endpoint = 'https://api.packlink.com/v1';
        $response = $this->httpGet($endpoint . '/services', $params,  []);

        return $this->hydrateResponse($response, IndexResponse::class);
    }
}
