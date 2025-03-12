<?php
declare(strict_types=1);

namespace App\Controller;

use Cake\Utility\Security;
use Cake\Http\Exception\NotFoundException;

class DossiersController extends AppController
{
    public function index()
    {
        $this->viewBuilder()->setLayout('dashboard'); // gebruik dashboard layout
    
        $dossiersTable = $this->fetchTable('Dossiers'); // Haal de Dossiers tabel op
    
        $query = $dossiersTable->find()
            ->contain(['Bedrijven']); // Voeg Bedrijven toe
    
    
        $dossiers = $this->paginate($query); // Voeg paginering toe
        $this->set(compact('dossiers'));
    
        return $this->render('/Dossiers/dossier_dashboard'); // Toon de dossier dashboardpagina
    }
    
    public function view(?string $section = null, ?string $subSection = null, ?int $id = null)
    {
        $this->viewBuilder()->setLayout('dashboard'); // Gebruik dashboard layout
    
        // Als er geen sectie is opgegeven, toon het algemene dossier overzicht
        if (!$section) {
            $query = $this->Dossiers->find()->contain(['Bedrijven']);
            $dossiers = $this->paginate($query);
            $this->set(compact('dossiers'));
    
            return $this->render('/Dossiers/Dossier_Dashboard');
        }
    
        $section = ucfirst(strtolower($section)); // Zet de sectie om naar hoofdletters
        $subSection = $subSection ? ucfirst(strtolower($subSection)) : null; 
    
        // Geldige secties en hun bijbehorende subsecties
        $validSections = [
            'Clienten' => ['Betrokkenen', 'Client', 'Documenten', 'Formulieren', 'Rechtbank', 'Vermogen', 'Verslagen'],
            'Rekeningen' => ['Inkomsten', 'Uitgaven'],
            'Schulden' => ['Schulden'],
        ];
        $standaloneSections = ['Acties', 'Adressen', 'Mentorschap', 'Notities']; // Secties zonder subsecties
    
        // Haal het dossier op als er een ID is
        if ($id) {
            $dossier = $this->Dossiers->get($id, ['contain' => ['Bedrijven']]);
            $this->set(compact('dossier'));
        }
    
        // Controleer of het een zelfstandige sectie is en toon deze direct
        if (in_array($section, $standaloneSections)) {
            return $this->render("/Dossiers/$section");
        }
    
        // Als er een sectie is zonder subsectie, ga automatisch naar de eerste subpagina
        if (isset($validSections[$section]) && !$subSection) {
            $firstSubPage = $validSections[$section][0];
            return $this->redirect(["controller" => "Dossiers", "action" => "view", $section, $firstSubPage, $id]);
        }
    
        // Controleer of de sectie en subsectie geldig zijn en toon deze
        if (isset($validSections[$section]) && in_array($subSection, $validSections[$section])) {
            return $this->render("/Dossiers/$section/$subSection");
        }
    
        // Toon een foutmelding als de pagina niet bestaat
        throw new NotFoundException(__('Pagina niet gevonden'));
    }

    /**
     * Bewerken van een dossier.
     */
    public function edit($id = null)
    {
        $this->viewBuilder()->setLayout('dashboard'); // Gebruik dashboard layout

        $dossier = $this->Dossiers->get($id, ['contain' => ['Bedrijven']]);
        $bedrijven = $this->Dossiers->Bedrijven->find('list', ['limit' => 200])->all();
    
        // Decrypt de velden voordat ze worden weergegeven in het formulier
        if (!empty($dossier->bsn)) {
            $dossier->bsn = $this->decryptData($dossier->bsn);
        }
        if (!empty($dossier->iban)) {
            $dossier->iban = $this->decryptData($dossier->iban);
        }
    
        if ($this->getRequest()->is(['post', 'put', 'patch'])) {
            $data = $this->getRequest()->getData();
    
            // Encrypt de gevoelige velden voordat ze worden opgeslagen
            if (!empty($data['bsn'])) {
                $data['bsn'] = $this->encryptData($data['bsn']);
            }
            if (!empty($data['iban'])) {
                $data['iban'] = $this->encryptData($data['iban']);
            }
    
            $dossier = $this->Dossiers->patchEntity($dossier, $data);
    
            // Zorg ervoor dat CakePHP de velden als gewijzigd herkent
            $dossier->setDirty('bsn', true);
            $dossier->setDirty('iban', true);
    
            // Opslaan in de database
            if ($this->Dossiers->save($dossier)) {
                $this->Flash->success('Dossier is succesvol bijgewerkt.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('Dossier kon niet worden bijgewerkt. Probeer opnieuw.');
            }
        }
    
        $this->set(compact('dossier', 'bedrijven'));
    }

    private function encryptData($value)
    {
        if (empty($value)) {
            return null; // Niet encrypten als er geen waarde is
        }

        $key = Security::getSalt(); // Gebruik CakePHP's security key
        $iv = substr($key, 0, 16); // IV moet precies 16 bytes zijn

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
