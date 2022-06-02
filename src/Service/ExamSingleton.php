<?php declare(strict_types=1);

namespace App\Service;

use App\Entity\Question;
use App\Repository\QuestionRepository;
use App\Utility\Utility;
use Exception;

class ExamSingleton
{
    private static ?ExamSingleton $instance = null;

    /**
     * @var Question[]
     */
    private array $questions;
    private int $currentQuestion;
    private QuestionRepository $questionRepository;

    private function __construct()
    {
    }

    private function __clone()
    {
    }

    /**
     * @throws \Exception
     */
    public function __wakeup()
    {
        throw new Exception("Cannot unserialize a singleton.");
    }

    public static function getInstance(): ExamSingleton
    {
        if (static::$instance === null) {
            static::$instance = new static();
        }

        return static::$instance;
    }

    public function getQuestion(): Question
    {
        return $this->questions[$this->currentQuestion];
    }

    public function getFirstQuestion(): Question
    {
        $this->currentQuestion = 0;
        $this->questions = $this->questionRepository->getQuestionsForExam(Utility::AMOUNT_EXAM_QUESTIONS);
        return $this->getQuestion();
    }

    public function getNextQuestion()
    {
        $this->currentQuestion++;

        return $this->getQuestion();
    }

    public function getPrevQuestion()
    {
        $this->currentQuestion--;

        return $this->getQuestion();
    }

}