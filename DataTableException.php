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

use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;

/**
 * Exception in last DataTable request handling.
 * Contains HTTP status code and can be used in HTTP Response object.
 */
class DataTableException extends BadRequestHttpException
{
    /**
     * {@inheritdoc}
     */
    public function __construct($message, $code = 0, \Exception $previous = null)
    {
        parent::__construct($message, $previous, $code);
    }
}
