<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Pengajuan;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class PengajuanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.persetujuan.index', [
            "user_log" => Auth::user(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pengajuan = Pengajuan::with('user')->get();
        $tahunSekarang = Carbon::now()->year;
        $kisaranTahun = array_reverse(range($tahunSekarang - 10, $tahunSekarang));
        return view('user.pengajuan', [
            "user_log" => Auth::user(),
            "tahun" => $kisaranTahun,
            "pengajuans" => $pengajuan,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $validatedData = $request->validate([
            "user_id" => "",
            "nama_kegiatan_perlombaan" => "required",
            "lokasi_lomba" => "required",
            "tahun" => "required",
            "tanggal_mulai" => "required",
            "tanggal_selesai" => "required",
            "juara" => "required",
            "tingkat_prestasi" => "required",
            "jumlah_Peserta" => "required",
            "nama_penyelenggara" => "required",
            "url_penyelenggara" => "",
            "file_penghargaan" => "required|file|mimes:pdf|max:15360",
            "file_dokumentasi_kegiatan" => "file|mimes:pdf|max:15360",
            "file_surat_tugas" => "file|mimes:pdf|max:15360",
        ]);

        $format_date = Carbon::now()->toDateString();

        $file_penghargaan = $request->file('file_penghargaan');
        $format_nama_penghargaan = $format_date . "-pengharagaan" . "-" . $file_penghargaan->getClientOriginalName();
        $validatedData['file_penghargaan'] = $file_penghargaan->storeAs('filePenghargaan', $format_nama_penghargaan);


        if ($request->file('file_dokumentasi_kegiatan') != null) {
            $file_dokumentasi = $request->file('file_dokumentasi_kegiatan');
            $format_nama_dokumentasi = $format_date . "-dukomentasi" . "-" . $file_dokumentasi->getClientOriginalName();
            $file_dokumentasi_kegiatan = $file_dokumentasi->storeAs('fileDokumentasi', $format_nama_dokumentasi);
        }

        if ($request->file('file_surat_tugas') != null) {
            $file_surat_tugas = $request->file('file_surat_tugas');
            $format_nama_surat_tugas = $format_date . "-surat_tugas" . "-" . $file_surat_tugas->getClientOriginalName();
            $file_surat_tugas = $file_surat_tugas->storeAs('filesurat_tugas', $format_nama_surat_tugas);
        }

        if ($request->file('file_surat_tugas') != null && $request->file('file_dokumentasi_kegiatan') != null){
            Pengajuan::create([
                'user_id' => Auth::user()->id,
                "nama_kegiatan_perlombaan" => $request->nama_kegiatan_perlombaan,
                "lokasi_lomba" => $request->lokasi_lomba,
                "tahun" => $request->tahun,
                "tanggal_mulai" => $request->tanggal_mulai,
                "tanggal_selesai" => $request->tanggal_selesai,
                "juara" => $request->juara,
                "tingkat_prestasi" => $request->tingkat_prestasi,
                "jumlah_Peserta" => $request->jumlah_Peserta,
                "nama_penyelenggara" => $request->nama_penyelenggara,
                "url_penyelenggara" => $request->url_penyelenggara,
                "file_penghargaan" => $request->file_penghargaan->storeAs('filePenghargaan', $format_nama_penghargaan),
                "file_dokumentasi_kegiatan" => $file_dokumentasi_kegiatan,
                "file_surat_tugas" => $file_surat_tugas,
            ]);
        }else{
            Pengajuan::create([
                'user_id' => Auth::user()->id,
                "nama_kegiatan_perlombaan" => $request->nama_kegiatan_perlombaan,
                "lokasi_lomba" => $request->lokasi_lomba,
                "tahun" => $request->tahun,
                "tanggal_mulai" => $request->tanggal_mulai,
                "tanggal_selesai" => $request->tanggal_selesai,
                "juara" => $request->juara,
                "tingkat_prestasi" => $request->tingkat_prestasi,
                "jumlah_Peserta" => $request->jumlah_Peserta,
                "nama_penyelenggara" => $request->nama_penyelenggara,
                "url_penyelenggara" => $request->url_penyelenggara,
                "file_penghargaan" => $request->file_penghargaan->storeAs('filePenghargaan', $format_nama_penghargaan),
            ]);
        }

        Alert::toast('Data sudah dikirim', 'success');
        return redirect(route('lamanPengajuan'));

    }
    // "jenis_prestasi" =>  "required", untk tb_prestasi


    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $decryptedId = decrypt($id);
        $data = Pengajuan::with('User')->find($decryptedId);
        return view('admin.persetujuan.show', [
            "user_log" => Auth::user(),
            "data" => $data,
            "jumlah_pengajuan" => Pengajuan::where('status',0)->count()
        ]);
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
    public function destroy (Pengajuan $id)
    {
        $path1 = $id->file_penghargaan;
        Storage::delete($path1);
        
        $path2 = $id->file_dokumentasi_kegiatan;
        $path3 = $id->file_surat_tugas;
        if($id->file_dokumentasi_kegiatan != null && $id->file_surat_tugas != null){
            Storage::delete($path2);
            Storage::delete($path3);
        }
        Pengajuan::destroy($id->id);
        Alert::toast('Data berhasil dihapus', 'success');
        return redirect(route('daftarPengajuan'));
    }
}
