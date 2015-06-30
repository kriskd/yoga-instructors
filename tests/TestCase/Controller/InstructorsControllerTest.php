<?php
namespace App\Test\TestCase\Controller;

use App\Controller\InstructorsController;
use Cake\TestSuite\IntegrationTestCase;
use Cake\ORM\TableRegistry;

/**
 * App\Controller\InstructorsController Test Case
 */
class InstructorsControllerTest extends IntegrationTestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.instructors',
        'app.users',
        'app.studios',
        'app.states',
        'app.spaces',
        'app.participants',
        'app.sessions',
        'app.styles',
        'app.roles'
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
        $data = [
            'first_name' => 'Carolyn',
            'last_name' => 'Cochran',
            'bio' => 'Lorem ipsum',
            'user' => [
                'email' => 'CarolynRCochran@teleworm.us',
                'password' => 'password',
                'password_confirm' => 'password',
                'phone' => '973-379-2397',
            ]
        ];
        $this->post('/instructors/add', $data);

        $this->assertResponseSuccess();
        $instructors = TableRegistry::get('Instructors');
        $instructor = $instructors->find('all', [
            'contain' => ['Users'],
            'conditions' => [
                'users.email' => 'CarolynRCochran@teleworm.us',
            ]
        ])->first();
        $this->assertEquals('Carolyn', $instructor->first_name);
        $this->assertEquals('CarolynRCochran@teleworm.us', $instructor->user->email);
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
