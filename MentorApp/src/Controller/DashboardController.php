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

        // Het bedrijf_id van de ingelogde gebruiker
        $bedrijfId = $user->bedrijf_id;

        // Correcte kolomnamen voor datumvelden
        $dateColumnHerinneringen = 'gemaakt_op';
        $dateColumnLogboek = 'geupdate_op'; // Gebruik 'geupdate_op' voor logboek volgorde

        // Haal het aantal actieve dossiers op (status: Opstarten, Actief, In beëindiging) voor het specifieke bedrijf
        $actieveDossiers = $this->Dossiers->find()
            ->where(['Dossiers.status IN' => ['Opstarten', 'Actief', 'In beëindiging']])
            ->andWhere(['Dossiers.bedrijf_id' => $bedrijfId])
            ->count();

        // Haal het aantal openstaande taken op (niet afgerond) voor het specifieke bedrijf
        $openTaken = $this->Taken->find()
            ->matching('Dossiers', function($q) use ($bedrijfId) {
                return $q->where(['Dossiers.bedrijf_id' => $bedrijfId]);
            })
            ->where(['Taken.status !=' => 'Afgerond'])
            ->count();

        // Haal het aantal nieuwe herinneringen op (gemaakt op of na vandaag) voor het specifieke bedrijf
        $nieuweHerinneringen = $this->Herinneringen->find()
            ->matching('Dossiers', function($q) use ($bedrijfId) {
                return $q->where(['Dossiers.bedrijf_id' => $bedrijfId]);
            })
            ->where(['Herinneringen.' . $dateColumnHerinneringen . ' >=' => date('Y-m-d')]) // Specify table
            ->count();

        // Haal de 5 laatst bijgewerkte dossiers op voor het specifieke bedrijf
        $recentDossiers = $this->Dossiers->find()
            ->order(['Dossiers.geupdate_op' => 'DESC'])
            ->limit(5)
            ->andWhere(['Dossiers.bedrijf_id' => $bedrijfId])
            ->all();

        // Haal openstaande taken op, gesorteerd op deadline voor het specifieke bedrijf
        $taken = $this->Taken->find()
            ->matching('Dossiers', function($q) use ($bedrijfId) {
                return $q->where(['Dossiers.bedrijf_id' => $bedrijfId]);
            })
            ->where(['Taken.status !=' => 'Afgerond'])
            ->order(['Taken.deadline' => 'ASC'])
            ->limit(5)
            ->all();

        // Haal de laatste 5 logboekvermeldingen op voor het specifieke bedrijf
        $logboek = $this->Logboek->find()
            ->matching('Dossiers', function($q) use ($bedrijfId) {
                return $q->where(['Dossiers.bedrijf_id' => $bedrijfId]);
            })
            ->order(['Logboek.' . $dateColumnLogboek => 'DESC'])
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
            'taken',
            'logboek'
        ));
    }
}
