<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController {

    /**
     * @Route("/default", name="default")
     */
    public function index(): Response {
        return $this->render('default/index.html.twig', [
                    'controller_name' => 'DefaultController',
        ]);
    }

    /**
     * @Route("/",  name="portada")
     */
    public function portada() {
        return $this->render( 'default/portada.html.twig');
        //return $this->redirect($this->generateUrl('incidente_index'));
    }

}
