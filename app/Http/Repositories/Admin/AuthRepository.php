<?php

namespace App\Http\Repositories\Admin;

use App\Models\User;
use App\Http\Interfaces\Admin\AuthInterface;

class AuthRepository implements AuthInterface
{
    public function loginForm()
    {
        if(auth()->check()){
         return back();
        }
        return view('admin.auth.login');

    }
    public function login($request)
    {
        $credentials = $request->only(['email', 'password']);
        $user = User::where('email', $credentials['email'])->first();

        if (auth()->attempt($credentials)) {
            if ($user->status == 'active') {
                if ($user->user_role() == 1) {
                    toast('Welcome ' . $user->first_name, 'success');
                    return redirect()->route('admin.index');
                }
                    session()->flush();
                    auth()->logout();
                    toast('You Are Not An Admin!', 'error');
                    return redirect()->route('loginForm');

            } else {
                alert()->warning('Warning', 'The Account Must Be Active');
                return redirect()->route('loginForm');
            }
        }

        toast('Invalid credentials', 'error');
        return redirect()->route('loginForm');
    }
    public function logout()
    {
        session()->flush();
        auth()->logout();
        return redirect()->route('loginForm');
    }
}
