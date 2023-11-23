<?php
namespace App\Http\Interfaces\Admin;

interface AuthInterface{
    public function loginForm();
    public function login($request);
    public function logout();
}


?>
