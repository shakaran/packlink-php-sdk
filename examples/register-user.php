<?php

namespace MyCompany;

require __DIR__ . '/../vendor/autoload.php';

use PackLink\ApiClient;
use PackLink\Exception\HttpClientException;
use Packlink\Exception\HttpServerException;
use PackLink\Entity\User;

$apiKey = 'your_api_key';

// Create and configure the initial api client
$api = ApiClient::create($apiKey, 'https://api.packlink.com');

// Generate User object model for json conversion
$user = (new User())
        ->setEmail('myaccount14@packlink.es')
        ->setPassword('myPassword')
        ->setEstimated_delivery_volume('1 - 10')
        ->setPlatform('PRO')
        ->setPlatform_country('ES')
        ->setPhone('0666558877')
        ->setIp('172.17.0.1')
        ->setSource('https://urlwhereregistrationoffered')
        ->setTerms_and_conditions(TRUE)
        ->setData_processing(TRUE)
        ->setMarketing_emails(TRUE)
        ->setMarketing_calls(TRUE)
        ->setOnboarding_product('dummy')
        ->setOnboarding_sub_product('sub_dummy')
        ;

try
{
    $result = $api->register()->create($user);
}
catch (HttpClientException $e)
{
    echo $e->getMessage() . PHP_EOL;
}
catch (HttpServerException $e)
{
    echo $e->getMessage() . PHP_EOL;
}

if(!empty($result))
{
    echo 'Token: ' . $result->getToken() . PHP_EOL;
}
