<?php

declare(strict_types=1);

namespace PackLink\Hydrator;

use PackLink\Exception\HydrationException;
use Psr\Http\Message\ResponseInterface;

/**
 * Deserialize a PSR-7 response to something else.
 *
 * @author Ángel Guzmán Maeso <angel@guzmanmaeso.com>
 */
interface Hydrator
{
    /**
     * @throws HydrationException
     */
    public function hydrate(ResponseInterface $response, string $class);
}
