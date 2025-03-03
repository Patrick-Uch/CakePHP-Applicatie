<?php
declare(strict_types=1);

namespace App\Controller;

class DossiersController extends AppController
{
    public function initialize(): void
    {
        parent::initialize();
        $this->viewBuilder()->setLayout('dashboard'); // Use dashboard layout
    }

    public function index()
    {
        $this->set('title', 'Dossiers Page');
    }
}

