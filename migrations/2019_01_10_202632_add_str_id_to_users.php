<?php

use Anomaly\Streams\Platform\Database\Migration\Migration;
use Anomaly\UsersModule\User\Contract\UserRepositoryInterface;
use Anomaly\UsersModule\User\UserRepository;

/**
 * Class AddStrIdToUsers
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class AddStrIdToUsers extends Migration
{

    /**
     * Don't delete the stream.
     * Used for reference only.
     *
     * @var bool
     */
    protected $delete = false;

    /**
     * The addon fields.
     *
     * @var array
     */
    protected $fields = [
        'str_id' => 'anomaly.field_type.text',
    ];

    /**
     *
     * @var array
     */
    protected $stream = [
        'slug' => 'users',
    ];

    /**
     * @var array
     */
    protected $assignments = [
        'str_id' => [
            'required' => true,
        ],
    ];

    /**
     * Run the migrations.
     */
    public function up()
    {

        /**
         * Run parent first!
         */
        parent::up();

        /**
         * Load the concrete on purpose.
         *
         * @var UserRepositoryInterface $users
         */
        $users = app(UserRepository::class);

        /* @var UserInterface|EloquentModel $user */
        foreach ($users->allWithTrashed() as $user) {
            if ($user->getStrId()) {
                continue;
            }

            $users->save($user->setRawAttribute('str_id', str_random(24)));
        }

        $field      = $this->fields()->findBySlugAndNamespace('str_id', 'users');
        $stream     = $this->streams()->findBySlugAndNamespace('users', 'users');
        $assignment = $this->assignments()->findByStreamAndField($stream, $field);

        $this->assignments()->save($assignment->setAttribute('unique', true));
    }
}
