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

                <div class="container-xxl flex-grow-1 container-p-y ">
                    <!-- Layout -->
                    <div class="container-xxl flex-grow-1 container-p-y">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <a href="{{ route('userList') }}" class="btn btn-success text-center"><i
                                            class='bx bx-arrow-back'></i></a>
                                </div>
                                @if (session()->has(['success']))
                                    <div class="alert alert-success alert-dismissible" role="alert">
                                        {{ session('success') }}
                                        <button type="button" class="btn-close" data-bs-dismiss="alert"
                                            aria-label="Close"></button>
                                    </div>
                                @endif
                                <div class="card mb-4">
                                    <h5 class="card-header">Tambah Pengguna</h5>
                                    <!-- Account -->
                                    <form action="{{ route('addUser') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <hr class="my-0" />
                                        <div class="card-body">
                                            <form id="addUser" method="POST" onsubmit="return false">
                                                <div class="row">
                                                    <div class="mb-3 col-md-6">
                                                        <label for="username" class="form-label">Nama Lengkap</label>
                                                        <input type="text" name="nama"
                                                            class="form-control @error('nama') is-invalid @enderror"
                                                            value="{{ old('nama') }}"
                                                            placeholder="Masukan nama lengkap   " required>
                                                        @error('nama')
                                                            <div class="invalid-feedback">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>

                                                    <div class="mb-3 col-md-6">
                                                        @if (auth()->user()->role === 'super admin')
                                                            <label for="npm" class="form-label">NPM / NIP</label>
                                                        @else
                                                            <label for="npm" class="form-label">NPM</label>
                                                        @endif
                                                        <input type="text" name="npm"
                                                            class="form-control npm @error('npm') is-invalid @enderror"
                                                            value="{{ old('npm') }}" placeholder="contoh : G1A021082"
                                                            required oninput="toUppercase(this)">
                                                        @error('npm')
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
                                                            <option value="Laki-Laki"
                                                                @if (old('jenis_kelamin') == 'Laki-Laki') selected @endif>Laki-Laki
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
                                                            <option value="none"
                                                                @if (old('jurusan') == 'none') selected @endif>none
                                                            </option>
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
                                                            required>
                                                            <option value="">
                                                                Pilih Role
                                                            </option>
                                                            <option value="user"
                                                                @if (old('role') == 'user') selected @endif>user
                                                            </option>
                                                            @if (auth()->user()->role === 'super admin')
                                                                <option value="admin"
                                                                    @if (old('role') == 'super admin') selected @endif>
                                                                    super admin
                                                                </option>
                                                                <option value="admin"
                                                                    @if (old('role') == 'admin') selected @endif>
                                                                    admin
                                                                </option>
                                                            @endif
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
                                                        class="btn btn-danger deactivate-account">Tambah
                                                        Pengguna</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
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

        <script>
            function toUppercase(el) {
                el.value = el.value.toUpperCase();
            }
        </script>
    @endsection
