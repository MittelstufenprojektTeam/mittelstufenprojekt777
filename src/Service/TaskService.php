<?php

declare(strict_types=1);

namespace App\Service;

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

    public function mockRadioQuestion(): array
    {
        $question1 = new Question();
        $question2 = new Question();
        $question1 = $question1->setPhrase('welche dieser farben ist grün?');
        $question2 = $question2->setPhrase('welche dieser farben ist blau?');


        $option1 = new Option();
        $option2 = new Option();
        $option3 = new Option();
        $option4 = new Option();
        $option1->setText('blau');
        $option2->setText('grau');
        $option3->setText('4');
        $option4->setText('grün');

        $question1->addOption($option1);
        $question1->addOption($option2);
        $question1->addOption($option3);
        $question1->addOption($option4);
        $question2->addOption($option1);
        $question2->addOption($option3);


        return [$question1, $question2];
    }

    public function checkRadioButton(Option $options, null|Option $answer): bool
    {
        return $answer?->getId() === 1;

//        return $options->getId() === $answer?->getId(); //this is for the check
    }

    public function getUserAnswerOption(int $id, Question $question): null|Option
    {

        $answerOption = null;
        foreach ($question->getOptions() as $option) {
            if ($option->getId() === $id) {
                $answerOption = $option;
                break;
            }
        }

        return $answerOption;
    }
}
