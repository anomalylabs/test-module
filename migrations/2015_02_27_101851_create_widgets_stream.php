<?php

use Anomaly\Streams\Platform\Database\Migration\Migration;

/**
 * Class CreateWidgetsStream
 *
 * @link   http://pyrocms.com/
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class CreateWidgetsStream extends Migration
{

    /**
     * Should the migration delete
     * its stream when rolling back?
     *
     * @var bool
     */
    protected $delete = true;

    /**
     * The stream definition.
     *
     * @var string
     */
    protected $stream = [
        'slug'         => 'widgets',
        'title_column' => 'name',
        'trashable'    => true,
        'sortable'    => true,
    ];

    /**
     * The stream assignments.
     *
     * @var array
     */
    protected $assignments = [
        'name'        => [
            'required' => true,
            'unique'   => true,
        ],
        'description',
    ];
}
