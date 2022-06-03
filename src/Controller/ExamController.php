<?php

declare(strict_types=1);

namespace App\Controller;

use App\Entity\User;
use App\Service\ExamService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @Route("/exam", name="exam_")
 */
class ExamController extends AbstractController
{
    private User|UserInterface $user;

    public function __construct(
        private ExamService $exam,
    )
    {
    }

    /**
     * @Route("/", name="index")
     */
    public function exam(): Response
    {
        $this->createExam();
        /** @var \App\Entity\User|UserInterface $user */
        $user = $this->getUser();

        return $this->render('exam/index.html.twig', [
            'question' => $this->exam->getQuestion(1, $user),
        ]);
    }

    /**
     * @Route("/next", name="nextQuestion")
     */
    public function nextQuestion(): Response
    {
        /** @var \App\Entity\User|UserInterface $user */
        $user = $this->getUser();

        return $this->render('exam/index.html.twig', [
            'question' => $this->exam->getQuestion(1, $user),
        ]);
    }

    /**
     * @Route("/prev", name="prevQuestion")
     */
    public function previousQuestion(): Response
    {
        /** @var \App\Entity\User|UserInterface $user */
        $user = $this->getUser();

        return $this->render('exam/index.html.twig', [
            'question' => $this->exam->getQuestion(1, $user),
        ]);
    }

    private function createExam(): void
    {
        /** @var \App\Entity\User|UserInterface $user */
        $user = $this->getUser();

        $this->exam->create($user);
    }
}
