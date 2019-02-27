<?php

declare(strict_types=1);

namespace PackLink\Model;

/**
 * @author Ángel Guzmán Maeso <angel@guzmanmaeso.com>
 */
trait PaginationResponse
{
    /**
     * @var array
     */
    private $paging;

    public function getNextUrl(): ?string
    {
        return $this->paging['next'] ?? null;
    }

    public function getPreviousUrl(): ?string
    {
        return $this->paging['previous'] ?? null;
    }

    public function getFirstUrl(): ?string
    {
        return $this->paging['first'] ?? null;
    }

    public function getLastUrl(): ?string
    {
        return $this->paging['last'] ?? null;
    }
}
