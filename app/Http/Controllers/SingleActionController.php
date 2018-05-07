<?php

namespace App\Http\Controllers;

class SingleActionController extends Controller
{
    public function __invoke()
    {
        echo "Single Action Controller";
    }
}