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
 * Ordering parameters as part of mDataTables request.
 *
 * @see https://keenthemes.com/metronic/documentation.html#sec14
 *
 * @property string $column Column to which ordering should be applied.
 * @property string $dir    Ordering direction for this column.
 */
class Order extends ValueObject implements \JsonSerializable
{
    final public const ASC = 'asc';

    final public const DESC = 'desc';

    protected $column;

    protected $dir;

    /**
     * Initializing constructor.
     */
    public function __construct(string $column, string $dir)
    {
        $this->column = $column;
        $this->dir = $dir;
    }

    /**
     * {@inheritdoc}
     */
    public function jsonSerialize(): array
    {
        return [
            'column' => $this->column,
            'dir' => $this->dir,
        ];
    }
}
