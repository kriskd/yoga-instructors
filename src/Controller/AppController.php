<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link      http://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   http://www.opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Event\Event;
use Cake\Utility\Inflector;
use Cake\ORM\TableRegistry;

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link http://book.cakephp.org/3.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller
{

    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading components.
     *
     * @return void
     */
    public function initialize() {
        $this->loadComponent('Flash');
        $this->loadComponent('Auth', [
            //'authorize' => ['Controller'],
            'loginAction' => [
                'controller' => 'Users',
                'action' => 'login',
            ],
            'loginRedirect' => [
                'controller' => 'Users',
                'action' => 'view',
            ],
            'logoutRedirect' => [
                'controller' => 'Users',
                'action' => 'login',
            ],
            'authenticate' => [
                'Form' => [
                    'fields' => [
                        'username' => 'email',
                        'password' => 'password',
                    ],
                    'scope' => [
                        'Users.active' => true,
                    ],
                ],
            ],
        ]);
    }

    public function beforeFilter(Event $event) {
        if ($authUser = $this->Auth->User()) {
            $this->set('authUser', $authUser);
            $type = ucfirst(Inflector::pluralize($authUser['type']));
            $table = TableRegistry::get($type);
            $name = $table->getName($authUser['id']);
            $this->set('name', $name);
        }
        $this->Auth->deny();
    }

    public function isAuthorized($user) {
        return true;
    }
}
