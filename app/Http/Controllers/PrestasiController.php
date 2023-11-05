<?php

namespace App\Http\Controllers;

use App\Models\Prestasi;
use Illuminate\Http\Request;
use App\Http\Requests\UpdatePrestasiRequest;

class PrestasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        $user_id = $request->user_id;
        $pengajuan_id = $request->pengajuan_id;
        Prestasi::create([
            "user_id" => $user_id,
            "pengajuan_id" => $pengajuan_id,
            "nama_prestasi" => $request->nama_prestasi,
            "jenis_prestasi" => $request->jenis_prestasi
        ]);
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
