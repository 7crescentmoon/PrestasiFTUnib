<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Prestasi;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;

class PrestasiUser extends Component
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
        $daftarPrestasi = Prestasi::with('user', 'pengajuan')->where('user_id', Auth::user()->id)
            ->when($this->search, function ($query) {

                $query->where('nama_prestasi', 'like', '%' . $this->search . '%')
                    ->orWhere('jenis_prestasi', 'like', '%' . $this->search . '%')

                    ->orWhereHas('user', function ($query) {
                        $query->where('nama', 'like', '%' . $this->search . '%')
                            ->orWhere('npm_nip', 'like', '%' . $this->search . '%');
                    })

                    ->orWhereHas('pengajuan', function ($query) {
                        $query->where('tingkat_prestasi', 'like', '%' . $this->search . '%')
                            ->orWhere('juara', 'like', '%' . $this->search . '%');

                    });

            })->orderBy('created_at', 'desc')->paginate($this->dataTable);
        return view('livewire.prestasi-user', [
            "datas" => $daftarPrestasi,
            "counters" => Prestasi::where('user_id', Auth::user()->id)->count()
        ]);
    }
}
