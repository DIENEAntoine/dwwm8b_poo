<?php
declare(strict_types=1);

namespace App\Zinc\Routing;


use App\Zinc\Routing\Route;
use App\Zinc\Routing\RouterInterface;
use Symfony\Component\HttpFoundation\Request;

    class Router implements RouterInterface
    {

        /**
         * Cette propriété représente la repquête injecté dans le routeur
         *
         * @var Request
         */
        private Request $request;

        /**
         * Cette propriété représente le tableau des routes (armoires)
         *
         * @var array
         */
        private array $routes = [];

        /**
         * Cette propriété represente la liste des paramétres extraits de l'uri de l'url
         *
         * @var array
         */
        private array $parameters = [];

        public function __construct(Request $request, array $controllers) 
        {
            $this->request = $request;
            $this->addRoutes($controllers);
        }

        /**
         * Cette methode permet de 
         *      - Récuperer les controlleurs,
         *      - En extraire les routes
         *      - Stocker dans le tableau à routes (armoire)
         *
         * @param array $controllers
         * @return void
         */
        public function addRoutes(array $controllers) : void
        {
            
            foreach ($controllers as $controller) 
            {
                $reflectionController = new \ReflectionClass($controller);

                foreach ($reflectionController->getMethods() as $reflectionMethod) 
                {
                    $routeAttributes = $reflectionMethod->getAttributes(Route::class);
                    
                    foreach ($routeAttributes as $routeAttribute) 
                    {
                        $route = $routeAttribute->newInstance();
                        
                        $this->routes[$route->getName()] = [
                            "class"  => $reflectionMethod->class,
                            "method" => $reflectionMethod->name,
                            'route'  => $route
                        ];
                    }
                }
            }
        }


        /**
         * Cette methode du routeyr lui permet :
         *      - De s'executer
         *      - Et de retourner la réponse coresspondante qui peut être 
         *          - Un tableau dan,s le cas ou les routes match
         *          - Null dans le cas ou aucune routes n'a macthé
         *
         * @return array|null
         */ 
        public function run() : ?array
        {
            foreach ($this->routes as $route) 
            {
                // dd($route);

                if ( $this->match($this->request->server->get('REQUEST_URI'), $route['route']->getPath()) ) 
                {
                    if ( isset($this->parameters) && !empty($this->parameters) )
                    {
                        return [
                            "route" => $route,
                            "parameters" => $this->parameters
                        ];
                    }
                    return [
                        "route" => $route,
                    ];
                }
            }
            return null;
        }


        private function match(string $uri_url, string $uri_route)
        {
            $pattern = preg_replace("#{[a-z]+}#", "([0-9a-zA-Z-_]+)", $uri_route);
            $pattern = "#^$pattern$#";

            if ( preg_match($pattern, $uri_url, $matches) ) 
            {
                array_shift($matches);
                $this->parameters = $matches;
                return true;
            }
            return false;
        }


    }