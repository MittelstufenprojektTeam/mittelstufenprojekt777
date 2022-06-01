<?php

declare(strict_types = 1);

namespace App\Controller;

use App\Repository\OptionRepository;
use App\Service\TaskService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/task", name="task_")
 */
class TaskController extends AbstractController
{
    public function __construct(
        private TaskService $taskService,
        private OptionRepository $optionRepository
    ) {
    }

    /**
     * @Route("/string/result/{questionId}", name="string_comparison_result")
     */
    public function stringComparisonResult(int|string $questionId, Request $request): Response
    {
        $option = $this->optionRepository->findOneBy(['question' => $questionId]);

        $answer = $request->request->get('answer', '');

        return $this->render(
            'exam/result.html.twig',
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
     * @Route("/free-text/result/{questionId}", name="free_text_result")
     */
    public function freeTextResult(int|string $questionId, Request $request): Response
    {
        $option = $this->optionRepository->findOneBy(['question' => $questionId]);

        $answer = $request->request->get('answer', '');

        return $this->render(
            'exam/result.html.twig',
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
     * @Route("/free-text/result/self-rating/{questionId}", name="free_text_result_self_rating")
     */
    public function freeTextResultSelfRating(int|string $questionId, Request $request): Response
    {
        $this->optionRepository->findOneBy(['question' => $questionId]);

        $answer = (bool)$request->request->get('correctAnswered', 0);
        // todo: update the answer (has correct answered the free text y/n)

        // todo: redirect to next Question
        return new JsonResponse(['correctAnswered' => $answer]);
    }

    /**
     * @Route("/checkbox/result/{questionId}", name="checkbox_result")
     */
    public function checkboxResult(int $questionId, Request $request): Response
    {
        $answers = $this->taskService->getAnswers($request);
        $correctAnswers = $this->taskService->getCorrectAnswers($questionId);

        return $this->render(
            'exam/result.html.twig',
            [
                'template' => 'checkbox',
                'params' => [
                    'isCorrect' => $this->taskService->compareCheckbox($correctAnswers, $answers),
                    'correctAnswers' => $correctAnswers,
                ],
            ]
        );
    }

    /**
     * @Route("/radio/result/{id}", name="radio_result")
     */
    public function radioResult(int|string $questionId, Request $request): Response
    {
        $question = $this->taskService->mockRadioQuestion();

        $answer = $request->request->get('answer', '');

        $userSelection = $this->taskService->getUserAnswerByText($question, $answer);
        $solution = $this->taskService->getCorrectRadioAnswer($question);

        return $this->render(
            'exam/result.html.twig',
            [
                'template' => 'radio',
                'params' => [
                    'isCorrect' => $this->taskService->checkRadioButtonByText($solution, $userSelection),
                    'answer' => $solution?->getText(),
                    'userAnswer' => $userSelection?->getText(),
                ],
            ]
        );
    }
}
