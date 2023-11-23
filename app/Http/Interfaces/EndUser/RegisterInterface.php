<?php
namespace App\Http\Interfaces\EndUser;

interface RegisterInterface{
    public function registerForm();
    public function register($request);
}




?>
