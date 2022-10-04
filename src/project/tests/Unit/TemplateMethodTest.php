<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

class TemplateMethodTest extends TestCase
{
    /**
     * @test
     */
    public static function setUpBeforeClass(): void
    {
        parent::setUpBeforeClass();
        echo __METHOD__, PHP_EOL;
    }

    /**
     * @test
     */
    protected function setUp(): void
    {
        parent::setUp();
        echo __METHOD__, PHP_EOL;
    }

    /**
     * @test
     */
    protected function テストメソッド１(): void
    {
        echo __METHOD__, PHP_EOL;
        $this->assertTrue(true);
    }

    /**
     * @test
     */
    protected function テストメソッド２(): void
    {
        echo __METHOD__, PHP_EOL;
        $this->assertTrue(true);
    }

    /**
     * @test
     */
    protected function tearDown(): void
    {
        parent::tearDown();
        echo __METHOD__, PHP_EOL;
    }

    /**
     * @test
     */
    public static function tearDownAfterClass(): void
    {
        parent::tearDownAfterClass();
        echo __METHOD__, PHP_EOL;
    }
}
