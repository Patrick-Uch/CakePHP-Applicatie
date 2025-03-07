<?php
declare(strict_types=1);

namespace App\Controller;


class DossiersController extends AppController
{
    public function index()
    {
        $query = $this->Dossiers->find()
            ->contain(['Bedrijven']); 
    
        $search = $this->request->getQuery('search');
        if ($search) {
            $query->where(['Dossiers.naam LIKE' => '%' . $search . '%']);
        }
    
        $status = $this->request->getQuery('status');
        if ($status) {
            $query->where(['Dossiers.status' => $status]);
        }
    
        $dateFilter = $this->request->getQuery('date_filter');
        if ($dateFilter) {
            $currentDate = new \Cake\I18n\FrozenDate();
            if ($dateFilter == 'Vandaag') {
                $query->where(['Dossiers.gemaakt_op' => $currentDate]);
            } elseif ($dateFilter == 'Deze week') {
                $query->where(['Dossiers.gemaakt_op >=' => $currentDate->startOf('week')]);
            } elseif ($dateFilter == 'Deze maand') {
                $query->where(['Dossiers.gemaakt_op >=' => $currentDate->startOf('month')]);
            }
        }
    
        $dossiers = $this->paginate($query);
        $this->set(compact('dossiers'));
    }
    public function view(?string $section = null, ?string $subSection = null, ?int $id = null)
    {
        $this->viewBuilder()->setLayout('dashboard'); 
    
        if (!$section) {
            $query = $this->Dossiers->find()->contain(['Bedrijven']);
            $dossiers = $this->paginate($query);
            $this->set(compact('dossiers'));
    
            return $this->render('/Dossiers/Dossier_Dashboard');
        }
    
        $section = ucfirst(strtolower($section));
        $subSection = $subSection ? ucfirst(strtolower($subSection)) : null;
    
        $validSections = [
            'Clienten' => ['Betrokkenen', 'Client', 'Documenten', 'Formulieren', 'Rechtbank', 'Vermogen', 'Verslagen'],
            'Rekeningen' => ['Inkomsten', 'Uitgaven'],
            'Schulden' => ['Schulden'],
        ];
        $standaloneSections = ['Acties', 'Adressen', 'Mentorschap', 'Notities'];
    
        if ($id) {
            $dossier = $this->Dossiers->get($id, ['contain' => ['Bedrijven']]);
            $this->set(compact('dossier'));
        }
    
        if (in_array($section, $standaloneSections)) {
            return $this->render("/Dossiers/$section");
        }
    
        if (isset($validSections[$section]) && !$subSection) {
            $firstSubPage = $validSections[$section][0];
            return $this->redirect(["controller" => "Dossiers", "action" => "view", $section, $firstSubPage, $id]);
        }
    
        if (isset($validSections[$section]) && in_array($subSection, $validSections[$section])) {
            return $this->render("/Dossiers/$section/$subSection");
        }
    
        throw new \Cake\Http\Exception\NotFoundException(__('Page not found'));
    }
    
    
    
    
    public function add()
    {
        $dossier = $this->Dossiers->newEmptyEntity();
        if ($this->request->is('post')) {
            $dossier = $this->Dossiers->patchEntity($dossier, $this->request->getData());
            if ($this->Dossiers->save($dossier)) {
                $this->Flash->success(__('The dossier has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The dossier could not be saved. Please, try again.'));
        }
        $bedrijven = $this->Dossiers->Bedrijven->find('list', limit: 200)->all();
        $this->set(compact('dossier', 'bedrijven'));
    }
    public function edit($id = null)
    {
        $dossier = $this->Dossiers->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $dossier = $this->Dossiers->patchEntity($dossier, $this->request->getData());
            if ($this->Dossiers->save($dossier)) {
                $this->Flash->success(__('The dossier has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The dossier could not be saved. Please, try again.'));
        }
        $bedrijven = $this->Dossiers->bedrijven->find('list', limit: 200)->all();
        $this->set(compact('dossier', 'bedrijven'));
    }
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $dossier = $this->Dossiers->get($id);
        if ($this->Dossiers->delete($dossier)) {
            $this->Flash->success(__('The dossier has been deleted.'));
        } else {
            $this->Flash->error(__('The dossier could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    
}
