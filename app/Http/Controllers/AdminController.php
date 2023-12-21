<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Prestasi;
use App\Imports\UsersImport;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->authorize('accesAdminSuperadmin', User::class);

        $laki_laki = Prestasi::whereHas('user', function($q){
            $q->where('jenis_kelamin', 'Laki - Laki');
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
     * Store a newly created resource in storage.
     */
    public function addUserStore(Request $request)
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

        $validatedNpm = str_split($request['npm_nip']);
        $kodeJurusan = ['A', 'B', 'C', 'D', 'E', 'F'];
        if($validatedNpm[0] == 'G' && $validatedNpm[1] == '1' && $validatedNpm[2] == in_array($validatedNpm[2],$kodeJurusan)){
            $validatedData['npm_nip'] = $request['npm_nip'];
        }else{
            Alert::toast('NPM tidak terdaftar di Fakultas Teknik !!', 'error');
            return redirect(route('addUserView'));
        }

        $validatedData['password'] = Hash::make($validatedData['password']);
        User::create($validatedData);

        Alert::toast('Data berhasil ditambahkan', 'success');
        return redirect(route('userList'));

    }

    public function addAdminStore(Request $request)
    {
        $validatedData = $request->validate([
            "nama" => 'Required|max:100',
            'npm_nip' => 'required|max:20|unique:users',
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
     * Update the specified resource in storage.
     */
    public function update(Request $request, $userId)
    {
        $user = User::find($userId);
        $this->authorize('accesAdminSuperadmin', User::class);
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
        $validatedData = $request->validate($rules);

        $validatedNpm = str_split($request['npm_nip']);
        $kodeJurusan = ['A', 'B', 'C', 'D', 'E', 'F'];
        if($validatedNpm[0] == 'G' && $validatedNpm[1] == '1' && $validatedNpm[2] == in_array($validatedNpm[2],$kodeJurusan)){
            $validatedData['npm_nip'] = $request['npm_nip'];
        }else{
            Alert::toast('NPM tidak terdaftar di Fakultas Teknik !!', 'error');
            return redirect(route('editUserView', encrypt($userId)));
        }
        
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }
        
        if ($request->filled('jurusan')) {
            $user->jurusan = $request->jurusan;
        }
        $user->nama = $validatedData['nama'];
        $user->npm_nip = $validatedData['npm_nip'];
        $user->jenis_kelamin = $validatedData['jenis_kelamin'];
        $user->email = $validatedData['email'];

        $user->save();
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
        // User::destroy($id->id);
        try {
            User::destroy($id->id);
            // Jika berhasil dihapus
            Alert::toast('Data berhasil dihapus', 'success');
        } catch (QueryException $e) {
            // Jika terjadi kesalahan lain selain model tidak ditemukan
            Alert::toast('Data tidak bisa di Hapus', 'error');
        
        }
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
        if ($request->has('delete_profile_picture') &&  $user->profil) {
            Storage::delete( $user->profil);
             $user->profil = null;
        }

        if ($request->file('profil')) {
            if ( $user->profil != null)
                Storage::delete( $user->profil);
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
        return redirect(route('adminProfile',encrypt($user->id)));
    }

    public function userList()
    {

        $this->authorize('accesAdminSuperadmin', User::class);
        return view('.admin.adminAction.userList',[
            "user_log" => Auth::user(),
        ]); 
    }
    public function adminList()
    {
        $this->authorize('accesAdminSuperadmin', User::class);
        return view('.admin.adminAction.adminList',[
            "user_log" => Auth::user(),
        ]); 
    }

    public function addUser()
    {
        $this->authorize('accesAdminSuperadmin', User::class);
        return view('.admin.adminAction.addUser', [
            "user_log"=> Auth::user(),
        ]);
    }
    public function addAdmin()
    {
        $this->authorize('accesAdminSuperadmin', User::class);
        return view('.admin.adminAction.addAdmin', [
            "user_log"=> Auth::user(),
        ]);
    }

    public function editUser ($id)
    {
        $decryptedId = decrypt($id);
        $this->authorize('accesAdminSuperadmin', User::class);
        $user = User::find($decryptedId);
           return view('.admin.adminAction.editUser', [
            "user_id" => $user,
            "user_log"=> Auth::user(),
        ]);
    }

    public function import(Request $request) 
    {
        $data = $request->file('file-excel');
        $namaFile = $data->getClientOriginalName();

        $data->move('akun-user', $namaFile);

        Excel::import(new UsersImport, \public_path('/akun-user/' . $namaFile));

        return redirect(route('userList'));
    }
}