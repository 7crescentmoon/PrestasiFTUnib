<?php

namespace App\Livewire;

use Carbon\Carbon;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;

class LoadAdminlist extends Component
{

    public $search = '';

    public $dataTable = '10';

    public $role = '';

    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public function print()
    {
        return redirect()->route('adminPrint',['data' => $this->dataTable , 'role' => $this->role]);
    }
    public function printBySearch()
    {
        return redirect()->route('adminPrintBySearch',['search' => $this->search]);
    }
    public function render()
    {
        $userId = Auth::id();
        $user = User::whereNotIn('role', ['user'])
        ->where('id', '!=', $userId)
        ->when($this->search, function ($query) {
            $query->where(function ($query) {
                $query->where('nama', 'like', '%' . $this->search . '%')
                    ->orWhere('npm_nip', 'like', '%' . $this->search . '%')
                    ->orWhere('role', 'like', '%' . $this->search . '%')
                    ->orWhere('email', 'like', '%' . $this->search . '%');
            });
        })
        ->when($this->role, function ($query) {
            $query->where('role', $this->role);
        })
        ->orderBy('created_at', 'desc')
        ->paginate($this->dataTable);

        return view('livewire.load-adminlist', [
            "user_log" => Auth::user(),
            "title" => 'Profile Settings',
            "date" => Carbon::now('Asia/Jakarta'),
            "datas" => $user,
            "counters" => User::count()
        ]);
    }
}
