@extends('admin.layouts.main')
@section('content')
    <div class="layout-page">
        <!-- Navbar -->
        @include('partials.navbar')
        <!-- / Navbar -->

        <!-- Content wrapper -->
        <div class="content-wrapper position-relative">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
                <div class="row mt-1">
                    <div class="col-lg-7
                         mb-4 order-0">
                        <div class="card">
                            <div class="d-flex align-items-end row">
                                <div class="col-sm-7">
                                    <div class="card-body">
                                        <h5 class="card-title text-primary">Selamat Datang <span
                                                class="text-uppercase">{{ Auth::user()->nama }}</span></h5>
                                        <p class="mb-4">
                                            " Menjadi Saksi Perjalanan Gemilang Mahasiswa Berprestasi Fakultas Teknik "
                                        </p>

                                        <a href="{{ route('daftarPrestasiUser') }}"
                                            class="btn btn-sm btn-outline-primary">Lihat
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
                    <div class="col-lg-5
                         mb-4 order-0">
                         <div class="card">
                            <div class="d-flex align-items-end row">
                                <div class="col-8">
                                    <div class="card-body">
                                        <h5 class="card-title mb-3 text-nowrap">Anda Memiliki <span class="text-primary fs-6 badge bg-label-primary rounded-pill">{{ $jumlah_prestasi }}</span>  Prestasi</h5></h6>
                                        
                                        <h6 class="card-title mb-3 text-nowrap"><span class="text-primary fs-6 badge bg-label-success rounded-pill me-2 ">{{ $akademik }}</span>Prestasi Akademik</h6>
                                    
                                        <h6 class="card-title mb-3 text-nowrap"><span class="text-primary fs-6 badge bg-label-warning rounded-pill me-2 ">{{ $nonAkademik }}</span>Prestasi Non Akademik</h6>
                                    </div>
                                </div>
                                <div class="col-4 pt-3 ps-0">
                                    <img src="https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo/assets/img/illustrations/prize-light.png"
                                        width="90" height="140" class="rounded-start" alt="View Sales">
                                </div>
                            </div>
                        </div>
                    </div>
                   
                </div>

                <div class="card col rounded overflow-hidden mb-1">
                    <img src="{{ asset('assets/img/FT.jpg') }}"
                        style="object-fit: cover; height: 400px;opacity:80% ;filter: brightness(60%)" />
                </div>
            </div>
        </div>
        @include('partials.footer')
    </div>
@endsection
