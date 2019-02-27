<?php

namespace MyCompany;

require __DIR__ . '/../vendor/autoload.php';

use PackLink\ApiClient;
use PackLink\Exception\HttpClientException;
use Packlink\Exception\HttpServerException;
use PackLink\Exception\UnknownErrorException;

$apiKey = 'your_api_key';

// Create and configure the initial api client
$api = ApiClient::create($apiKey, 'https://api.packlink.com');

try
{
    //$result = $api->users()->recoverPassword('pro', 'es');

    //$result = $api->users()->generateApiKeys();

    $result = $api->login('myaccount14@packlink.es', 'myPassword', 'pro', 'es');

    $result = $api->services();
}
catch (HttpClientException $e)
{
    echo $e->getMessage() . PHP_EOL;
}
catch (HttpServerException $e)
{
    echo $e->getMessage() . PHP_EOL;
}
catch (UnknownErrorException $e)
{
    echo $e->getMessage() . PHP_EOL;
}

if(!empty($result))
{
    echo 'Token: ' . $result->getToken() . PHP_EOL;
}
