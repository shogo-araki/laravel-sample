<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRegistPost;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function create(){
        return view('regist.register');
    }

    public function store(UserRegistPost $request){
        $request->validate($request);

        $user = User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>Hash::make($request->password)
        ]);

        event(new Registered($user));

        return view('regist.complete', compact('user'));
    }
}
