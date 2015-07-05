<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;

/**
 * Instructors Controller
 *
 * @property \App\Model\Table\InstructorsTable $Instructors
 */
class InstructorsController extends AppController
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
            'contain' => ['Users']
        ];
        $this->set('instructors', $this->paginate($this->Instructors));
        $this->set('_serialize', ['instructors']);
    }

    /**
     * View method
     *
     * @param string|null $id Instructor id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view() {
        $id = $this->Auth->user('id');
        $instructor = $this->Instructors->findByUserId($id, [
            'contain' => ['Users', 'Participants']
        ])->first();
        if (!$instructor) $this->redirect('/');
        $this->set('instructor', $instructor);
        $this->set('_serialize', ['instructor']);
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
        $instructor = $this->Instructors->newEntity();
        if ($this->request->is('post')) {
            $instructor = $this->Instructors->patchEntity($instructor, $this->request->data);
            if ($this->Instructors->save($instructor)) {
                $this->Flash->success(__('The instructor has been saved.'));
                return $this->redirect('/');
            } else {
                $this->Flash->error(__('The instructor could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('instructor'));
        $this->set('_serialize', ['instructor']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Instructor id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $instructor = $this->Instructors->get($id);
        if ($this->Instructors->delete($instructor)) {
            $this->Flash->success(__('The instructor has been deleted.'));
        } else {
            $this->Flash->error(__('The instructor could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
