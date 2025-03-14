<?php

declare(strict_types=1);

namespace App\Controller;

use App\Controller\AppController;
use Cake\Http\Exception\UnauthorizedException;

class DashboardController extends AppController
{
    public function initialize(): void
    {
        parent::initialize();
        $this->loadComponent('Authentication.Authentication');

        // Laad de benodigde tabellen met fetchTable() voor CakePHP 5.x
        $this->Dossiers = $this->fetchTable('Dossiers');
        $this->Herinneringen = $this->fetchTable('Herinneringen');
        $this->Taken = $this->fetchTable('Taken');
        $this->Logboek = $this->fetchTable('Logboek');
        $this->Gebruikers = $this->fetchTable('Gebruikers'); // Correcte tabelnaam
    }

    public function index()
    {
        // Controleer of de gebruiker is ingelogd
        $user = $this->Authentication->getIdentity();
        if (!$user) {
            return $this->redirect(['controller' => 'Gebruikers', 'action' => 'login']);
        }

        // Correcte kolomnamen voor datumvelden
        $dateColumnHerinneringen = 'gemaakt_op';
        $dateColumnLogboek = 'geupdate_op'; // Gebruik 'geupdate_op' voor logboek volgorde

        // Haal het aantal actieve dossiers op (status: Opstarten, Actief, In beëindiging)
        $actieveDossiers = $this->Dossiers->find()
            ->where(['status IN' => ['Opstarten', 'Actief', 'In beëindiging']])
            ->count();

        // Haal het aantal openstaande taken op (niet afgerond)
        $openTaken = $this->Taken->find()
            ->where(['status !=' => 'Afgerond'])
            ->count();

        // Haal het aantal nieuwe herinneringen op (gemaakt op of na vandaag)
        $nieuweHerinneringen = $this->Herinneringen->find()
            ->where([$dateColumnHerinneringen . ' >=' => date('Y-m-d')])
            ->count();

        // Haal de 5 laatst bijgewerkte dossiers op
        $recentDossiers = $this->Dossiers->find()
            ->order(['geupdate_op' => 'DESC'])
            ->limit(5)
            ->all();

        // Haal de eerstvolgende herinneringen op, gesorteerd op datum
        $herinneringen = $this->Herinneringen->find()
            ->order([$dateColumnHerinneringen => 'ASC'])
            ->limit(5)
            ->all();

        // Haal openstaande taken op, gesorteerd op deadline
        $taken = $this->Taken->find()
            ->where(['status !=' => 'Afgerond'])
            ->order(['deadline' => 'ASC'])
            ->limit(5)
            ->all();

        // Haal de laatste 5 logboekvermeldingen op, gesorteerd op bijgewerkte datum
        $logboek = $this->Logboek->find()
            ->order([$dateColumnLogboek => 'DESC'])
            ->limit(5)
            ->all();

        // Gebruik de 'dashboard' layout voor de weergave
        $this->viewBuilder()->setLayout('dashboard');

        // Stuur de opgehaalde gegevens naar de weergave
        $this->set(compact(
            'user',
            'actieveDossiers',
            'openTaken',
            'nieuweHerinneringen',
            'recentDossiers',
            'herinneringen',
            'taken',
            'logboek'
        ));
    }
}
