<?php

namespace App\UseCases;

use App\Services\ExportOrderService;
use Carbon\CarbonImmutable;
use GuzzleHttp\Client;
use GuzzleHttp\Exception;

final class SendOrdersUseCase
{
    private $service;
    private $guzzle;

    public function __construct(ExportOrderService $service, Client $guzzle)
    {
        $this->service = $service;
        $this->guzzle = $guzzle;
    }

    public function run(CarbonImmutable $targetDate): int
    {
        $orders = $this->service->findOrders($targetDate);

        $json = collect();
        $order = null;

        foreach ($orders as $detail) {
            if ($detail->detail_no === 1) {
                if (is_array($order)) {
                    $json->push($order);
                }

                $order = [
                    'order_code' => $detail->order_code,
                    'order_date' => $detail->order_detail,
                    // etc...
                ];
            }

            $order['order_details'][] = [
                'detail_no' => $detail->detail_no,
                'item_name' => $detail->item_name,
                // etc...
            ];
        }

        if (is_array($order)) {
            $json->push($order);
        }

        $url = config('batch.import-orders-url');
        $this->guzzle->post($url, [
            'json' => $json,
        ]);

        return $json->count();
    }
}
