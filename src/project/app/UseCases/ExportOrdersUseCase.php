<?php

namespace App\UseCases;

use App\Console\Commands\ExportOrdersCommand;
use App\Services\ExportOrderService;
use Carbon\CarbonImmutable;
use Carbon\CarbonInterface;

final class ExportOrdersUseCase
{
    public function __construct(ExportOrderService $service)
    {
        $this->service = $service;
    }

    public function run(CarbonInterface $targetDate): string
    {
        $orders = $this->service->findOrders($targetDate);
        $tsv = collect();
        $tsv->push($this->title());
        foreach ($orders as $order) {
            $tsv->push([
                $order->order_code,
                // etc...
            ]);
        }

        return $tsv->map(
            function (array $values) {
                return implode('\t', $values);
            }
        )->implode('\n') . "\n";
    }

    public function title():array{
        return [
            '購入コード',
            '購入日時',
            // etc...
        ];
    }
}
