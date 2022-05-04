<?php

namespace App\Controller;

use App\Entity\EstablecimientoEdificio;
use App\Repository\EstablecimientoEdificioRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/ee")
 */
class EstablecimientoEdificioController extends AbstractController {

    /**
     * @Route("/establecimiento/edificio", name="establecimiento_edificio")
     */
    public function index(): Response {
        return $this->render('establecimiento_edificio/index.html.twig', [
                    'controller_name' => 'EstablecimientoEdificioController',
        ]);
    }

    /**
     * Para un establecimeinto_edificio muestra los turnos en que se imparte cada nivel
     * 
     * @Route("/niveles_turnos/{establecimiento_edificio}", name="niveles_turnos")
     */
    public function niveles_turnos(EstablecimientoEdificio $establecimiento_edificio, EstablecimientoEdificioRepository $repository) {
        $niveles = array();

        foreach ($establecimiento_edificio->getLocalizaciones() as $localizacion) {
            $nivel = $localizacion->getUnidadEducativa()->getNivel();
            $turnos = $repository->findTurnosNivel($establecimiento_edificio, $nivel);
            $turnosArray = $turnos;
        }
        $niveles[] = array($nivel->getId(), $turnosArray);

        return $this->render('plantilla', array(
                    'niveles' => $niveles));
    }

}
