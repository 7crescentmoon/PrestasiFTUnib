<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Prestasi;
use App\Models\Pengajuan;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jumlahPrestasi = Prestasi::with('user','pengajuan')->where('user_id',Auth::user()->id)->count();
        $jumlahAkademik = Prestasi::with('user','pengajuan')->where('user_id',Auth::user()->id)->where('jenis_prestasi','akademik')->count();
        $jumlahNonAkademik = Prestasi::with('user','pengajuan')->where('user_id',Auth::user()->id)->where('jenis_prestasi','non akademik')->count();
        return view('user.dashboard',[
            "user_log" => Auth::user(),
            "jumlah_prestasi" => $jumlahPrestasi,
            "akademik" => $jumlahAkademik,
            "nonAkademik" => $jumlahNonAkademik
        ]);
    }

    public function profileSetting($id)
    {
        $decryptedId = decrypt($id);
        $user = User::find($decryptedId);
        return view('user.settingProfile',[
            "user_log" =>$user,
            "title" => 'Profile Settings',
            "date" => Carbon::now('Asia/Jakarta')
        ]);
    }

    public function editProfile(Request $request, $id)
    {
        $user = User::find($id);
        $rules = [
            "nama" => 'Required|max:100',
            'npm_nip' => ['required', 'max:10' , Rule::unique('users')->ignore($user->id)],
            'jurusan' => '',
            'jenis_kelamin' => '',
            "email" => ['Required','email:dns', Rule::unique('users')->ignore($user->id)],
            "profil" => 'image|file|mimes:png,jpg|max:1024',
            "delete_profile_picture" => '',
            "password" => '',
        ];

        $validatedata = $request->validate($rules);

        if ($request->has('delete_profile_picture') && $user->profil) {
            Storage::delete($user->profil);
            $user->profil = null;
        }


        if ($request->file('profil')) {
            if ($user->profil != null)
                Storage::delete($user->profil);
                $user->profil = $request->file('profil')->store('profilePicture');
           
        }

        if ($request->filled('password')) {
            $validatedata['password'] = Hash::make($request->password);
        }

        $user->nama = $validatedata['nama'];
        $user->npm_nip = $validatedata['npm_nip'];
        $user->jenis_kelamin = $validatedata['jenis_kelamin'];
        $user->email = $validatedata['email'];

        $user->save();
        Alert::toast('Profil telah diubah', 'success');
        return redirect(route('userProfile',encrypt($user->id)));
    }

}
