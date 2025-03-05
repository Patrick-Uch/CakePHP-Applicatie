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

        $this->Authentication->allowUnauthenticated(['login', 'register']);
    }

    public function register()
    {
        $gebruiker = $this->Gebruikers->newEmptyEntity();
        if ($this->request->is('post')) {
            $gebruiker = $this->Gebruikers->patchEntity($gebruiker, $this->request->getData());
            
            $gebruiker->bedrijf_id = null;
            $gebruiker->rol = 'User'; 
            
            if ($this->Gebruikers->save($gebruiker)) {
                $this->Flash->success('Je bent succesvol geregistreerd.');
                return $this->redirect(['controller' => 'Dashboard', 'action' => 'index']);
            }
            $this->Flash->error('Registratie mislukt. Probeer opnieuw.');
        }
        $this->set(compact('gebruiker'));
    }

    public function login()
    {
        $result = $this->Authentication->getResult();
    
        if ($this->request->is('post')) {
            $inputPassword = $this->request->getData('wachtwoord');
            $user = $this->fetchTable('Gebruikers')->find()->where(['email' => $this->request->getData('email')])->first();
    
            if ($user) {
                file_put_contents('debug_login_log.txt', "Database Hashed Password: " . $user->wachtwoord . PHP_EOL, FILE_APPEND);
                file_put_contents('debug_login_log.txt', "User Input Password: " . $inputPassword . PHP_EOL, FILE_APPEND);
    
            }
    
            if ($result->isValid()) {
                return $this->redirect(['controller' => 'Dashboard', 'action' => 'index']);
            }
    
            $this->Flash->error('Ongeldige e-mail of wachtwoord.');
        }
    }
    
    public function logout()
    {
        $this->Authentication->logout();
        return $this->redirect(['action' => 'login']);
    }
}
