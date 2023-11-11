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
                                            {{-- <option value="2022">2022</option>
                                            <option value="2021">2021</option>
                                            <option value="2020">2020</option>
                                            <option value="2019">2019</option>
                                            <option value="2018">2018</option>
                                            <option value="2017">2017</option>
                                            <option value="2016">2016</option>
                                            <option value="2015">2015</option>
                                            <option value="2014">2014</option> --}}
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
                            <div class="card">
                                <div class="table-responsive text-nowrap">
                                    <h4 class="text-center mt-3">Daftar Pengajuan</h4>
                                    <div class="myline" style="height: 1px; border-top: 1px solid #ccc "></div>
                                    <table class="table mt-3">
                                        <thead>
                                            <tr class="">
                                                <th>STATUS</th>
                                                <th>NAMA KEGIATAN PERLOMBAAN</th>
                                                <th>LOKASI LOMBA</th>
                                                <th>TAHUN</th>
                                                <th>TANGGAL MULAI</th>
                                                <th>TANGGAL SELESAI</th>
                                                <th>JUARA</th>
                                                <th>TINGKAT PRESTASI</th>
                                                <th>JUMLAH PESERTA</th>
                                                <th>NAMA PENYELENGGARA</th>
                                                <th>URL PENYELENGGARA</th>
                                            </tr>
                                        </thead>
                                        <tbody class="table-border-bottom-0" wire:loading.remove>
                                            @foreach ($pengajuans as $pengajuan)
                                                <tr>
                                                    @if ($pengajuan->user_id === Auth::user()->id)
                                                        @if ($pengajuan->status == 1)
                                                            <td class="text-success">Disetujui</td>
                                                        @elseif($pengajuan->status == 0)
                                                            <td class="text-danger">Menunggu</td>
                                                        @endif
                                                        </td>
                                                        <td>{{ $pengajuan->nama_kegiatan_perlombaan }}</td>
                                                        <td>{{ $pengajuan->lokasi_lomba }}</td>
                                                        <td>{{ $pengajuan->tahun }}</td>
                                                        <td>{{ $pengajuan->tanggal_mulai }}</td>
                                                        <td>{{ $pengajuan->tanggal_selesai }}</td>
                                                        <td>{{ $pengajuan->juara }}</td>
                                                        <td>{{ $pengajuan->tingkat_prestasi }}</td>
                                                        <td>{{ $pengajuan->jumlah_Peserta }}</td>
                                                        <td>{{ $pengajuan->nama_penyelenggara }}</td>
                                                        <td>{{ $pengajuan->url_penyelenggara }}</td>

                                                </tr>
                                            @endif
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>


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
