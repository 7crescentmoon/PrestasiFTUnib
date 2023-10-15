<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Redirect;

class LoginController extends Controller
{
    public function index (){
        return view('Auth.login.index',[
            "title" => "Login",
        ]);
    }

    public function Authenticate(Request $request)
    {
        
        $credentials = $request->validate([
            "npm" => 'Required',
            "password" => 'Required',
        ]);

        if(Auth::attempt($credentials)){
            $user = Auth::user();
            if($user->role === 'admin' || $user->role === 'super admin'){
                $request->session()->regenerate();        
                return redirect()->intended('/dashboard/admin');
            }elseif($user->role === 'user'){
                $request->session()->regenerate();
                return redirect()->intended('dashboard');
            }
        }

        return redirect('/login')->with('error','Masukkan username dan password yang benar');
    }

    public function logout(Request $request){

        Auth::logout();
 
        $request->session()->invalidate();
     
        $request->session()->regenerateToken();
        Redirect::back();
        return redirect()->intended('/login');
    }
}
