<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Monitors Controller
 *
 * @property \App\Model\Table\MonitorsTable $Monitors
 *
 * @method \App\Model\Entity\Monitor[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class MonitorsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $monitors = $this->paginate($this->Monitors);

        $this->set(compact('monitors'));
    }

    /**
     * View method
     *
     * @param string|null $id Monitor id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $monitor = $this->Monitors->get($id, [
            'contain' => ['Schedules']
        ]);

        $this->set('monitor', $monitor);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $monitor = $this->Monitors->newEntity();
        if ($this->request->is('post')) {
            $monitor = $this->Monitors->patchEntity($monitor, $this->request->getData());
            if ($this->Monitors->save($monitor)) {
                $this->Flash->success(__('The monitor has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The monitor could not be saved. Please, try again.'));
        }
        $this->set(compact('monitor'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Monitor id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $monitor = $this->Monitors->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $monitor = $this->Monitors->patchEntity($monitor, $this->request->getData());
            if ($this->Monitors->save($monitor)) {
                $this->Flash->success(__('The monitor has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The monitor could not be saved. Please, try again.'));
        }
        $this->set(compact('monitor'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Monitor id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $monitor = $this->Monitors->get($id);
        if ($this->Monitors->delete($monitor)) {
            $this->Flash->success(__('The monitor has been deleted.'));
        } else {
            $this->Flash->error(__('The monitor could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
