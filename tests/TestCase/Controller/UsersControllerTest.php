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

    public function testEditPasswordFail() {
        $this->session($this->user);
        $data = [
            'email' => 'AnnaBJames@teleworm.us',
            'password' => 'password1',
            'password_confirm' => 'password2',
            'phone' => '910-287-4299',
        ];
        $this->post('/users/edit', $data);

        $this->assertResponseSuccess();
        $users = TableRegistry::get('Users');
        $user = $users->get(1);
        $this->assertEquals($user->phone, $data['phone']);
        $this->assertFalse((new DefaultPasswordHasher)->check('password1', $user->password));
    }

    public function testForgot() {
        $data = [
            'email' => 'AnnaBJames@teleworm.us',
        ];
        $this->post('/users/forgot', $data);
        $users = TableRegistry::get('Users');
        $user = $users->get(1);
        $this->assertNotEmpty($user->password_token);
        $this->assertNotEmpty($user->password_token_expire);
    }

    public function testForgotLoggedOut() {
        $this->get('/users/forgot');
        $this->assertResponseOk();
    }

    public function testForgotLoggedIn() {
        $this->session($this->user);
        $this->get('/users/forgot');
        $this->assertRedirect(['controller' => 'Users', 'action' => 'view']);
    }

    public function testForgotInactive() {
        $data = [
            'email' => 'GracielaCMedina@dayrep.com',
        ];
        $this->post('/users/forgot', $data);
        $users = TableRegistry::get('Users');
        $user = $users->get(4);
        $this->assertEmpty($user->password_token);
        $this->assertEmpty($user->password_token_expire);
    }

    public function testReset() {
        $users = TableRegistry::get('Users');
        $data = [
            'password' => 'password1',
            'password_confirm' => 'password1',
        ];
        $this->post('/users/reset/da786274-c1af-48b4-bbce-2f51b979691d', $data);
        $user = $users->get(2);
        $this->assertTrue((new DefaultPasswordHasher)->check('password1', $user->password));
        $this->assertEmpty($user->password_token);
        $this->assertEmpty($user->password_token_expire);
        $this->assertRedirect(['controller' => 'Users', 'action' => 'login']);
    }

    public function testResetNoMatch() {
        $users = TableRegistry::get('Users');
        $userBefore = $users->get(2);
        $userBefore->password = 'oldpassword';
        $users->save($userBefore);
        $data = [
            'password' => 'password1',
            'password_confirm' => 'password2',
        ];
        $this->post('/users/reset/da786274-c1af-48b4-bbce-2f51b979691d', $data);
        $user = $users->get(2);
        $this->assertFalse((new DefaultPasswordHasher)->check('password1', $user->password));
        $this->assertTrue((new DefaultPasswordHasher)->check('oldpassword', $userBefore->password));
        $this->assertNotEmpty($user->password_token);
        $this->assertNotEmpty($user->password_token_expire);
        $this->assertNoRedirect();
    }

    public function testResetNoToken() {
        $this->get('/users/reset');
        $this->assertRedirect(['controller' => 'Users', 'action' => 'login']);
    }

    public function testResetExpiredToken() {
        $this->post('/users/reset/229fa338-64f0-4722-a6cc-bfe3bb6d2c6c');
        $this->assertRedirect(['controller' => 'Users', 'action' => 'forgot']);
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
