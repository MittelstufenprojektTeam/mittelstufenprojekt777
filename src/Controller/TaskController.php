<?php

declare(strict_types = 1);

namespace App\Controller;

use App\Service\TaskService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
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

        return $this->render(
            'result.html.twig',
            [
                'template' => 'string-comparison',
                'params' => [
                    'isCorrect' => $this->taskService->compareString($option, $answer),
                    'answer' => $option->getText(),
                    'userAnswer' => $answer,
                ],
            ]
        );
    }

    /**
     * @Route("/free-text/result/{id}", name="free_text_result")
     */
    public function freeTextResult(int|string $id, Request $request): Response
    {
        $questions = $this->taskService->mockQuestions();
        $option = $questions[$id]->getOptions()[0];

        $answer = $request->request->get('answer', '');

        return $this->render(
            'result.html.twig',
            [
                'template' => 'free-text',
                'params' => [
                    'answer' => $option->getText(),
                    'userAnswer' => $answer,
                ],
            ]
        );
    }

    /**
     * @Route("/free-text/result/self-rating/{id}", name="free_text_result_self_rating")
     */
    public function freeTextResultSelfRating(int|string $id, Request $request): Response
    {
        $questions = $this->taskService->mockQuestions();
        $option = $questions[$id]->getOptions()[0];

        $answer = (bool) $request->request->get('correctAnswered', 0);
        //todo: update the answer (has correct answered the free text y/n)

        //todo: redirect to next Question
        return new JsonResponse(['correctAnswered' => $answer]);
    }
}
