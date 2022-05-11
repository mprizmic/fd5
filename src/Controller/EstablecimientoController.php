<?php

namespace App\Controller;

use App\Entity\Establecimiento;
use App\Repository\EstablecimientoRepository;
use App\Entity\EstablecimientoEdificio;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/establecimiento")
 */
class EstablecimientoController extends AbstractController {

    /**
     * @Route("/index", name="establecimiento")
     */
    public function index(): Response {
        return $this->render('establecimiento/index.html.twig', [
                    'controller_name' => 'EstablecimientoController',
        ]);
    }

    /**
     * @Route("/ficha/{slug}", name="establecimiento_ficha")
     */
    public function ficha(Establecimiento $establecimiento, Request $request) {

        $turnos_nivel_localizacion = array();
        $nivel = '';

        // establezco la ruta para la pagina que tenga que volver aca
        $this->get('session')->set('ruta_completa', $request->get('_route'));
        $this->get('session')->set('parametros', $request->get('_route_params'));

        return $this->render('establecimiento/ficha_establecimiento.html.twig', array(
                    'establecimiento' => $establecimiento,
        ));
    }

    /**
     * @Route("/tarjeta_establecimiento/{slug}", name="tarjeta_establecimiento")
     */
    public function tarjeta_establecimiento(Establecimiento $establecimiento) {

        return $this->render('establecimiento/tarjeta_establecimiento.html.twig', array(
                    'establecimiento' => $establecimiento,
        ));
    }

    /**
     * @Route("/damero", name="damero")
     */
    public function damero(EstablecimientoRepository $repo) {

        $establecimientos = $repo->findAllOrdenado();

        return $this->render('establecimiento/damero.html.twig', array(
                    'establecimientos' => $establecimientos,
        ));
    }

}
