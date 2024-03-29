<?php

/*
 * This file is part of the Gesdinet MetronicDataTableBundle package.
 *
 * (c) Gesdinet <marcos@gesdinet.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Gesdinet\MetronicDataTableBundle;

/**
 * DataTable handler.
 */
interface DataTableHandlerInterface
{
    /**
     * Handles specified DataTable request.
     *
     * @throws DataTableException
     */
    public function handle(DataTableQuery $request): DataTableResults;

    public static function getServiceId(): string;
}
