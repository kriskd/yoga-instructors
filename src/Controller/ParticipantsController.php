<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

/**
 * Participants Controller
 *
 * @property \App\Model\Table\ParticipantsTable $Participants
 */
class ParticipantsController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Sessions', 'Instructors', 'Roles']
        ];
        $this->set('participants', $this->paginate($this->Participants));
        $this->set('_serialize', ['participants']);
    }

    /**
     * View method
     *
     * @param string|null $id Participant id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $participant = $this->Participants->get($id, [
            'contain' => ['Sessions', 'Instructors', 'Roles']
        ]);
        $this->set('participant', $participant);
        $this->set('_serialize', ['participant']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add() {
        $instructor = $this->Participants->Instructors->findByUserId($this->Auth->User('id'))->first();
        if (!$instructor) $this->redirect('/');
        $participant = $this->Participants->newEntity();
        if ($this->request->is('post')) {
            $this->request->data['instructor_id'] = $instructor->id;
            $this->request->data['role_id'] = 2;
            $participant = $this->Participants->patchEntity($participant, $this->request->data);
            if ($this->Participants->save($participant)) {
                $this->Flash->success(__('The participant has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The participant could not be saved. Please, try again.'));
            }
        }
        $sessionsTable = TableRegistry::get('Sessions');
        $query = $sessionsTable->find('future')->find('teachers')
            ->leftJoin(
                ['Participants' => 'participants'],
                [
                    'Participants.session_id = Sessions.id',
                    'Participants.instructor_id' => $instructor->id,
                ]
            )
            ->where([
                'Participants.instructor_id IS' => null
            ]);
        $sessions = $query->all();
        $this->set(compact('participant', 'sessions'));
        $this->set('_serialize', ['participant']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Participant id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $participant = $this->Participants->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $participant = $this->Participants->patchEntity($participant, $this->request->data);
            if ($this->Participants->save($participant)) {
                $this->Flash->success(__('The participant has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The participant could not be saved. Please, try again.'));
            }
        }
        $sessions = $this->Participants->Sessions->find('list', ['limit' => 200]);
        $instructors = $this->Participants->Instructors->find('list', ['limit' => 200]);
        $roles = $this->Participants->Roles->find('list', ['limit' => 200]);
        $this->set(compact('participant', 'sessions', 'instructors', 'roles'));
        $this->set('_serialize', ['participant']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Participant id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $participant = $this->Participants->get($id);
        if ($this->Participants->delete($participant)) {
            $this->Flash->success(__('The participant has been deleted.'));
        } else {
            $this->Flash->error(__('The participant could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
