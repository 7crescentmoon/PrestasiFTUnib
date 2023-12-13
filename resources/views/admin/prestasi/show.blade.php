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
                    <div class="row">
                        <div class="col-xxl ">
                            <div class="card mb-4 p-2">

                                <div class="text-center text-black mt-2">
                                    @if ($prestasi->user->profil)
                                        <img src="{{ asset('storage/' . $prestasi->user->profil) }}" alt="user-avatar"
                                            class="rounded border mb-3" height="100" width="100"
                                            style="object-fit: cover;" id="uploadedAvatar" />
                                    @else
                                        <img src="{{ asset('assets/img/user-profile-default.png') }}" alt="user-avatar"
                                            class="rounded border mb-3" height="100" width="100"
                                            style="object-fit: cover;" id="uploadedAvatar" />
                                    @endif
                                    <h3 class="fw-bold">{{ $prestasi->user->nama }}</h3>
                                    <h4 class="fs-5"><i>{{ $prestasi->user->npm_nip }} /
                                            {{ $prestasi->user->jurusan }}</i>
                                    </h4>
                                </div>
                                <div class="row card-header g-3 justify-content-center">
                                    <div class="col-md-5">
                                        <label for="nama-kegiatan" class="form-label fw-bold"></span> NAMA PRESTASI
                                            MAHASISWA</label>
                                        <input type="text" class="form-control" id="nama-kegiatan" disabled
                                            name="nama_kegiatan_perlombaan" value="{{ $prestasi->nama_prestasi }}">

                                    </div>

                                    <div class="col-md-5">
                                        <label for="nama-kegiatan" class="form-label fw-bold"></span> JENIS PRESTASI</label>
                                        <input type="text" class="form-control" id="nama-kegiatan" disabled
                                            name="nama_kegiatan_perlombaan" value="{{ $prestasi->jenis_prestasi }}">

                                    </div>

                                    <div class="col-md-6">
                                        <label for="nama-kegiatan" class="form-label fw-bold"></span> NAMA KEGIATAN
                                            PERLOMBAAN</label>
                                        <input type="text" class="form-control" id="nama-kegiatan" disabled
                                            name="nama_kegiatan_perlombaan"
                                            value="{{ $prestasi->pengajuan->nama_kegiatan_perlombaan }}">

                                    </div>

                                    <div class="col-6">
                                        <label for="lokasi-lomba" class="form-label fw-bold"></span> LOKASI LOMBA</label>
                                        <input type="text" class="form-control" id="lokasi-lomba" placeholder="" disabled
                                            name="lokasi_lomba" value="{{ $prestasi->pengajuan->lokasi_lomba }}">

                                    </div>

                                    <div class="col-md-3">
                                        <label for="tahun" class="form-label fw-bold">
                                            TAHUN</label>
                                        <input type="text" class="form-control " id="tahun" placeholder="" disabled
                                            name="tahun" value="{{ $prestasi->pengajuan->tahun }}">

                                    </div>

                                    <div class="col-md-3">
                                        <label for="tanggal-mulai" class="form-label fw-bold"></span> TANGGAL MULAI</label>
                                        <input type="text" class="form-control"
                                            value="{{ $prestasi->pengajuan->tanggal_mulai }}" disabled name="tanggal_mulai"
                                            value="">


                                    </div>

                                    <div class="col-md-3">
                                        <label for="tanggal-selesai" class="form-label fw-bold"></span> TANGGAL
                                            SELESAI</label>
                                        <input type="text" class="form-control"
                                            value="{{ $prestasi->pengajuan->tanggal_mulai }}" disabled
                                            name="tanggal_selesai" value="">


                                    </div>

                                    <div class="col-md-3">
                                        <label for="juara" class="form-label fw-bold">Juara</label>
                                        <input list="juara" id="juara" class="form-control" name="juara" disabled
                                            value="{{ $prestasi->pengajuan->juara }}">

                                    </div>

                                    <div class="col-md-3">
                                        <label for="tinggat-prestasi" class="form-label fw-bold"></span> TINGKAT
                                            PRESTASI</label>
                                        <input list="tingkat_prestasi" id="tingkat_prestasi" class="form-control" disabled
                                            name="tingkat_prestasi" value="{{ $prestasi->pengajuan->tingkat_prestasi }}">


                                    </div>

                                    <div class="col-md-3">
                                        <label for="jumlah-peserta" class="form-label fw-bold"></span> JUMLAH
                                            PESERTA</label>
                                        <input type="number" class="form-control" disabled name="jumlah_Peserta"
                                            value="{{ $prestasi->pengajuan->jumlah_Peserta }}">


                                    </div>

                                    <div class="col-md-3">
                                        <label for="nama-penyelenggara" class="form-label fw-bold"></span> NAMA
                                            PENYELENGGARA</label>
                                        <input type="text" class="form-control" id="nama-penyelenggara" disabled
                                            name="nama_penyelenggara"
                                            value="{{ $prestasi->pengajuan->nama_penyelenggara }}">


                                    </div>

                                    <div class="col-md-3">
                                        <label for="url-penyelenggara" class="form-label fw-bold">URL
                                            PENYELENGGARA</label>
                                        <input type="text" class="form-control" id="url-penyelenggara" disabled
                                            name="url_penyelenggara"
                                            value="{{ $prestasi->pengajuan->url_penyelenggara }}">


                                    </div>
                                    </form>

                                    <div class="row g-3 card-header justify-content-center">
                                        <div class="col-md-5 col-lg-4 mt-4">
                                            <div class="card text-center">
                                                <div class="card-header">SCAN FOTO SERTIFIKAT/ PIALA/ MEDAL</div>
                                                <div class="card-body">
                                                    @if ($prestasi->pengajuan->file_penghargaan)
                                                        <p>
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="50"
                                                                height="50" viewBox="0 0 24 24"
                                                                style="fill: rgba(0, 0, 0, .2);transform: ;msFilter:;">
                                                                <path
                                                                    d="M8.267 14.68c-.184 0-.308.018-.372.036v1.178c.076.018.171.023.302.023.479 0 .774-.242.774-.651 0-.366-.254-.586-.704-.586zm3.487.012c-.2 0-.33.018-.407.036v2.61c.077.018.201.018.313.018.817.006 1.349-.444 1.349-1.396.006-.83-.479-1.268-1.255-1.268z">
                                                                </path>
                                                                <path
                                                                    d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8l-6-6zM9.498 16.19c-.309.29-.765.42-1.296.42a2.23 2.23 0 0 1-.308-.018v1.426H7v-3.936A7.558 7.558 0 0 1 8.219 14c.557 0 .953.106 1.22.319.254.202.426.533.426.923-.001.392-.131.723-.367.948zm3.807 1.355c-.42.349-1.059.515-1.84.515-.468 0-.799-.03-1.024-.06v-3.917A7.947 7.947 0 0 1 11.66 14c.757 0 1.249.136 1.633.426.415.308.675.799.675 1.504 0 .763-.279 1.29-.663 1.615zM17 14.77h-1.532v.911H16.9v.734h-1.432v1.604h-.906V14.03H17v.74zM14 9h-1V4l5 5h-4z">
                                                                </path>
                                                            </svg>
                                                        </p>

                                                        <button id="file_penghargaan"
                                                            data-pdf="{{ asset('storage/' . $prestasi->pengajuan->file_penghargaan) }}"
                                                            class="btn btn-secondary">Lihat file</button>
                                                    @else
                                                        <p class="card-text">File Tidak ada</p>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>


                                        <div class="col-md-5 col-lg-4 mt-4">
                                            <div class="card text-center">
                                                <div class="card-header">FOTO MENDAPAT PENGHARGAAN</div>
                                                <div class="card-body">
                                                    @if ($prestasi->pengajuan->file_dokumentasi_kegiatan)
                                                        <p>
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="50"
                                                                height="50" viewBox="0 0 24 24"
                                                                style="fill: rgba(0, 0, 0, .2);transform: ;msFilter:;">
                                                                <path
                                                                    d="M8.267 14.68c-.184 0-.308.018-.372.036v1.178c.076.018.171.023.302.023.479 0 .774-.242.774-.651 0-.366-.254-.586-.704-.586zm3.487.012c-.2 0-.33.018-.407.036v2.61c.077.018.201.018.313.018.817.006 1.349-.444 1.349-1.396.006-.83-.479-1.268-1.255-1.268z">
                                                                </path>
                                                                <path
                                                                    d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8l-6-6zM9.498 16.19c-.309.29-.765.42-1.296.42a2.23 2.23 0 0 1-.308-.018v1.426H7v-3.936A7.558 7.558 0 0 1 8.219 14c.557 0 .953.106 1.22.319.254.202.426.533.426.923-.001.392-.131.723-.367.948zm3.807 1.355c-.42.349-1.059.515-1.84.515-.468 0-.799-.03-1.024-.06v-3.917A7.947 7.947 0 0 1 11.66 14c.757 0 1.249.136 1.633.426.415.308.675.799.675 1.504 0 .763-.279 1.29-.663 1.615zM17 14.77h-1.532v.911H16.9v.734h-1.432v1.604h-.906V14.03H17v.74zM14 9h-1V4l5 5h-4z">
                                                                </path>
                                                            </svg>
                                                        </p>

                                                        <button id="file_dokumentasi_kegiatan"
                                                            data-pdf="{{ asset('storage/' . $prestasi->pengajuan->file_dokumentasi_kegiatan) }}"
                                                            class="btn btn-secondary">Lihat file</button>
                                                    @else
                                                        <p class="card-text">File tidak ada</p>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-5 col-lg-4 mt-4">
                                            <div class="card text-center">
                                                <div class="card-header">SURAT UNDANGAN ATAU SURAT
                                                    TUGAS</div>
                                                <div class="card-body">

                                                    @if ($prestasi->pengajuan->file_surat_tugas)
                                                        <p>
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="50"
                                                                height="50" viewBox="0 0 24 24"
                                                                style="fill: rgba(0, 0, 0, .2);transform: ;msFilter:;">
                                                                <path
                                                                    d="M8.267 14.68c-.184 0-.308.018-.372.036v1.178c.076.018.171.023.302.023.479 0 .774-.242.774-.651 0-.366-.254-.586-.704-.586zm3.487.012c-.2 0-.33.018-.407.036v2.61c.077.018.201.018.313.018.817.006 1.349-.444 1.349-1.396.006-.83-.479-1.268-1.255-1.268z">
                                                                </path>
                                                                <path
                                                                    d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8l-6-6zM9.498 16.19c-.309.29-.765.42-1.296.42a2.23 2.23 0 0 1-.308-.018v1.426H7v-3.936A7.558 7.558 0 0 1 8.219 14c.557 0 .953.106 1.22.319.254.202.426.533.426.923-.001.392-.131.723-.367.948zm3.807 1.355c-.42.349-1.059.515-1.84.515-.468 0-.799-.03-1.024-.06v-3.917A7.947 7.947 0 0 1 11.66 14c.757 0 1.249.136 1.633.426.415.308.675.799.675 1.504 0 .763-.279 1.29-.663 1.615zM17 14.77h-1.532v.911H16.9v.734h-1.432v1.604h-.906V14.03H17v.74zM14 9h-1V4l5 5h-4z">
                                                                </path>
                                                            </svg>
                                                        </p>
                                                        <button id="file_surat_tugas"
                                                            data-pdf="{{ asset('storage/' . $prestasi->pengajuan->file_surat_tugas) }}"
                                                            class="btn btn-secondary">Lihat file</button>
                                                    @else
                                                        <p class="card-text">File Tidak ada</p>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @include('partials.footer') 
            </div>
        </div>
    </div>

    <script>
        document.getElementById('file_penghargaan').addEventListener('click', function() {
            var pdfUrl = this.getAttribute('data-pdf');
            window.open(pdfUrl, '_blank');
        });

        document.getElementById('file_dokumentasi_kegiatan').addEventListener('click', function() {
            var pdfUrl = this.getAttribute('data-pdf');
            window.open(pdfUrl, '_blank');
        });

        document.getElementById('file_surat_tugas').addEventListener('click', function() {
            var pdfUrl = this.getAttribute('data-pdf');
            window.open(pdfUrl, '_blank');
        });
    </script>
@endsection
