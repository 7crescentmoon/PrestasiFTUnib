<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Prestasi;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->authorize('accesAdminSuperadmin', User::class);

        $laki_laki = Prestasi::whereHas('user', function($q){
            $q->where('jenis_kelamin', 'Laki-Laki');
        })->count();

        $perempuan = Prestasi::whereHas('user', function($q){
            $q->where('jenis_kelamin', 'Perempuan');
        })->count();

        return view('admin.dashboard', [
            "user_log"=> Auth::user(),
            "laki_laki" => $laki_laki,
            "perempuan" => $perempuan
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
            'npm_nip' => 'required|max:10|unique:users',
            'jurusan' => '',
            'jenis_kelamin' => 'required',
            "password" => 'Required|min:6|max:255',
            "email" => 'Required|email:dns|unique:users',
            "role" => ''
        ]);

        $validatedData['password'] = Hash::make($validatedData['password']);
        User::create($validatedData);
        Alert::toast('Data berhasil ditambahkan', 'success');
        return redirect(route('userList'));

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
        // Alert::success('Mengubah data', 'Data berhasil diubah');
        Alert::toast('Profil telah diubah', 'success');
        return redirect(route('editUserView', encrypt($userId)));
    }

    /**
     * Remove the specified resource from storage.
     * 
     */
    public function destroy(User $id)
    {
        $this->authorize('accesAdminSuperadmin', User::class);

        
        User::destroy($id->id);
        Alert::toast('Data berhasil dihapus', 'success');
        return redirect(route('userList'));
    }

    public function profile($id)
    {
        $decryptedId = decrypt($id);
        $user = User::find($decryptedId);
        $this->authorize('accesAdminSuperadmin', User::class);
        return view('.admin.adminAction.settingProfile', [
            "user_log"=> $user,
            "title" => 'Profile Settings',        ]);
    }

    public function editProfile(Request $request, User $id)
    {   
        $rules = [
            "nama" => 'Required|max:100',
            'npm_nip' => ['required', 'max:10' , Rule::unique('users')->ignore($id->id)],
            'jurusan' => '',
            'jenis_kelamin' => 'required',
            "email" => ['Required','email:dns', Rule::unique('users')->ignore($id->id)],
            "profil" => 'image|file|mimes:png,jpg|max:1024',
            "delete_profile_picture" => ''
        ];

    
        $validatedata = $request->validate($rules);

        if ($request->has('delete_profile_picture') && $id->profil) {
            Storage::delete($id->profil);
            $id->profil = null;
        }

        if ($request->file('profil')) {
            if ($id->profil != null)
                Storage::delete($id->profil);
            $validatedata['profil'] = $request->file('profil')->store('profilePicture');
        }

        $id->update($validatedata);
        Alert::toast('Profil telah diubah', 'success');
        return redirect(route('adminProfile',encrypt($id->id)));
    }

    public function userList()
    {

        $this->authorize('accesAdminSuperadmin', User::class);
        return view('.admin.adminAction.userList',[
            "user_log" => Auth::user(),
            "title" => 'Profile Settings',
        ]); 
    }
    public function adminList()
    {
        $this->authorize('accesAdminSuperadmin', User::class);
        return view('.admin.adminAction.adminList',[
            "user_log" => Auth::user(),
            "title" => 'Profile Settings',
        ]); 
    }

    public function addUser()
    {
        $this->authorize('accesAdminSuperadmin', User::class);
        return view('.admin.adminAction.addUser', [
            "user_log"=> Auth::user(),
            "title" => 'Profile Settings',
        ]);
    }
    public function addAdmin()
    {
        $this->authorize('accesAdminSuperadmin', User::class);
        return view('.admin.adminAction.addAdmin', [
            "user_log"=> Auth::user(),
            "title" => 'Profile Settings',
        ]);
    }

    public function editUser ($id)
    {
        $decryptedId = decrypt($id);
        $this->authorize('accesAdminSuperadmin', User::class);
        $user = User::find($decryptedId);
           return view('.admin.adminAction.editUser', [
            "user_id" => $user,
            "title" => 'Profile Settings',
            "user_log"=> Auth::user(),
        ]);
    }
}