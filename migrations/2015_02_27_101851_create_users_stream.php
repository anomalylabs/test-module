<?php

use Anomaly\Streams\Platform\Database\Migration\Migration;

/**
 * Class CreateUsersStream
 *
 * @link   http://pyrocms.com/
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class CreateUsersStream extends Migration
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
        'slug'         => 'users',
        'title_column' => 'display_name',
        'trashable'    => true,
    ];

    /**
     * The stream assignments.
     *
     * @var array
     */
    protected $assignments = [
        'email'        => [
            'required' => true,
            'unique'   => true,
        ],
        'username'     => [
            'required' => true,
            'unique'   => true,
        ],
        'password'     => [
            'required' => true,
        ],
        'roles'        => [
            'required' => true,
        ],
        'display_name' => [
            'required' => true,
        ],
        'first_name',
        'last_name',
        'activated',
        'enabled',
        'permissions',
        'last_login_at',
        'remember_token',
        'activation_code',
        'reset_code',
        'last_activity_at',
        'ip_address',
    ];
}
