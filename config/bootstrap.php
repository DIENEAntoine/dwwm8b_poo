<?php

    // Chargement de l'autoloader de composer
    require __DIR__ ."/../vendor/autoload.php";

    // Chargement des compiosants
    require __DIR__ . "/constants.php";

    // Chargement des variables d'environnement
    $dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__));
    $dotenv->load();

    // Chargement du conteneur de dépendances
    $container = require __DIR__ . "/di/container.php";

