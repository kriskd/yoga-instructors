<?php
namespace App\Test\TestCase\Controller;

use App\Controller\UsersController;
use Cake\TestSuite\IntegrationTestCase;
use Cake\ORM\TableRegistry;
use Cake\Auth\DefaultPasswordHasher;

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

    public $user = [
            'Auth' => [
                'User' => [
                    'id' => 1,
                    'email' => 'AnnaBJames@teleworm.us',
                ]
            ]
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
        $this->session($this->user);
        $this->get('/users/edit');
        $this->assertResponseOk();
        $viewUser = $this->viewVariable('user');
        $this->assertEquals($this->user['Auth']['User']['email'], $viewUser['email']);
    }

    public function testEditPhone() {
        $this->session($this->user);
        $data = [
            'email' => 'AnnaBJames@teleworm.us',
            'password' => '',
            'password_confirm' => '',
            'phone' => '910-287-1234',
        ];
        $this->post('/users/edit', $data);

        $this->assertResponseSuccess();
        $users = TableRegistry::get('Users');
        $user = $users->get(1);
        $this->assertEquals($user->phone, $data['phone']);
        $this->assertEquals($user->password, 'Loremipsumdolorsitamet');
    }

    public function testEditPassword() {
        $this->session($this->user);
        $data = [
            'email' => 'AnnaBJames@teleworm.us',
            'password' => 'password1',
            'password_confirm' => 'password1',
            'phone' => '910-287-4299',
        ];
        $this->post('/users/edit', $data);

        $this->assertResponseSuccess();
        $users = TableRegistry::get('Users');
        $user = $users->get(1);
        $this->assertEquals($user->phone, $data['phone']);
        $this->assertTrue((new DefaultPasswordHasher)->check('password1', $user->password));
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
