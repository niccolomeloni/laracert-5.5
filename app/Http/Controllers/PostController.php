<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostRequest;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function create(Request $request) // PostRequest
    {
        $validator = \Validator::make($request->all(), [
            'field' => 'required',
        ]);

        $validator->after(function ($validator) {
            $validator->errors()->add('field', 'Something is wrong with this field!');
        });

        $validator->validate();

        echo "done";
    }
}