<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/exam", name="exam_")
 */
class ExamController extends AbstractController
{
    /**
     * @Route("/", name="index")
     */
    public function exam(): Response
    {
        return $this->render('exam/index.html.twig', []);
    }
}