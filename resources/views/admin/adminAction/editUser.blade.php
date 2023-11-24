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


                <div class="container-xxl flex-grow-1 container-p-y">
                    <div class="mb-3">
                        <a href="{{ route('userList') }}" class="btn btn-light text-center"><i
                                class='bx bx-arrow-back'></i></a>
                    </div>
                    {{-- @if (session()->has(['success']))
                        <div class="alert alert-success alert-dismissible" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif --}}
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card mb-4">
                                <h5 class="card-header">Profile pengguna</h5>
                                <!-- Account -->
                                <form action="{{ route('editUser', $user_id->id) }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('put')
                                    <div class="card-body">
                                        <div class="d-flex align-items-start align-items-sm-center gap-4 justify-content-center align-items-center">
                                                @if ($user_id->profil)
                                                <img src="{{ asset('storage/' . $user_id->profil) }}" alt="user-avatar"
                                                    class="d-block rounded-circle border border-black" height="120" width="120"
                                                    id="uploadedAvatar" />
                                                @else
                                                <img src="{{ asset('assets/img/user-profile-default.png') }}" alt="user-avatar"
                                                    class="d-block rounded-circle border border-black" height="120" width="120"
                                                    id="uploadedAvatar" />
                                                @endif
                                        </div>
                                    </div>
                                    <hr class="my-0" />
                                    <div class="card-body">
                                        <form id="formAccountSettings" method="POST" onsubmit="return false">
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
                                                        <label for="npm_nip" class="form-label">Nip</label>
                                                    @else
                                                        <label for="npm_nip" class="form-label">Npm</label>
                                                    @endif
                                                    <input class="form-control" type="text" name="npm_nip" id="npm_nip"
                                                        value="{{ $user_id->npm_nip }}" oninput="toUppercase(this)" />
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
                                            </div>
                                            <!-- /Account -->
                                    </div>
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="mb-3 col-12 mb-0 d-flex justify-content-center">
                                                <button type="submit" class="btn btn-danger deactivate-account">Ubah Profil</button>
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
