<?php

declare(strict_types=1);

namespace App\Tests\Service;

use App\Entity\Option;
use App\Service\TaskService;
use PHPUnit\Framework\TestCase;

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
}