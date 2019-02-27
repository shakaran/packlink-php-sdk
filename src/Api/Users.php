<?php
namespace PackLink\Api;

use PackLink\Model\Register\IndexResponse;
use PackLink\Exception\HttpClientException;

/**
 * @author Ángel Guzmán Maeso <angel@guzmanmaeso.com>
 */
class Users extends HttpApi
{
    /**
     * Return a token if the user is created sucessfully.
     *
     * @param User $user
     * @return IndexResponse
     */
    public function recoverPassword(string $platform = 'pro', string $platform_country = 'es')
    {
        if($platform != 'pro')
        {
            throw new HttpClientException('platform value invalid');
        }

        if(!in_array($platform_country, ['es', 'fr', 'it', 'de']))
        {
            throw new HttpClientException('platform_country value invalid');
        }

        $params = [
            'platform' => $platform,
            'platform_country' => $platform_country,
            'email' => 'myaccount14@packlink.es',
        ];

        // @todo this should be unnecessary, but HttpClientConfigurator->createConfiguredClient not work properly
        $endpoint = 'https://api.packlink.com/v1';
        $response = $this->httpPostRaw($endpoint . '/users/recover-password/notify', json_encode($params, TRUE),  ['Content-Type' => 'application/json']);

        return $this->hydrateResponse($response, IndexResponse::class);
    }

    /**
     * Return a token if the user is created sucessfully.
     *
     * @param User $user
     * @return IndexResponse
     */
    public function generateApiKeys(string $platform = 'pro', string $platform_country = 'es')
    {
        if($platform != 'pro')
        {
            throw new HttpClientException('platform value invalid');
        }

        if(!in_array($platform_country, ['es', 'fr', 'it', 'de']))
        {
            throw new HttpClientException('platform_country value invalid');
        }


        // @todo this should be unnecessary, but HttpClientConfigurator->createConfiguredClient not work properly
        $endpoint = 'https://api.packlink.com/v1';
        $response = $this->httpPostRaw($endpoint . '/users/api/keys', '',  ['Content-Type' => 'application/json']);

        return $this->hydrateResponse($response, IndexResponse::class);
    }
}
