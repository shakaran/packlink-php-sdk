<?php

declare(strict_types=1);

namespace PackLink\Model\Register;

use PackLink\Model\ApiResponse;

/**
 * @author Ángel Guzmán Maeso <angel@guzmanmaeso.com>
 */
final class IndexResponse implements ApiResponse
{
    private $token;

    public static function create(array $data): self
    {
        $token = NULL;
        if (isset($data['token']))
        {
            $token = $data['token'];
        }

        $model = new self();
        $model->token = $token;

        return $model;
    }

    private function __construct()
    {
    }

    public function getToken(): string
    {
        return $this->token;
    }
}
