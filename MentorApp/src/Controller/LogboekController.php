<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Logboek Controller
 *
 * @property \App\Model\Table\LogboekTable $Logboek
 */
class LogboekController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->Logboek->find()
            ->contain(['Dossiers', 'Gebruikers']);
        
        $logboek = $this->paginate($query);

        $this->set(compact('logboek'));
    }

    /**
     * View method
     *
     * @param string|null $id Logboek id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $logboek = $this->Logboek->get($id, ['contain' => ['Dossiers', 'Gebruikers']]);
        $this->set(compact('logboek'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $logboek = $this->Logboek->newEmptyEntity();
        
        if ($this->request->is('post')) {
            $logboek = $this->Logboek->patchEntity($logboek, $this->request->getData());

            if ($this->Logboek->save($logboek)) {
                $this->Flash->success(__('The logboek has been saved.'));

                return $this->redirect(['action' => 'index']);
            }

            $this->Flash->error(__('The logboek could not be saved. Please, try again.'));
        }

        $dossiers = $this->Logboek->Dossiers->find('list', ['limit' => 200])->all();
        $gebruikers = $this->Logboek->Gebruikers->find('list', ['limit' => 200])->all();

        $this->set(compact('logboek', 'dossiers', 'gebruikers'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Logboek id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $logboek = $this->Logboek->get($id);
        
        if ($this->request->is(['patch', 'post', 'put'])) {
            $logboek = $this->Logboek->patchEntity($logboek, $this->request->getData());

            if ($this->Logboek->save($logboek)) {
                $this->Flash->success(__('The logboek has been saved.'));

                return $this->redirect(['action' => 'index']);
            }

            $this->Flash->error(__('The logboek could not be saved. Please, try again.'));
        }

        $dossiers = $this->Logboek->Dossiers->find('list', ['limit' => 200])->all();
        $gebruikers = $this->Logboek->Gebruikers->find('list', ['limit' => 200])->all();

        $this->set(compact('logboek', 'dossiers', 'gebruikers'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Logboek id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);

        $logboek = $this->Logboek->get($id);

        if ($this->Logboek->delete($logboek)) {
            $this->Flash->success(__('The logboek has been deleted.'));
        } else {
            $this->Flash->error(__('The logboek could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
