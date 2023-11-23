<?php

namespace App\Http\Interfaces\EndUser;

interface AuthInterface{
    public function loginForm();
    public function login($request);
    public function logout();
}


?>
