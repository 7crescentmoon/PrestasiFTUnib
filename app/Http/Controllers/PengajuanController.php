<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Pengajuan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class PengajuanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('user.pengajuan',[
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
        dd($request->all());
        $validatedData = $request->validate([
            "nama_kegiatan_perlombaan" =>  "required",
            "lokasi_lomba" =>  "required",
            "tahun" =>  "required",
            "tanggal_mulai" =>   "required",
            "tanggal_selesai" =>  "required",
            "juara" =>  "required",
            "jenis_prestasi" =>  "required",
            "tingkat_prestasi" =>  "required",
            "jumlah_Peserta" =>  "required",
            "nama_penyelenggara" =>  "required",
            "url_penyelenggara" =>  "",
            "file_penghargaan" =>  "required|file|mimes:pdf",
            "file_dokumentasi_kegiatan" =>  "file|mimes:pdf",
            "file_surat_tugas" =>  "file|mimes:pdf",
        ]);


    }

    /**
     * Display the specified resource.
     */
    public function show(Pengajuan $pengajuan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pengajuan $pengajuan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pengajuan $pengajuan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pengajuan $pengajuan)
    {
        //
    }
}
