<div class="content-wrapper">
    @include('partials.loading')
    <div class="container-xxl flex-grow-1 container-p-y ">
        <div class="card">
            <div class="container mt-3 mb-2 d-flex justify-content-between">
                <h3 class="text-primary fw-bold">Daftar Prestasi Anda</h3>
                <div class="">
                    @if ($search)
                        <button type="button" class="btn btn-secondary text-center" wire:click="printBySearch"
                            data-bs-toggle="dropdown">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                style="fill: rgba(255, 255, 255, 1);transform: ;msFilter:;">
                                <path
                                    d="M19 7h-1V2H6v5H5a3 3 0 0 0-3 3v7a2 2 0 0 0 2 2h2v3h12v-3h2a2 2 0 0 0 2-2v-7a3 3 0 0 0-3-3zM8 4h8v3H8V4zm0 16v-4h8v4H8zm11-8h-4v-2h4v2z">
                                </path>
                            </svg>
                            cetak
                        </button>
                    @else
                        <button type="button" class="btn btn-secondary text-center" wire:click="print"
                            data-bs-toggle="dropdown">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                style="fill: rgba(255, 255, 255, 1);transform: ;msFilter:;">
                                <path
                                    d="M19 7h-1V2H6v5H5a3 3 0 0 0-3 3v7a2 2 0 0 0 2 2h2v3h12v-3h2a2 2 0 0 0 2-2v-7a3 3 0 0 0-3-3zM8 4h8v3H8V4zm0 16v-4h8v4H8zm11-8h-4v-2h4v2z">
                                </path>
                            </svg>
                            cetak
                        </button>
                    @endif
                </div>
            </div>
            <div class=" mb-3 d-flex justify-content-between container">
                @include('partials.dataTable')

                <div class="d-flex gap-3">
                    @if (!$search)
                        <div class="d-flex">
                            <select id="currency" class="select2 form-select" wire:model.live='jenisPrestasi'>
                                <option value="" selected>Jenis Prestasi</option>
                                <option value="AKADEMIK">Akademik</option>
                                <option value="NON AKADEMIK">Non Akademik</option>
                            </select>
                        </div>
                    @endif
                    <div class="d-flex gap-2 align-items-center nav-item p-1 rounded" style="background-color: #e1e1e1">

                        <i class="bx bx-search fs-4 lh-0"></i>
                        <input type="text" class="form-control border-0 shadow-none text-black"
                            placeholder="Search..." wire:model.live='search' class="bg-white" />
                    </div>
                </div>
            </div>
            @php
                $isEmpty = false;
            @endphp
            <div class="container my-2">
                <div class="table-responsive text-nowrap rounded">
                    <table class="table table-striped" style="font-size: 13px">
                        <thead class="table-secondary">
                            <tr>
                                <th class="fw-bold fs-6 text-black">No</th>
                                <th class="fw-bold fs-6 text-black">nama prestasi</th>
                                <th class="fw-bold fs-6 text-black">Jenis Prestasi</th>
                                <th class="fw-bold fs-6 text-black">tingkat prestasi</th>
                                <th class="fw-bold fs-6 text-black">juara</th>
                                <th class="fw-bold fs-6 text-black">aksi</th>
                            </tr>
                        </thead>
                        @foreach ($datas as $key => $data)
                            @php
                                $isEmpty = true;
                            @endphp
                            <tbody class="table-border-bottom-0" wire:loading.remove>
                                <td class="text-secondary">
                                    {{ ($datas->currentPage() - 1) * $datas->perPage() + $key + 1 }} </td>
                                <td class="text-secondary">{{ $data->nama_prestasi }}</td>
                                <td class="text-secondary">{{ $data->jenis_prestasi }}</td>
                                <td class="text-secondary">{{ $data->pengajuan->tingkat_prestasi }}</td>
                                <td class="text-secondary">{{ $data->pengajuan->juara }}</td>
                                <td class="text-secondary">

                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                        data-bs-toggle="dropdown">
                                        <i class="bx bx-dots-vertical-rounded"></i>
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item"
                                            href="{{ route('dataPrestasiMahasiswa', encrypt($data->id)) }}"><i
                                                class='bx bxs-book-alt'></i> Data
                                            Prestasi</a>
                                    </div>
                                </td>
                            </tbody>
                        @endforeach
                    </table>
                    @if (!$isEmpty)
                        <div class="text-secondary w-100 d-flex justify-content-center align-items-center mt-2"
                            style="opacity: 75%">
                            <h4>--Data Prestasi kosong--</h4>
                        </div>
                    @endif
                </div>
                <div class="paginate">
                    @include('partials.paginate')
                </div>

            </div>
        </div>
    </div>
</div>
