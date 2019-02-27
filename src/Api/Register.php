<?php
namespace PackLink\Api;

use PackLink\Model\Register\IndexResponse;
use PackLink\Entity\User;

/**
 * @author Ángel Guzmán Maeso <angel@guzmanmaeso.com>
 */
class Register extends HttpApi
{
    /**
     * Return a token if the user is created sucessfully.
     *
     * @param User $user
     * @return IndexResponse
     */
    public function create(User $user)
    {
        // @todo this should be unnecessary, but HttpClientConfigurator->createConfiguredClient not work properly
        $endpoint = 'https://api.packlink.com/v1';
        $response = $this->httpPostRaw($endpoint . '/register', $user->__toString(),  ['Content-Type' => 'application/json']);

        return $this->hydrateResponse($response, IndexResponse::class);
    }
}
