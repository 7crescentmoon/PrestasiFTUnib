<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

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
            'npm_nip' => 'required|max:10|unique:users',
            'jurusan' => 'required',
            'jenis_kelamin' => 'required',
            "password" => 'Required|min:6|max:255',
            "email" => 'Required|email:dns|unique:users'
        ]);

        $validatedNpm = str_split($request['npm_nip']);
        $kodeJurusan = ['A', 'B', 'C', 'D', 'E', 'F'];
        if($validatedNpm[0] == 'G' && $validatedNpm[1] == '1' && $validatedNpm[2] == in_array($validatedNpm[2],$kodeJurusan)){
            $validatedData['npm_nip'] = $request['npm_nip'];
        }else{
            Alert::toast('NPM tidak terdaftar di Fakultas Teknik !!', 'error');
            return redirect(route('register'));
        }

        $validatedData['password'] = Hash::make($validatedData['password']);

        User::create($validatedData);
        Alert::toast('Akun anda telah terdaftar, Silahkan Login', 'success');
        return redirect(route('login'));
    }
}