<?php
namespace App\Zinc\Routing;


    interface RouterInterface
    {
        /**
         * Cette methode permet de 
         *      - Récuperer les controlleurs,
         *      - En extraire les routes
         *      - Stocker dans le tableau à routes (armoire)
         *
         * @param array $controllers
         * @return void
         */
        public function addRoutes(array $controllers) : void;

        /**
         * Cette methode du routeyr lui permet :
         *      - De s'executer
         *      - Et de retourner la réponse coresspondante qui peut être 
         *          - Un tableau dan,s le cas ou les routes match
         *          - Null dans le cas ou aucune routes n'a macthé
         *
         * @return array|null
         */ 
        public function run() : ?array;
    }