<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\Admin;


class LoginAdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:admin',['except'=>'logout']);
    }

    public function formLogin()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email'=>'required|email|exists:admins',
            'password'=>'required'
        ]);

        if (Auth::guard('admin')->attempt($credentials, $request->remember)) {
            $request->session()->regenerate();
            $user = Admin::where('email',$request->email)->first();
            if ($user->role=='admin') {
                return redirect('/yonetici-anasayfa');
            
            }
            if ($user->role=='consultant') {
                return redirect('/danisman-anasayfa');
            
            }
            if ($user->role=='student') {
                return redirect('/ogrenci-anasayfa');
            
            }
            return redirect()->intended(config('admin.prefix'));
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login');
    }
}
