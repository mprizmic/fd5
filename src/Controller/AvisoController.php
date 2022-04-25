<?php
/**
 * esto es para hacer una prueba
 */
namespace App\Controller;

use App\Entity\Aviso;
use App\Form\AvisoType;
use App\Repository\AvisoRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/aviso")
 */
class AvisoController extends AbstractController
{
    /**
     * @Route("/", name="aviso_index", methods={"GET"})
     */
    public function index(AvisoRepository $avisoRepository): Response
    {
        return $this->render('aviso/index.html.twig', [
            'avisos' => $avisoRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="aviso_new", methods={"GET", "POST"})
     */
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $aviso = new Aviso();
        $form = $this->createForm(AvisoType::class, $aviso);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($aviso);
            $entityManager->flush();

            return $this->redirectToRoute('aviso_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('aviso/new.html.twig', [
            'aviso' => $aviso,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="aviso_show", methods={"GET"})
     */
    public function show(Aviso $aviso): Response
    {
        return $this->render('aviso/show.html.twig', [
            'aviso' => $aviso,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="aviso_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, Aviso $aviso, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(AvisoType::class, $aviso);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('aviso_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('aviso/edit.html.twig', [
            'aviso' => $aviso,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="aviso_delete", methods={"POST"})
     */
    public function delete(Request $request, Aviso $aviso, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$aviso->getId(), $request->request->get('_token'))) {
            $entityManager->remove($aviso);
            $entityManager->flush();
        }

        return $this->redirectToRoute('aviso_index', [], Response::HTTP_SEE_OTHER);
    }
}
