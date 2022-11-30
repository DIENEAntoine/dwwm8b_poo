<?php
namespace App\Zinc\Routing;

use App\Zinc\Routing\RouterInterface;

    #[\Attribute(\Attribute::TARGET_METHOD)]
    class Route implements RouteInterface
    {

        /**
         * Cette méthode représente l'url de la route
         *
         * @var string
         */
        private string $path;

        /**
         * Cette méthode représente la liste des méthodes autorisée pour accèder à la route
         *
         * @var string
         */
        private string $name;

        /**
         * Cette méthode représente l'url de la route
         *
         * @var string
         */
        private array $methods = [];


        public function __construct(string $path, string $name, array $methods = ['GET'])
        {
            $this->path   = $path;
            $this->name   = $name;
            $this->methods = $methods;
        }

        /**
         * Cette méthode retourne l'url de la route
         * dont l'application attend la récéption
         *
         * @return string
         */
        public function getPath() : string
        {
            return $this->path;
        }

        /**
         * Cette méthode retourne le noml de la route
         * dont l'application attend la récéption
         *
         * @return string
         */
        public function getName() : string
        {
            return $this->name;
        }

        /**
         * Cette méthode retourne la liste des méthods avec 
         * les quelles on peut accéder à la route
         *
         * @return string
         */
        public function getMethods() : string
        {
            return $this->methods;
        }
    }