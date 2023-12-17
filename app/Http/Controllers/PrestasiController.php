<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Prestasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\UpdatePrestasiRequest;

class PrestasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.prestasi.index',[
            "user_log" => Auth::user(),
            "title" => 'Profile Settings',
        ]);
    }

    Public function daftarPrestasiUser(){
        return view('user.prestasi.daftarPrestasi',[
            "user_log" => Auth::user(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tahunSekarang = Carbon::now()->year;
        $kisaranTahun = array_reverse(range($tahunSekarang - 10, $tahunSekarang));
        return view('admin.prestasi.create',[
            "user_log" => Auth::user(),
            "tahun" => $kisaranTahun,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request,$idPengajuan)
    {

        $request->validate([
            "nama_prestasi" => "required",
            "jenis_prestasi" => "required"
         
        ]);
        $user_id = $request->user_id;
        // $pengajuan_id = $request->pengajuan_id;
        Prestasi::create([
            "user_id" => $user_id,
            "pengajuan_id" => $idPengajuan,
            "nama_prestasi" => $request->nama_prestasi,
            "jenis_prestasi" => $request->jenis_prestasi
        ]);
        
        Alert::toast('Data sudah setujui', 'success');
        return redirect(route('daftarPengajuan'));
    }

    public function storePrestasi(Request $request){
        
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $decryptedId = decrypt($id);
        $prestasi = Prestasi::find($decryptedId);
        return view('admin.prestasi.show',[
            "user_log" => Auth::user(),
            "prestasi" => $prestasi
        ]);
    }

    public function dataPrestasiMahasiswa($id)
    {
        $decryptedId = decrypt($id);
        $prestasi = Prestasi::find($decryptedId);
        return view('user.prestasi.dataPrestasi',[
            "user_log" => Auth::user(),
            "prestasi" => $prestasi
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $decryptedId = decrypt($id);
        Prestasi::destroy($decryptedId);
        Alert::toast('Data berhasil dihapus', 'success');
        return redirect(route('daftarPrestasi'));
    }
}
