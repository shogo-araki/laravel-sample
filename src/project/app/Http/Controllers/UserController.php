<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserRegistPost;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function register(UserRegistPost $request)
    {
        $inputs = $request->all();

        $rules = [
            'name' => 'required',
            'age' => 'integer'
        ];

        $validator = Validator::make($inputs, $rules);


        if ($validator->fails()) {
        }
    }
}
