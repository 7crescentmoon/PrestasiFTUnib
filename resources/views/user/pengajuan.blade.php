@extends('admin.layouts.main')
@section('content')
    <div class="layout-container">
        <!-- Layout container -->
        <div class="layout-page">
            <!-- Navbar -->
            @include('partials.navbar')
            <!-- / Navbar -->

            <!-- Content wrapper -->
            <div class="content-wrapper">
                <!-- Content -->

                <div class="container-xxl flex-grow-1 container-p-y">
                    <!-- Layout -->
                    <div class="row ">
                        <div class="col-xxl">
                            <div class="card mb-4">
                                <h3 class="card-header d-flex align-items-center m-2"> <i
                                        class='menu-icon bx bx-notepad'></i>Pengajuan Prestasi</h3>
                                <div class="myline" style="height: 1px; border-top: 1px solid #ccc "></div>
                                <form class="row g-3 card-header justify-content-center" method="POST"
                                    action="{{ route('kirimPengajuan') }}" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" class="form-control" id="nama" name="nama" value="{{ Auth::user()->nama }}">
                                    <input type="hidden" class="form-control" id="npm-nip" name="npm_nip" value="{{ Auth::user()->npm_nip }}">
                                    <div class="col-md-6">
                                        <label for="nama-kegiatan" class="form-label fw-bold"><span
                                                style="color: red">*</span> NAMA KEGIATAN PERLOMBAAN</label>
                                        <input type="text" class="form-control" id="nama-kegiatan" name="nama_kegiatan_perlombaan"
                                            required>
                                    </div>

                                    <div class="col-6">
                                        <label for="lokasi-lomba" class="form-label fw-bold"><span
                                                style="color: red">*</span> LOKASI LOMBA</label>
                                        <input type="text" class="form-control" id="lokasi-lomba" placeholder=""
                                            name="lokasi_lomba" required>
                                    </div>

                                    <div class="col-md-3">
                                        <label for="tahun" class="form-label fw-bold"><span style="color: red">*</span>
                                            TAHUN</label>
                                        <select id="tahun" class="form-select" name="tahun" required>
                                            <option>Pilih Tahun</option>
                                            <option value="2023">2023</option>
                                            <option value="2022">2022</option>
                                            <option value="2021">2021</option>
                                            <option value="2020">2020</option>
                                            <option value="2019">2019</option>
                                            <option value="2018">2018</option>
                                            <option value="2017">2017</option>
                                            <option value="2016">2016</option>
                                            <option value="2015">2015</option>
                                            <option value="2014">2014</option>
                                        </select>
                                    </div>

                                    <div class="col-md-3">
                                        <label for="tanggal-mulai" class="form-label fw-bold"><span
                                                style="color: red">*</span> TANGGAL MULAI</label>
                                        <input type="date" class="form-control" value="" name="tanggal_mulai"
                                            required>
                                    </div>

                                    <div class="col-md-3">
                                        <label for="tanggal-selesai" class="form-label fw-bold"><span
                                                style="color: red">*</span> TANGGAL SELESAI</label>
                                        <input type="date" class="form-control" value="" name="tanggal_selesai"
                                            required>
                                    </div>

                                    <div class="col-md-3">
                                        <label for="juara" class="form-label fw-bold"><span style="color: red">*</span>
                                            JUARA</label>
                                        <input list="juara" id="juara" class="form-control" name="juara" required>
                                    </div>

                                    {{-- <div class="col-md-5">
                                        <label for="jenis-prestasi" class="form-label fw-bold"><span
                                                style="color: red">*</span> JENIS PRESTASI</label>
                                        <select id="jenis-prestasi" class="form-select" name="jenis_prestasi">
                                            <option>Pilih jenis prestasi</option>
                                            <option value="1">Prestasi Akademik</option>
                                            <option value="2">Prestasi Non Akademik</option>
                                        </select>
                                    </div> --}}

                                    <div class="col-md-3">
                                        <label for="tinggat-prestasi" class="form-label fw-bold"><span
                                                style="color: red">*</span> TINGKAT PRESTASI</label>
                                        <select id="tinggat-prestasi" class="form-select" name="tingkat_prestasi" required>
                                            <option selected>Pilih tingkat prestasi</option>
                                            <option value="Internasional">Internasional</option>
                                            <option value="Nasional">Nasional</option>
                                            <option value="Regional">Regional</option>
                                            <option value="Lokal">Lokal</option>
                                        </select>
                                    </div>

                                    <div class="col-md-3">
                                        <label for="jumlah-peserta" class="form-label fw-bold"><span
                                                style="color: red">*</span> JUMLAH PESERTA</label>
                                        <input type="number" class="form-control" name="jumlah_Peserta" required>
                                    </div>

                                    <div class="col-md-3">
                                        <label for="nama-penyelenggara" class="form-label fw-bold"><span
                                                style="color: red">*</span> NAMA PENYELENGGARA</label>
                                        <input type="text" class="form-control" id="nama-penyelenggara"
                                            name="nama_penyelenggara" required>
                                    </div>

                                    <div class="col-md-3">
                                        <label for="url-penyelenggara" class="form-label fw-bold">URL
                                            PENYELENGGARA</label>
                                        <input type="text" class="form-control" id="url-penyelenggara"
                                            name="url_penyelenggara">
                                    </div>

                                    <div class="col-md-4">
                                        <label for="formFile" class="form-label fw-bold"><span
                                                style="color: red">*</span> SCAN FOTO SERTIFIKAT/ PIALA/ MEDAL </label>
                                        <small class="text-danger">(file berbentuk pdf)</small>
                                        <input class="form-control" type="file" id="formFile" name="file_penghargaan"
                                            required>
                                    </div>

                                    <div class="col-md-4">
                                        <label for="formFile" class="form-label fw-bold">FOTO MENDAPAT PENGHARGAAN
                                        </label>
                                        <small class="text-danger">(file berbentuk pdf)</small>
                                        <input class="form-control" type="file" id="formFile"
                                            name="file_dokumentasi_kegiatan">
                                    </div>

                                    <div class="col-md-4">
                                        <label for="formFile" class="form-label fw-bold">SURAT UNDANGAN ATAU SURAT
                                            TUGAS</label>
                                        <small class="text-danger">(file berbentuk pdf)</small>
                                        <input class="form-control" type="file" id="formFile"
                                            name="file_surat_tugas">
                                    </div>
                                    <div class="col-12 text-center">
                                        <button type="submit" class="btn btn-primary m-3">Kirim</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Content wrapper -->
        </div>
        <!-- / Layout page -->
    </div>
@endsection
