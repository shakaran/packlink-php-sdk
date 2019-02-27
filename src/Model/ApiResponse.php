<?php

declare(strict_types=1);

namespace PackLink\Model;

/**
 * @author Ángel Guzmán Maeso <angel@guzmanmaeso.com>
 */
interface ApiResponse
{
    /**
     * Create an API response object from the HTTP response from the API server.
     */
    public static function create(array $data);
}
