<?php
declare(strict_types=1);
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
     *      - Créer une nouvelle instance du noyeau (Kernel)
     *          - En lui passant le conteneur en paramétres
     *      - Demander au noyau de soumettre la requête du client au système
     *      - Récuperer la reponse correspondante
     *      - Envoyer cette réponse au client
     * ------------------------------------------------------------------------
     */
    

    // bootstarpping de l'application
    require __DIR__ . "/../config/bootstrap.php";

    // Créer une nouvelle instance du noyeau (Kernel) en lui passant le conteneur en paramètres
    $kernel = new App\Kernel($container);


    // Demander au noyau de soumettre la requête du client au système
    // Récuperer la reponse correspondante
    $response = $kernel->handleRequest();

    // Le contrôleur frontal envoie la réponse au client
    $response->send();