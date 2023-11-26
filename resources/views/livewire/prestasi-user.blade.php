<div class="content-wrapper">
    @include('partials.loading')
    <div class="container-xxl flex-grow-1 container-p-y ">
        <!-- Layout -->
        <div class="card">
            <h3 class="text-primary container mt-3">
                Daftar Prestasi Anda</a>
            </h3>
            <div class=" mb-3 d-flex justify-content-between container">
                @include('partials.dataTable')

                <div class="d-flex gap-2 align-items-center nav-item p-1 rounded" style="background-color: #e1e1e1">
                    <i class="bx bx-search fs-4 lh-0"></i>
                    <input type="text" class="form-control border-0 shadow-none text-black" placeholder="Search..."
                        wire:model.live='search' class="bg-white" />
                </div>
            </div>
            @php
                $isEmpty = false;
            @endphp
            <div class="container my-2">
                <div class="table-responsive text-nowrap rounded">
                    <table class="table table-striped">
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
                        @foreach ($datas as $data)
                            @php
                                $isEmpty = true;
                            @endphp
                            <tbody class="table-border-bottom-0" wire:loading.remove>
                                <td class="text-secondary">{{ $loop->iteration }}</td>
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
