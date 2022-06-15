<?php

declare(strict_types = 1);

namespace App\Controller;

use App\Repository\OptionRepository;
use App\Entity\Task;
use App\Entity\User;
use App\Repository\TaskRepository;
use App\Service\ExamService;
use App\Service\TaskService;
use App\Utility\Utility;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Contracts\Translation\TranslatorInterface;

/**
 * @Route("/exam", name="exam_")
 */
class ExamController extends AbstractController
{
    public function __construct(
        private ExamService         $exam,
        private TranslatorInterface $translator,
        private TaskRepository      $taskRepository,
        private OptionRepository    $optionRepository,
        private TaskService         $taskService,
    )
    {
    }

    /**
     * @Route("/task/{taskPosition}", name="index")
     */
    public function exam(int $taskPosition = 0): Response
    {
        /** @var User|UserInterface $user */
        $user = $this->getUser();

        if ($this->exam->getQuestion(0, $user) === null) {
            $this->exam->create($user);
        }

        if ($taskPosition < 0) {
            $taskPosition = 0;
            $this->addFlash('warning', $this->translator->trans('warning.too.low'));
        } elseif ($taskPosition > Utility::AMOUNT_EXAM_QUESTIONS - 1) {
            $taskPosition = Utility::AMOUNT_EXAM_QUESTIONS - 1;
            $this->addFlash('warning', $this->translator->trans('warning.too.high'));
        }

        return $this->render('exam/index.html.twig', [
            'question' => $this->exam->getQuestion($taskPosition, $user),
            'position' => $taskPosition,
        ]);
    }

    /**
     * @Route("/evaluation/{taskPosition}", name="evaluation")
     */
    public function evaluateTask(int $taskPosition, Request $request): Response
    {

        /** @var \App\Entity\User|UserInterface $user */
        $user = $this->getUser();

        $question = $this->exam->getQuestion($taskPosition, $user);
        $questionId = $question->getId();
//AF00::E255:0:1:332D:81FA
        $points = match ($question->getDisplayType()->getId()) {
            1 => $this->taskService->compareCheckbox($this->optionRepository->getCorrectAnswerByQuestionId($questionId), $this->taskService->getAnswers($request)),
            2 => $this->taskService->compareString($this->optionRepository->findOneBy(['question' => $questionId]), $request->request->get('answer', '')),
//            3 => $this->taskService->
            4 => $this->taskService->checkRadioButtonByText($this->taskService->getUserRadioAnswerByText($this->optionRepository->findBy(['question' => $questionId]), $request)),
            default => false,
        };

        if ($points) {
            $points = 1;
        } else {
            $points = 0;
        }

        $this->taskService->savePoints($points, $taskPosition, $user);

        return $this->redirectToRoute('exam_index', [
            'taskPosition' => $taskPosition + 1
        ]);
    }

    /**
     * @Route("/result", name="result")
     */
    public function result(): Response
    {
        $userPoints = $this->exam->getPoints($this->getUser());
        $possiblePoints = $this->exam->getPossiblePoints($this->getUser());

        return $this->render('exam/result.html.twig', [
            'userPoints' => $userPoints,
            'possiblePoints' => $possiblePoints,
            'percent' => $this->exam->calculatePercent($userPoints, $possiblePoints),
        ]);
    }

    /**
     * @Route("/clear", name="clear")
     */
    public function clear(): Response
    {
        $this->taskRepository->clearExam($this->getUser());

        return $this->forward('App\Controller\HomeController::homepage');
    }
}
