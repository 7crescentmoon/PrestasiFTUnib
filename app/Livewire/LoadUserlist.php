<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;

class LoadUserlist extends Component
{

    public $search = '';
    public $dataTable = '10';

    public $jenisJurusan = '';

    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public function print()
    {
        return redirect()->route('userPrint',['data' => $this->dataTable , 'jurusan' => $this->jenisJurusan]);
    }
    public function printBySearch()
    {
        return redirect()->route('adminPrintBySearch',['search' => $this->search]);
    }
    public function render()
    {

        $userId = Auth::id();
        $user = User::whereNotIn('role', ['admin', 'super admin'])
            ->where('id', '!=', $userId)
            ->when($this->search, function ($query) {
                $query->where('nama', 'like', '%' . $this->search . '%')
                    ->orWhere('npm_nip', 'like', '%' . $this->search . '%')
                    ->orWhere('jurusan', 'like', '%' . $this->search . '%');
            })
            ->when($this->jenisJurusan, function ($query) {
                $query->where('Jurusan', $this->jenisJurusan);
            })
            ->orderBy('created_at', 'desc')->paginate($this->dataTable);

        return view('livewire.load-userlist', [
            "datas" => $user,
            "counters" => User::count()
        ]);
    }
}
