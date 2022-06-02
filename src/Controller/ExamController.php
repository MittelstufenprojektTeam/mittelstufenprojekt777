<?php

declare(strict_types=1);

namespace App\Controller;

use App\Entity\Question;
use App\Repository\QuestionRepository;
use App\Service\ExamSingleton;
use App\Utility\Utility;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/exam", name="exam_")
 */
class ExamController extends AbstractController
{
    private ExamSingleton $exam;

    public function __construct()
    {
        $this->exam = ExamSingleton::getInstance();
    }

    /**
     * @Route("/", name="index")
     */
    public function exam(): Response
    {
        return $this->render('exam/index.html.twig', [
            'question' => $this->exam->getFirstQuestion(),
        ]);
    }

    /**
     * @Route("/next", name="nextQuestion")
     */
    public function nextQuestion(): Response
    {
        return $this->render('exam/index.html.twig', [
            'question' => $this->exam->getNextQuestion(),
        ]);
    }

    /**
     * @Route("/prev", name="prevQuestion")
     */
    public function previousQuestion(): Response
    {
        return $this->render('exam/index.html.twig', [
            'question' => $this->exam->getPrevQuestion(),
        ]);
    }
}
