<?php

use Cake\Routing\Route\DashedRoute;
use Cake\Routing\RouteBuilder;
use Cake\Routing\Router;

return function (RouteBuilder $routes): void {
    $routes->setRouteClass(DashedRoute::class);

    $routes->scope('/', function (RouteBuilder $builder): void {
        
        // Default Routes
        $builder->connect('/', ['controller' => 'Pages', 'action' => 'display', 'home']);

        // Gebruikers Routes
        $builder->connect('/gebruikers/login', ['controller' => 'Gebruikers', 'action' => 'login']);
        $builder->connect('/gebruikers/register', ['controller' => 'Gebruikers', 'action' => 'register']);
        $builder->connect('/gebruikers/logout', ['controller' => 'Gebruikers', 'action' => 'logout']);

        $builder->connect('/pages/*', 'Pages::display');
        $builder->fallbacks();
    });

    // Adressen Routes
    $routes->connect('/adressen', ['controller' => 'Adressen', 'action' => 'index']);

    // Rapporten Routes
    $routes->connect('/rapporten', ['controller' => 'Rapporten', 'action' => 'index']);

    // Documenten Routes
    $routes->connect('/documenten', ['controller' => 'Documenten', 'action' => 'index']);

    $routes->fallbacks(DashedRoute::class);

    // Profile Routes
    $routes->connect('/profile', ['controller' => 'Profile', 'action' => 'profile']);
    $routes->connect('/profile/settings', ['controller' => 'Profile', 'action' => 'settings']);    
    $routes->connect('/profile/logboek', ['controller' => 'Profile', 'action' => 'logboek']);
};
