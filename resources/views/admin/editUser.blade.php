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
                        <a href="{{ route('userList') }}" class="btn btn-success text-center"><i
                                class='bx bx-arrow-back'></i></a>
                    </div>
                    @if (session()->has(['success']))
                                <div class="alert alert-success alert-dismissible" role="alert">
                                    {{ session('success') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                  </div>
                                @endif
                    <div class="row">
                        <div class="col-md-12">

                            <div class="card mb-4">
                                <h5 class="card-header">Profile Details</h5>
                                <!-- Account -->
                                <form action="{{ route('editUser', ['id' => $user->id]) }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('put')
                                    <div class="card-body">
                                        <div class="d-flex align-items-start align-items-sm-center gap-4">
                                            <img src="../assets/img/avatars/1.png" alt="user-avatar" class="d-block rounded"
                                                height="100" width="100" id="uploadedAvatar" />
                                            <div class="button-wrapper">
                                                <label for="upload" class="btn btn-primary me-2 mb-4" tabindex="0">
                                                    <span class="d-none d-sm-block">Upload photo</span>
                                                    <i class="bx bx-upload d-block d-sm-none"></i>
                                                    <input type="file" id="upload" class="account-file-input" hidden
                                                        accept="image/png, image/jpeg" />
                                                </label>
                                                <p class="text-muted mb-0">Allowed JPG or PNG. Max size of 800K</p>
                                            </div>
                                        </div>
                                    </div>
                                    <hr class="my-0" />
                                    <div class="card-body">
                                        <form id="formAccountSettings" method="POST" onsubmit="return false">
                                            <div class="row">
                                                <div class="mb-3 col-md-6">
                                                    <label for="name" class="form-label">Nama Lengkap</label>
                                                    <input type="text" name="name"
                                                        class="form-control @error('name') is-invalid @enderror"
                                                        value="{{ $user->name }}"
                                                        placeholder="Masukan nama lengkap   " required>
                                                    @error('name')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>

                                                <div class="mb-3 col-md-6">
                                                    <label for="npm" class="form-label">Npm / nip</label>
                                                    <input class="form-control" type="text" name="npm" id="npm"
                                                        value="{{ $user->npm }}" oninput="toUppercase(this)" />
                                                </div>

                                                <div class="mb-3 col-md-6">
                                                    <label for="username" class="form-label">Role</label>
                                                    <select name="role"
                                                        class="form-control @error('role') is-invalid @enderror" required>

                                                        @if ($user->role == 'admin')
                                                            <option value="{{ $user->role }}"
                                                                @if (old('role') == 'admin') selected @endif>
                                                                {{ $user->role }}
                                                            </option>
                                                            <option value="super admin"
                                                                @if (old('role') == 'super admin') selected @endif>
                                                                super admin
                                                            </option>

                                                            <option value="user"
                                                                @if (old('role') == 'user') selected @endif>user
                                                            </option>
                                                        @endif

                                                        @if ($user->role == 'super admin')
                                                            <option value="{{ $user->role }}"
                                                                @if (old('role') == 'super admin') selected @endif>
                                                                {{ $user->role }}
                                                            </option>
                                                            <option value="admin"
                                                                @if (old('role') == 'admin') selected @endif>
                                                                admin
                                                            </option>

                                                            <option value="user"
                                                                @if (old('role') == 'user') selected @endif>user
                                                            </option>
                                                        @endif

                                                        @if ($user->role == 'user')
                                                            <option value="{{ $user->role }}"
                                                                @if (old('role') == 'user') selected @endif>
                                                                {{ $user->role }}
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
                                                    <label for="email" class="form-label">Jenis Kelamin</label>
                                                    <select name="gender"
                                                        class="form-control  @error('gender') is-invalid @enderror"
                                                        required>
                                                        <option value="Laki-Laki"
                                                            @if (old('gender') == 'Laki-Laki') selected @endif>Laki-Laki
                                                        </option>
                                                        <option value="Perempuan"
                                                            @if (old('gender') == 'Perempuan') selected @endif>Perempuan
                                                        </option>
                                                    </select>
                                                    @error('gender')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>

                                                <div class="mb-3 col-md-6">
                                                    <label for="username" class="form-label">Jurusan</label>
                                                    <select name="jurusan"
                                                        class="form-control @error('jurusan') is-invalid @enderror"
                                                        required>
                                                        <option value="{{ $user->jurusan }}">{{ $user->jurusan }}</option>
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
                                            </div>
                                            <!-- /Account -->
                                    </div>
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="mb-3 col-12 mb-0 d-flex justify-content-center">
                                                <button type="submit" class="btn btn-danger deactivate-account">Edit
                                                    Profile</button>
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
