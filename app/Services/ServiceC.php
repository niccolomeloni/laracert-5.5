<?php

namespace App\Services;

use App\Contracts\IServiceC;

class ServiceC implements IServiceC
{
    public function getValue()
    {
        return "value-C";
    }
}