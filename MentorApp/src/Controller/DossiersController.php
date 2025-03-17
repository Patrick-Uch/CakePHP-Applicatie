<?php

declare(strict_types=1);

namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Event\EventInterface;
use Cake\Utility\Security;
use Cake\Http\Exception\NotFoundException;
use Cake\ORM\TableRegistry;
use Cake\Log\Log;
use Cake\Http\Exception\ForbiddenException;

class DossiersController extends AppController
{
    public function beforeFilter(EventInterface $event)
    {
        parent::beforeFilter($event);

        // Laad de Authentication component
        $this->loadComponent('Authentication.Authentication');

        // Sta niet-geauthenticeerde gebruikers toe om login en register te bekijken
        $this->Authentication->addUnauthenticatedActions(['login', 'register']);
    }

    public function index()
    {
        // Haal de ingelogde gebruiker op
        $gebruiker = $this->Authentication->getIdentity();

        if (!$gebruiker) {
            return $this->redirect(['controller' => 'Gebruikers', 'action' => 'login']);
        }

        // Gebruik de dashboard layout voor weergave
        $this->viewBuilder()->setLayout('dashboard'); 

        // Haal dossiers op die bij het bedrijf van de gebruiker horen
        $dossiersTable = $this->fetchTable('Dossiers');
        $query = $dossiersTable->find()
            ->where(['bedrijf_id' => $gebruiker->bedrijf_id]) // Toon alleen dossiers voor het bedrijf van de gebruiker
            ->contain(['Bedrijven']);

        $dossiers = $this->paginate($query); // Paginatie voor de dossiers
        $this->set(compact('dossiers'));

        return $this->render('/Dossiers/dossier_dashboard'); // Render het view voor dossier dashboard
    }

    public function add()
    {
        // Gebruik de dashboard layout voor weergave
        $this->viewBuilder()->setLayout('dashboard');

        // Haal de ingelogde gebruiker op
        $gebruiker = $this->Authentication->getIdentity();
        if (!$gebruiker || empty($gebruiker->bedrijf_id)) {
            $this->Flash->error(__('Je hebt geen gekoppeld bedrijf. Neem contact op met de beheerder.'));
            return $this->redirect(['controller' => 'Gebruikers', 'action' => 'index']);
        }

        // Verkrijg het bedrijf_id van de ingelogde gebruiker
        $bedrijf_id = $gebruiker->bedrijf_id;

        $dossier = $this->Dossiers->newEmptyEntity();
        if ($this->getRequest()->is('post')) {
            $data = $this->getRequest()->getData();
            $data['bedrijf_id'] = $bedrijf_id; // Koppel het dossier aan het bedrijf van de gebruiker

            // Encryptie van gevoelige gegevens
            if (!empty($data['bsn'])) {
                $data['bsn'] = $this->encryptData($data['bsn']);
            }
            if (!empty($data['iban'])) {
                $data['iban'] = $this->encryptData($data['iban']);
            }

            $dossier = $this->Dossiers->patchEntity($dossier, $data);

            // Probeer het dossier op te slaan
            if ($this->Dossiers->save($dossier)) {
                $this->Flash->success(__('Het dossier is succesvol aangemaakt.'));
                return $this->redirect(['action' => 'index']);
            }

            $this->Flash->error(__('Het dossier kon niet worden aangemaakt. Probeer het opnieuw.'));
        }

        // Haal het bedrijf op voor weergave in het formulier
        $bedrijf = $this->Dossiers->Bedrijven->find()
            ->where(['id' => $bedrijf_id])
            ->firstOrFail();

        $this->set(compact('dossier', 'bedrijf', 'gebruiker'));
    }

