<?php

namespace App\Controller;

use App\Model\ConstantesGenerales;
use App\Model\ConstantesSNSD;
use App\Repository\TipoEstablecimientoRepository;
use PHPUnit\Framework\MockObject\Rule\Parameters;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/prueba")
 */
class PruebaController extends AbstractController {

    /**
     * @Route("/api", name="p_api")
     */
    public function api(Request $request) {
        $response = new Response();

        $response->setContent(json_encode(array(
            'clave' => 'valor'
        )));

        $response->headers->set('Content-Type', 'application/json');

        return $response;
    }

    /**
     * @Route("/constantes", name="p_constantes")
     */
    public function constantes(Request $request, ConstantesGenerales $cg, ConstantesSNSD $snsd) {
        $sino_valores = $snsd->getValores();
        $sino_claves = $snsd->getClaves();
        $sino = $snsd->getConstantes();
        $cgrales = ConstantesGenerales::NOMBRE;
        return $this->render('prueba/constantes.html.twig', array(
                    'sino_claves' => $sino_claves,
                    'sino_valores' => $sino_valores,
                    'sino' => $sino,
                    'cgrales' => $cgrales
        ));
    }

    /**
     * @Route("/tostring", name="p_tostring")
     */
    public function aviso(Request $request, TipoEstablecimientoRepository $avisoRepository): Response {
        $avisos = $avisoRepository->findAll();

        if (count($avisos) > 0) {
            return $this->render('prueba/prueba.html.twig', array(
                        'avisos' => $avisos,
            ));
        } else {
            return $this->redirect($this->generateUrl('portada'));
        }
    }

    /**
     * @Route("/bss", name="p_bss")
     */
    public function bss(Request $request): Response {
        $content = $this->renderView('prueba/bss.html.twig');

        return new Response($content);
    }

    /**
     * @Route("/bs", name="p_bs")
     */
    public function bs(Request $request): Response {
        $content = $this->renderView('prueba/bs.html.twig');

        return new Response($content);
    }

    /**
     * @Route("/debu/{nombre}", name="p_debu")
     */
    public function debu(string $nombre = "default_del_controller", Request $request): Response {
        $path_info = $request->getPathInfo();
        $get_uri = $request->getUri();

// estos son los parametros del GET
        $query_string = $request->getQueryString();
//request completo
        $request_uri = $request->getRequestUri();

        $contents = $this->renderView('prueba/debu.html.twig',
                ['nombre' => $nombre,
                    'path_info' => $path_info,
                    'query_string' => $query_string,
                    'request_uri' => $request_uri,
                    'get_uri' => $get_uri,
                ]
        );

        return new Response($contents);
    }

    /**
     * @Route("/renderizado", name="p_renderizado")
     */
    public function renderizado(): Response {
        return $this->render('prueba/renderizado.html.twig', [
                    'controller_name' => 'PruebaController',
        ]);
    }

    /**
     * @Route("/renderizado2/{nombre}", name="p_renderizado2")
     */
    public function renderizado2(string $nombre = 'valor_default_del_controller'): Response {
        return $this->render('prueba/renderizado2.html.twig',
                        ['parametro' => $nombre]
        );
    }

}
