<?php
// src/Controller/ProgramController.php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class ProgramController
 * @package App\Controller
 * @Route("/programs", name="program_")
 */
class ProgramController extends AbstractController
{
    /**
     * @Route("/", name="index")
     * @return Response
     */
    public function index(): Response
    {
        return $this->render('program/index.html.twig', [
            'website' => 'Wild Series',
        ]);
    }

    /**
     * @Route("/{id}/", name="show", methods={"GET"}, requirements={"id"="\d+"})
     * @return Response
     */
    public function show(int $id): Response
    {
        return $this->render('program/show.html.twig', [
           'program_id' => $id,
        ]);
    }
}
