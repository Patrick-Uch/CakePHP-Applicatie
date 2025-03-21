<?php
declare(strict_types=1);

namespace App\Controller;

class DocumentsController extends AppController
{

    public function index()
    {
        $query = $this->Documents->find()
            ->contain(['Dossiers']);
        $documents = $this->paginate($query);

        $this->set(compact('documents'));
    }

    public function view($id = null)
    {
        $document = $this->Documents->get($id, contain: ['Dossiers']);
        $this->set(compact('document'));
    }

    public function add()
    {
        $document = $this->Documents->newEmptyEntity();
        if ($this->request->is('post')) {
            $document = $this->Documents->patchEntity($document, $this->request->getData());
            if ($this->Documents->save($document)) {
                $this->Flash->success(__('The document has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The document could not be saved. Please, try again.'));
        }
        $dossiers = $this->Documents->Dossiers->find('list', limit: 200)->all();
        $this->set(compact('document', 'dossiers'));
    }

    public function edit($id = null)
    {
        $document = $this->Documents->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $document = $this->Documents->patchEntity($document, $this->request->getData());
            if ($this->Documents->save($document)) {
                $this->Flash->success(__('The document has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The document could not be saved. Please, try again.'));
        }
        $dossiers = $this->Documents->Dossiers->find('list', limit: 200)->all();
        $this->set(compact('document', 'dossiers'));
    }


    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $document = $this->Documents->get($id);
        if ($this->Documents->delete($document)) {
            $this->Flash->success(__('The document has been deleted.'));
        } else {
            $this->Flash->error(__('The document could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
