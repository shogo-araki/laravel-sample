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
            'name' => ['required', 'max:20', 'ascii_alpha'],
            'email' => ['required', 'email', 'max:255'],
        ];

        // 簡易的にルールを追加
        // Validator::extend('ascii_alpha', function ($attribute, $value, $parameters) {
        //     return preg_match('/^[a-zA-Z]+$/', $value);
        // });

        $validator = Validator::make($inputs, $rules);

        // 条件のある項目に対応する　sometimes
        $validator->sometimes(
            'age',
            'integer|min:18',
            function($inputs){
                return $inputs->mailmagazine === 'allow';
            }
        );



        if ($validator->fails()) {
        }
    }
}
