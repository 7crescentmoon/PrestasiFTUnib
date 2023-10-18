<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Carbon;
class RegisterController extends Controller
{
    public function index()
    {
        return view('Auth.register.index',[
            "title" => 'register'
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            "nama" => 'Required|max:100',
            'npm' => 'required|max:10|unique:users',
            'jurusan' => 'required',
            'jenis_kelamin' => 'required',
            "password" => 'Required|min:6|max:255',
            "email" => 'Required|email:dns|unique:users'
        ]);

        $validatedData['password'] = Hash::make($validatedData['password']);

        User::create($validatedData);
        return redirect('/login')->with('success', 'Registrasi berhasil silahkan login!');
    }
}