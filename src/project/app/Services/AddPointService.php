<?php

namespace App\Services;

use App\Models\EloquentCustomerPoint;
use App\Models\EloquentCustomerPointEvent;
use App\Models\PointEvent;

final class AddPointService
{
    private $eloquentCustomerPointEvent;
    private $eloquentCustomerPoint;
    private $db;

    public function __construct(
        EloquentCustomerPointEvent $eloquentCustomerPointEvent,
        EloquentCustomerPoint $eloquentCustomerPoint
    ) {
        $this->eloquentCustomerPointEvent = $eloquentCustomerPointEvent;
        $this->eloquentCustomerPoint = $eloquentCustomerPoint;
        $this->db = $eloquentCustomerPointEvent->getConnection();
    }

    public function add(PointEvent $event)
    {
        $this->db->transaction(
            function () use ($event) {
                $this->eloquentCustomerPointEvent->register($event);
                $event->eloquentCustomerPoint->getCustomerId();
                $event->getPoint();
            }
        );
    }
}
