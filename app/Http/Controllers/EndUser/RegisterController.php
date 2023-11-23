<?php

namespace App\Http\Controllers\EndUser;

use App\Http\Controllers\Controller;
use App\Http\Interfaces\EndUser\RegisterInterface;
use App\Http\Requests\EndUser\RegisterRequest;
use Illuminate\Http\Request;

class RegisterController extends Controller
{

    private $registerInterface;
    public function __construct(RegisterInterface $registerInterface)
    {
        $this->registerInterface=$registerInterface;
    }

    public function registerForm()
    {
        return $this->registerInterface->registerForm();
    }

    public function register(RegisterRequest $request)
    {
        return $this->registerInterface->register($request);
    }
}
