@extends('admin.layouts.main')
@section('content')
    <div class="layout-container">
        <div class="layout-page">
            @include('partials.navbar')
            <div class="content-wrapper">
                <div class="flex-grow-1">
                    <div class="container-xxl flex-grow-1 container-p-y">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="container mt-3 d-flex justify-content-between">
                                        <div class="">
                                            <h3>
                                                <a href="{{ route('addUser') }}" class="fw-bold">Tambah pengguna</a>
                                                @if (auth()->user()->role == 'super admin')
                                                    <a href="{{ route('addAdminView') }}" class="text-secondary fw-bold">/
                                                        Tambah
                                                        Admin</a>
                                                @endif
                                            </h3>
                                        </div>
                                        <div class="d-flex justify-content-center">
                                            <label data-bs-toggle="modal" data-bs-target="#excel-modals"
                                                class="btn btn-secondary" style="width: 9rem" class="d-flex">
                                                <div class="d-flex justify-content-center align-items-center">
                                                    <svg role="img" viewBox="0 0 24 24"
                                                        xmlns="http://www.w3.org/2000/svg" id="IconChangeColor"
                                                        height="24" width="24">
                                                        <title>Microsoft Excel</title>
                                                        <path
                                                            d="M23 1.5q.41 0 .7.3.3.29.3.7v19q0 .41-.3.7-.29.3-.7.3H7q-.41 0-.7-.3-.3-.29-.3-.7V18H1q-.41 0-.7-.3-.3-.29-.3-.7V7q0-.41.3-.7Q.58 6 1 6h5V2.5q0-.41.3-.7.29-.3.7-.3zM6 13.28l1.42 2.66h2.14l-2.38-3.87 2.34-3.8H7.46l-1.3 2.4-.05.08-.04.09-.64-1.28-.66-1.29H2.59l2.27 3.82-2.48 3.85h2.16zM14.25 21v-3H7.5v3zm0-4.5v-3.75H12v3.75zm0-5.25V7.5H12v3.75zm0-5.25V3H7.5v3zm8.25 15v-3h-6.75v3zm0-4.5v-3.75h-6.75v3.75zm0-5.25V7.5h-6.75v3.75zm0-5.25V3h-6.75v3Z"
                                                            id="mainIconPathAttribute" fill="#ffffff"></path>
                                                    </svg>
                                                    <p class="my-auto ms-2">impor</p>
                                                </div>
                                            </label>
                                        </div>
                                    </div>
                                    <!-- Account -->
                                    <form action="{{ route('addUser') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="card-body">
                                            <form id="addUser" method="POST" onsubmit="return false">
                                                <div class="row">
                                                    <div class="mb-3 col-md-6">
                                                        <label for="username" class="form-label">Nama Lengkap</label>
                                                        <input type="text" name="nama"
                                                            class="form-control @error('nama') is-invalid @enderror"
                                                            value="{{ old('nama') }}"
                                                            placeholder="Masukan nama lengkap anda" required>
                                                        @error('nama')
                                                            <div class="invalid-feedback">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>

                                                    <div class="mb-3 col-md-6">
                                                        @if (auth()->user()->role === 'super admin')
                                                            <label for="npm_nip" class="form-label">NPM</label>
                                                        @else
                                                            <label for="npm_nip" class="form-label">NPM</label>
                                                        @endif
                                                        <input type="text" name="npm_nip"
                                                            class="form-control npm_nip @error('npm_nip') is-invalid @enderror"
                                                            value="{{ old('npm_nip') }}" placeholder="contoh : G1A021082"
                                                            required oninput="toUppercase(this)">
                                                        @error('npm_nip')
                                                            <div class="invalid-feedback">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>

                                                    <div class="mb-3 col-md-6">
                                                        <label for="username" class="form-label">Email</label>
                                                        <input type="text" name="email"
                                                            class="form-control @error('email') is-invalid @enderror"
                                                            value="{{ old('email') }}" placeholder="Masukan Email anda"
                                                            required>
                                                        @error('email')
                                                            <div class="invalid-feedback">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>

                                                    <div class="mb-3 col-md-6">
                                                        <label for="email" class="form-label">Jenis Kelamin</label>
                                                        <select name="jenis_kelamin"
                                                            class="form-control  @error('jenis_kelamin') is-invalid @enderror"
                                                            required>
                                                            <option value="Laki - Laki"
                                                                @if (old('jenis_kelamin') == 'Laki - Laki') selected @endif>Laki -
                                                                Laki
                                                            </option>
                                                            <option value="Perempuan"
                                                                @if (old('jenis_kelamin') == 'Perempuan') selected @endif>Perempuan
                                                            </option>
                                                        </select>
                                                        @error('jenis_kelamin')
                                                            <div class="invalid-feedback">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>

                                                    <div class="mb-3 col-md-6">
                                                        <label for="username" class="form-label">Jurusan</label>
                                                        <select name="jurusan"
                                                            class="form-control @error('jurusan') is-invalid @enderror">
                                                            <option value="">Pilih Jurusan</option>
                                                            <option value="Informatika"
                                                                @if (old('jurusan') == 'Informatika') selected @endif>
                                                                Informatika
                                                            </option>
                                                            <option value="Teknik Sipil"
                                                                @if (old('jurusan') == 'Teknik Sipil') selected @endif>Teknik
                                                                Sipil
                                                            </option>
                                                            <option value="Teknik Elektro"
                                                                @if (old('jurusan') == 'Teknik Elektro') selected @endif>Teknik
                                                                Elektro
                                                            </option>
                                                            <option value="Teknik Mesin"
                                                                @if (old('jurusan') == 'Teknik Mesin') selected @endif>Teknik
                                                                Mesin
                                                            </option>
                                                            <option value="Arsiterktur"
                                                                @if (old('jurusan') == 'Arsitektur') selected @endif>
                                                                Arsitektur
                                                            </option>
                                                            <option value="Sistem Informasi"
                                                                @if (old('jurusan') == 'Sistem Informasi') selected @endif>Sistem
                                                                Informasi</option>
                                                        </select>
                                                        @error('jurusan')
                                                            <div class="invalid-feedback">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>

                                                    <div class="mb-3 col-md-6">
                                                        <label for="username" class="form-label">Role</label>
                                                        <select name="role"
                                                            class="form-control @error('role') is-invalid @enderror"
                                                            required disabled>
                                                            </option>
                                                            <option value="user"
                                                                @if (old('role') == 'user') selected @endif>
                                                                Mahasiswa
                                                            </option>
                                                        </select>
                                                        @error('role')
                                                            <div class="invalid-feedback">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>

                                                    <div class="mb-3 col-md-6">
                                                        <label class="form-label" for="password">Password</label>
                                                        <div class="input-group input-group-merge">
                                                            <input type="password" name="password"
                                                                class="form-control @error('password') is-invalid @enderror"
                                                                placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                                                aria-describedby="password" required>

                                                        </div>
                                                        @error('password')
                                                            <div class="invalid-feedback">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>

                                                </div>
                                                <!-- /Account -->
                                        </div>
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="mb-3 col-12 mb-0 d-flex justify-content-center">
                                                    <button type="submit"
                                                        class="btn btn-primary deactivate-account">Tambah
                                                    </button>
                                                </div>

                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="content-backdrop fade"></div>
                </div>
            </div>
            @include('partials.footer')
        </div>

        <script>
            function toUppercase(el) {
                el.value = el.value.toUpperCase();
            }
        </script>
    </div>

    {{-- modal --}}
    <div class="modal fade" id="excel-modals" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Masukan file Exel</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('addUserWithExel') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3 col-12 mb-0 d-flex justify-content-center flex-column align-items-center">
                            <label for="file" class="btn btn-secondary" style="width: 10rem" class="d-flex">
                                <div class="d-flex justify-content-center align-items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" style="fill: rgba(255, 255, 255, 1);transform: ;msFilter:;">
                                        <path d="M11 15h2V9h3l-4-5-4 5h3z"></path>
                                        <path d="M20 18H4v-7H2v7c0 1.103.897 2 2 2h16c1.103 0 2-.897 2-2v-7h-2v7z"></path>
                                    </svg>
                                    <p class="my-auto ms-2">pilih file</p>
                                    <input type="file" name="file-excel" hidden id="file" required>
                                </div>
                            </label>

                            <div class="mt-3">
                                <p class="fw-bold">* Contoh Format Excel</p>
                                <img src="/assets/img/excel.jpg" alt="" class="w-100 h-100"
                                    style="border: 2px solid #1a246a">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Impor data</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
