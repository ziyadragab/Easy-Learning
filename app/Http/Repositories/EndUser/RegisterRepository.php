<?php

namespace App\Http\Repositories\EndUser;

use App\Models\User;
use App\Http\Interfaces\EndUser\RegisterInterface;

class RegisterRepository implements RegisterInterface{
    public function registerForm()
    {
        return view('user.auth.register');
    }
    public function register($request)
    {

        User::create([
        'first_name'=>$request['first-name'],
        'last_name'=>$request['last-name'],
        'email'=>$request['email'],
        'phone'=>$request['phone']??null,
        'address'=>$request['address']??null,
        'password'=>bcrypt($request['password']),
        ]);

        toast('User Created Successfully', 'success');
        return redirect()->route('loginForm');
    }
}



?>
