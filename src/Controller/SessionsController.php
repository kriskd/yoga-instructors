<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Sessions Controller
 *
 * @property \App\Model\Table\SessionsTable $Sessions
 */
class SessionsController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        // Studio -- Find all sessions booked at my studio
        // Instructor -- All sessions I'm teaching and available sessions I can sign up for
        $this->paginate = [
            'contain' => [
                'Spaces' => [
                    'Studios',
                ],
                'Styles',
            ]
        ];

        $this->set('sessions', $this->paginate($this->Sessions));
        $this->set('_serialize', ['sessions']);
    }

    /**
     * View method
     *
     * @param string|null $id Session id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $session = $this->Sessions->get($id, [
            'contain' => ['Spaces', 'Styles', 'Participants']
        ]);
        $this->set('session', $session);
        $this->set('_serialize', ['session']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add($space_id = null) {
        if (empty($space_id)) {
            return $this->redirect(['controller' => 'spaces', 'action' => 'index']);
        }
        // TODO: Validation session start and end again space start and end
        $space = $this->Sessions->Spaces->get($space_id, [
            'contain' => [
                'Studios',
                'Sessions'
            ],
        ]);
        if (!empty($space->sessions)) {
            return $this->redirect(['controller' => 'spaces', 'action' => 'index']);
        }
        $instructor = $this->Sessions->Participants->Instructors->findByUserId($this->Auth->User('id'))->first();
        if (!$instructor) $this->redirect('/');
        $session = $this->Sessions->newEntity();
        $session->space_id = $space_id;
        if ($this->request->is('post')) {
            $this->request->data['participants'][0]['instructor_id'] = $instructor->id;
            $this->request->data['participants'][0]['role_id'] = 1;
            $session = $this->Sessions->patchEntity($session, $this->request->data);
            if ($this->Sessions->save($session, ['associated' => ['Participants']])) {
                $this->Flash->success(__('The session has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The session could not be saved. Please, try again.'));
            }
        } else {
            $this->request->data['start'] = $space->start;
            $this->request->data['end'] = $space->end;
        }
        $styles = $this->Sessions->Styles->find('list', ['limit' => 200]);
        $this->set(compact('session', 'space', 'styles'));
        $this->set('_serialize', ['session']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Session id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $session = $this->Sessions->get($id, [
            'contain' => [
                'Spaces' => [
                    'Studios',
                ],
                'Participants' => [
                    'conditions' => [
                        'role_id' => 1,
                    ],
                    'Instructors',
                ]
            ]
        ]);

        if ($session->participants[0]->instructor->user_id != $this->Auth->user('id')) {
            $this->redirect(['action' => 'index']);
        }
        if ($this->request->is(['patch', 'post', 'put'])) {
            $session = $this->Sessions->patchEntity($session, $this->request->data);
            if ($this->Sessions->save($session)) {
                $this->Flash->success(__('The session has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The session could not be saved. Please, try again.'));
            }
        }
        $spaces = $this->Sessions->Spaces->find('list', ['limit' => 200]);
        $styles = $this->Sessions->Styles->find('list', ['limit' => 200]);
        $this->set(compact('session', 'spaces', 'styles'));
        $this->set('_serialize', ['session']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Session id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $session = $this->Sessions->get($id);
        if ($this->Sessions->delete($session)) {
            $this->Flash->success(__('The session has been deleted.'));
        } else {
            $this->Flash->error(__('The session could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
