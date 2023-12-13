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
                                        class='menu-icon bx bx-notepad'></i>Tambah Prestasi</h3>
                                <div class="myline" style="height: 1px; border-top: 1px solid #ccc "></div>
                                <form class="row g-3 card-header justify-content-center" method="POST"
                                    action="{{ route('kirimPrestasi') }}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="col-md-6">
                                        <label for="nama-kegiatan" class="form-label fw-bold"><span
                                                style="color: red">*</span> NAMA MAHASISWA</label>
                                        <input type="text"
                                            class="form-control @error('nama') is-invalid @enderror"
                                            id="nama-kegiatan" name="nama" required>
                                        @error('nama')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label for="nama-kegiatan" class="form-label fw-bold"><span
                                                style="color: red">*</span> NPM MAHASISWA</label>
                                        <input type="text"
                                            class="form-control @error('npm_nip') is-invalid @enderror"
                                            id="nama-kegiatan" name="npm_nip" required>
                                        @error('npm_nip')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label for="nama-kegiatan" class="form-label fw-bold"><span
                                                style="color: red">*</span> NAMA PRESTASI</label>
                                        <input type="text"
                                            class="form-control @error('nama_prestasi') is-invalid @enderror"
                                            id="nama-kegiatan" name="nama_prestasi" required>
                                        @error('nama_prestasi')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label for="nama-kegiatan" class="form-label fw-bold"><span
                                                style="color: red">*</span> JENIS PRESTASI</label>
                                        <select id="jenis-prestasi" class="form-select" name="jenis_prestasi">
                                            <option value="AKADEMIK">Prestasi Akademik</option>
                                            <option value="NON AKADEMIK">Prestasi Non Akademik</option>
                                        </select>
                                        @error('jenis_prestasi')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label for="nama-kegiatan" class="form-label fw-bold"><span
                                                style="color: red">*</span> NAMA KEGIATAN PERLOMBAAN</label>
                                        <input type="text"
                                            class="form-control @error('nama_kegiatan_perlombaan') is-invalid @enderror"
                                            id="nama-kegiatan" name="nama_kegiatan_perlombaan" required>
                                        @error('nama_kegiatan_perlombaan')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="col-6">
                                        <label for="lokasi-lomba" class="form-label fw-bold"><span
                                                style="color: red">*</span> LOKASI LOMBA</label>
                                        <input type="text"
                                            class="form-control @error('lokasi_lomba') is-invalid @enderror"
                                            id="lokasi-lomba" placeholder="" name="lokasi_lomba" required>
                                        @error('lokasi_lomba')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="col-md-3">
                                        <label for="tahun" class="form-label fw-bold"><span style="color: red">*</span>
                                            TAHUN</label>
                                        <select id="tahun" class="form-select @error('tahun') is-invalid @enderror"
                                            name="tahun" required>
                                            <option>Pilih Tahun</option>
                                            @foreach ($tahun as $thn)
                                                <option value="{{ $thn }}">{{ $thn }}</option>
                                            @endforeach
                                        </select>
                                        @error('tahun')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="col-md-3">
                                        <label for="tanggal-mulai" class="form-label fw-bold"><span
                                                style="color: red">*</span> TANGGAL MULAI</label>
                                        <input type="date"
                                            class="form-control @error('tanggal_mulai') is-invalid @enderror" value=""
                                            name="tanggal_mulai" required>
                                        @error('tanggal_mulai')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="col-md-3">
                                        <label for="tanggal-selesai" class="form-label fw-bold"><span
                                                style="color: red">*</span> TANGGAL SELESAI</label>
                                        <input type="date"
                                            class="form-control @error('tanggal_selesai') is-invalid @enderror"
                                            value="" name="tanggal_selesai" required>
                                        @error('tanggal_selesai')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="col-md-3">
                                        <label for="juara" class="form-label fw-bold"><span style="color: red">*</span>
                                            JUARA</label>
                                        <input list="juara" id="juara"
                                            class="form-control @error('juara') is-invalid @enderror" name="juara"
                                            required>
                                        @error('juara')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="col-md-3">
                                        <label for="tinggat-prestasi" class="form-label fw-bold"><span
                                                style="color: red">*</span> TINGKAT PRESTASI</label>
                                        <select id="tinggat-prestasi"
                                            class="form-select @error('tingkat_prestasi') is-invalid @enderror "
                                            name="tingkat_prestasi" required>
                                            <option selected>Pilih tingkat prestasi</option>
                                            <option value="Internasional">Internasional</option>
                                            <option value="Nasional">Nasional</option>
                                            <option value="Regional">Regional</option>
                                            <option value="Lokal">Lokal</option>
                                        </select>
                                        @error('tingkat_prestasi')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="col-md-3">
                                        <label for="jumlah-peserta" class="form-label fw-bold"><span
                                                style="color: red">*</span> JUMLAH PESERTA</label>
                                        <input type="number"
                                            class="form-control @error('jumlah_peserta') is-invalid @enderror "
                                            name="jumlah_Peserta" required>
                                        @error('jumlah_peserta')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="col-md-3">
                                        <label for="nama-penyelenggara" class="form-label fw-bold"><span
                                                style="color: red">*</span> NAMA PENYELENGGARA</label>
                                        <input type="text"
                                            class="form-control @error('nama_penyelenggara') is-invalid @enderror"
                                            id="nama-penyelenggara" name="nama_penyelenggara" required>
                                        @error('nama_penyelenggara')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="col-md-3">
                                        <label for="url-penyelenggara" class="form-label fw-bold">URL
                                            PENYELENGGARA</label>
                                        <input type="text"
                                            class="form-control @error('url_penyelenggara') is-invalid @enderror"
                                            id="url-penyelenggara" name="url_penyelenggara">
                                        @error('url_penyelenggara')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="col-md-4">
                                        <label for="formFile" class="form-label fw-bold"><span
                                                style="color: red">*</span> SCAN FOTO SERTIFIKAT/ PIALA/ MEDAL </label>
                                        <small class="text-danger">(file pdf | maks 15mb)</small>
                                        <input class="form-control @error('file_penghargaan') is-invalid @enderror"
                                            type="file" id="formFile" name="file_penghargaan" required>
                                        @error('file_penghargaan')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="col-md-4">
                                        <label for="formFile" class="form-label fw-bold">FOTO MENDAPAT PENGHARGAAN
                                        </label>
                                        <small class="text-danger">(file pdf | maks 15mb)</small>
                                        <input class="form-control @error('file_dokumentasi') is-invalid @enderror"
                                            type="file" id="formFile" name="file_dokumentasi_kegiatan">
                                        @error('file_dokumentasi')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="col-md-4">
                                        <label for="formFile" class="form-label fw-bold">SURAT UNDANGAN ATAU SURAT
                                            TUGAS</label>
                                        <small class="text-danger">(file pdf | maks 15mb)</small>
                                        <input class="form-control @error('file_surat_tugas') is-invalid @enderror"
                                            type="file" id="formFile" name="file_surat_tugas">
                                        @error('file_surat_tugas')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
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
        </div>
        @include('partials.footer') 
    </div>
@endsection
