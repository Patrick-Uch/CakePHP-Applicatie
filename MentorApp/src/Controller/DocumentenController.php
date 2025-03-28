<?php
declare(strict_types=1);

namespace App\Controller;

class DocumentenController extends AppController
{
    public function initialize(): void
    {
        parent::initialize();
        $this->viewBuilder()->setLayout('dashboard'); // gebruik dashboard layout
    }

    public function index()
    {
        // $ = $this->paginate($query);

        $this->set('title', 'Documenten Page');
    }
}