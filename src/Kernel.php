<?php
namespace App;

use App\Trait\ChangeTimeZone;
use App\HttpKernel\HttpKernel;
use Psr\Container\ContainerInterface;

/**
 * ---------------------------------------------------------------------------------------------------- 
 * Kernel
 * 
 * Le noyau
 * 
 * Ses rôles :
 *      - Récupérer les dependences du conteneur
 *      - Demander au routeur de vérifier si l'application attend la visite de la requête du client
 *        c'est à dire, vérifier si la requête de l'uri macth avec l'une des routes dont l'application
 *        attend la réception
 *      - Récupérer la réponse de routeur
 *          - Si la réponse est positive :
 *              - Demander au controller en charge de la requête de générer
 *              - Puis, de lui retourner la réponse correspondante
 *          - Dans le cas contraire,
 *              - Demander au controller chargé de gerer les erreus de s'activer
 *              - Puis, retourner au client la réponse correspondante
 *      - Retourner cette réponse au contrôleur frontal
 * 
 * @version 1.0.0
 * @author Antoine DIENE <diene1antoine@gmail.com>
 * 
 * ---------------------------------------------------------------------------------------------------
 */ 

    class Kernel extends HttpKernel
    {
        use ChangeTimeZone;

        public function __construct(ContainerInterface $container)
        {
            $this->changeTimeZone("Europe/Paris");
            parent::__construct($container);
        }

    }