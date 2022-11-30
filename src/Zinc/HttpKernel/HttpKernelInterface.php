<?php
namespace App\Zinc\HttpKernel;

use Symfony\Component\HttpFoundation\Response;

    interface HttpKernelInterface
    {
        /**
         * Cette methode du HttpKernel lui permet de soumettre la requête et de recupepre 
         * la réponse conrrespondante
         *
         * @return Response
         */
        public function handleRequest() : Response;

    }
