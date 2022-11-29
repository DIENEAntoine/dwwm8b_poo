<?php

    /**
     * ----------------------------------------------------------------------
     * Le contrôleur frontal
     * 
     * Ses rôles :
     *      - Réaliser le "Bootstrapping" de l'application
     *          - Chargement de l'autoloader de composer
     *          - Chargement des constantes
     *          - Chargement des variables d'environnement
     *          - Chargement du conteneur de dépendances
     *          - Creer une nouvelle instance du noyeau (Kernel)
     *          - En lui passant le conteneur en paramétres
     *          - Demander au noyau de soumettre la requête du client au système
     *          - Récuperer la reponse correspondante
     *          - Envoyer cette réponse au client
     * ------------------------------------------------------------------------
     */

     // bootstarpping de l'application
     require __DIR__ . "/../config/bootstrap.php";



    dd($_ENV); 