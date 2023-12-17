<div class="content-wrapper">
    @include('partials.loading')
    <div class="container-xxl mt-4 flex-grow-1">
        <div class="card">
            <div class="container mt-3 d-flex justify-content-between">
                <h3 class="">
                    <a href="{{ route('userList') }}" class=" text-primary fw-bold">Daftar Pengguna</a>
                    @if (auth()->user()->role == 'super admin')
                        <a href="{{ route('adminList') }}" class="text-secondary fw-bold">/ Daftar Admin</a>
                    @endif
                </h3>
                <div class="">

                    <a href="{{ route('addUserView') }}" class="btn btn-success text-center me-2">Tambah</a>

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
                                style="fill: rgba(255, 255, 255, .9);transform: ;msFilter:;">
                                <path
                                    d="M19 7h-1V2H6v5H5a3 3 0 0 0-3 3v7a2 2 0 0 0 2 2h2v3h12v-3h2a2 2 0 0 0 2-2v-7a3 3 0 0 0-3-3zM8 4h8v3H8V4zm0 16v-4h8v4H8zm11-8h-4v-2h4v2z">
                                </path>
                            </svg>
                            cetak
                        </button>
                    @endif

                </div>
            </div>

            <div
                class="mt-2 mb-3 d-flex  {{ !$search ? 'justify-content-between' : ' justify-content-end' }}
            container">
                @if (!$search)
                    @include('partials.dataTable')
                @endif
                <div class="d-flex gap-3">
                    @if (!$search)
                        <div class="d-flex">
                            <select class="select2 form-select" wire:model.live='jenisJurusan'>
                                <option value="">Pilih Jurusan</option>
                                <option value="Informatika">
                                    Informatika
                                </option>
                                <option value="Teknik Sipil">Teknik
                                    Sipil
                                </option>
                                <option value="Teknik Elektro">Teknik
                                    Elektro
                                </option>
                                <option value="Teknik Mesin">Teknik
                                    Mesin
                                </option>
                                <option value="Arsiterktur">
                                    Arsitektur
                                </option>
                                <option value="Sistem Informasi">Sistem
                                    Informasi</option>
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
            <div class="container my-2 ">
                <div class="table-responsive text-nowrap rounded  mb-3">
                    <table class="table table table-striped" style="font-size: 13px">
                        <thead class="table-secondary">
                            <tr style="color: rgb(23, 23, 23)8)">
                                <th class="fw-bold fs-6">No</th>
                                <th class="fw-bold fs-6">Nama</th>
                                <th class="fw-bold fs-6">Npm</th>
                                <th class="fw-bold fs-6">Email</th>
                                <th class="fw-bold fs-6">Jurusan</th>
                                <th class="fw-bold fs-6">Jenis Kelamin</th>
                                <th class="fw-bold fs-6">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0" wire:loading.remove>
                            @foreach ($datas as $key => $data)
                                <tr>
                                    <td class="text-secondary">
                                        {{ ($datas->currentPage() - 1) * $datas->perPage() + $key + 1 }}</td>
                                    <td class="text-uppercase">
                                        <strong>{{ $data->nama }}</strong>
                                    </td>
                                    <td>{{ $data->npm_nip }}</td>
                                    <td>{{ $data->email }}</td>
                                    <td>{{ $data->jurusan }}</td>
                                    <td>{{ $data->jenis_kelamin }}</td>
                                    <td>

                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                            data-bs-toggle="dropdown">
                                            <i class="bx bx-dots-vertical-rounded"></i>
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item"
                                                href="{{ route('editUserView', encrypt($data->id)) }}"><i
                                                    class="bx bx-edit-alt me-1"></i> Ubah</a>

                                            <a class="dropdown-item" id="delete"
                                                href="{{ route('deleteUser', ['id' => $data->id]) }}"><i
                                                    class="bx bx-trash me-1"></i> Hapus</a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="paginate">
                    @include('partials.paginate')
                </div>
            </div>
        </div>
    </div>
</div>