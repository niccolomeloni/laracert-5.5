<?php

namespace App\Services;

use App\Contracts\IServiceD;

class ServiceD implements IServiceD
{
    private $value;

    public function __construct($value)
    {
        $this->value = $value;
    }

    public function getValue()
    {
        return $this->value;
    }
}