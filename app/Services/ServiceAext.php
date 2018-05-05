<?php

namespace App\Services;

use App\Contracts\IServiceA;

class ServiceAext implements IServiceA
{
    public function getValue()
    {
        return "value-A-ext";
    }
}