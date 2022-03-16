<?php declare(strict_types=1);

namespace App\tests;

use PHPUnit\Framework\TestCase;

class InitialTest extends TestCase
{
    /**
     * @test
     */
    public function initialTest()
    {
        self::assertSame(1,1);
    }

}
