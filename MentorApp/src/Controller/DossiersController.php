<?php
declare(strict_types=1);

namespace App\Controller;

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
        throw new \Cake\Http\Exception\NotFoundException(__('Pagina niet gevonden'));
    }
}
