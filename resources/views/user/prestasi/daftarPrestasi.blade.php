@extends('user.layouts.main')
@section('content')
    <div class="layout-container">
        <!-- Layout container -->
        <div class="layout-page">
            <!-- Navbar -->
            @include('partials.navbar')
            <!-- / Navbar -->

            <!-- Content wrapper -->
            <div class="content-wrapper position-relative">
                {{-- <!-- Content -->

                <div class="container navbar-nav mt-3">
                    <div class="bg-white d-flex align-items-center nav-item p-1 rounded" style="width: 24%">
                        <i class="bx bx-search fs-4 lh-0"></i>
                        <input type="text" class="form-control border-0 shadow-none" placeholder="Search..."
                            aria-label="Search..." />
                    </div>
                </div> --}}

                <div class="container-xxl flex-grow-1 container-p-y ">
                    <!-- Layout -->
                    <div class="card">

                        <h5 class="card-header text-primary">
                            Daftar Prestasi Anda</a>
                        </h5>

                        <div class="table-responsive text-nowrap">
                            <table class="table table-striped">
                                <thead class="table-secondary">
                                    <tr>
                                        <th class="fw-bold text-primary">No</th>
                                        <th class="fw-bold text-primary">nama prestasi</th>
                                        <th class="fw-bold text-primary">Jenis Prestasi</th>
                                        <th class="fw-bold text-primary">tingkat prestasi</th>
                                        <th class="fw-bold text-primary">juara</th>
                                        <th class="fw-bold text-primary">aksi</th>


                                    </tr>
                                </thead>
                                @foreach ($datas as $data)
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
