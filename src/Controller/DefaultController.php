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
        return $this->render('default/portada.html.twig');
        //return $this->redirect($this->generateUrl(''));
    }

    /**
     * @Route("/acerca_de", name="acerca_de")
     */
    public function acerca_de() {
        return $this->render('default/acerca_de.html.twig');
    }

    /**
     * @Route("/contacto", name="contacto")
     */
    public function contacto() {
        return $this->render('default/contacto.html.twig');
    }

}
