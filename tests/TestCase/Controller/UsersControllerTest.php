<?php
namespace App\Test\TestCase\Controller;

use App\Controller\UsersController;
use Cake\TestSuite\IntegrationTestCase;

/**
 * App\Controller\UsersController Test Case
 */
class UsersControllerTest extends IntegrationTestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.users',
        'app.instructors',
        'app.participants',
        'app.sessions',
        'app.spaces',
        'app.styles',
        'app.roles',
        'app.studios',
        'app.states'
    ];

    /**
     * Test index method
     *
     * @return void
     */
    public function testIndex()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test view method
     *
     * @return void
     */
    public function testView()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test add method
     *
     * @return void
     */
    public function testAdd() {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test edit method
     *
     * @return void
     */
    public function testEdit() {
        $user = [
            'Auth' => [
                'User' => [
                    'id' => 1,
                    'email' => 'AnnaBJames@teleworm.us',
                ]
            ]
        ];
        $this->session($user);
        $this->get('/users/edit');
        $this->assertResponseOk();
        $viewUser = $this->viewVariable('user');
        $this->assertEquals($user['Auth']['User']['email'], $viewUser['email']);
    }

    /**
     * Test delete method
     *
     * @return void
     */
    public function testDelete()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
