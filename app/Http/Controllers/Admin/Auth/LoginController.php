<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm()
    {
       
        return view('admin.auth.login');
    }
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        $credential = ['email' => $request->email, 'password' => $request->password];

        if (Auth::guard('admin')->attempt($credential)) {
            return redirect()->route('admin.index');
        }
        return back()->with('message', 'Credential do not match');
    }
    public function logout()
    {
        //Auth::guard('admin')->logout();
        auth()->guard('admin')->logout();
        return redirect()->route('admin.login');
    }
}
