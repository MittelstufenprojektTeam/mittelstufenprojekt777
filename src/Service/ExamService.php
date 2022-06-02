<?php declare(strict_types=1);

namespace App\Service;

use App\Entity\Question;
use App\Repository\QuestionRepository;
use App\Utility\Utility;

class ExamService
{
    /**
     * @var Question[]
     */
    private array $questions;
    private int $currentQuestion;

    private function __construct(
        private QuestionRepository $questionRepository
    )
    {
        $this->currentQuestion = 0;
        $this->questions = $this->questionRepository->getQuestionsForExam(Utility::AMOUNT_EXAM_QUESTIONS);
    }

    public function getQuestion(): Question
    {
        return $this->questions[$this->currentQuestion];
    }

    public function getFirstQuestion(): Question
    {
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