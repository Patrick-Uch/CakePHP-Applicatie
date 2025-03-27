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

        // Laad de Authentication component
        $this->loadComponent('Authentication.Authentication');

        // Sta login en register toe zonder authenticatie
        $this->Authentication->addUnauthenticatedActions(['login', 'register']);
    }

    public function index()
    {
        $gebruiker = $this->Authentication->getIdentity();
    
        // Redirect naar login als gebruiker niet ingelogd is
        if (!$gebruiker) {
            return $this->redirect(['controller' => 'Gebruikers', 'action' => 'login']);
        }
    
        // Gebruik dashboard layout
        $this->viewBuilder()->setLayout('dashboard');
    
        $bedrijfId = $gebruiker->bedrijf_id;
        $dossiersTable = $this->fetchTable('Dossiers');
    
        // Haal filters op
        $status = $this->request->getQuery('status');
        $date = $this->request->getQuery('date');
        $search = $this->request->getQuery('search');
        $search = $search ? strtolower($search) : '';

        // Bouw de query op basis van filters
        $query = $dossiersTable->find()
            ->where(['bedrijf_id' => $bedrijfId])
            ->contain(['Bedrijven'])
            ->order(['Dossiers.geupdate_op' => 'DESC']);
    
        // Status filter
        if (!empty($status)) {
            $query->where(['Dossiers.status' => $status]);
        }
    
        // Datum filter
        if (!empty($date)) {
            $now = new \DateTime();
            switch ($date) {
                case 'Vandaag':
                    $start = (clone $now)->setTime(0, 0);
                    break;
                case 'Deze week':
                    $start = (clone $now)->modify('-6 days');
                    break;
                case 'Deze maand':
                    $start = (clone $now)->modify('-29 days');
                    break;
            }
            if (isset($start)) {
                $query->where(['Dossiers.geupdate_op >=' => $start->format('Y-m-d H:i:s')]);
            }
        }
    
        // Zoek filter op naam 
        if (!empty($search)) {
            $query->where(function ($exp, $q) use ($search) {
                return $exp->like('LOWER(Dossiers.naam)', "%$search%");
            });
        }
        
        // Pagineren van de resultaten
        $this->paginate = ['limit' => 10];
        $dossiers = $this->paginate($query);
    
        $this->set(compact('dossiers'));
    }
    

    public function add()
    {
        $this->viewBuilder()->setLayout('dashboard');
    
        $gebruiker = $this->Authentication->getIdentity();
        if (!$gebruiker || empty($gebruiker->bedrijf_id)) {
            $this->Flash->error(__('Je hebt geen gekoppeld bedrijf.'));
            return $this->redirect(['controller' => 'Gebruikers', 'action' => 'index']);
        }
    
        $bedrijf_id = $gebruiker->bedrijf_id;
        $dossier = $this->Dossiers->newEmptyEntity();
    
        if ($this->getRequest()->is('post')) {
            $data = $this->getRequest()->getData();
            $data['bedrijf_id'] = $bedrijf_id;
    
            $uploadedFiles = $this->getRequest()->getData('document');
            if ($uploadedFiles) {
                foreach ($uploadedFiles as $uploadedFile) {
                    if ($uploadedFile && $uploadedFile->getError() === UPLOAD_ERR_OK) {
                        $filename = time() . '_' . $uploadedFile->getClientFilename();
                        $uploadPath = WWW_ROOT . 'uploads' . DS;
                        if (!file_exists($uploadPath)) {
                            mkdir($uploadPath, 0777, true);
                        }
                        $uploadedFile->moveTo($uploadPath . $filename);
                        $data['documents'][] = [
                            'name' => $filename,
                            'path' => 'uploads/' . $filename,
                        ];
                    }
                }
            }
    
            // Haal bsn en iban tijdelijk eruit
            $bsn = $data['bsn'] ?? null;
            $iban = $data['iban'] ?? null;
            unset($data['bsn'], $data['iban']);
    
            $dossier = $this->Dossiers->patchEntity($dossier, $data, ['associated' => ['Documents']]);
    
            // Gebruik expliciete setters zodat encryptie plaatsvindt
            $dossier->setBsn($bsn);
            $dossier->setIban($iban);
    
            if ($this->Dossiers->save($dossier)) {
                $this->Flash->success(__('Dossier aangemaakt.'));
                return $this->redirect(['action' => 'index']);
            }
    
            $this->Flash->error(__('Het dossier kon niet worden aangemaakt.'));
        }
    
        $bedrijf = $this->Dossiers->Bedrijven->get($bedrijf_id);
        $this->set(compact('dossier', 'bedrijf', 'gebruiker'));
    }
    
    
    
    public function edit($id = null)
    {
        $this->viewBuilder()->setLayout('dashboard');
    
        $dossier = $this->Dossiers->get($id, contain: ['Bedrijven', 'Documents']);
        $bedrijven = $this->Dossiers->Bedrijven->find('list')->all();
        $gebruiker = $this->Authentication->getIdentity();
    
        if ($this->getRequest()->is(['post', 'put', 'patch'])) {
            $data = $this->getRequest()->getData();
    
            // Haal BSN en IBAN tijdelijk uit data
            $bsn = $data['bsn'] ?? null;
            $iban = $data['iban'] ?? null;
            unset($data['bsn'], $data['iban']);
    
            $dossier = $this->Dossiers->patchEntity($dossier, $data, ['associated' => ['Documents']]);
    
            // Expliciete setters voor encryptie
            $dossier->setBsn($bsn);
            $dossier->setIban($iban);
    
            if ($this->Dossiers->save($dossier)) {
                $this->Flash->success(__('Dossier opgeslagen.'));
                return $this->redirect(['action' => 'index']);
            }
    
            $this->Flash->error(__('Het dossier kon niet worden opgeslagen.'));
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
    
        // Haal de ingelogde gebruiker op
        $user = $this->Authentication->getIdentity();
    
        // Controleer of gebruiker toegang heeft om dit dossier te verwijderen
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
            // Bij error Rollback de transactie
            $this->Dossiers->getConnection()->rollback();
            
            $this->Flash->error(__('Er is een fout opgetreden bij het verwijderen van het dossier. Probeer het opnieuw.'));
        }
    
        // Redirect
        return $this->redirect(['action' => 'index']);
    }
    
    

    public function view($id = null)
    {
        $this->viewBuilder()->setLayout('dashboard');
    
        // Haal het dossier op met bijbehorende bedrijven en documenten
        $dossier = $this->Dossiers->get($id, contain: ['Bedrijven', 'Documents']);

    
        $this->set(compact('dossier'));
    }
}
