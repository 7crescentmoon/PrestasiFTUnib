<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->authorize('accesAdminSuperadmin', User::class);
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
            "nama" => 'Required|max:100',
            'npm' => 'required|max:10|unique:users',
            'jurusan' => '',
            'jenis_kelamin' => 'required',
            "password" => 'Required|min:6|max:255',
            "email" => 'Required|email:dns|unique:users',
            "role" => ''
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
        $this->authorize('accesAdminSuperadmin', User::class);

        $user = User::find($userId);
        // dd($request->except(['_token']));
        $user->update($request->except(['_token']));
      

        return redirect(route('editUserView', encrypt($userId)))->with('success', 'Akun telah diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $id)
    {
        $this->authorize('accesAdminSuperadmin', User::class);
        User::destroy($id->id);
        return redirect(route('userList'))->with('success', 'Akun pengguna telah dihapus');
    }

    public function profile($id)
    {
        $decryptedId = decrypt($id);
        $user = User::find($decryptedId);
        $this->authorize('accesAdminSuperadmin', User::class);
        return view('admin.settingProfile', [
            "user" => $user,
            "title" => 'Profile Settings',
            "date" => Carbon::now('Asia/Jakarta')
        ]);
    }

    public function editProfile(Request $request, User $id)
    {   

        $rules = [
            "nama" => 'Required|max:100',
            'npm' => 'required|max:10',
            'jurusan' => '',
            'jenis_kelamin' => 'required',
            "email" => 'Required|email:dns',
            "profil" => 'image|file|max:1024'
        ];

        
        $validatedata = $request->validate($rules);

        if ($request->file('profil')) {
            if ($id->image != null)
                Storage::delete($id->image);
            $validatedata['profil'] = $request->file('profil')->store('profilePicture');
        }

        $id->update($validatedata);

        return redirect(route('adminProfile',encrypt($id->id)))->with('success', 'Profil berhasil diUbah');
    }

    public function userList()
    {
        $this->authorize('accesAdminSuperadmin', User::class);
        $userId = Auth::id();
        return view('admin.userList', [
            "user" => Auth::user(),
            "title" => 'Profile Settings',
            "date" => Carbon::now('Asia/Jakarta'),
            "users" => User::whereNotIn('role', ['admin', 'super admin'])
                            ->where('id', '!=', $userId)
                            ->get()
        ]); 
    }
    public function adminList()
    {
        $this->authorize('accesAdminSuperadmin', User::class);
        $userId = Auth::id();
        return view('admin.adminList', [
            "user" => Auth::user(),
            "title" => 'Profile Settings',
            "date" => Carbon::now('Asia/Jakarta'),
            "users" => User::whereNotIn('role', ['user'])
                            ->where('id', '!=', $userId)
                            ->get()
        ]); 
    }

    public function addUser()
    {
        $this->authorize('accesAdminSuperadmin', User::class);
        return view('admin.addUser', [
            "user" => Auth::user(),
            "title" => 'Profile Settings',
            "date" => Carbon::now('Asia/Jakarta'),
        ]);
    }
    public function addAdmin()
    {
        $this->authorize('accesAdminSuperadmin', User::class);
        return view('admin.addAdmin', [
            "user" => Auth::user(),
            "title" => 'Profile Settings',
            "date" => Carbon::now('Asia/Jakarta'),
        ]);
    }

    public function editUser ($id)
    {
        $decryptedId = decrypt($id);
        $this->authorize('accesAdminSuperadmin', User::class);
        $user = User::find($decryptedId);
           return view('admin.editUser', [
            "user_id" => $user,
            "title" => 'Profile Settings',
            "date" => Carbon::now('Asia/Jakarta'),
            "user" => Auth::user(),
        ]);
    }
}