<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('user.dashboard',[
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
        //
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
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function profileSetting($id)
    {
        $decryptedId = decrypt($id);
        $user = User::find($decryptedId);
        return view('user.settingProfile',[
            "user" =>$user,
            "title" => 'Profile Settings',
            "date" => Carbon::now('Asia/Jakarta')
        ]);
    }

    public function editProfile(Request $request, User $id)
    {
        // dd($request->all());
        $rules = [
            "nama" => 'Required|max:100',
            'npm_nip' => 'required|max:10',
            'jurusan' => '',
            'jenis_kelamin' => 'Required',
            "email" => 'Required|email:dns',
            "profil" => 'image|file|mimes:png,jpg|max:1024'
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
        return redirect(route('userProfile',encrypt($id->id)));
    }
}
