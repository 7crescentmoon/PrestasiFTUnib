<?php

namespace App\Livewire;

use Carbon\Carbon;
use App\Models\User;
use Livewire\Component;
use App\Models\Pengajuan;
use Illuminate\Support\Facades\Auth;

class DaftarPersetujuan extends Component
{
    public function render()
    {
        $pengajuan = Pengajuan::with('User')->get();
        return view('livewire.daftar-persetujuan',[
            "user_log" => Auth::user(),
            "date" => Carbon::now('Asia/Jakarta'),
            "datas" => $pengajuan,
            // "pengajuans" => $user->pengajuan

        ]);
    }
}
