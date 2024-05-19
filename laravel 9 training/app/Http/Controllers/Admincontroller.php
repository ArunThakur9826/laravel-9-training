<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use validator, Auth;
class Admincontroller extends Controller
{
    public function authenticate(Request $request)
    {

        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if(Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], $request->get('remember'))){
            return redirect()->route('admin.welcome');

        }else{
            session()->flash('error', 'Email/Password is incorrect');
            return back()->withInput($request->only('email'));
        }

    }


    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login');
    }
}
