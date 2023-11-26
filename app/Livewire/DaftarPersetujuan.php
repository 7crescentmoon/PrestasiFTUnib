<?php

namespace App\Livewire;

use Carbon\Carbon;
use App\Models\User;
use Livewire\Component;
use App\Models\Pengajuan;
use Illuminate\Support\Facades\Auth;
use Livewire\WithPagination;

class DaftarPersetujuan extends Component
{

    public $search = '';

    public $dataTable = '10';


    public $queryString = [
        'search' => ['except' => ''],
    ];

    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    public function render()
    {
                $pengajuan = Pengajuan::with('user')->where('status', 0 )
                ->when($this->search, function ($query) {
                    $query->where('nama_kegiatan_perlombaan', 'like', '%' . $this->search . '%')
                            ->orWhere('created_at', 'like', '%' . $this->search . '%')
                    ->orWhereHas('user', function ($query) {
                        $query->where('nama', 'like', '%' . $this->search . '%')
                            ->orWhere('npm_nip', 'like', '%' . $this->search . '%');
                    });
                })
                ->orderBy('created_at', 'desc')->paginate($this->dataTable);
                    
        return view('livewire.daftar-persetujuan', [
            "datas" => $pengajuan,
            "counters" => Pengajuan::count(),
            'jumlah_pengajuan' => Pengajuan::where('status', 0 )->count()
        ]);
    }

    public function updatingSearch()
    {
        $this->resetPage(); 
    }
}
