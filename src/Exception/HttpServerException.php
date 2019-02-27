<?php

declare(strict_types=1);

namespace Packlink\Exception;

use PackLink\Exception;

/**
 * @author Ángel Guzmán Maeso <angel@guzmanmaeso.com>
 */
final class HttpServerException extends \RuntimeException implements Exception
{
    public static function serverError(int $httpStatus = 500)
    {
        return new self('An unexpected error occurred at PackLink\'s servers. Try again later and contact support if the error still exists.', $httpStatus);
    }

    public static function networkError(\Throwable $previous)
    {
        return new self('PackLink\'s servers are currently unreachable.', 0, $previous);
    }

    public static function unknownHttpResponseCode(int $code)
    {
        return new self(sprintf('Unknown HTTP response code ("%d") received from the API server', $code));
    }
}
