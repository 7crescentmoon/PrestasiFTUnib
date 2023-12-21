<?php

namespace App\Livewire;

use Carbon\Carbon;
use App\Models\User;
use Livewire\Component;
use App\Models\Prestasi;
use App\Models\Pengajuan;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;

class DaftarPrestasi extends Component
{

    public $search = '';

    public $dataTable = '10';

    public $jenisPrestasi = '';

    public $jenisJurusan = '';
    public $queryString = [
        'search' => ['except' => ''],
    ];
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public function print()
    {
        return redirect()->route('prestasiPrint', ['data' => $this->dataTable, 'prestasi' => $this->jenisPrestasi, 'jurusan' => $this->jenisJurusan]);
    }
    public function printBySearch()
    {
        return redirect()->route('prestasiPrintBySearch', ['search' => $this->search]);
    }
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

            ->when($this->jenisJurusan, function ($query) {
                $query->whereHas('user', function ($query) {
                    $query->where('Jurusan', $this->jenisJurusan);
                });
            })
            ->when($this->jenisPrestasi, function ($query) {
                $query->where('jenis_prestasi', $this->jenisPrestasi);
            })
            ->orderBy('created_at', 'desc')->paginate($this->dataTable);


        return view('livewire.daftar-prestasi', [
            "datas" => $prestasi,
            "counters" => Prestasi::count()
        ]);
    }
}
