<?php

declare(strict_types=1);

namespace App\Service;

use App\Entity\DisplayType;
use App\Entity\Option;
use App\Entity\Question;

/**
 * @see \App\Tests\Service\TaskServiceTest
 */
class TaskService
{
    public function compareString(Option $option, string $answer): bool
    {
        return $option->getText() === $answer;
    }

    /**
     * todo: replace this method with real queries from the database.
     */
    public function mockQuestions(): array
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

        $freeText = new Question();
        $option = new Option();
        $freeText->setPhrase('Das ist ein Freitext: bitte schreibe etwas über Züge');
        $option->setText('züge sind toll');
        $freeText->addOption($option);

        return [$question1, $question2, $freeText];
    }

    public function mockCheckboxQuestion(): Question
    {
        $displayType = new DisplayType();
        $displayType->setTitle('checkbox');

        $question = new Question();
        $question->setDisplayType($displayType);
        $question->setPhrase('dies ist eine checkbox-frage');

        for ($i = 1; $i < 5; $i++) {
            $option = new Option();
            $option->setText('testOption' . $i);
            $question->addOption($option);
        }

        return $question;
    }

    public function compareAnswer(array $options, array $answer):bool
    {
        return count(array_intersect($options, $answer))===count($answer);
    }
}
