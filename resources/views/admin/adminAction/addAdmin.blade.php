@extends('admin.layouts.main')
@section('content')
    <div class="layout-container">
        <div class="layout-page">
            @include('partials.navbar')
            <div class="content-wrapper position-relative">
                <div class="flex-grow-1 container-p-y ">
                    <div class="container-xxl flex-grow-1">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="container mt-3 d-flex justify-content-between">
                                        <div class="">
                                            <h3>
                                                <a href="{{ route('addUserView') }}" class="text-secondary fw-bold">Tambah
                                                    pengguna /</a>
                                                @if (auth()->user()->role == 'super admin')
                                                    <a href="{{ route('addAdminView') }}" class="fw-bold">Tambah
                                                        Admin</a>
                                                @endif
                                            </h3>
                                        </div>
                                    </div>
                                    <form action="{{ route('addUser') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="card-body">
                                            <form id="addUser" method="POST" onsubmit="return false">
                                                <div class="row">
                                                    <div class="mb-3 col-md-6">
                                                        <label for="username" class="form-label">Nama Lengkap</label>
                                                        <input type="text" name="nama"
                                                            class="form-control @error('nama') is-invalid @enderror"
                                                            value="{{ old('nama') }}" placeholder="Masukan nama lengkap"
                                                            required>
                                                        @error('nama')
                                                            <div class="invalid-feedback">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>

                                                    <div class="mb-3 col-md-6">
                                                        @if (auth()->user()->role === 'super admin')
                                                            <label for="npm_nip" class="form-label">NIP</label>
                                                        @endif
                                                        <input type="text" name="npm_nip"
                                                            class="form-control npm_nip @error('npm_nip') is-invalid @enderror"
                                                            value="{{ old('npm_nip') }}" placeholder="Masukan Nip" required
                                                            oninput="toUppercase(this)">
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
                                                                @if (old('jenis_kelamin') == 'Laki - Laki') selected @endif>Laki - Laki
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
                                                        <label for="username" class="form-label">Role</label>
                                                        <select name="role"
                                                            class="form-control @error('role') is-invalid @enderror"
                                                            required>
                                                            <option value="">
                                                                Pilih Role
                                                            </option>
                                                            @if (auth()->user()->role === 'super admin')
                                                                <option value="super admin"
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
                                                    <button type="submit" class="btn btn-primary deactivate-account">Tambah
                                                    </button>
                                                </div>
                                            </div>
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
        
        <script>
            function toUppercase(el) {
                el.value = el.value.toUpperCase();
            }
        </script>
    </div>
@endsection
