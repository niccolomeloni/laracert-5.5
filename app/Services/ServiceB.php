<?php

namespace App\Services;

use App\Contracts\IServiceB;

class ServiceB implements IServiceB
{
    public function getValue()
    {
        return "value-B";
    }
}