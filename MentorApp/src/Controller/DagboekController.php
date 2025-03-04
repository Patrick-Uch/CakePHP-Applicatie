<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Dagboek Controller
 *
 * @property \App\Model\Table\DagboekTable $Dagboek
 */
class DagboekController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->Dagboek->find()
            ->contain(['Dossiers', 'Gebruikers']);
        $dagboek = $this->paginate($query);

        $this->set(compact('dagboek'));
    }

    /**
     * View method
     *
     * @param string|null $id Dagboek id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $dagboek = $this->Dagboek->get($id, contain: ['Dossiers', 'Gebruikers']);
        $this->set(compact('dagboek'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $dagboek = $this->Dagboek->newEmptyEntity();
        if ($this->request->is('post')) {
            $dagboek = $this->Dagboek->patchEntity($dagboek, $this->request->getData());
            if ($this->Dagboek->save($dagboek)) {
                $this->Flash->success(__('The dagboek has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The dagboek could not be saved. Please, try again.'));
        }
        $dossiers = $this->Dagboek->Dossiers->find('list', limit: 200)->all();
        $gebruikers = $this->Dagboek->Gebruikers->find('list', limit: 200)->all();
        $this->set(compact('dagboek', 'dossiers', 'gebruikers'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Dagboek id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $dagboek = $this->Dagboek->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $dagboek = $this->Dagboek->patchEntity($dagboek, $this->request->getData());
            if ($this->Dagboek->save($dagboek)) {
                $this->Flash->success(__('The dagboek has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The dagboek could not be saved. Please, try again.'));
        }
        $dossiers = $this->Dagboek->Dossiers->find('list', limit: 200)->all();
        $gebruikers = $this->Dagboek->Gebruikers->find('list', limit: 200)->all();
        $this->set(compact('dagboek', 'dossiers', 'gebruikers'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Dagboek id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $dagboek = $this->Dagboek->get($id);
        if ($this->Dagboek->delete($dagboek)) {
            $this->Flash->success(__('The dagboek has been deleted.'));
        } else {
            $this->Flash->error(__('The dagboek could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
