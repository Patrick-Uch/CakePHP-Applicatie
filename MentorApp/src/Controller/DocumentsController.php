<?php
declare(strict_types=1);

namespace App\Controller;

class DocumentsController extends AppController
{

    public function initialize(): void
    {
        parent::initialize();
        $this->viewBuilder()->setLayout('dashboard'); // gebruik dashboard layout
    }

    public function index()
    {
        $this->set('title', 'Documenten Page');
    }

    public function view($id = null)
    {
        // Haal het document op met bijbehorende dossiers
        $document = $this->Documents->get($id, contain: ['Dossiers']);
        $this->set(compact('document'));
    }

    public function add()
    {
        $document = $this->Documents->newEmptyEntity();
        if ($this->request->is('post')) {
            // Patch het document entiteit met de ontvangen data
            $document = $this->Documents->patchEntity($document, $this->request->getData());
            if ($this->Documents->save($document)) {
                $this->Flash->success(__('The document has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The document could not be saved. Please, try again.'));
        }
        // Haal de lijst van dossiers op voor de dropdown
        $dossiers = $this->Documents->Dossiers->find('list', [
            'keyField' => 'id',
            'valueField' => function ($row) {
                return '#' . $row->id . ' - ' . $row->naam . ' (' . $row->status . ')';
            }
        ])->toArray();
        
        $this->set(compact('document', 'dossiers'));
    }

    public function edit($id = null)
    {
        // Haal het document op zonder bijbehorende entiteiten
        $document = $this->Documents->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            // Patch het document entiteit met de ontvangen data
            $document = $this->Documents->patchEntity($document, $this->request->getData());
            if ($this->Documents->save($document)) {
                $this->Flash->success(__('The document has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The document could not be saved. Please, try again.'));
        }
        // Haal de lijst van dossiers op voor de dropdown
        $dossiers = $this->Documents->Dossiers->find('list', [
            'keyField' => 'id',
            'valueField' => function ($row) {
                return '#' . $row->id . ' - ' . $row->naam . ' (' . $row->status . ')';
            }
        ])->toArray();
        
        $this->set(compact('document', 'dossiers'));
    }

    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        // Haal het document op
        $document = $this->Documents->get($id);
        $dossierId = $document->dossier_id; // Haal de dossier_id op voordat het document wordt verwijderd

        if ($this->Documents->delete($document)) {
            $this->Flash->success(__('The document has been deleted.'));
        } else {
            $this->Flash->error(__('The document could not be deleted. Please, try again.'));
        }

        // Redirect naar de edit pagina van het dossier
        return $this->redirect(['controller' => 'Dossiers', 'action' => 'edit', $dossierId]);
    }
}