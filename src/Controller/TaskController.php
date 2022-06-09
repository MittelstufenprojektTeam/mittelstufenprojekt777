<?php

declare(strict_types = 1);

namespace App\Controller;

use App\Repository\OptionRepository;
use App\Repository\QuestionRepository;
use App\Service\TaskService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
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
        private OptionRepository $optionRepository,
        private QuestionRepository $questionRepository,
    ) {
    }

    /**
     * @Route("/string/result/{questionId}", name="string_comparison_result")
     */
    public function stringComparisonResult(int|string $questionId, Request $request): Response
    {
        $option = $this->optionRepository->findOneBy(['question' => $questionId]);
        $question = $this->questionRepository->findOneBy(['id' => $questionId]);

        $answer = $request->request->get('answer', '');

        return $this->render(
            'task/result.html.twig',
            [
                'template' => $question->getDisplayType()->getTitle(),
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
        $question = $this->questionRepository->findOneBy(['id' => $questionId]);

        $answer = $request->request->get('answer', '');

        return $this->render(
            'task/result.html.twig',
            [
                'template' => $question->getDisplayType()->getTitle(),
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

        $request->request->get('correctAnswered', 0);

        return new RedirectResponse('/topic');
    }

    /**
     * @Route("/checkbox/result/{questionId}", name="checkbox_result")
     */
    public function checkboxResult(int $questionId, Request $request): Response
    {
        $option = $this->optionRepository->findBy(['question' => $questionId]);
        $question = $this->questionRepository->findOneBy(['id' => $questionId]);

        $answers = $this->taskService->getAnswers($request);
        $correctAnswers = $this->taskService->getCorrectAnswers($option);

        return $this->render(
            'task/result.html.twig',
            [
                'template' => $question->getDisplayType()->getTitle(),
                'params' => [
                    'isCorrect' => $this->taskService->compareCheckbox($correctAnswers, $answers),
                    'correctAnswers' => $correctAnswers,
                    'userSelectionList' => $answers,
                ],
            ]
        );
    }

    /**
     * @Route("/radio/result/{questionId}", name="radio_result")
     */
    public function radioResult(int|string $questionId, Request $request): Response
    {
        $options = $this->optionRepository->findBy(['question' => $questionId]);
        $question = $this->questionRepository->findOneBy(['id' => $questionId]);

        $userSelection = $this->taskService->getUserRadioAnswerByText($options, $request);
        $solution = $this->taskService->getCorrectRadioAnswer($options);

        return $this->render(
            'task/result.html.twig',
            [
                'template' => $question->getDisplayType()->getTitle(),
                'params' => [
                    'isCorrect' => $this->taskService->checkRadioButtonByText($userSelection),
                    'answer' => $solution?->getText(),
                    'userAnswer' => $userSelection?->getText(),
                ],
            ]
        );
    }
}
