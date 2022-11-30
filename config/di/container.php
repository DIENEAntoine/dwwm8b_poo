<?php

    $builder = new DI\ContainerBuilder();
    $builder->addDefinitions(__DIR__ . "/dependencies.php");
    $container = $builder->build();

    return $container;