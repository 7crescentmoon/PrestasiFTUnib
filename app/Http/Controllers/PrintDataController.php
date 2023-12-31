<?php

namespace App\Http\Controllers;

use App\Models\Prestasi;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PrintDataController extends Controller
{
    //user
    public function userPrintData($data = '', $jurusan = '')
    {
        $userId = Auth::id();
        if ($jurusan != '' && $data != '') {
            $user = User::whereNotIn('role', ['admin', 'super admin'])
                ->where('jurusan', $jurusan)
                ->where('id', '!=', $userId)
                ->orderBy('created_at', 'desc')
                ->take($data)
                ->get();
        }

        if ($data && $jurusan == '') {
            $user = User::whereNotIn('role', ['admin', 'super admin'])
                ->where('id', '!=', $userId)
                ->orderBy('created_at', 'desc')
                ->take($data)
                ->get();
        }

        if (!$data && !$jurusan) {
            $user = User::whereNotIn('role', ['admin', 'super admin'])
                ->where('id', '!=', $userId)
                ->orderBy('created_at', 'desc')
                ->get();
        }

        return view('admin.download.print.print', [
            "datas" => $user
        ]);
    }

    public function userPrintDataBysearch($search = '')
    {
        $userId = Auth::id();

        if ($search != '') {
            $user = User::whereNotIn('role', ['admin', 'super admin'])
                ->where('id', '!=', $userId)
                ->when($search, function ($query) use ($search) {
                    $query->where('nama', 'like', '%' . $search . '%')
                        ->orWhere('npm_nip', 'like', '%' . $search . '%')
                        ->orWhere('jurusan', 'like', '%' . $search . '%')
                        ->orWhere('email', 'like', '%' . $search . '%');
                })
                ->orderBy('created_at', 'desc')
                ->get();
        }

        return view('admin.download.print.print', [
            "datas" => $user
        ]);
    }
    //admin
    public function adminPrintData($data = '', $role = '')
    {
        $userId = Auth::id();
        if ($role != '' && $data != '') {
            $user = User::whereNotIn('role', ['user'])
                ->where('role', $role)
                ->where('id', '!=', $userId)
                ->orderBy('created_at', 'desc')
                ->take($data)
                ->get();
        }

        if ($data && $role == '') {
            $user = User::whereNotIn('role', ['user'])
                ->where('id', '!=', $userId)
                ->orderBy('created_at', 'desc')
                ->take($data)
                ->get();
        }

        if (!$data && !$role) {
            $user = User::whereNotIn('role', ['user'])
                ->where('id', '!=', $userId)
                ->orderBy('created_at', 'desc')
                ->get();
        }

        return view('admin.download.print.print', [
            "datas" => $user
        ]);
    }

    public function adminPrintDataBysearch($search = '')
    {
        $userId = Auth::id();

        if ($search != '') {
            $user = User::whereNotIn('role', ['user'])
                ->where('id', '!=', $userId)
                ->when($search, function ($query) use ($search) {
                    $query->where('nama', 'like', '%' . $search . '%')
                        ->orWhere('npm_nip', 'like', '%' . $search . '%')
                        ->orWhere('role', 'like', '%' . $search . '%');
                })
                ->orderBy('created_at', 'desc')
                ->get();
        }

        return view('admin.download.print.print', [
            "datas" => $user
        ]);
    }

    //prestasi
    public function prestasiPrintData($data = null, $prestasi = null, $jurusan = null)
    {
        // dd($jurusan,$prestasi);

        if ($prestasi != null && $data != null) {
            $datas = Prestasi::with('user', 'pengajuan')
                ->where('jenis_prestasi', $prestasi)
                ->when($jurusan, function ($query) use ($jurusan) {
                    $query->whereHas('user', function ($query) use ($jurusan) {
                        $query->where('Jurusan', $jurusan);
                    });
                })
                ->orderBy('created_at', 'desc')
                ->take($data)
                ->get();
        }

        if ($data && $prestasi == null) {
            $datas = Prestasi::with('user', 'pengajuan')
                ->orderBy('created_at', 'desc')
                ->take($data)
                ->get();
        }
        if ($data && $jurusan == null) {
            $datas = Prestasi::with('user', 'pengajuan')
                ->orderBy('created_at', 'desc')
                ->take($data)
                ->get();
        }
        
        if (!$data && !$prestasi) {
            $datas = Prestasi::with('user', 'pengajuan')
                ->orderBy('created_at', 'desc')
                ->get();
        }

        if (!$data && !$prestasi && !$jurusan) {
            $datas = Prestasi::with('user', 'pengajuan')
                ->orderBy('created_at', 'desc')
                ->get();
        }

        return view('admin.download.print.printPrestasi', [
            "datas" => $datas,
            "jenisPrestasi" => $prestasi,
            "jenisJurusan" => $jurusan
        ]);
    }

    public function prestasiPrintDataBysearch($search = '')
    {

        if ($search != '') {
            $datas = Prestasi::with('user', 'pengajuan')
                ->when($search, function ($query) use ($search) {

                    $query->where('nama_prestasi', 'like', '%' . $search . '%')
                        ->orWhere('jenis_prestasi', 'like', '%' . $search . '%')

                        ->orWhereHas('user', function ($query) use ($search) {
                            $query->where('nama', 'like', '%' . $search . '%')
                                ->orWhere('npm_nip', 'like', '%' . $search . '%');
                        })

                        ->orWhereHas('pengajuan', function ($query) use ($search) {
                            $query->where('tingkat_prestasi', 'like', '%' . $search . '%')
                                ->orWhere('juara', 'like', '%' . $search . '%');

                        });

                })
                ->orderBy('created_at', 'desc')
                ->get();
        }

        return view('admin.download.print.printPrestasi', [
            "datas" => $datas
        ]);
    }

    //prestasi user
    public function prestasiUserPrintData($data = '', $prestasi = '')
    {

        if ($prestasi != '' && $data != '') {
            $datas = Prestasi::with('user', 'pengajuan')
                ->where('user_id', Auth::user()->id)
                ->where('jenis_prestasi', $prestasi)
                ->orderBy('created_at', 'desc')
                ->take($data)
                ->get();
        }

        if ($data && $prestasi == '') {
            $datas = Prestasi::with('user', 'pengajuan')
                ->where('user_id', Auth::user()->id)
                ->orderBy('created_at', 'desc')
                ->take($data)
                ->get();
        }

        if (!$data && !$prestasi) {
            $datas = Prestasi::with('user', 'pengajuan')
                ->where('user_id', Auth::user()->id)
                ->orderBy('created_at', 'desc')
                ->get();
        }

        return view('admin.download.print.printPrestasiUser', [
            "datas" => $datas
        ]);
    }

    public function prestasiUserPrintDataBysearch($search = '')
    {

        if ($search != '') {
            $prestasi = Prestasi::with('user', 'pengajuan')
                ->where('user_id', Auth::user()->id)
                ->when($search, function ($query) use ($search) {

                    $query->where('nama_prestasi', 'like', '%' . $search . '%')
                        ->orWhere('jenis_prestasi', 'like', '%' . $search . '%')

                        ->orWhereHas('user', function ($query) use ($search) {
                            $query->where('nama', 'like', '%' . $search . '%')
                                ->orWhere('npm_nip', 'like', '%' . $search . '%');
                        })

                        ->orWhereHas('pengajuan', function ($query) use ($search) {
                            $query->where('tingkat_prestasi', 'like', '%' . $search . '%')
                                ->orWhere('juara', 'like', '%' . $search . '%');

                        });

                })
                ->orderBy('created_at', 'desc')
                ->get();
        }

        return view('admin.download.print.printPrestasiUser', [
            "datas" => $prestasi
        ]);
    }


}