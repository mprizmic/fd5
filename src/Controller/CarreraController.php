<?php

namespace App\Controller;

use App\Entity\EstablecimientoEdificio;
use App\Repository\CarreraRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CarreraController extends AbstractController {

    private $carrera_repo;

    public function __construct(CarreraRepository $carrera_repo) {
        $this->carrera_repo = $carrera_repo;
    }

    /**
     * @Route("/carrera", name="carrera")
     */
    public function index(): Response {
        return $this->render('carrera/index.html.twig', [
                    'controller_name' => 'CarreraController',
        ]);
    }

    /*
     * devuelve las carreras de una ubicacion
     */

    public function por_ubicacion(EstablecimientoEdificio $ubicacion) {

        $carreras = $this->carrera_repo->findCarrerasPorUbicacion($ubicacion);

        return $this->render('carrera/carreras.html.twig', array(
                    'carreras' => $carreras,
        ));
    }

}
