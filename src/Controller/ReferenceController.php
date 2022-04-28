<?php

declare(strict_types = 1);

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/reference", name="reference_")
 */
class ReferenceController extends AbstractController
{
    /**
     * @Route("/", name="index")
     */
    public function reference(): Response
    {
        return $this->render('reference/index.html.twig', []);
    }
}
