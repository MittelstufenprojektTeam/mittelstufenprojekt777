<?php

declare(strict_types = 1);

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function homepage(): Response
    {
        return $this->render('home/home.html.twig', []);
    }

    /**
     * @Route("/feedback", name="feedback")
     */
    public function feedback(): Response
    {
        return $this->render('home/feedback.html.twig', []);
    }
}
