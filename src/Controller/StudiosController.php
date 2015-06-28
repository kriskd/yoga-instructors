<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\Validation\Validator;

/**
 * Studios Controller
 *
 * @property \App\Model\Table\StudiosTable $Studios
 */
class StudiosController extends AppController
{

    public function beforeFilter(Event $event) {
        parent::beforeFilter($event);
        $this->Auth->allow(['add']);
    }

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users', 'States']
        ];
        $this->set('studios', $this->paginate($this->Studios));
        $this->set('_serialize', ['studios']);
    }

    /**
     * View method
     *
     * @param string|null $id Studio id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view() {
        $id = $this->Auth->user('id');
        $studio = $this->Studios->find('all', [
            'conditions' => [
                'user_id' => $id,
            ],
            'contain' => ['Users', 'States', 'Spaces']
        ])->first();
        if (!$studio) $this->redirect('/');
        $this->set('studio', $studio);
        $this->set('_serialize', ['studio']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add() {
        if ($this->Auth->user()) {
            $this->redirect([
                'action' => 'view',
            ]);
        }
        $studio = $this->Studios->newEntity();
        if ($this->request->is('post')) {
            $studio = $this->Studios->patchEntity($studio, $this->request->data);
            if ($this->Studios->save($studio)) {
                $this->Flash->success(__('The studio has been saved.'));
                return $this->redirect('/');
            } else {
                $this->Flash->error(__('The studio could not be saved. Please, try again.'));
            }
        }
        $states = $this->Studios->States->find('list', ['limit' => 200]);
        $this->set(compact('studio', 'states'));
        $this->set('_serialize', ['studio']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Studio id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit() {
        $id = $this->Auth->user('studio.id');
        $studio = $this->Studios->get($id, [
            'contain' => ['Users'],
            'fields' => [
                'Users.id', 'Users.admin', 'Users.email', 'Users.phone', 'Users.active', 'Studios.id', 'Studios.user_id', 'Studios.name', 'Studios.address', 'Studios.city', 'Studios.state_id', 'Studios.postal_code', 'Studios.contact'],
        ]);
        $this->Studios->Users->validationUserEdit(new Validator());
        if ($this->request->is(['patch', 'post', 'put'])) {
            $studio = $this->Studios->patchEntity($studio, $this->request->data, ['associated' => [
                'Users' => [
                    'validate' => 'userEdit',
                ]
            ]]);
            if ($this->Studios->save($studio)) {
                $this->Flash->success(__('The studio has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The studio could not be saved. Please, try again.'));
            }
        }
        $users = $this->Studios->Users->find('list', ['limit' => 200]);
        $states = $this->Studios->States->find('list', ['limit' => 200]);
        $this->set(compact('studio', 'users', 'states'));
        $this->set('_serialize', ['studio']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Studio id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $studio = $this->Studios->get($id);
        if ($this->Studios->delete($studio)) {
            $this->Flash->success(__('The studio has been deleted.'));
        } else {
            $this->Flash->error(__('The studio could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
