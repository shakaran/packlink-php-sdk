<?php

declare(strict_types=1);

namespace PackLink\Model;

/**
 * @author Ángel Guzmán Maeso <angel@guzmanmaeso.com>
 */
interface PagingProvider
{
    /**
     * Returns the `$paging->next` URL.
     */
    public function getNextUrl(): ?string;

    /**
     * Returns the `$paging->prev` URL.
     */
    public function getPreviousUrl(): ?string;

    /**
     * Returns the `$paging->first` URL.
     */
    public function getFirstUrl(): ?string;

    /**
     * Returns the `$paging->last` URL.
     */
    public function getLastUrl(): ?string;
}
