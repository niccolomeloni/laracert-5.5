<?php

namespace App\Services;

use App\Contracts\IServiceA;

class ServiceA implements IServiceA
{
    private $value;

    public function __construct($value = 'value-A')
    {
        $this->value = $value;
    }

    public function getValue()
    {
        return $this->value;
    }
}