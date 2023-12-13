@extends('admin.layouts.main')
@section('content')
    <div class="layout-page">
        <!-- Navbar -->
        @include('partials.navbar')
        <!-- / Navbar -->

        <!-- Content wrapper -->
        <div class="content-wrapper position-relative">
            <div class="container-xxl flex-grow-1 container-p-y ">
                <div class="row">
                    <div class="col-lg-8 mb-4 order-0">
                        <div class="card">
                            <div class="d-flex align-items-end row">
                                <div class="col-sm-7">
                                    <div class="card-body">
                                        <h5 class="card-title text-primary">Selamat Datang <span
                                                class="text-uppercase">{{ Auth::user()->nama }}</span></h5>
                                        <p class="mb-4">
                                            Menjadi Saksi Perjalanan Gemilang Mahasiswa Berprestasi Fakultas
                                            Teknik
                                        </p>

                                        <a href="{{ route('daftarPrestasi') }}" class="btn btn-sm btn-outline-primary">Lihat
                                            Prestasi</a>
                                    </div>
                                </div>
                                <div class="col-sm-5 text-center text-sm-left">
                                    <div class="card-body pb-0 px-0 px-md-4">
                                        <img src="/assets/img/man-with-laptop-light.png" height="140"
                                            alt="View Badge User" data-app-dark-img="illustrations/man-with-laptop-dark.png"
                                            data-app-light-img="illustrations/man-with-laptop-light.png" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12 order-1 mb-lg-0 mb-md-3 mb-sm-4">
                        <div class="row">
                            <div class="col-lg-6 col-md-12 col-ms-7 col-6 mb-md-3">
                                <div class="card">
                                    <div class="">
                                        <p class="text-center p-1">Jumlah <span class="text-primary fw-bold">Mahasiswa</span>
                                            Berprestasi
                                        </p>
                                        <div class="text-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40"
                                                viewBox="0 0 24 24" style="fill: #FFD700;transform: ;msFilter:;">
                                                <path
                                                    d="M21 4h-3V3a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1v1H3a1 1 0 0 0-1 1v3c0 4.31 1.8 6.91 4.82 7A6 6 0 0 0 11 17.91V20H9v2h6v-2h-2v-2.09A6 6 0 0 0 17.18 15c3-.1 4.82-2.7 4.82-7V5a1 1 0 0 0-1-1zM4 8V6h2v6.83C4.22 12.08 4 9.3 4 8zm14 4.83V6h2v2c0 1.3-.22 4.08-2 4.83z">
                                                </path>
                                            </svg>
                                        </div>
                                        <div class="text-center">
                                            <p class="fs-3 text-primary badge bg-label-primary rounded-pill mt-1">{{ $laki_laki }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12 col-ms-7 col-6">
                                <div class="card">
                                    <p class="text-center p-1">Jumlah <span class="text-warning fw-bold">Mahasiswi</span>
                                        Berprestasi</p>
                                    <div class="">
                                        <div class="text-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40"
                                                viewBox="0 0 24 24" style="fill: #FFD700;transform: ;msFilter:;">
                                                <path
                                                    d="M21 4h-3V3a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1v1H3a1 1 0 0 0-1 1v3c0 4.31 1.8 6.91 4.82 7A6 6 0 0 0 11 17.91V20H9v2h6v-2h-2v-2.09A6 6 0 0 0 17.18 15c3-.1 4.82-2.7 4.82-7V5a1 1 0 0 0-1-1zM4 8V6h2v6.83C4.22 12.08 4 9.3 4 8zm14 4.83V6h2v2c0 1.3-.22 4.08-2 4.83z">
                                                </path>
                                            </svg>
                                        </div>
                                        <div class="text-center">
                                            <p class="fs-3 text-warning badge bg-label-warning rounded-pill mt-1">{{ $perempuan }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card col rounded overflow-hidden">
                    <img src="{{ asset('assets/img/FT.jpg') }}"
                        style="object-fit: cover; height: 400px;opacity:80% ;filter: brightness(60%)" />
                </div>
            </div>
            @include('partials.footer')
        </div>
    </div>
@endsection
