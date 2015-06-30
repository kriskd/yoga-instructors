<?php
namespace App\Test\TestCase\Controller;

use App\Controller\StudiosController;
use Cake\TestSuite\IntegrationTestCase;
use Cake\ORM\TableRegistry;

/**
 * App\Controller\StudiosController Test Case
 */
class StudiosControllerTest extends IntegrationTestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.studios',
        'app.users',
        'app.instructors',
        'app.participants',
        'app.sessions',
        'app.spaces',
        'app.styles',
        'app.roles',
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
        $data = [
            'name' => 'Rex Audio Video Appliance',
            'address' => '2263 Lakewood Drive',
            'city' => 'North Bergen',
            'state_id' => 'NJ',
            'postal_code' => '07047',
            'contact' => 'Taryn Behm',
            'user' => [
                'email' => 'TarynJBehm@jourrapide.com',
                'password' => 'password',
                'password_confirm' => 'password',
                'phone' => '201-861-1525',
            ]
        ];
        $this->post('/studios/add', $data);

        $this->assertResponseSuccess();
        $studios = TableRegistry::get('Studios');
        $studio = $studios->find('all', [
            'contain' => ['Users'],
            'conditions' => [
                'users.email' => 'TarynJBehm@jourrapide.com',
                //'users.email' => 'VirginiaSBouchard@teleworm.us',
            ]
        ])->first();
        //var_dump($studio); exit;
        $this->assertEquals('North Bergen', $studio->city);
        $this->assertEquals('TarynJBehm@jourrapide.com', $studio->user->email);
    }

    /**
     * Test edit method
     *
     * @return void
     */
    public function testEdit()
    {
        $this->markTestIncomplete('Not implemented yet.');
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
