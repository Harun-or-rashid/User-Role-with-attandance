<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLogin()
    {
        return view('backend.login');
    }

    public function login(Request $request)
    {
        $this->validate($request,[
            'email'=>'required',
            'password'=>'required'
        ]);

        try {
            if (Auth::attempt([
                'email'=>$request->email,
                'password'=>$request->password
            ]))
            {
                return view('backend.index');
            }else{

            }
        }catch (\Exception $e){
            session()->flash('type', 'danger');
            session()->flash('message', 'Invalid Email or Password. '.$e->getMessage());
            return redirect()->route('signin');
        }
        session()->flash('type', 'danger');
        session()->flash('message', 'Invalid Email or Password.');
        return redirect()->route('signin');

    }

    public function logOut()
    {
        Auth::logout();
        return redirect()->route('signin');
    }
}
