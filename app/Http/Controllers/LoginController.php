<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

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
            "npm" => 'required',
            "password" => 'required',
        ]);

        if(Auth::attempt($credentials)){
            $user = Auth::user();
            var_dump($user);
            if($user->role == 'admin' && $user->role = 'super admin'){
                $request->session()->regenerate();
                return redirect()->intended('/admin');
            }elseif($user->role = 'user'){
                $request->session()->regenerate();
                return redirect()->intended('/user');
            }
        }

        return redirect('/login')->with('error','Masukkan username dan password yang benar');
    }

    public function logout(Request $request){

        Auth::logout();
 
        $request->session()->invalidate();
     
        $request->session()->regenerateToken();
     
        return redirect('/login');
    }
}