    public function edit($id = null)
    {
        // Gebruik de dashboard layout voor weergave
        $this->viewBuilder()->setLayout('dashboard');
    
        // Haal het dossier op met gekoppelde bedrijven
        $dossier = $this->Dossiers->get($id, ['contain' => ['Bedrijven']]);
        
        // Haal bedrijven op voor de dropdownlijst (we hebben enkel een lijst nodig)
        $bedrijven = $this->Dossiers->Bedrijven->find('list', ['limit' => 200])->all();
        
        // Haal de ingelogde gebruiker op (indien nodig voor de weergave)
        $gebruiker = $this->Authentication->getIdentity();
    
        // Decryptie van gegevens voordat ze getoond worden in het formulier
        if (!empty($dossier->bsn)) {
            $dossier->bsn = $this->decryptData($dossier->bsn);
        }
        if (!empty($dossier->iban)) {
            $dossier->iban = $this->decryptData($dossier->iban);
        }
    
        // Handle formulierinzending (POST, PUT, PATCH)
        if ($this->getRequest()->is(['post', 'put', 'patch'])) {
            $data = $this->getRequest()->getData();
            
            // Encryptie van gevoelige gegevens voordat ze opgeslagen worden
            if (!empty($data['bsn'])) {
                $data['bsn'] = $this->encryptData($data['bsn']);
            }
            if (!empty($data['iban'])) {
                $data['iban'] = $this->encryptData($data['iban']);
            }
    
            // Patch de data naar het dossier object
            $dossier = $this->Dossiers->patchEntity($dossier, $data);
    
            // Markeer de velden als gewijzigd
            $dossier->setDirty('bsn', true);
            $dossier->setDirty('iban', true);
    
            // Probeer het dossier op te slaan
            if ($this->Dossiers->save($dossier)) {
                $this->Flash->success('Dossier is succesvol bijgewerkt.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('Dossier kon niet worden bijgewerkt. Probeer opnieuw.');
            }
        }
    
        // Stel de variabelen in voor de weergave
        $this->set(compact('dossier', 'bedrijven', 'gebruiker'));
    }
    
    public function delete($id = null)
    {
        // Haal het dossier op via ID
        $dossier = $this->Dossiers->get($id);
    
        // Controleer of het dossier bestaat
        if (!$dossier) {
            $this->Flash->error(__('Dossier niet gevonden.'));
            return $this->redirect(['action' => 'index']);
        }
    
        // Zorg ervoor dat de gebruiker geautoriseerd is om dit dossier te verwijderen
        $user = $this->Authentication->getIdentity();
        if (!$user || $dossier->bedrijf_id !== $user->bedrijf_id) {
            throw new ForbiddenException('Je hebt geen toestemming om dit dossier te verwijderen.');
        }
    
        // Begin een transactie om dataconsistentie te waarborgen
        $this->Dossiers->getConnection()->begin();
    
        try {
            // Log het verwijderen van het dossier **voordat** het dossier daadwerkelijk wordt verwijderd
            $logTable = TableRegistry::getTableLocator()->get('Logboek');
            $logData = [
                'dossier_id' => $dossier->id,
                'gebruiker_id' => $user->id,
                'actie' => 'Verwijderd',
                'beschrijving' => 'Dossier verwijderd: ' . $dossier->naam,
            ];
            $logEntity = $logTable->newEntity($logData);
            $logTable->save($logEntity); // Log entry creation
    
            // Probeer het dossier te verwijderen
            if ($this->Dossiers->delete($dossier)) {
                $this->Flash->success(__('Dossier succesvol verwijderd.'));
                // Commit de transactie
                $this->Dossiers->getConnection()->commit();
            } else {
                throw new \Exception('Het verwijderen van het dossier is mislukt.');
            }
        } catch (\Exception $e) {
            // Rollback als er een fout optreedt
            $this->Dossiers->getConnection()->rollback();
            $this->Flash->error(__('Er is een fout opgetreden bij het verwijderen van het dossier. Probeer het opnieuw.'));
        }
    
        // Redirect naar de index of een andere geschikte pagina
        return $this->redirect(['action' => 'index']);
    }
    

    private function encryptData($value)
    {
        if (empty($value)) {
            return null; // Niet encrypten als er geen waarde is
        }

        $key = Security::getSalt(); // Gebruik de beveiligingssleutel van CakePHP
        $iv = substr($key, 0, 16); // IV moet exact 16 bytes zijn

        return base64_encode(openssl_encrypt($value, 'AES-256-CBC', $key, 0, $iv));
    }

    private function decryptData($value)
    {
        if (empty($value)) {
            return null; // Niet decrypten als er geen waarde is
        }

        $key = Security::getSalt();
        $iv = substr($key, 0, 16);

        return openssl_decrypt(base64_decode($value), 'AES-256-CBC', $key, 0, $iv);
    }
}
