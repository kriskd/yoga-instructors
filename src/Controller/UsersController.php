<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\Event\Event;
use Cake\Utility\Text;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 */
class UsersController extends AppController
{

    public function beforeFilter(Event $event) {
        parent::beforeFilter($event);
        $this->Auth->allow(['add', 'forgot', 'reset', 'logout']);
    }

    public function login() {
        if ($this->request->is('post')) {
            $user = $this->Auth->identify();
            if ($user) {
                $this->Auth->setUser($user);
                return $this->redirect($this->Auth->redirectUrl());
            }
            $this->Flash->error(__('Invalid username or password, try again'));
        }
        if ($this->Auth->User()) {
            $this->redirect([
                'action' => 'view',
            ]);
        }
    }

    public function logout() {
        return $this->redirect($this->Auth->logout());
    }

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->set('users', $this->paginate($this->Users));
        $this->set('_serialize', ['users']);
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view() {
        $id = $this->Auth->user('id');
        $user = $this->Users->get($id, [
            'contain' => ['Instructors', 'Studios']
        ]);
        if (empty($user)) {
            $this->redirect([
                'controller' => 'Pages',
                'action' => 'display',
            ]);
        }
        $this->set('user', $user);
        $this->set('_serialize', ['user']);
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit() {
        $id = $this->Auth->user('id');
        $user = $this->Users->get($id, [
            'contain' => ['Instructors', 'Studios']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            if (empty(trim($this->request->data['password']))) {
                unset($this->request->data['password']);
            }
            $user = $this->Users->patchEntity($user, $this->request->data, ['validate' => 'userEdit']);
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The user could not be saved. Please, try again.'));
            }
        }
        $states = $this->Users->Studios->States->find('list', ['limit' => 200]);
        $this->set(compact('user', 'states'));
        $this->set('_serialize', ['user']);
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }

    public function forgot() {
        if ($this->Auth->User()) {
            return $this->redirect([
                'action' => 'view',
            ]);
        }
        if ($this->request->is(['patch', 'post', 'put'])) {
            if ($user = $this->Users->findByEmailAndActive($this->request->data['email'], 1)->first()) {
                $date = date_add(date_create(), date_interval_create_from_date_string('+1 hour'));
                $formatted = date_format($date, 'Y-m-d H:i:s');
                $user->password_token = Text::uuid();
                $user->password_token_expire = $formatted;
                if ($this->Users->save($user)) {
                    // TODO: Send email
                    $this->Flash->success(__('Please check your email.'));
                } else {
                    $this->Flash->error(__('Problem resetting password.'));
                }
            } else {
                $user = $this->Users->newEntity();
                $user = $this->Users->patchEntity($user, $this->request->data);
                $this->Flash->error(__('Password can not be reset, contact admin.'));
            }
        } else {
            $user = $this->Users->newEntity();
        }
        $this->set(compact('user'));
        $this->set('_serialize', ['user']);
    }

    public function reset($token = null) {
        if (empty($token)) $this->redirect(['action' => 'login']);
        $user = $this->Users->findByPasswordToken($token)->first();
        if (!$user) {
            $this->Flash->error(__('Please try password reset again.'));
            return $this->redirect(['action' => 'forgot']);
        }
        $now = new \DateTime();
        $expire = new \DateTime($user->password_token_expire);
        if ($now > $expire) {
            $this->Flash->error(__('Please try password reset again.'));
            return $this->redirect(['action' => 'forgot']);
        }
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->data, ['validate' => 'passwordSet']);
            if ($this->Users->save($user)) {
                $user->password_token = null;
                $user->password_token_expire = null;
                $this->Users->save($user);
                $this->Flash->success(__('New password saved.'));
                return $this->redirect(['action' => 'login']);
            } else {
                $this->Flash->error(__('The user could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('user'));
        $this->set('_serialize', ['user']);
    }
}
