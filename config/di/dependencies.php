<?php

use Symfony\Component\HttpFoundation\Request;

    return [
        // La requête
        Request::class => Request::createFromGlobals(),

        // L'ensemble des controleurs
        'controllers' => [
            // 
        ],

        // Le routeur
        DI\create(Router::class)->constructor(DI\get(Request::class), DI\get('controllers') ),

    ];

    // $router = new Router(Request $request, array $controllers);