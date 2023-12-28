@extends('admin.layouts.main')
@section('content')
    <div class="layout-container">
        <div class="layout-page">
            @include('partials.navbar')
            <div class="content-wrapper">
                <div class="container-xxl flex-grow-1 container-p-y">
                    <div class="row ">
                        <div class="col-xxl">
                            <div class="card mb-4">
                                <h3 class="card-header d-flex align-items-center m-2 text-primary fw-bold"> <svg
                                        xmlns="http://www.w3.org/2000/svg" width="26" height="26" viewBox="0 0 24 24"
                                        style="fill: #435971;transform: ;msFilter:;" class="me-2">
                                        <path
                                            d="M19 4h-3V2h-2v2h-4V2H8v2H5c-1.103 0-2 .897-2 2v14c0 1.103.897 2 2 2h14c1.103 0 2-.897 2-2V6c0-1.103-.897-2-2-2zM5 20V7h14V6l.002 14H5z">
                                        </path>
                                        <path d="M7 9h10v2H7zm0 4h5v2H7z"></path>
                                    </svg> Pengajuan Prestasi</h3>
                                <div class="myline" style="height: 1px; border-top: 1px solid #ccc "></div>
                                <form class="row g-3 card-header justify-content-center" method="POST"
                                    action="{{ route('kirimPengajuan') }}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="col-md-6">
                                        <label for="nama-kegiatan" class="form-label fw-bold">NAMA KEGIATAN PERLOMBAAN <span
                                                style="color: red">*</span> </label>
                                        <input type="text"
                                            class="form-control @error('nama_kegiatan_perlombaan') is-invalid @enderror"
                                            id="nama-kegiatan" name="nama_kegiatan_perlombaan" required>
                                        @error('nama_kegiatan_perlombaan')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="col-3   ">
                                        <label for="lokasi-lomba" class="form-label fw-bold">LOKASI LOMBA <span
                                                style="color: red">*</span> </label>
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
                                        <label for="tahun" class="form-label fw-bold">
                                            TAHUN <span style="color: red">*</span> </label>
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
                                        <label for="tanggal-mulai" class="form-label fw-bold">TANGGAL MULAI <span
                                                style="color: red">*</span> </label>
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
                                        <label for="tanggal-selesai" class="form-label fw-bold">TANGGAL SELESAI <span
                                                style="color: red">*</span> </label>
                                        <input type="date"
                                            class="form-control @error('tanggal_selesai') is-invalid @enderror"
                                            value="" name="tanggal_selesai" required>
                                        @error('tanggal_selesai')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    @if (auth()->user()->jurusan == 'Teknik Elektro')  
                                    <div class="col-md-3" id="jenisPrestasi" style="display: block">
                                        <label for="jenisPrestasi" class="form-label fw-bold">
                                            Jenis Perlombaan <span style="color: red">*</span> </label>
                                        <select class="form-control @error('jenisPrestasi') is-invalid @enderror"
                                            name="jenis_perlombaan" required>
                                            <option>pilih jenis lomba akademik / non akademik</option>
                                            <option value="Kompetisi Desain Sirkuit Elektronik">Kompetisi Desain Sirkuit Elektronik</option>
                                            <option value="Hackathon Teknologi">Hackathon Teknologi</option>
                                            <option value="Lomba Robotika">Lomba Robotika</option>
                                            <option value="Kompetisi Energi Terbarukan">Kompetisi Energi Terbarukan</option>
                                            <option value="Lomba Renang">Lomba Renang
                                            </option>
                                            <option value="Lomba Volly">Lomba Volly
                                            </option>
                                            <option value="Lomba Futsal">Lomba Futsal
                                            </option>
                                            <option value="Lomba Basket">Lomba Basket
                                            </option>
                                            <option value="Lomba Sepak Bola">Lomba Sepak Bola
                                            </option>
                                            <option value="Lomba Nyanyi">Lomba Nyanyi
                                            </option>
                                            <option value="lainnya">lainnya</option>
                                        </select>
                                        @error('jenisPrestasi')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    @endif

                                    @if (auth()->user()->jurusan == 'Informatika')  
                                    <div class="col-md-3" id="jenisPrestasi" style="display: block">
                                        <label for="jenisPrestasi" class="form-label fw-bold">
                                            Jenis Perlombaan <span style="color: red">*</span> </label>
                                        <select class="form-control @error('jenisPrestasi') is-invalid @enderror"
                                            name="jenis_perlombaan" required>
                                            <option>pilih jenis lomba akademik / non akademik</option>
                                            <option value="ACM International Collegiate Programming Contest (ICPC)">ACM
                                                International Collegiate Programming Contest (ICPC)</option>
                                            <option value="Gemastik (Generasi Muda Sains dan Teknologi)">Gemastik (Generasi
                                                Muda Sains dan Teknologi)</option>
                                            <option value="Kompetisi Sistem Embedded dan IoT">Kompetisi Sistem Embedded dan
                                                IoT</option>
                                            <option value="Facebook Hacker Cup">Facebook Hacker Cup</option>
                                            <option value="Lomba Renang">Lomba Renang
                                            </option>
                                            <option value="Lomba Volly">Lomba Volly
                                            </option>
                                            <option value="Lomba Futsal">Lomba Futsal
                                            </option>
                                            <option value="Lomba Basket">Lomba Basket
                                            </option>
                                            <option value="Lomba Sepak Bola">Lomba Sepak Bola
                                            </option>
                                            <option value="Lomba Nyanyi">Lomba Nyanyi
                                            </option>
                                            <option value="lainnya">lainnya</option>
                                        </select>
                                        @error('jenisPrestasi')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    @endif

                                    <div class="col-md-3" id="jenisPrestasiLainnya" style="display:none">
                                        <label for="jenisPrestasiLainnya" class="form-label fw-bold">
                                            Jenis Perlombaan <span style="color: red">*<span id="toogle-kembali"
                                                    class="bg-secondary rounded-circle ms-2"
                                                    style="width: .8rem;height: .8rem;display: none;"
                                                    data-bs-toggle="tooltip" data-bs-placement="top"
                                                    data-bs-title="kembali">
                                                </span></span>
                                        </label>

                                        <input class="form-control @error('jenisPrestasi') is-invalid @enderror"
                                            name="jenis_perlombaan_lainnya" placeholder="input prestasi lainnya">
                                        @error('jenisPrestasi')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                              

                                    <div class="col-md-3">
                                        <label for="juara" class="form-label fw-bold">
                                            JUARA <span style="color: red">*</span> </label>
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
                                        <label for="tinggat-prestasi" class="form-label fw-bold">TINGKAT PRESTASI <span
                                                style="color: red">*</span> </label>
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
                                        <label for="jumlah-peserta" class="form-label fw-bold">JUMLAH PESERTA <span
                                                style="color: red">*</span> </label>
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
                                        <label for="nama-penyelenggara" class="form-label fw-bold">NAMA PENYELENGGARA
                                            <span style="color: red">*</span> </label>
                                        <input type="text"
                                            class="form-control @error('nama_penyelenggara') is-invalid @enderror"
                                            id="nama-penyelenggara" name="nama_penyelenggara" required>
                                        @error('nama_penyelenggara')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="col-md-3 ">
                                        <label for="url-penyelenggara" class="form-label fw-bold">URL
                                            PENYELENGGARA <span style="color: red">*</span> </label>
                                        <input type="text"
                                            class="form-control @error('url_penyelenggara') is-invalid @enderror"
                                            id="url-penyelenggara" name="url_penyelenggara">
                                        @error('url_penyelenggara')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="col-md-4 ">
                                        <label for="formFile" class="form-label fw-bold">SCAN FOTO SERTIFIKAT/ PIALA/
                                            MEDAL <span style="color: red">*</span> </label>
                                        <small class="text-danger">(file pdf | maks 15mb)</small>
                                        <input class="form-control @error('file_penghargaan') is-invalid @enderror"
                                            type="file" id="formFile" name="file_penghargaan" required>
                                        @error('file_penghargaan')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="col-md-4 ">
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
                                            TUGAS </label>
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
                                        <button type="submit" class="btn btn-primary m-3"
                                            style="width: 6rem">Kirim</button>
                                    </div>
                                </form>
                            </div>
                            <div class="card">
                                @php
                                    $isEmpty = false;
                                @endphp
                                <div class="container my-2">
                                    <div class="d-flex justify-content-center align-items-center gap-3 ">
                                        <h4 class="text-center mt-2 rounded text-primary position-relative">Daftar
                                            Pengajuan
                                            <button type="button"
                                                class="btn p-0 dropdown-toggle hide-arrow position-absolute"
                                                style="top: -.5rem;right: -1rem" data-bs-toggle="dropdown">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15"
                                                    viewBox="0 0 24 24" style="fill: #8592A3;transform: ;msFilter:;">
                                                    <path
                                                        d="M12 2C6.486 2 2 6.486 2 12s4.486 10 10 10 10-4.486 10-10S17.514 2 12 2zm0 18c-4.411 0-8-3.589-8-8s3.589-8 8-8 8 3.589 8 8-3.589 8-8 8z">
                                                    </path>
                                                    <path d="M11 11h2v6h-2zm0-4h2v2h-2z"></path>
                                                </svg>
                                            </button>
                                            <div class="dropdown-menu">
                                                <p class="p-2" style="width: 20rem;">
                                                    <b> * jika prestasi sudah diajukan kemudian didaftar pengajuan tidak
                                                        ada,
                                                        itu kemungkinan prestasi ditolak atau tidak disetujui. *</b>
                                                </p>
                                            </div>
                                        </h4>
                                    </div>
                                    <div class="table-responsive text-nowrap rounded mt-2">
                                        <table class="table">
                                            <thead class="table-secondary">
                                                <tr class="" style="color: rgb(23, 23, 23)">
                                                    <th class="fw-bold">STATUS</th>
                                                    <th class="fw-bold">NAMA KEGIATAN PERLOMBAAN</th>
                                                    <th class="fw-bold">TAHUN</th>
                                                    <th class="fw-bold">JUARA</th>
                                                    <th class="fw-bold">TINGKAT PRESTASI</th>
                                                    <th class="fw-bold">JUMLAH PESERTA</th>
                                                    <th class="fw-bold">NAMA PENYELENGGARA</th>
                                                </tr>
                                            </thead>
                                            <tbody class="table-border-bottom-0" wire:loading.remove>
                                                @foreach ($pengajuans as $pengajuan)
                                                    @php
                                                        $isEmpty = true;
                                                    @endphp
                                                    <tr>
                                                        @if ($pengajuan->user_id === Auth::user()->id)
                                                            @if ($pengajuan->status == 1)
                                                                <td class=" badge bg-label-success my-1"
                                                                    style="width: 7rem">
                                                                    Disetujui</td>
                                                            @elseif($pengajuan->status == 0)
                                                                <td class=" badge bg-label-danger my-1"
                                                                    style="width: 7rem">
                                                                    Menunggu</td>
                                                            @endif
                                                            </td>
                                                            <td>{{ $pengajuan->nama_kegiatan_perlombaan }}</td>
                                                            <td>{{ $pengajuan->tahun }}</td>
                                                            <td>{{ $pengajuan->juara }}</td>
                                                            <td>{{ $pengajuan->tingkat_prestasi }}</td>
                                                            <td>{{ $pengajuan->jumlah_Peserta }}</td>
                                                            <td>{{ $pengajuan->nama_penyelenggara }}</td>
                                                    </tr>
                                                @endif
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                @if (!$isEmpty)
                                    <div class="text-secondary w-100 d-flex justify-content-center align-items-center mt-2"
                                        style="opacity: 75%">
                                        <h4>--Data Pengajuan kosong--</h4>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @include('partials.footer')
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Ambil elemen <select> dan <div> prestasi lainnya berdasarkan id
            var selectBoxDiv = document.getElementById("jenisPrestasi");
            var selectBox = document.getElementById("jenisPrestasi").querySelector("select");
            var divPrestasiLainnya = document.getElementById("jenisPrestasiLainnya");
            var inputPrestasiLainnya = document.querySelector("#jenisPrestasiLainnya input");
            var btnToggleKembali = document.getElementById("toogle-kembali");

            // Tambahkan event listener pada perubahan nilai dropdown
            selectBox.addEventListener("change", function() {
                // Periksa apakah nilai dropdown adalah "lainnya"

                if (selectBox.value === "lainnya") {
                    // Jika "lainnya" dipilih, tampilkan div prestasi lainnya dan tombol toggle
                    selectBoxDiv.style.display = "none";
                    divPrestasiLainnya.style.display = "block";
                    btnToggleKembali.style.display = "inline-block";
                } else {
                    // Jika bukan "lainnya", sembunyikan div prestasi lainnya dan tombol toggle
                    divPrestasiLainnya.style.display = "none";
                    btnToggleKembali.style.display = "none";
                }
            });

            // Tambahkan event listener pada tombol toggle
            btnToggleKembali.addEventListener("click", function() {
                // Sematkan kembali nilai default pada dropdown
                selectBoxDiv.style.display = "block";
                divPrestasiLainnya.style.display = "none";
                btnToggleKembali.style.display = "none";
            });
        });
    </script>
@endsection
