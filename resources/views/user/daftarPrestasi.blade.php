@extends('admin.layouts.main')
@section('content')
<div class="layout-container">
    <!-- Layout container -->
    <div class="layout-page">
        <!-- Navbar -->
        @include('partials.navbar')
        <!-- / Navbar -->

        <!-- Content wrapper -->
        <div class="content-wrapper position-relative">
            <!-- Content -->
           
            <div class="container navbar-nav mt-3">
                <div class="bg-white d-flex align-items-center nav-item p-1 rounded" style="width: 24%">
                    <i class="bx bx-search fs-4 lh-0"></i>
                    <input type="text" class="form-control border-0 shadow-none" placeholder="Search..."
                        aria-label="Search..." />
                </div>
            </div>
            
            <div class="container-xxl flex-grow-1 container-p-y ">
                <!-- Layout -->

                <div class="card">
                    <h5 class="card-header text-primary">
                        Daftar Prestasi Anda</a>
                    </h5>

                    <div class="table-responsive text-nowrap">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="fw-bold text-primary">Nama</th>
                                    <th class="fw-bold text-primary">Npm</th>
                                    <th class="fw-bold text-primary">Jurusan</th>
                                    <th class="fw-bold text-primary">Jenis Prestasi</th>
                                    <th class="fw-bold text-primary">nama prestasi</th>
                                    <th class="fw-bold text-primary">tingkat prestasi</th>
                                    <th class="fw-bold text-primary">juara</th>
                       

                                </tr>
                            </thead>
                            @foreach ($datas as $data)
                                <tbody class="table-border-bottom-0" wire:loading.remove>
                                    <td class="text-secondary">{{ $data->user->nama }}</td>
                                    <td class="text-secondary">{{ $data->user->npm_nip }}</td>
                                    <td class="text-secondary">{{ $data->user->jurusan }}</td>
                                    <td class="text-secondary">{{ $data->jenis_prestasi }}</td>
                                    <td class="text-secondary">{{ $data->nama_prestasi }}</td>
                                    <td class="text-secondary">{{ $data->pengajuan->tingkat_prestasi }}</td>
                                    <td class="text-secondary">{{ $data->pengajuan->juara }}</td>
                                </tbody>
                            @endforeach
                        </table>
                    </div>
                </div>
                <!-- / Content -->
                <div class="content-backdrop fade"></div>
            </div>
            <!-- Content wrapper -->
        </div>
        <!-- / Layout page -->
    </div>

    <!-- Overlay -->
    <div class="layout-overlay layout-menu-toggle"></div>
</div>
@endsection
