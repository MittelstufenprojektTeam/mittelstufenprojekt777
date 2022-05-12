<?php

declare(strict_types=1);

namespace App\Tests\Service;

use App\Entity\Option;
use App\Service\TaskService;
use PHPUnit\Framework\TestCase;
use Symfony\Component\HttpFoundation\Request;

class TaskServiceTest extends TestCase
{
    private TaskService $taskService;

    protected function setUp(): void
    {
        $this->taskService = new TaskService();
    }

    /**
     * @test
     */
    public function compareStringShouldReturnTrueOnSameString(): void
    {
        $option = new Option();
        $option->setText('test');

        self::assertTrue($this->taskService->compareString($option, 'test'));
    }

    /**
     * @test
     */
    public function compareStringShouldReturnFalseOnDifferentString(): void
    {
        $option = new Option();
        $option->setText('test');

        self::assertFalse($this->taskService->compareString($option, 'abc'));
    }

    /**
     * @test
     */
    public function compareCheckboxShouldReturnTrueOnSameSelection(): void
    {

        self::assertTrue($this->taskService->compareCheckbox(
            ['testOption1', 'testOption3'],
            ['testOption1', 'testOption3']
        ));
    }

    /**
     * @test
     */
    public function compareCheckboxShouldReturnFalseOnDifferentSelection(): void
    {
        self::assertFalse($this->taskService->compareCheckbox(
            ['testOption1', 'testOption2'],
            ['testOption1', 'testOption3']
        ));
    }

    /**
     * @test
     */
    public function getAnswersShouldReturnGivenAnswersFromRequest(): void
    {
        $request = new Request();
        $request->request->add(['options' =>
            [
                "testOption1" => "on",
                "testOption2" => "on"
            ]
        ]);

        $answers = [
            'testOption1',
            'testOption2'
        ];

        self::assertSame($answers, $this->taskService->getAnswers($request));
    }

    /**
     * @test
     */
    public function getAnswersShouldReturnEmptyArrayOnNoAnswers(): void
    {
        $request = new Request();

        $answers = [];

        self::assertSame($answers, $this->taskService->getAnswers($request));
    }
}