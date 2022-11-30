<?php

use App\Zinc\Routing\Router;
use App\Zinc\Routing\RouterInterface;
use App\Controller\Welcome\WelcomeController;
use Symfony\Component\HttpFoundation\Request;

    return [
        // La requête
        Request::class => Request::createFromGlobals(),

        // L'ensemble des controleurs
        'controllers' => [
            "WelcomeController" => WelcomeController::class
        ],

        // Le routeur
        RouterInterface::class => DI\create(Router::class)->constructor(DI\get(Request::class), DI\get('controllers') ),

    ];

    // $router = new Router(Request $request, array $controllers);