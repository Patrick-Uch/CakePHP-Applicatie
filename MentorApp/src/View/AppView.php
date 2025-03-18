<?php
declare(strict_types=1);

/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link      https://cakephp.org CakePHP(tm) Project
 * @since     3.0.0
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 */
namespace App\View;

use Cake\View\View;

/**
 * Application View
 *
 * Your application's default view class
 *
 * @link https://book.cakephp.org/5/en/views.html#the-app-view
 */
class AppView extends View
{
    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like adding helpers.
     *
     * e.g. `$this->addHelper('Html');`
     *
     * @return void
     */
    public function initialize(): void
    {
        parent::initialize();
    
        $this->loadHelper('Paginator', [
            'templates' => [
                'nextActive' => '<a href="{{url}}" class="px-4 py-2 rounded-lg border border-gray-300 text-gray-600 bg-white hover:bg-gray-200 transition">{{text}}</a>',
                'nextDisabled' => '<span class="px-4 py-2 rounded-lg border border-gray-300 text-gray-400 bg-gray-100 cursor-not-allowed opacity-50">{{text}}</span>',
                'prevActive' => '<a href="{{url}}" class="px-4 py-2 rounded-lg border border-gray-300 text-gray-600 bg-white hover:bg-gray-200 transition">{{text}}</a>',
                'prevDisabled' => '<span class="px-4 py-2 rounded-lg border border-gray-300 text-gray-400 bg-gray-100 cursor-not-allowed opacity-50">{{text}}</span>',
            ]
        ]);
    }
    
}
