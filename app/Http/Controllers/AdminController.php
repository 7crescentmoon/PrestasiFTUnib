<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.dashboard', [
            "user" => Auth::user(),
            "date" => Carbon::now('Asia/Jakarta')
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            "name" => 'Required|max:100',
            'npm' => 'required|max:10|unique:users',
            'jurusan' => 'required',
            'gender' => 'required',
            "password" => 'Required|min:6|max:255',
            "email" => 'Required|email:dns|unique:users',
            "role" => 'required'
        ]);

        $validatedData['password'] = Hash::make($validatedData['password']);
        User::create($validatedData);
        return redirect(route('addUserView'))->with('success', 'Akun pengguna telah ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {

    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $userId)
    {

        $user = User::find($userId);
        // dd($request->except(['_token']));
        $user->update($request->except(['_token']));
      

        return redirect(route('userList'))->with('success', 'Akun telah diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(user $id)
    {
        User::destroy($id->id);
        return redirect(route('userList'))->with('success', 'Akun pengguna telah dihapus');
    }

    public function profileSetting($id)
    {
        return view('admin.settingProfile', [
            "user" => User::find($id),
            "title" => 'Profile Settings',
            "date" => Carbon::now('Asia/Jakarta')
        ]);
    }

    public function editProfile(Request $request, string $id)
    {

    }

    public function userList()
    {
        $userId = Auth::id();
        return view('admin.userList', [
            "user" => Auth::user(),
            "title" => 'Profile Settings',
            "date" => Carbon::now('Asia/Jakarta'),
            "users" => User::where('id', '!=', $userId)->get()
        ]);
    }

    public function addUser()
    {
        return view('admin.addUser', [
            "user" => Auth::user(),
            "title" => 'Profile Settings',
            "date" => Carbon::now('Asia/Jakarta'),
        ]);
    }

    public function editUser($id)
    {
        return view('admin.editUser', [
            "user" => User::find($id),
            "title" => 'Profile Settings',
            "date" => Carbon::now('Asia/Jakarta'),
            "userid" => User::find($id)
        ]);
    }
}