<?php

use Twig\Environment;
use App\Zinc\Routing\Router;
use Twig\Loader\FilesystemLoader;
use App\Zinc\Routing\RouterInterface;
use App\Controller\Error\ErrorController;
use App\Controller\Welcome\WelcomeController;
use Symfony\Component\HttpFoundation\Request;

    return [
        // La requête
        Request::class => Request::createFromGlobals(),

        // L'ensemble des controleurs
        'controllers' => [
            "WelcomeController" => WelcomeController::class,
            "ErrorController"   => ErrorController::class,
        ],

        // Le routeur
        RouterInterface::class => DI\create(Router::class)->constructor(DI\get(Request::class), DI\get('controllers') ),

        'twig' => function()
        {
            $loader = new FilesystemLoader(ROOT . "templates/");
            $twig = new Environment($loader, [
                'auto_reload' => ROOT . 'var/cache/dev/twig/',
            ]);
            return $twig;
        }
    ];

    // $router = new Router(Request $request, array $controllers);