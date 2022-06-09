<?php

declare(strict_types=1);

namespace App\Controller;

use App\Entity\Task;
use App\Repository\TaskRepository;
use App\Service\ExamService;
use App\Utility\Utility;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
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
    )
    {
    }

    /**
     * @Route("/task/{taskPosition}", name="index")
     */
    public function exam(int $taskPosition = 0): Response
    {
        /** @var \App\Entity\User|UserInterface $user */
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
     * @Route("/result", name="result")
     */
    public function result(): Response
    {
        $userPoints = $this->exam->getPoints();
        $possiblePoints = $this->exam->getPossiblePoints();

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
