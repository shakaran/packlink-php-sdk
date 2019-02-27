<?php

declare(strict_types=1);

namespace PackLink\Hydrator;

use Psr\Http\Message\ResponseInterface;

/**
 * Do not serialize at all. Just return a PSR-7 response.
 *
 * @author Ángel Guzmán Maeso <angel@guzmanmaeso.com>
 */
final class NoopHydrator implements Hydrator
{
    /**
     * @throws \LogicException
     */
    public function hydrate(ResponseInterface $response, string $class)
    {
        throw new \LogicException('The NoopHydrator should never be called');
    }
}
