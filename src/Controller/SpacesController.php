<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Spaces Controller
 *
 * @property \App\Model\Table\SpacesTable $Spaces
 */
class SpacesController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index() {
        $conditions = ['Spaces.start >' => new \DateTime];
        $conditions[] = $this->Auth->user('type') == 'studio' ? ['Studios.user_id' => $this->Auth->user('id')] : $conditions;
        $this->paginate = [
            'contain' => [
                'Studios'
            ],
            'conditions' => $conditions,
            'order' => [
                'Spaces.start' => 'ASC',
            ]
        ];
        $this->set('spaces', $this->paginate($this->Spaces));
        $this->set('_serialize', ['spaces']);
    }

    /**
     * View method
     *
     * @param string|null $id Space id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null) {
        $space = $this->Spaces->get($id, [
            'contain' => [
                'Studios',
                'Sessions' => [
                    'Styles',
                    'Participants' => [
                        'conditions' => [
                            'role_id' => 1,
                        ],
                        'Instructors',
                    ]
                ]
            ]
        ]);
        $this->set('space', $space);
        $this->set('_serialize', ['space']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add() {
        $space = $this->Spaces->newEntity();
        $studio = $this->Spaces->Studios->findByUserId($this->Auth->user('id'))->first();
        if (!$studio) {
            $this->redirect('/');
        }
        if ($this->request->is('post')) {
            $space = $this->Spaces->patchEntity($space, $this->request->data);
            $space->studio_id = $studio->id;
            if ($this->Spaces->save($space)) {
                $this->Flash->success(__('The space has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The space could not be saved. Please, try again.'));
            }
        }
        $studios = $this->Spaces->Studios->find('list', [
            'limit' => 200,
        ]);
        $this->set(compact('space', 'studios'));
        $this->set('_serialize', ['space']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Space id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null) {
        try {
            $space = $this->Spaces->get($id, [
                'contain' => [
                    'Studios'
                ],
                'conditions' => [
                    'Studios.user_id' => $this->Auth->user('id'),
                ],
            ]);
        } catch (\Cake\Datasource\Exception\RecordNotFoundException $e) {
            $this->redirect(['action' => 'index']);
        }
        if ($this->request->is(['patch', 'post', 'put'])) {
            $space = $this->Spaces->patchEntity($space, $this->request->data);
            if ($this->Spaces->save($space)) {
                $this->Flash->success(__('The space has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The space could not be saved. Please, try again.'));
            }
        }
        $studios = $this->Spaces->Studios->find('list', ['limit' => 200]);
        $this->set(compact('space', 'studios'));
        $this->set('_serialize', ['space']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Space id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $space = $this->Spaces->get($id);
        if ($this->Spaces->delete($space)) {
            $this->Flash->success(__('The space has been deleted.'));
        } else {
            $this->Flash->error(__('The space could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
