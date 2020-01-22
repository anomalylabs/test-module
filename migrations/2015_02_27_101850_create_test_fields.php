<?php

use Anomaly\Streams\Platform\Database\Migration\Migration;
use Anomaly\UsersModule\Role\RoleModel;

/**
 * Class CreateTestFields
 *
 * @link   http://pyrocms.com/
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class CreateTestFields extends Migration
{

    /**
     * The addon fields.
     *
     * @var array
     */
    protected $fields = [
        'name'    => 'anomaly.field_type.text',
        'description' => 'anomaly.field_type.textarea',
    ];
}
