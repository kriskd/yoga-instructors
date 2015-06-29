<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * UsersFixture
 *
 */
class UsersFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 11, 'unsigned' => true, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'admin' => ['type' => 'boolean', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'email' => ['type' => 'string', 'length' => 255, 'null' => false, 'default' => '', 'comment' => '', 'precision' => null, 'fixed' => null],
        'password' => ['type' => 'string', 'fixed' => true, 'length' => 60, 'null' => false, 'default' => '', 'comment' => '', 'precision' => null],
        'phone' => ['type' => 'string', 'fixed' => true, 'length' => 12, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'active' => ['type' => 'boolean', 'length' => null, 'null' => false, 'default' => '0', 'comment' => '', 'precision' => null],
        'password_token' => ['type' => 'uuid', 'length' => null, 'null' => true, 'default' => '', 'comment' => '', 'precision' => null],
        'password_token_expire' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'created' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'modified' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'utf8_general_ci'
        ],
    ];
    // @codingStandardsIgnoreEnd

    /**
     * Records
     *
     * @var array
     */
    public $records = [
        [
            'id' => 1,
            'admin' => 0,
            'email' => 'AnnaBJames@teleworm.us',
            'password' => 'Loremipsumdolorsitamet',
            'phone' => '910-287-4299',
            'active' => 1,
            'password_token' => '',
            'password_token_expire' => '',
            'created' => '2015-06-29 14:00:21',
            'modified' => '2015-06-29 14:00:21'
        ],
        [
            'id' => 2,
            'admin' => 1,
            'email' => 'Lorem ipsum dolor sit amet',
            'password' => 'Lorem ipsum dolor sit amet',
            'phone' => 'Lorem ipsu',
            'active' => 1,
            'password_token' => '',
            'password_token_expire' => '2015-06-29 14:00:21',
            'created' => '2015-06-29 14:00:21',
            'modified' => '2015-06-29 14:00:21'
        ],
        [
            'id' => 3,
            'admin' => 1,
            'email' => 'Lorem ipsum dolor sit amet',
            'password' => 'Lorem ipsum dolor sit amet',
            'phone' => 'Lorem ipsu',
            'active' => 1,
            'password_token' => '',
            'password_token_expire' => '2015-06-29 14:00:21',
            'created' => '2015-06-29 14:00:21',
            'modified' => '2015-06-29 14:00:21'
        ],
        [
            'id' => 4,
            'admin' => 1,
            'email' => 'Lorem ipsum dolor sit amet',
            'password' => 'Lorem ipsum dolor sit amet',
            'phone' => 'Lorem ipsu',
            'active' => 1,
            'password_token' => '',
            'password_token_expire' => '2015-06-29 14:00:21',
            'created' => '2015-06-29 14:00:21',
            'modified' => '2015-06-29 14:00:21'
        ],
        [
            'id' => 5,
            'admin' => 1,
            'email' => 'Lorem ipsum dolor sit amet',
            'password' => 'Lorem ipsum dolor sit amet',
            'phone' => 'Lorem ipsu',
            'active' => 1,
            'password_token' => '',
            'password_token_expire' => '2015-06-29 14:00:21',
            'created' => '2015-06-29 14:00:21',
            'modified' => '2015-06-29 14:00:21'
        ],
        [
            'id' => 6,
            'admin' => 1,
            'email' => 'Lorem ipsum dolor sit amet',
            'password' => 'Lorem ipsum dolor sit amet',
            'phone' => 'Lorem ipsu',
            'active' => 1,
            'password_token' => '',
            'password_token_expire' => '2015-06-29 14:00:21',
            'created' => '2015-06-29 14:00:21',
            'modified' => '2015-06-29 14:00:21'
        ],
        [
            'id' => 7,
            'admin' => 1,
            'email' => 'Lorem ipsum dolor sit amet',
            'password' => 'Lorem ipsum dolor sit amet',
            'phone' => 'Lorem ipsu',
            'active' => 1,
            'password_token' => '',
            'password_token_expire' => '2015-06-29 14:00:21',
            'created' => '2015-06-29 14:00:21',
            'modified' => '2015-06-29 14:00:21'
        ],
        [
            'id' => 8,
            'admin' => 1,
            'email' => 'Lorem ipsum dolor sit amet',
            'password' => 'Lorem ipsum dolor sit amet',
            'phone' => 'Lorem ipsu',
            'active' => 1,
            'password_token' => '',
            'password_token_expire' => '2015-06-29 14:00:21',
            'created' => '2015-06-29 14:00:21',
            'modified' => '2015-06-29 14:00:21'
        ],
        [
            'id' => 9,
            'admin' => 1,
            'email' => 'Lorem ipsum dolor sit amet',
            'password' => 'Lorem ipsum dolor sit amet',
            'phone' => 'Lorem ipsu',
            'active' => 1,
            'password_token' => '',
            'password_token_expire' => '2015-06-29 14:00:21',
            'created' => '2015-06-29 14:00:21',
            'modified' => '2015-06-29 14:00:21'
        ],
        [
            'id' => 10,
            'admin' => 1,
            'email' => 'Lorem ipsum dolor sit amet',
            'password' => 'Lorem ipsum dolor sit amet',
            'phone' => 'Lorem ipsu',
            'active' => 1,
            'password_token' => '',
            'password_token_expire' => '2015-06-29 14:00:21',
            'created' => '2015-06-29 14:00:21',
            'modified' => '2015-06-29 14:00:21'
        ],
    ];
}
