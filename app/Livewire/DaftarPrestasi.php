<?php

namespace App\Livewire;

use App\Models\Pengajuan;
use Carbon\Carbon;
use App\Models\User;
use Livewire\Component;
use App\Models\Prestasi;
use Illuminate\Support\Facades\Auth;

class DaftarPrestasi extends Component
{
    public function render()
    {
        return view('livewire.daftar-prestasi',[
            "user_log" => Auth::user(),
            "title" => 'Profile Settings',
            "date" => Carbon::now('Asia/Jakarta'),
            "data_prestasi" => Prestasi::all()
        ]);
    }
}
