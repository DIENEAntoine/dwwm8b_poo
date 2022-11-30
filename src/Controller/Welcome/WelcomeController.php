<?php
declare(strict_types=1);

namespace App\Controller\Welcome;

use App\Zinc\Routing\Route;
use Symfony\Component\HttpFoundation\Response;

    class WelcomeController
    {
        #[Route('/', name:"welcome.index", methods: ['GET'])]
        public function index() : Response
        {
            dd('Welcome');
        }

        #[Route('/edit/{id}', name:"edit", methods: ['GET'])]
        public function edit() : Response
        {
            dd('edit');
        }

        #[Route('/hello', name:"welcome.hello", methods: ['GET'])]
        public function hello() : Response
        {
            dd('Hello');
        }
    }