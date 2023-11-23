<?php
namespace App\Http\Repositories\EndUser;

use App\Http\Interfaces\EndUser\AuthInterface;


class AuthRepository implements AuthInterface{


    public function loginForm()
    {
        if(auth()->check()){
            return redirect()->route('endUser.index');
          }
      return view('user.auth.login');
    }
    public function login($request)
    {
        $credentials = $request->only(['email', 'password']);

    if (auth()->attempt($credentials)) {
        $user = auth()->user();
        if ($user->status == 'active') {
            toast('Welcome '. \auth()->user()->first_name, 'success');
            return redirect()->route('endUser.index');
        } elseif ($user->status == 'inactive') {
            alert()->warning('Warning', 'The Account Must Be Active');
            return back();
        }
    }
    toast('Invalid credentials', 'error');
    return back();
    }
    public function logout()
    {
      session()->flush();
      auth()->logout();
      return redirect()->route('loginForm');
    }
}



?>
