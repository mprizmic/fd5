<?php

namespace App\Controller;

use App\Model\ConstantesGenerales;
use App\Repository\AvisoRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/default")
 */
class DefaultController extends AbstractController {

    /**
     * @Route("/", name="default")
     */
    public function index(): Response {
        return $this->render('default/index.html.twig', [
                    'controller_name' => 'DefaultController',
        ]);
    }

    /**
     * @Route("/portada",  name="portada")
     */
    public function portada() {
        return $this->render('default/portada.html.twig');
        //return $this->redirect($this->generateUrl(''));
    }

    /**
     * @Route("/acerca_de", name="acerca_de")
     */
    public function acerca_de(ConstantesGenerales $constantesGenerales) {
        
        return $this->render('default/acerca_de.html.twig',
                [
                    'NOMBRE'=>$constantesGenerales::APP_NAME,
                    'NOMBRE_CORTO'=>$constantesGenerales::NOMBRE_CORTO,
                    'VERSION_DOCTRINE'=>$constantesGenerales::VERSION_DOCTRINE,
                    'VERSION_SYMFONY'=>$constantesGenerales::VERSION_SYMFONY,
                    'VERSION_LOGICA'=>$constantesGenerales::VERSION_LOGICA
                ]);
    }

    /**
     * @Route("/contacto", name="contacto")
     */
    public function contacto() {
        return $this->render('default/contacto.html.twig');
    }

    /**
     * avisos de los avances del sistema o de la carga pendiente
     * 
     * @Route("/avisos", name="avisos")
     */
    public function avisos(AvisoRepository $aviso_repository) {
        $avisos = $aviso_repository->findAll(array('activo' => true), array('fecha' => 'desc'));

        if (count($avisos) > 0) {
            return $this->render('default/avisos.html.twig', array(
                        'avisos' => $avisos,
            ));
        } else {
            return $this->redirect($this->generateUrl('portada'));
        }
    }

}
