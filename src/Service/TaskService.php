<?php

declare(strict_types=1);

namespace App\Service;

use App\Entity\DisplayType;
use App\Entity\Option;
use App\Entity\Question;
use Symfony\Component\HttpFoundation\Request;

/**
 * @see \App\Tests\Service\TaskServiceTest
 */
class TaskService
{
    public function compareString(Option $option, string $answer): bool
    {
        return $option->getText() === $answer;
    }

    public function compareCheckbox(array $correctAnswers, array $chosenAnswers): bool
    {
        return $correctAnswers === $chosenAnswers;
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

    /**
     * todo: replace this method with real queries from the database.
     */
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
            if ($i === 1 || $i === 3) {
                $option->setSolution(true);
            }
            $question->addOption($option);
        }

        return $question;
    }

    // todo ersetzen durch Datenbankabfrage für
    // select text from Option where question_id = $id and solution = true
    public function getCorrectAnswers(int $id): array
    {
        $correctAnswers = [];
        $options = $this->mockCheckboxQuestion()->getOptions();
        /**
         * @var Option $option
         */
        foreach ($options as $option) {
            if ($option->getSolution()) {
                $correctAnswers[] = $option->getText();
            }
        }

        return $correctAnswers;
    }

    public function getAnswers(Request $request): array
    {
        /**
         * @var array $answers
         */
        $answers = $request->request->get('options', null);

        if (empty($answers)) {
            $answers = [];
        }

        return array_keys($answers);
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
