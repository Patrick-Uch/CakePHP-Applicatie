<?php

declare(strict_types=1);

namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\EventInterface;
use Authentication\PasswordHasher\DefaultPasswordHasher;
use Cake\Controller\ComponentRegistry;

class GebruikersController extends AppController
{
    public function initialize(): void
    {
        parent::initialize();
        
        $this->loadComponent('Authentication.Authentication'); 

        // Sta niet-ingelogde gebruikers toe om zich te registreren en in te loggen
        $this->Authentication->allowUnauthenticated(['login', 'register']);
    }

    public function register()
    {
        $gebruiker = $this->Gebruikers->newEmptyEntity(); // Maak een nieuwe gebruiker aan

        if ($this->request->is('post')) {
            // Koppel de invoerdata aan de nieuwe gebruiker
            $gebruiker = $this->Gebruikers->patchEntity($gebruiker, $this->request->getData());

            // Standaard instellingen voor nieuwe gebruikers
            $gebruiker->bedrijf_id = null;
            $gebruiker->rol = 'User'; 
            
            // Probeer de gebruiker op te slaan
            if ($this->Gebruikers->save($gebruiker)) {
                $this->Flash->success('Je bent succesvol geregistreerd.');
                return $this->redirect(['action' => 'login']);
            }

            $this->Flash->error('Registratie mislukt. Probeer opnieuw.');
        }

        $this->set(compact('gebruiker'));
    }

    public function login()
    {
        $result = $this->Authentication->getResult(); // Get authentication result
        
        if ($this->request->is('post')) {
            $inputPassword = $this->request->getData('wachtwoord'); // Get entered password
            $user = $this->fetchTable('Gebruikers')
                ->find()
                ->where(['email' => $this->request->getData('email')])
                ->first();
            
            // Check if the authentication is valid
            if ($result->isValid()) {
                // If the user is valid, set the identity in the session
                $this->Authentication->setIdentity($user);
    
                // Redirect to the dashboard after successful login
                return $this->redirect(['controller' => 'Dashboard', 'action' => 'index']);
            }
    
            // Flash error if login fails
            $this->Flash->error('Ongeldige e-mail of wachtwoord.');
        }
    }
    
    
    
    
    public function logout()
    {
        $this->Authentication->logout();
        return $this->redirect(['action' => 'login']); // Redirect naar loginpagina
    }
}
