<?php

declare(strict_types = 1);

namespace App\Service;

use App\Entity\Question;
use App\Entity\Task;
use App\Entity\User;
use App\Repository\QuestionRepository;
use App\Repository\TaskRepository;
use App\Utility\Utility;
use Exception;
use Symfony\Component\Security\Core\User\UserInterface;

class ExamService
{
    public function __construct(
        private QuestionRepository $questionRepository,
        private TaskRepository $taskRepository,
    ) {
    }

    public function getQuestion(int $position, User $user): Question|null
    {
        return $this->taskRepository->findOneBy([
            'user' => $user,
            'position' => $position,
        ])?->getQuestion();
    }

    public function create(User|UserInterface $user): void
    {
        $currentQuestion = 0;
        $questions = $this->questionRepository->getQuestionsForExam(Utility::AMOUNT_EXAM_QUESTIONS);
        foreach ($questions as $position => $question) {
            $task = new Task();
            $task->setPosition($currentQuestion);
            $task->setQuestion($question);
            $task->setUser($user);
            $task->setPosition($position);
            try {
                $this->taskRepository->add($task);
            } catch (Exception) {
            }
        }
    }

    public function getPoints(): int
    {
        return 5;
    }

    public function getPossiblePoints(): int
    {
        return 5;
    }

    public function calculatePercent(int $userPoints, int $possiblePoints): float
    {
        $result = ($userPoints / $possiblePoints) * 100;

        return round($result);
    }
}
