<?php

namespace Tests\Unit;

use App\Exceptions\PreconditionException;
use App\Services\CalculatePointService;
use PHPUnit\Framework\TestCase;

class CalculatePointServiceTest extends TestCase
{
    public function dataProvider_for_calcPoint()
    {
        return [
            '購入金額が０なら０ポイント' => [0, 0],
            '購入金額が９９９なら０ポイント' => [0, 999],
            '購入金額が１０００なら１０ポイント' => [10, 1000],
            '購入金額が９９９９なら９９ポイント' => [99, 9999],
            '購入金額が１００００なら２００ポイント' => [200, 10000],
        ];
    }

    /**
     * @test
     * @dataProvider dataProvider_for_calcPoint
     */
    public function calcPoint(int $exptected, int $amount)
    {
        $result = CalculatePointService::calcPoint($amount);
        $this->assertSame($exptected, $result);
    }

    /**
     * @test
     */
    public function exception_try_catch()
    {
        try {
            throw new \InvalidArgumentException('message', 200);
            $this->fail();
        } catch (\Throwable $e) {
            $this->assertInstanceOf(\InvalidArgumentException::class, $e);
            $this->assertSame(200, $e->getCode());
            $this->assertSame('message', $e->getMessage());
        }
    }

    /**
     * @test
     */
    public function execption_expectException_method()
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionCode(200);
        $this->expectExceptionMessage('message');

        throw new \InvalidArgumentException('message', 200);
    }

    public function calcPoint_購入金額がマイナスなら例外をスロー()
    {
        $this->expectException(PreconditionException::class);
        $this->expectExceptionMessage('購入金額が負の数');

        CalculatePointService::calcPoint(-1);
    }
}
