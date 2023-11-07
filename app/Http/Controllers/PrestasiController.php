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
        return view('admin.prestasi.index');
    }

    Public function daftarPrestasiUser(){
        $daftarPrestasi = Prestasi::with('user','pengajuan')->where('user_id',Auth::user()->id)->get();
        return view('user.daftarPrestasi',[
            "user_log" => Auth::user(),
            "date" => Carbon::now('Asia/Jakarta'),
            "datas" => $daftarPrestasi
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
    public function store(Request $request,$idPengajuan)
    {

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

    /**
     * Display the specified resource.
     */
    public function show(Prestasi $prestasi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Prestasi $prestasi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePrestasiRequest $request, Prestasi $prestasi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Prestasi $prestasi)
    {
        //
    }
}
