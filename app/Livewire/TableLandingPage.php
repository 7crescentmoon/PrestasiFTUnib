<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Prestasi;
use Livewire\WithPagination;

class TableLandingPage extends Component
{
    public $search = '';

    public $dataTable = '10';

    public $jenisPrestasi = '';
    public $queryString = [
        'search' => ['except' => ''],
    ];
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public function render()
    {
        $prestasi = Prestasi::with('user', 'pengajuan')
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

        })
        ->when($this->jenisPrestasi, function ($query) {
            $query->where('jenis_prestasi', $this->jenisPrestasi);
        })
        ->orderBy('created_at', 'desc')->paginate($this->dataTable);
        return view('livewire.table-landing-page', [
            "datas" => $prestasi,
            "counters" => Prestasi::count()
        ]);
    }


}
