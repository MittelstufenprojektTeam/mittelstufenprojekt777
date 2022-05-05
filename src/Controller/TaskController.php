<?php

declare(strict_types=1);

namespace App\Controller;

use App\Entity\Option;
use App\Entity\Question;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TaskController extends AbstractController
{
    /**
     * @Route("/string/result/{id}", name="string_comparison_result")
     */
    public function stringComparisonResult(int|string $id, Request $request): Response
    {
        $questions = $this->mockQuestions();
        $option = $questions[$id]->getOptions()[0];

        $answer = $request->request->get('answer', '');

        return $this->render('result.html.twig',
            [
                'template' => 'string-comparison',
                'params' => [
                    'isCorrect' => $this->compareString($option, $answer),
                    'answer' => $option->getText(),
                    'userAnswer' => $answer
                ]
            ]
        );
    }

    /**
     * @Route("/string/question/{id}", name="string_comparison")
     */
    public function stringComparison(int $id): Response
    {
        $question1 = new Question();
        $question2 = new Question();
        $question1 = $question1->setPhrase('na wie gehts denn so');
        $question2 = $question2->setPhrase('Hello there');
        $questions = [$question1, $question2];

        return $this->render('tasks.html.twig',
            [
                'template' => 'string-comparison',
                'params' => [
                    'question' => $questions[$id]->getPhrase(),
                    'questionID' => $id,
                ],
            ]
        );
    }

    private function compareString(Option $option, string $answer): bool
    {
        return $option->getText() === $answer;
    }

    private function mockQuestions(): array
    {
        $question1 = new Question();
        $question2 = new Question();
        $question1 = $question1->setPhrase('na wie gehts denn so');
        $question2 = $question2->setPhrase('Hello there');
        $option1 = new Option();
        $option2 = new Option();
        $option1->setText('testOption1');
        $option2->setText('testOption2');
        $question1->addOption($option1);
        $question2->addOption($option2);

        return [$question1, $question2];
    }


}