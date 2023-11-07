<?php

namespace App\Livewire;

use Carbon\Carbon;
use App\Models\User;
use Livewire\Component;
use App\Models\Pengajuan;
use Illuminate\Support\Facades\Auth;

class LoadAdminlist extends Component
{
    public function render()
    {
        $userId = Auth::id();
        return view('livewire.load-adminlist',[
            "user_log" => Auth::user(),
            "title" => 'Profile Settings',
            "date" => Carbon::now('Asia/Jakarta'),
            "users" => User::whereNotIn('role', ['user'])
                            ->where('id', '!=', $userId)
                            ->get(),
        ]);
    }
}
