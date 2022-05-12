<?php

declare(strict_types = 1);

namespace App\Controller;

use App\Service\TaskService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/exam", name="exam_")
 */
class ExamController extends AbstractController
{
    public function __construct(private TaskService $taskService)
    {
    }

    /**
     * @Route("/", name="index")
     */
    public function exam(): Response
    {
//        return $this->render('exam/index.html.twig', [
//            'template' => 'string-comparison',
//            'params' => [
//                'question' => 'test',
//                'questionID' => 1,
//                'path' => 'string_comparison_result'
//            ],
//        ]);
//        return $this->render('exam/index.html.twig', [
//            'template' => 'free-text',
//            'params' => [
//                'question' => 'das ist ein Frei Text, schreibe etwas über Züge',
//                'questionID' => 2,
//                'path' => 'free_text_result',
//            ],
//        ]);
        return $this->render('exam/index.html.twig', [
            'question' => $this->taskService->mockCheckboxQuestion(),
        ]);
    }

    /**
     * @Route("/next", name="nextQuestion")
     */
    public function nextQuestion(): Response
    {
        return $this->render('exam/index.html.twig', []);
    }

    /**
     * @Route("/prev", name="prevQuestion")
     */
    public function previousQuestion(): Response
    {
        return $this->render('exam/index.html.twig', []);
    }
}
