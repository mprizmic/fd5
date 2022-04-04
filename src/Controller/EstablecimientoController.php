<?php

namespace App\Controller;

use App\Entity\Establecimiento;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
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

        // establezco la ruta para la pagina que tenga que volver aca
        $this->get('session')->set('ruta_completa', $request->get('_route'));
        $this->get('session')->set('parametros', $request->get('_route_params'));

        //repositorio de establecimiento

        return $this->render('establecimiento/ficha_establecimiento.html.twig', array(
                    //todos los datos separador por localizacion
                    'establecimiento' => $establecimiento,
                        )
        );
    }

}
