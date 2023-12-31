@extends('admin.layouts.main')
@section('content')
    <div class="layout-container">
        <div class="layout-page">
            @include('partials.navbar')
            <div class="content-wrapper position-relative">
                <div class="container-xxl flex-grow-1 container-p-y">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card mb-4">
                                <form action="{{ route('editUser', $user_id->id) }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('put')
                                    <div class="card-body">
                                        <div
                                            class="d-flex align-items-start align-items-sm-center gap-4 justify-content-center align-items-center">
                                            @if ($user_id->profil)
                                                <img src="{{ asset('storage/' . $user_id->profil) }}" alt="user-avatar"
                                                    class="d-block rounded border border-black" height="120"
                                                    width="120" id="uploadedAvatar" />
                                            @else
                                                <img src="{{ asset('assets/img/user-profile-default.png') }}"
                                                    alt="user-avatar" class="d-block rounded border border-black"
                                                    height="120" width="120" id="uploadedAvatar" />
                                            @endif
                                        </div>
                                    </div>
                                    <hr class="my-0" />
                                    <div class="card-body">
                                        <form id="formAccountSettings" onsubmit="return false">
                                            <div class="row">
                                                <div class="mb-3 col-md-6">
                                                    <label for="nama" class="form-label">Nama Lengkap</label>
                                                    <input type="text" name="nama"
                                                        class="form-control @error('nama') is-invalid @enderror"
                                                        value="{{ $user_id->nama }}" placeholder="Masukan nama lengkap   "
                                                        required>
                                                    @error('nama')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>

                                                <div class="mb-3 col-md-6">
                                                    @if ($user_id->role == 'admin' || $user_id->role == 'super admin')
                                                        <label for="npm_nip" class="form-label @error('npm_nip') is-invalid @enderror">Nip</label>
                                                    @else
                                                        <label for="npm_nip" class="form-label">Npm</label>
                                                        @error('npm_nip')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                    @endif
                                                    <input class="form-control  @error('npm_nip') is-invalid @enderror" type="text" name="npm_nip" id="npm_nip"
                                                        value="{{ $user_id->npm_nip }}" oninput="toUppercase(this)" />
                                                        @error('npm_nip')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>

                                                <div class="mb-3 col-md-6">
                                                    <label for="role" class="form-label">Role</label>
                                                    <select name="role"
                                                        class="form-control @error('role') is-invalid @enderror" required>

                                                        @if ($user_id->role == 'admin')
                                                            <option value="{{ $user_id->role }}"
                                                                @if (old('role') == 'admin') selected @endif>
                                                                {{ $user_id->role }}
                                                            </option>
                                                            <option value="super admin"
                                                                @if (old('role') == 'super admin') selected @endif>
                                                                super admin
                                                            </option>

                                                            <option value="user"
                                                                @if (old('role') == 'user') selected @endif>user
                                                            </option>
                                                        @endif

                                                        @if ($user_id->role == 'super admin')
                                                            <option value="{{ $user_id->role }}"
                                                                @if (old('role') == 'super admin') selected @endif>
                                                                {{ $user_id->role }}
                                                            </option>
                                                            <option value="admin"
                                                                @if (old('role') == 'admin') selected @endif>
                                                                admin
                                                            </option>

                                                            <option value="user"
                                                                @if (old('role') == 'user') selected @endif>user
                                                            </option>
                                                        @endif

                                                        @if ($user_id->role == 'user')
                                                            <option value="{{ $user_id->role }}"
                                                                @if (old('role') == 'user') selected @endif>
                                                                {{ $user_id->role }}
                                                            </option>
                                                            <option value="super admin"
                                                                @if (old('role') == 'super admin') selected @endif>
                                                                super admin
                                                            </option>

                                                            <option value="admin"
                                                                @if (old('role') == 'admin') selected @endif>admin
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
                                                    <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                                                    <select name="jenis_kelamin"
                                                        class="form-control  @error('jenis_kelamin') is-invalid @enderror"
                                                        required>
                                                        <option value="Laki - Laki"
                                                            @if (old('jenis_kelamin') == 'Laki - Laki' || $user_id->jenis_kelamin === 'Laki - Laki') selected @endif>Laki-Laki
                                                        </option>
                                                        <option value="Perempuan"
                                                            @if (old('jenis_kelamin') == 'Perempuan' || $user_id->jenis_kelamin === 'Perempuan') selected @endif>Perempuan
                                                        </option>
                                                    </select>
                                                    @error('jenis_kelamin')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>

                                                @if ($user_id->jurusan != null)
                                                    <div class="mb-3 col-md-6">
                                                        <label for="username" class="form-label">Jurusan</label>
                                                        <select name="jurusan"
                                                            class="form-control @error('jurusan') is-invalid @enderror"
                                                            required>
                                                            <option value="Informatika"
                                                                @if (old('jurusan') == 'Informatika' || $user_id->jurusan === 'Informatika') selected @endif>
                                                                Informatika
                                                            </option>
                                                            <option value="Teknik Sipil"
                                                                @if (old('jurusan') == 'Teknik Sipil' || $user_id->jurusan === 'Teknik Sipil') selected @endif>Teknik
                                                                Sipil
                                                            </option>
                                                            <option value="Teknik Elektro"
                                                                @if (old('jurusan') == 'Teknik Elektro' || $user_id->jurusan === 'Teknik Elektro') selected @endif>Teknik
                                                                Elektro
                                                            </option>
                                                            <option value="Teknik Mesin"
                                                                @if (old('jurusan') == 'Teknik Mesin' || $user_id->jurusan === 'Teknik Mesin') selected @endif>Teknik
                                                                Mesin
                                                            </option>
                                                            <option value="Arsiterktur"
                                                                @if (old('jurusan') == 'Arsitektur' || $user_id->jurusan === 'Arsitektur') selected @endif>
                                                                Arsitektur
                                                            </option>
                                                            <option value="Sistem Informasi"
                                                                @if (old('jurusan') == 'Sistem Informasi' || $user_id->jurusan === 'Sistem Informasi') selected @endif>Sistem
                                                                Informasi</option>
                                                        </select>
                                                        @error('jurusan')
                                                            <div class="invalid-feedback">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                @endif

                                                <div class="mb-3 col-md-6">
                                                    <label for="email" class="form-label">Email</label>
                                                    <input type="text" name="email"
                                                        class="form-control @error('email') is-invalid @enderror"
                                                        value="{{ $user_id->email }}" placeholder="Masukan email lengkap   "
                                                        required>
                                                    @error('email')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>

                                                <div class="mb-3 col-md-6 form-password-toggle">
                                                    <label class="form-label" for="password">Password</label>
                                                    <div class="input-group input-group-merge">
                                                        <input type="password" name="password"
                                                            class="form-control @error('password') is-invalid @enderror"
                                                            placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                                            aria-describedby="password">
                                                        <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
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
                                                <button type="submit" class="btn btn-primary deactivate-account">Ubah
                                                    Profil</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @include('partials.footer')
        </div>

        <!-- Overlay -->
        <div class="layout-overlay layout-menu-toggle"></div>

        <script>
            function toUppercase(el) {
                el.value = el.value.toUpperCase();
            }
        </script>
    @endsection
