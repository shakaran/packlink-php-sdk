<?php
namespace PackLink\Api;

use PackLink\Model\Register\IndexResponse;
use PackLink\Entity\User;
use PackLink\Exception\HttpClientException;

/**
 * @author Ángel Guzmán Maeso <angel@guzmanmaeso.com>
 */
class Login extends HttpApi
{
    /**
     * Return a token if the user is created sucessfully.
     *
     * @param User $user
     * @return IndexResponse
     */
    public function index(string $platform = 'pro', string $platform_country = 'es')
    {
        if($platform != 'pro')
        {
            throw new HttpClientException('platform value invalid');
        }

        if(!in_array($platform_country, ['es', 'fr', 'it', 'de']))
        {
            throw new HttpClientException('platform_country value invalid');
        }
       // YW5nZWxAZ3V6bWFubWFlc28uY29tOjIyODYwMGFQb3BhY2s=
        $params = [
            'platform' => $platform,
            'platform_country' => $platform_country
        ];

        // @todo this should be unnecessary, but HttpClientConfigurator->createConfiguredClient not work properly
        $endpoint = 'https://api.packlink.com/v1';
        $response = $this->httpGet($endpoint . '/login', $params,  ['Content-Type' => 'application/json']);

        return $this->hydrateResponse($response, IndexResponse::class);
    }
}
