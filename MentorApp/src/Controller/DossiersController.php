<?php
declare(strict_types=1);

namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Event\EventInterface;
use Cake\Http\Exception\ForbiddenException;

class DossiersController extends AppController
{
    public function beforeFilter(EventInterface $event)
    {
        parent::beforeFilter($event);

        // Load the Authentication component
        $this->loadComponent('Authentication.Authentication');

        // Allow login and register without authentication
        $this->Authentication->addUnauthenticatedActions(['login', 'register']);
    }

    public function index()
    {
        $gebruiker = $this->Authentication->getIdentity();

        if (!$gebruiker) {
            return $this->redirect(['controller' => 'Gebruikers', 'action' => 'login']);
        }

        $this->viewBuilder()->setLayout('dashboard');

        // Fetch dossiers for the logged-in user's company
        $dossiersTable = $this->fetchTable('Dossiers');
        $query = $dossiersTable->find()
            ->where(['bedrijf_id' => $gebruiker->bedrijf_id])
            ->contain(['Bedrijven']);

        $this->paginate = ['limit' => 10];

        $dossiers = $this->paginate($query);
        $this->set(compact('dossiers'));
        return $this->render('/Dossiers/dossier_dashboard');
    }

    public function add()
    {
        $this->viewBuilder()->setLayout('dashboard');
    
        $gebruiker = $this->Authentication->getIdentity();
        if (!$gebruiker || empty($gebruiker->bedrijf_id)) {
            $this->Flash->error(__('Je hebt geen gekoppeld bedrijf. Neem contact op met de beheerder.'));
            return $this->redirect(['controller' => 'Gebruikers', 'action' => 'index']);
        }
    
        $bedrijf_id = $gebruiker->bedrijf_id;
        $dossier = $this->Dossiers->newEmptyEntity();
    
        if ($this->getRequest()->is('post')) {
            $data = $this->getRequest()->getData();
            $data['bedrijf_id'] = $bedrijf_id;
    
            \Cake\Log\Log::debug('Data vóór encryptie: ' . json_encode($data), 'debug');
    
            $dossier = $this->Dossiers->patchEntity($dossier, $data);
    
            \Cake\Log\Log::debug('Dossier na encryptie: ' . json_encode($dossier->toArray()), 'debug');
    
            if ($this->Dossiers->save($dossier)) {
                $this->Flash->success(__('Het dossier is succesvol aangemaakt.'));
                return $this->redirect(['action' => 'index']);
            }
    
            $this->Flash->error(__('Het dossier kon niet worden aangemaakt. Probeer het opnieuw.'));
        }
    
        $bedrijf = $this->Dossiers->Bedrijven->find()
            ->where(['id' => $bedrijf_id])
            ->firstOrFail();
    
        $this->set(compact('dossier', 'bedrijf', 'gebruiker'));
    }
    

    public function edit($id = null)
    {
        $this->viewBuilder()->setLayout('dashboard');
        $dossier = $this->Dossiers->get($id, ['contain' => ['Bedrijven']]);
    
        $bedrijven = $this->Dossiers->Bedrijven->find('list', ['limit' => 200])->all();
        $gebruiker = $this->Authentication->getIdentity();
    
        if ($this->getRequest()->is(['post', 'put', 'patch'])) {
            $data = $this->getRequest()->getData();
            
            // Debug log om te checken wat binnenkomt
            \Cake\Log\Log::debug('Ontvangen data: ' . json_encode($data), 'debug');
    
            $dossier = $this->Dossiers->patchEntity($dossier, $data);
            
            // Debug log om te checken of encryptie werkt
            \Cake\Log\Log::debug('Geüpdatet dossier (versleuteld): ' . json_encode($dossier->toArray()), 'debug');
    
            if ($this->Dossiers->save($dossier)) {
                $this->Flash->success('Dossier is succesvol bijgewerkt.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('Dossier kon niet worden bijgewerkt. Probeer opnieuw.');
            }
        }
    
        $this->set(compact('dossier', 'bedrijven', 'gebruiker'));
    }
    

    public function delete($id = null)
    {
        $dossier = $this->Dossiers->get($id);

        if (!$dossier) {
            $this->Flash->error(__('Dossier niet gevonden.'));
            return $this->redirect(['action' => 'index']);
        }

        $user = $this->Authentication->getIdentity();
        if (!$user || $dossier->bedrijf_id !== $user->bedrijf_id) {
            throw new ForbiddenException('Je hebt geen toestemming om dit dossier te verwijderen.');
        }

        $this->Dossiers->getConnection()->begin();

        try {
            if ($this->Dossiers->delete($dossier)) {
                $this->Flash->success(__('Dossier succesvol verwijderd.'));
                $this->Dossiers->getConnection()->commit();
            } else {
                throw new \Exception('Het verwijderen van het dossier is mislukt.');
            }
        } catch (\Exception $e) {
            $this->Dossiers->getConnection()->rollback();
            $this->Flash->error(__('Er is een fout opgetreden bij het verwijderen van het dossier. Probeer het opnieuw.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
