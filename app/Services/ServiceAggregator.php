<?php

namespace App\Services;

use App\Contracts\IServiceAggregator;

class ServiceAggregator implements IServiceAggregator
{
    public function getValue()
    {
        return "value-service-aggregator";
    }
}