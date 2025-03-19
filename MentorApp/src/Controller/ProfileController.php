<?php
declare(strict_types=1);

namespace App\Controller;

use Cake\Event\EventInterface;
use Cake\ORM\Entity;
use Authentication\PasswordHasher\DefaultPasswordHasher;
use Cake\ORM\TableRegistry;

class ProfileController extends AppController
{
    public function initialize(): void
    {
        parent::initialize();
        $this->loadComponent('Authentication.Authentication'); // Laad de authenticatiecomponent
    }

    public function profile()
    {
        $this->viewBuilder()->setLayout('dashboard'); // Gebruik het 'dashboard' layout
    
        $user = $this->Authentication->getIdentity(); // Haal de ingelogde gebruiker op
        if (!$user) {
            return $this->redirect(['controller' => 'Gebruikers', 'action' => 'login']); // Redirect naar login als niet ingelogd
        }
    
        // Haal de gebruiker op met gekoppelde bedrijven
        $userEntity = $this->fetchTable('Gebruikers')->find()
            ->where(['Gebruikers.id' => $user->getIdentifier()])
            ->contain(['Bedrijven'])
            ->first();
    
        if (!$userEntity) {
            $this->Flash->error(__('Gebruiker niet gevonden.'));
            return $this->redirect(['controller' => 'Gebruikers', 'action' => 'login']);
        }
    
        // Verwerk profielupdate
        if ($this->request->is(['post', 'put'])) {
            $userEntity = $this->fetchTable('Gebruikers')->patchEntity($userEntity, $this->request->getData(), ['fields' => ['naam', 'email']]);
            if ($this->fetchTable('Gebruikers')->save($userEntity)) {
                $this->Flash->success(__('Profiel succesvol bijgewerkt.'));
                return $this->redirect(['action' => 'profile']);
            } else {
                $this->Flash->error(__('Fout bij het bijwerken van het profiel.'));
            }
        }
    
        $this->set(compact('userEntity'));
    }

    public function updatePassword()
    {
        $this->request->allowMethod(['post']); // Alleen POST-verzoeken toegestaan
    
        $user = $this->Authentication->getIdentity();
        if (!$user) {
            return $this->redirect(['controller' => 'Gebruikers', 'action' => 'login']);
        }
    
        $userEntity = $this->fetchTable('Gebruikers')->get($user->getIdentifier());
        $data = $this->request->getData();
        $currentPassword = $data['current_password'] ?? '';
        $newPassword = $data['new_password'] ?? '';
        $confirmPassword = $data['confirm_password'] ?? '';

        // Controleer of het huidige wachtwoord correct is
        if (!(new DefaultPasswordHasher())->check($currentPassword, $userEntity->wachtwoord)) {
            $this->Flash->error(__('Huidig wachtwoord is onjuist.'));
            return $this->redirect(['action' => 'profile']);
        }

        // Controleer of het nieuwe wachtwoord voldoet aan de eisen
        if (empty($newPassword) || strlen($newPassword) < 8) {
            $this->Flash->error(__('Nieuw wachtwoord moet minimaal 8 tekens lang zijn.'));
            return $this->redirect(['action' => 'profile']);
        }

        // Controleer of het nieuwe wachtwoord en de bevestiging overeenkomen
        if ($newPassword !== $confirmPassword) {
            $this->Flash->error(__('Nieuw wachtwoord en bevestigingswachtwoord komen niet overeen.'));
            return $this->redirect(['action' => 'profile']);
        }

        // Wachtwoord bijwerken
        $userEntity->wachtwoord = $newPassword;

        if ($this->fetchTable('Gebruikers')->save($userEntity)) {
            $this->Flash->success(__('Wachtwoord succesvol bijgewerkt. Log opnieuw in.'));
            $this->Authentication->logout();
            return $this->redirect(['controller' => 'Gebruikers', 'action' => 'login']);
        } else {
            $this->Flash->error(__('Fout bij het bijwerken van het wachtwoord. Probeer opnieuw.'));
            return $this->redirect(['action' => 'profile']);
        }
    }

    public function settings()
    {
        $this->viewBuilder()->setLayout('dashboard'); // Gebruik het 'dashboard' layout

        $user = $this->Authentication->getIdentity();
        if (!$user) {
            return $this->redirect(['controller' => 'Gebruikers', 'action' => 'login']);
        }

        // Haal de gebruiker op met gekoppelde bedrijven
        $userEntity = $this->fetchTable('Gebruikers')->get($user->getIdentifier(), [
            'contain' => ['Bedrijven']
        ]);

        $this->set(compact('userEntity'));
    }


    
}
