<?php

declare(strict_types=1);

namespace App\Service;

use App\Entity\Option;
use App\Entity\User;
use App\Repository\TaskRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @see \App\Tests\Service\TaskServiceTest
 */
class TaskService
{
    public function __construct(
        private TaskRepository $taskRepository,
    )
    {
    }

    public function compareString(Option $option, string $answer): bool
    {
        return $option->getText() === $answer;
    }

    public function compareCheckbox(array $correctAnswers, array $chosenAnswers): bool
    {
        $array = array_map(static function ($option): ?string {
            /* @var Option $option */
            return $option->getText();
        }, $correctAnswers);
        sort($array);
        sort($chosenAnswers);

        return $array === $chosenAnswers;
    }

    public function getCorrectAnswers(array $options): array
    {
        $correctAnswers = array_filter($options, static function ($option): ?bool {
            /* @var Option $option */
            return $option->getSolution();
        });

        return array_values($correctAnswers);
    }

    public function getAnswers(Request $request): array
    {
        /**
         * @var array $answers
         */
        $answers = $request->request->get('options');

        if (empty($answers)) {
            $answers = [];
        }

        return array_keys($answers);
    }

    public function checkRadioButtonByText(null|Option $userAnswer): bool
    {
        return $userAnswer && $userAnswer->getSolution();
    }

    /** @param Option[] $options */
    public function getCorrectRadioAnswer(array $options): null|Option
    {
        $solution = null;
        foreach ($options as $option) {
            if ($option->getSolution()) {
                $solution = $option;
                break;
            }
        }

        return $solution;
    }

    public function getUserRadioAnswerByText(array $options, Request $request): ?Option
    {
        $userAnswer = null;
        $answer = $request->get('answer', '');
        if (!$answer) {
            return null;
        }

        /** @var Option $option */
        foreach ($options as $option) {
            if ($option->getText() === $answer) {
                $userAnswer = $option;
                break;
            }
        }

        return $userAnswer;
    }

    public function savePoints(int $points, int $taskPosition, User|UserInterface $user): void
    {
        $this->taskRepository->savePoints($points, $taskPosition, $user);
    }
}
