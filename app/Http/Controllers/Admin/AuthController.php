<?php

namespace App\Http\Controllers\Admin;


use App\Http\Requests\LoginRequest;
use App\Http\Controllers\Controller;
use App\Http\Interfaces\Admin\AuthInterface;

class AuthController extends Controller
{
    private $authInterface;
    public function __construct(AuthInterface $authInterface)
    {
       $this->authInterface=$authInterface;
    }
    public function loginForm()
    {
      return $this->authInterface->loginForm();
    }
    public function login(LoginRequest $request)
    {
        return $this->authInterface->login($request);
    }
    public function logout()
    {
        return $this->authInterface->logout();
    }
}
