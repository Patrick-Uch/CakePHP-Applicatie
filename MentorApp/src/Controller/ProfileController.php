<?php
declare(strict_types=1);

namespace App\Controller;

use Cake\Event\EventInterface;
use Cake\ORM\Entity;
use Authentication\PasswordHasher\DefaultPasswordHasher;

class ProfileController extends AppController
{
    public function initialize(): void
    {
        parent::initialize();
        $this->loadComponent('Authentication.Authentication');
    }

    public function profile()
    {
        $this->viewBuilder()->setLayout('dashboard');
    
        $user = $this->Authentication->getIdentity();
        if (!$user) {
            return $this->redirect(['controller' => 'Gebruikers', 'action' => 'login']);
        }
    
        $userEntity = $this->fetchTable('Gebruikers')->get($user->getIdentifier(), [
            'contain' => ['Bedrijven']
        ]);

        if ($this->request->is(['post', 'put'])) {
            $userEntity = $this->fetchTable('Gebruikers')->patchEntity($userEntity, $this->request->getData(), ['fields' => ['naam', 'email']]);
            if ($this->fetchTable('Gebruikers')->save($userEntity)) {
                $this->Flash->success(__('Profile updated successfully.'));
                return $this->redirect(['action' => 'profile']);
            } else {
                $this->Flash->error(__('Error updating profile. Please try again.'));
            }
        }
    
        $this->set(compact('userEntity'));
    }

    public function updatePassword()
    {
        $this->request->allowMethod(['post']);
    
        $user = $this->Authentication->getIdentity();
        if (!$user) {
            return $this->redirect(['controller' => 'Gebruikers', 'action' => 'login']);
        }
    
        $userEntity = $this->fetchTable('Gebruikers')->get($user->getIdentifier());
        $data = $this->request->getData();
        $currentPassword = $data['current_password'] ?? '';
        $newPassword = $data['new_password'] ?? '';
        $confirmPassword = $data['confirm_password'] ?? '';

        if (!(new DefaultPasswordHasher())->check($currentPassword, $userEntity->wachtwoord)) {
            $this->Flash->error(__('Current password is incorrect.'));
            return $this->redirect(['action' => 'profile']);
        }

        if (empty($newPassword) || strlen($newPassword) < 8) {
            $this->Flash->error(__('New password must be at least 8 characters.'));
            return $this->redirect(['action' => 'profile']);
        }

        if ($newPassword !== $confirmPassword) {
            $this->Flash->error(__('New password and confirm password do not match.'));
            return $this->redirect(['action' => 'profile']);
        }

        $userEntity->wachtwoord = $newPassword;

        if ($this->fetchTable('Gebruikers')->save($userEntity)) {
            $this->Flash->success(__('Password updated successfully. Please log in again.'));
            $this->Authentication->logout();
            return $this->redirect(['controller' => 'Gebruikers', 'action' => 'login']);
        } else {
            $this->Flash->error(__('Error updating password. Please try again.'));
            return $this->redirect(['action' => 'profile']);
        }
    }
}
