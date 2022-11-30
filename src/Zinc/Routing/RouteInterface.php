<?php
namespace App\Zinc\Routing;

    interface RouteInterface
    {
        /**
         * Cette méthode retourne l'url de la route
         * dont l'application attend la récéption
         *
         * @return string
         */
        public function getPath() : string;

        /**
         * Cette méthode retourne le noml de la route
         * dont l'application attend la récéption
         *
         * @return string
         */
        public function getName() : string;

        /**
         * Cette méthode retourne la liste des méthods avec 
         * les quelles on peut accéder à la route
         *
         * @return string
         */
        public function getMethods() : string;
    }