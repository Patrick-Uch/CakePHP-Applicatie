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
    }
    
    public function beforeFilter($event)
    {
        parent::beforeFilter($event);
        $this->Authentication->allowUnauthenticated(['index']);
    }
    
    public function index()
    {
        $user = $this->Authentication->getIdentity();
        if (!$user) {
            return $this->redirect(['controller' => 'Gebruikers', 'action' => 'login']);
        }
    
        $this->viewBuilder()->setLayout('dashboard'); // gebruik dashboard layout
        $this->set('user', $user);
    }
    
}