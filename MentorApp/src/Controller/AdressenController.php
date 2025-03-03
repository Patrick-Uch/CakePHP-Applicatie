<?php
declare(strict_types=1);

namespace App\Controller;

class AdressenController extends AppController
{
    public function initialize(): void
    {
        parent::initialize();
        $this->viewBuilder()->setLayout('dashboard'); // Use dashboard layout
    }

    public function index()
    {
        $this->set('title', 'Adressen Page');
    }
}
