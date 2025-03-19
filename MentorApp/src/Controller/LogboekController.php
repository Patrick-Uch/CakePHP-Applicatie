<?php
declare(strict_types=1);

namespace App\Controller;

use Cake\Event\EventInterface;
use Cake\ORM\Entity;
use Cake\ORM\TableRegistry;



class LogboekController extends AppController
{
    public function index()
    {
        $this->viewBuilder()->setLayout('dashboard');
    
        // Check of de gebruiker is ingelogd
        $user = $this->request->getAttribute('identity');
        if (!$user) {
            $this->Flash->error('Je moet ingelogd zijn om het logboek te bekijken.');
            return $this->redirect(['controller' => 'Gebruikers', 'action' => 'login']);
        }
    
        // Haal de logs op voor de ingelogde user
        $logboekTable = TableRegistry::getTableLocator()->get('Logboek');
        $query = $logboekTable->find()
            ->leftJoinWith('Dossiers') 
            ->contain(['Gebruikers']) 
            ->where(['Logboek.gebruiker_id' => $user->id])
            ->order(['Logboek.gemaakt_op' => 'DESC']);
    
        $logboek = $this->paginate($query);
        $this->set(compact('logboek'));
    }
    
    
}
