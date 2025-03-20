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
    
        // Haal het bedrijf_id van de ingelogde gebruiker op
        $bedrijfId = $user->bedrijf_id ?? null;
    
        if (!$bedrijfId) {
            $this->Flash->error('Je hebt geen bedrijf gekoppeld.');
            return $this->redirect(['controller' => 'Dashboard', 'action' => 'index']);
        }
    
        // Haal filters op vanuit GET parameters
        $timeFilter = $this->request->getQuery('time');
        $dossierFilter = $this->request->getQuery('dossier');
        $gebruikerFilter = $this->request->getQuery('gebruiker');
        $actieFilter = $this->request->getQuery('actie');
    
        // Start query met filtering op bedrijf_id
        $logboekTable = TableRegistry::getTableLocator()->get('Logboek');
        $query = $logboekTable->find()
            ->leftJoinWith('Dossiers')
            ->contain(['Gebruikers'])
            ->where(['Gebruikers.bedrijf_id' => $bedrijfId])
            ->order(['Logboek.gemaakt_op' => 'DESC']);
    
        // Filter op tijd
        if (!empty($timeFilter)) {
            $now = new \DateTime();
            switch ($timeFilter) {
                case '1d':
                    $startDate = $now->modify('-1 day')->format('Y-m-d H:i:s');
                    break;
                case '7d':
                    $startDate = $now->modify('-7 days')->format('Y-m-d H:i:s');
                    break;
                case '1m':
                    $startDate = $now->modify('-1 month')->format('Y-m-d H:i:s');
                    break;
            }
            if (isset($startDate)) {
                $query->where(['Logboek.gemaakt_op >=' => $startDate]);
            }
        }
    
        // Filter op dossier
        if (!empty($dossierFilter)) {
            $query->where(['Logboek.dossier_id' => $dossierFilter]);
        }
    
        // Filter op gebruiker
        if (!empty($gebruikerFilter)) {
            $query->where(['Logboek.gebruiker_id' => $gebruikerFilter]);
        }
    
        // Filter op actie
        if (!empty($actieFilter)) {
            $query->where(['Logboek.actie' => $actieFilter]);
        }
    
        // Pagineren en resultaat naar de view sturen
        $logboek = $this->paginate($query);
    
        // 
        $dossiers = TableRegistry::getTableLocator()->get('Dossiers')
        ->find()
        ->where(['bedrijf_id' => $bedrijfId])
        ->all(); 
    
        $gebruikers = TableRegistry::getTableLocator()->get('Gebruikers')
            ->find()
            ->where(['bedrijf_id' => $bedrijfId])
            ->all(); 
        
            $this->set(compact('logboek', 'dossiers', 'gebruikers'));
    }
}
