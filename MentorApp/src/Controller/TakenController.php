<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Taken Controller
 *
 * @property \App\Model\Table\TakenTable $Taken
 */
class TakenController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->Taken->find()
            ->contain(['Dossiers', 'Gebruikers']);
        $taken = $this->paginate($query);

        $this->set(compact('taken'));
    }

    /**
     * View method
     *
     * @param string|null $id Taken id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $taken = $this->Taken->get($id, contain: ['Dossiers', 'Gebruikers']);
        $this->set(compact('taken'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $taken = $this->Taken->newEmptyEntity();
        if ($this->request->is('post')) {
            $taken = $this->Taken->patchEntity($taken, $this->request->getData());
            if ($this->Taken->save($taken)) {
                $this->Flash->success(__('The taken has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The taken could not be saved. Please, try again.'));
        }
        $dossiers = $this->Taken->Dossiers->find('list', limit: 200)->all();
        $gebruikers = $this->Taken->Gebruikers->find('list', limit: 200)->all();
        $this->set(compact('taken', 'dossiers', 'gebruikers'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Taken id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $taken = $this->Taken->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $taken = $this->Taken->patchEntity($taken, $this->request->getData());
            if ($this->Taken->save($taken)) {
                $this->Flash->success(__('The taken has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The taken could not be saved. Please, try again.'));
        }
        $dossiers = $this->Taken->Dossiers->find('list', limit: 200)->all();
        $gebruikers = $this->Taken->Gebruikers->find('list', limit: 200)->all();
        $this->set(compact('taken', 'dossiers', 'gebruikers'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Taken id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $taken = $this->Taken->get($id);
        if ($this->Taken->delete($taken)) {
            $this->Flash->success(__('The taken has been deleted.'));
        } else {
            $this->Flash->error(__('The taken could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
