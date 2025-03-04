<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Herinneringen Controller
 *
 * @property \App\Model\Table\HerinneringenTable $Herinneringen
 */
class HerinneringenController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->Herinneringen->find()
            ->contain(['Dossiers', 'Gebruikers']);
        $herinneringen = $this->paginate($query);

        $this->set(compact('herinneringen'));
    }

    /**
     * View method
     *
     * @param string|null $id Herinneringen id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $herinneringen = $this->Herinneringen->get($id, contain: ['Dossiers', 'Gebruikers']);
        $this->set(compact('herinneringen'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $herinneringen = $this->Herinneringen->newEmptyEntity();
        if ($this->request->is('post')) {
            $herinneringen = $this->Herinneringen->patchEntity($herinneringen, $this->request->getData());
            if ($this->Herinneringen->save($herinneringen)) {
                $this->Flash->success(__('The herinneringen has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The herinneringen could not be saved. Please, try again.'));
        }
        $dossiers = $this->Herinneringen->Dossiers->find('list', limit: 200)->all();
        $gebruikers = $this->Herinneringen->Gebruikers->find('list', limit: 200)->all();
        $this->set(compact('herinneringen', 'dossiers', 'gebruikers'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Herinneringen id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $herinneringen = $this->Herinneringen->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $herinneringen = $this->Herinneringen->patchEntity($herinneringen, $this->request->getData());
            if ($this->Herinneringen->save($herinneringen)) {
                $this->Flash->success(__('The herinneringen has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The herinneringen could not be saved. Please, try again.'));
        }
        $dossiers = $this->Herinneringen->Dossiers->find('list', limit: 200)->all();
        $gebruikers = $this->Herinneringen->Gebruikers->find('list', limit: 200)->all();
        $this->set(compact('herinneringen', 'dossiers', 'gebruikers'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Herinneringen id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $herinneringen = $this->Herinneringen->get($id);
        if ($this->Herinneringen->delete($herinneringen)) {
            $this->Flash->success(__('The herinneringen has been deleted.'));
        } else {
            $this->Flash->error(__('The herinneringen could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
