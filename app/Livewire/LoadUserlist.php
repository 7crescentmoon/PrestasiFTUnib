<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;

class LoadUserlist extends Component
{

    public $search = '';
    public $dataTable = '3';

    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public function render()
    {

        $userId = Auth::id();
        $user = User::whereNotIn('role', ['admin', 'super admin'])
            ->where('id', '!=', $userId)
            ->when($this->search, function ($query) {
                $query->where('nama', 'like', '%' . $this->search . '%')
                    ->orWhere('npm_nip', 'like', '%' . $this->search . '%')
                    ->orWhere('jurusan', 'like', '%' . $this->search . '%');
            })->orderBy('created_at', 'desc')->paginate($this->dataTable);

        return view('livewire.load-userlist', [
            "users" => $user
        ]);
    }
}
