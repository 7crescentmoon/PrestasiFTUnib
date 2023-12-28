@extends('admin.layouts.main')
@section('content')
    <div class="layout-container">
        <div class="layout-page">
            @include('partials.navbar')
            <div class="container-xxl flex-grow-1 container-p-y">
                <div class="row">
                    <div class="col-xxl ">
                        <div class="card mb-4 p-2">
                            <div class="text-center text-black mt-2">
                                <h3 class="fw-bold">{{ $data->user->nama }}</h3>
                                <h4 class="fs-5"><i>{{ $data->user->npm_nip }} / {{ $data->user->jurusan }}</i></h4>
                                @if ($data->user->profil)
                                    <img src="{{ asset('storage/' . $data->user->profil) }}" alt="user-avatar"
                                        class="rounded border" height="100" width="100" style="object-fit: cover;"
                                        id="uploadedAvatar" />
                                @else
                                    <img src="{{ asset('assets/img/user-profile-default.png') }}" alt="user-avatar"
                                        class="rounded border" height="100" width="100" style="object-fit: cover;"
                                        id="uploadedAvatar" />
                                @endif
                            </div>
                            <div class="row card-header g-2">
                                <div class="col-md-6">
                                    <label for="nama-kegiatan" class="form-label fw-bold"></span> NAMA KEGIATAN
                                        PERLOMBAAN</label>
                                    <input type="text"
                                        class="form-control @error('nama_kegiatan_perlombaan') is-invalid @enderror"
                                        id="nama-kegiatan" name="nama_kegiatan_perlombaan"
                                        value="{{ $data->nama_kegiatan_perlombaan }}">
                                    @error('nama_kegiatan_perlombaan')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="col-md-3">
                                    <label for="lokasi-lomba" class="form-label fw-bold"></span> LOKASI LOMBA</label>
                                    <input type="text" class="form-control @error('lokasi_lomba') is-invalid @enderror"
                                        id="lokasi-lomba" placeholder="" name="lokasi_lomba"
                                        value="{{ $data->lokasi_lomba }}">
                                    @error('lokasi_lomba')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="col-md-3">
                                    <label for="tahun" class="form-label fw-bold">
                                        TAHUN</label>
                                    <input type="text" class="form-control @error('tahun') is-invalid @enderror"
                                        id="tahun" placeholder="" name="tahun" value="{{ $data->tahun }}">
                                    @error('tahun')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="col-md-3">
                                    <label for="tanggal-mulai" class="form-label fw-bold"></span> TANGGAL MULAI</label>
                                    <input type="text" class="form-control @error('tanggal_mulai') is-invalid @enderror"
                                        value="{{ $data->tanggal_mulai }}" name="tanggal_mulai" value="">
                                    @error('tanggal_mulai')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="col-md-3">
                                    <label for="tanggal-selesai" class="form-label fw-bold"></span> TANGGAL
                                        SELESAI</label>
                                    <input type="text"
                                        class="form-control @error('tanggal_selesai') is-invalid @enderror"
                                        value="{{ $data->tanggal_mulai }}" name="tanggal_selesai" value="">
                                    @error('tanggal_selesai')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="col-md-3">
                                    <label for="juara" class="form-label fw-bold">Jenis Perlombaan</label>
                                    <input list="juara" id="juara"
                                        class="form-control @error('juara') is-invalid @enderror" name="juara"
                                        value="{{ $data->jenis_perlombaan }}">
                                </div>

                                <div class="col-md-3">
                                    <label for="juara" class="form-label fw-bold">Juara</label>
                                    <input list="juara" id="juara"
                                        class="form-control @error('juara') is-invalid @enderror" name="juara"
                                        value="{{ $data->juara }}">
                                    @error('juara')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="col-md-3">
                                    <label for="tinggat-prestasi" class="form-label fw-bold"></span> TINGKAT
                                        PRESTASI</label>
                                    <input list="tingkat_prestasi" id="tingkat_prestasi"
                                        class="form-control @error('tingkat_prestasi') is-invalid @enderror"
                                        name="tingkat_prestasi" value="{{ $data->tingkat_prestasi }}">
                                    @error('tingkat_prestasi')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="col-md-3">
                                    <label for="jumlah-peserta" class="form-label fw-bold"></span> JUMLAH
                                        PESERTA</label>
                                    <input type="number"
                                        class="form-control @error('jumlah_peserta') is-invalid @enderror "
                                        name="jumlah_Peserta" value="{{ $data->jumlah_Peserta }}">
                                    @error('jumlah_peserta')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="col-md-3">
                                    <label for="nama-penyelenggara" class="form-label fw-bold"></span> NAMA
                                        PENYELENGGARA</label>
                                    <input type="text"
                                        class="form-control @error('nama_penyelenggara') is-invalid @enderror"
                                        id="nama-penyelenggara" name="nama_penyelenggara"
                                        value="{{ $data->nama_penyelenggara }}">
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
                                        id="url-penyelenggara" name="url_penyelenggara"
                                        value="{{ $data->url_penyelenggara }}">
                                    @error('url_penyelenggara')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                </form>

                                <div class="row g-3 card-header justify-content-center">
                                    <div class="col-md-5 col-lg-4 mt-4">
                                        <div class="card text-center">
                                            <div class="card-header">SCAN FOTO SERTIFIKAT/ PIALA/ MEDAL</div>
                                            <div class="card-body">
                                                @if ($data->file_penghargaan)
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
                                                        data-pdf="{{ asset('storage/' . $data->file_penghargaan) }}"
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
                                                @if ($data->file_dokumentasi_kegiatan)
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
                                                        data-pdf="{{ asset('storage/' . $data->file_dokumentasi_kegiatan) }}"
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

                                                @if ($data->file_surat_tugas)
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
                                                        data-pdf="{{ asset('storage/' . $data->file_surat_tugas) }}"
                                                        class="btn btn-secondary">Lihat file</button>
                                                @else
                                                    <p class="card-text">File Tidak ada</p>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 text-center">
                                    <button type="submit" class="btn btn-success mt-2 me-2" style="width: 6rem" id="openModal"
                                        data-bs-toggle="modal" data-bs-target="#myModal">
                                        Setujui
                                       
                                    </button>
                                    <a href="{{ route('deletePengajuan', $data->id) }}" id="reject"
                                        type="submit"
                                        class="btn btn-danger mt-2" style="width: 6rem" >
                                       Tolak
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @include('partials.footer') 
        </div>
    </div>

    {{-- Modal --}}
    @include('admin.persetujuan.modal.modal')

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
