<?php
declare(strict_types=1);

namespace App\Zinc\AbstractController;

use App\Zinc\HttpKernel\HttpKernel;
use Symfony\Component\HttpFoundation\Response;

    abstract class AbstractController
    {

        private $container;


        public function __construct()
        {
            $this->container = HttpKernel::getKernel()->getContainer();
            
        }

        public function render(string $view_path, array $parameters = []) : Response
        {
            $content = $this->renderView($view_path, $parameters);

            $response = new Response(
                $content ,
                Response::HTTP_OK,
                ['content-type' => 'text/html']
            );

            return $response;
        }

        /**
         * Cette methode permet de générer le contenu de la page extraite de la vue
         * et qui sera affichée au format html
         *
         * @param string $view_path
         * @param array $parameters
         * @return void
         */
        public function renderView(string $view_path, array $parameters = []) : string
        {
            $twig = $this->container->get('twig');
            $content = $twig->render($view_path, $parameters);
            return $content;
        }
    }
