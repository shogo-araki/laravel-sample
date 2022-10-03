<?php

namespace App\Services;

use Carbon\CarbonImmutable;
use Illuminate\Database\Connection;
use Illuminate\Support\LazyCollection;

final class ExportOrderService
{
    private $connection;

    public function __construct(Connection $connection)
    {
        $this->connection = $connection;
    }

    public function findOrders(CarbonImmutable $date):LazyCollection{
        return $this->connection
            ->table('order_details')
            ->join('order_details', 'orders.order_code', '=', 'order_details.order_code')
            ->select([
                'orders.order_code',
                'orders.order_date',
                'orders.total_price',
            ])
            ->where('order_date', '>=', $date->toDateString())
            ->where('order_date','<', $date->addDay()->toDateString())
            ->orderby('orders.order_date')
            ->orderBy('orders.order_code')
            ->orderBy('order_details.detail_no')
            ->cursor();
    }
}
