<?php

declare(strict_types=1);

namespace App\Tests\Service;

use App\Entity\Option;
use App\Service\TaskService;
use PHPUnit\Framework\TestCase;
use Symfony\Component\DependencyInjection\Loader\Configurator\Traits\PropertyTrait;
use Symfony\Component\HttpFoundation\Request;

class TaskServiceTest extends TestCase
{
    use PropertyTrait;

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
        $option1 = new Option();
        $option1->setText('testOption3');
        $option2 = new Option();
        $option2->setText('testOption1');

        self::assertTrue($this->taskService->compareCheckbox(
            [$option1, $option2],
            ['testOption1', 'testOption3']
        ));
    }

    /**
     * @test
     */
    public function compareCheckboxShouldReturnFalseOnDifferentSelection(): void
    {
        $option1 = new Option();
        $option1->setText('testOption2');
        $option2 = new Option();
        $option2->setText('testOption1');

        self::assertFalse($this->taskService->compareCheckbox(
            [$option1, $option2],
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

    /**
     * @test
     */
    public function getCorrectAnswersShouldReturnOnlyOptionsWhichAreASolution(): void
    {
        $option1 = $this->prophesize(Option::class);
        $option1->getSolution()->willReturn(true);

        $option2 = $this->prophesize(Option::class);
        $option2->getSolution()->willReturn(false);

        $option3 = $this->prophesize(Option::class);
        $option3->getSolution()->willReturn(true);


        self::assertEquals(
            [$option1->reveal(), $option3->reveal()],
            $this->taskService->getCorrectAnswers(
                [$option1->reveal(), $option2->reveal(), $option3->reveal()]
            )
        );
    }

    /**
     * @test
     */
    public function checkRadioButtonByTextShouldReturnFalseOnMissingOption(): void
    {
        self::assertFalse($this->taskService->checkRadioButtonByText(null));
    }

    /**
     * @test
     */
    public function checkRadioButtonByTextShouldReturnFalseOnInvalidOption(): void
    {
        $option = $this->prophesize(Option::class);
        $option->getSolution()->willReturn(false);

        self::assertFalse($this->taskService->checkRadioButtonByText($option->reveal()));
    }

    /**
     * @test
     */
    public function checkRadioButtonByTextShouldReturnTrue(): void
    {
        $option = $this->prophesize(Option::class);
        $option->getSolution()->willReturn(true);

        self::assertTrue($this->taskService->checkRadioButtonByText($option->reveal()));
    }

    /**
     * @test
     */
    public function getCorrectRadioAnswerShouldReturnACorrectOption(): void
    {
        $option1 = $this->prophesize(Option::class);
        $option1->getSolution()->willReturn(true);

        $option2 = $this->prophesize(Option::class);
        $option2->getSolution()->willReturn(false);

        $option3 = $this->prophesize(Option::class);
        $option3->getSolution()->willReturn(false);

        self::assertEquals($option1->reveal(), $this->taskService->getCorrectRadioAnswer([$option1->reveal(), $option2->reveal(), $option3->reveal()]));
    }

    /**
     * @test
     */
    public function getCorrectRadioAnswerShouldReturnNullOnMissingSolution(): void
    {
        $option1 = $this->prophesize(Option::class);
        $option1->getSolution()->willReturn(false);

        $option2 = $this->prophesize(Option::class);
        $option2->getSolution()->willReturn(false);

        $option3 = $this->prophesize(Option::class);
        $option3->getSolution()->willReturn(false);

        self::assertEquals(null, $this->taskService->getCorrectRadioAnswer([$option1->reveal(), $option2->reveal(), $option3->reveal()]));
    }

    /**
     * @test
     */
    public function getUserAnswerByTextShouldReturnTheOptionBasedOnTheUserInput(): void
    {
        $request = $this->prophesize(Request::class);
        $request->get('answer', '')->willReturn('text2');

        $option1 = $this->prophesize(Option::class);
        $option1->getText()->willReturn('text1');

        $option2 = $this->prophesize(Option::class);
        $option2->getText()->willReturn('text2');

        $option3 = $this->prophesize(Option::class);
        $option3->getText()->willReturn('text3');

        $options = [$option1->reveal(), $option2->reveal(), $option3->reveal()];


        self::assertEquals($option2->reveal(), $this->taskService->getUserRadioAnswerByText($options, $request->reveal()));
    }

    /**
     * @test
     */
    public function getUserAnswerByTextShouldReturnNullOnMssMatch(): void
    {
        $request = $this->prophesize(Request::class);
        $request->get('answer', '')->willReturn('someText');

        $option1 = $this->prophesize(Option::class);
        $option1->getText()->willReturn('text1');

        $option2 = $this->prophesize(Option::class);
        $option2->getText()->willReturn('text2');

        $option3 = $this->prophesize(Option::class);
        $option3->getText()->willReturn('text3');

        $options = [$option1->reveal(), $option2->reveal(), $option3->reveal()];


        self::assertEquals(null, $this->taskService->getUserRadioAnswerByText($options, $request->reveal()));
    }

    /**
     * @test
     */
    public function getUserAnswerByTextShouldReturnNullOnNoAnswer(): void
    {
        $request = $this->prophesize(Request::class);
        $request->get('answer', '')->willReturn('');

        $option1 = $this->prophesize(Option::class);
        $option1->getText()->willReturn('text1');

        $option2 = $this->prophesize(Option::class);
        $option2->getText()->willReturn('text2');

        $option3 = $this->prophesize(Option::class);
        $option3->getText()->willReturn('text3');

        $options = [$option1->reveal(), $option2->reveal(), $option3->reveal()];


        self::assertEquals(null, $this->taskService->getUserRadioAnswerByText($options, $request->reveal()));
    }
}