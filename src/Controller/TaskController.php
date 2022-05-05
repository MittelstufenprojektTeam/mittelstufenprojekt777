<?php

declare(strict_types=1);

namespace App\Controller;

use App\Service\TaskService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TaskController extends AbstractController
{
    public function __construct(private TaskService $taskService)
    {
    }

    /**
     * @Route("/string/result/{id}", name="string_comparison_result")
     */
    public function stringComparisonResult(int|string $id, Request $request): Response
    {
        $questions = $this->taskService->mockQuestions();
        $option = $questions[$id]->getOptions()[0];

        $answer = $request->request->get('answer', '');

        return $this->render('result.html.twig',
            [
                'template' => 'string-comparison',
                'params' => [
                    'isCorrect' => $this->taskService->compareString($option, $answer),
                    'answer' => $option->getText(),
                    'userAnswer' => $answer
                ]
            ]
        );
    }
}
