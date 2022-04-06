<?php

namespace App\Controller;

use App\Entity\Edificio;
use App\Entity\EstablecimientoEdificio;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/edificio")
 */
class EdificioController extends AbstractController {

    /**
     * @Route("/vecinos_en_un_edificio/{establecimiento_edificio}", name="vecinos_en_un_edificio")
     */
    public function vecinos_en_un_edificio(EstablecimientoEdificio $establecimiento_edificio, Request $request) {

        // se determina cual es el edificio
        $edificio = $establecimiento_edificio->getEdificio();

        // se buscan los vecinos del edificio
        $vecinos = $edificio->getVecino();

        // se determina el establecimiento
        $establecimiento = $establecimiento_edificio->getEstablecimiento();
        
        return $this->render('/edificio/vecinos_en_un_edificio.html.twig', array(
                    'edificio' => $edificio,
                    'vecinos' => $vecinos,
                    'establecimiento' => $establecimiento,
                    'establecimiento_edificio' => $establecimiento_edificio,
        ));
    }

}
