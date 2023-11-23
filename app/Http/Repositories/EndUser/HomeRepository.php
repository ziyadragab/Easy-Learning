<?php

namespace App\Http\Repositories\EndUser;

use App\Http\Interfaces\EndUser\HomeInterface;

class HomeRepository implements HomeInterface{

    public function index()
    {
        if(auth()->user()){
        return view('user.index');
        }
        return view('user.auth.login');
    }
}




?>
