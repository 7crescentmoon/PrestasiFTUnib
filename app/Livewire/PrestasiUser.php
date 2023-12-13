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

    public $jenisPrestasi = '';
    public $queryString = [
        'search' => ['except' => ''],
    ];
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public function print()
    {
        return redirect()->route('prestasiUserPrint',['data' => $this->dataTable , 'prestasi' => $this->jenisPrestasi]);
    }
    public function printBySearch()
    {
        return redirect()->route('prestasiUserPrintBySearch',['search' => $this->search]);
    }
    public function render()
    {
        $daftarPrestasi = Prestasi::with('user', 'pengajuan')
            ->where('user_id', Auth::user()->id)
            ->when($this->search, function ($query) {
                $search = $this->search;
                $query->where(function ($query) use ($search) {
                    $query->where('nama_prestasi', 'like', "%$search%")
                        ->orWhere('jenis_prestasi', 'like', "%$search%")
                        ->orWhereHas('user', function ($query) use ($search) {
                            $query->where('nama', 'like', "%$search%")
                                ->orWhere('npm_nip', 'like', "%$search%");
                        })
                        ->orWhereHas('pengajuan', function ($query) use ($search) {
                            $query->where('tingkat_prestasi', 'like', "%$search%")
                                ->orWhere('juara', 'like', "%$search%");
                        });
                });
            })
            ->when($this->jenisPrestasi, function ($query) {
                $query->where('jenis_prestasi', $this->jenisPrestasi);
            })
            ->orderBy('created_at', 'desc')
            ->paginate($this->dataTable);

        return view('livewire.prestasi-user', [
            "datas" => $daftarPrestasi,
            "counters" => Prestasi::where('user_id', Auth::user()->id)->count()
        ]);
    }
}
