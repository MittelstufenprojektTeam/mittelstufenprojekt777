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
    private const CONTENT_PARTIAL = 'content_partial';
    private const LF = 'lf';

    /**
     * @Route("/", name="index")
     */
    public function reference(): Response
    {
        return $this->render('reference/index.html.twig', [
            self::CONTENT_PARTIAL => 'home',
            self::LF => -1,
        ]);
    }

    /**
     *@Route("/lf1", name="lf1")
     */
    public function lf1(): Response
    {
        return $this->render('reference/index.html.twig', [
            self::CONTENT_PARTIAL => 'lf1',
            self::LF => 1
        ]);
    }

    /**
     *@Route("/lf2", name="lf2")
     */
    public function lf2(): Response
    {
        return $this->render('reference/index.html.twig', [
            self::CONTENT_PARTIAL => 'lf2',
            self::LF => 2
        ]);
    }

    /**
     *@Route("/lf3", name="lf3")
     */
    public function lf3(): Response
    {
        return $this->render('reference/index.html.twig',  [
            self::CONTENT_PARTIAL => 'lf3',
            self::LF => 3
        ]);
    }

    /**
     *@Route("/lf4", name="lf4")
     */
    public function lf4(): Response
    {
        return $this->render('reference/index.html.twig',  [
            self::CONTENT_PARTIAL => 'lf4',
            self::LF => 4
        ]);
    }

    /**
     *@Route("/lf5", name="lf5")
     */
    public function lf5(): Response
    {
        return $this->render('reference/index.html.twig',  [
            self::CONTENT_PARTIAL => 'lf5',
            self::LF => 5
        ]);
    }

    /**
     *@Route("/politik", name="politik")
     */
    public function politik(): Response
    {
        return $this->render('reference/index.html.twig',  [
            self::CONTENT_PARTIAL => 'politik',
            self::LF => -2
        ]);
    }
}
