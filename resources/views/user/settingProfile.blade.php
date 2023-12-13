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
                <div class="flex-grow-1 container-p-y ">
                    <!-- Layout -->
                    <div class="">

                        <div class="container-xxl flex-grow-1">
                            <div class="row">
                                <div class="col-md-12">
                                    @if (session()->has(['success']))
                                        <div class="alert alert-success alert-dismissible" role="alert">
                                            {{ session('success') }}
                                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                                aria-label="Close"></button>
                                        </div>
                                    @endif
                                    <div class="card mb-3">
                                        <h5 class="card-header">Profile Details</h5>
                                        <!-- Account -->
                                        <form action="{{ route('editProfileUser', $user_log->id) }}" method="POST"
                                            enctype="multipart/form-data">
                                            @csrf
                                            @method('put')
                                            <div class="card-body">
                                                <div class="d-flex align-items-start align-items-sm-center gap-4">
                                                    @if ($user_log->profil)
                                                        <img src="{{ asset('storage/' . $user_log->profil) }}"
                                                            alt="user-avatar" class="d-block rounded border"
                                                            style="width: 100px;height: 100px; object-fit: cover"
                                                            id="uploadedAvatar" />
                                                    @else
                                                        <img src="{{ asset('assets/img/user-profile-default.png') }}"
                                                            alt="user-avatar" class="d-block rounded border"
                                                            style="width: 100px;height: 100px; object-fit: cover"
                                                            id="uploadedAvatar" />
                                                    @endif
                                                    <div class="button-wrapper">
                                                        <label for="upload" class="btn btn-primary me-2 mb-4"
                                                            tabindex="0">
                                                            <span class="d-none d-sm-block">Unggah Foto Profile</span>
                                                            <i class="bx bx-upload d-block d-sm-none"></i>
                                                            <input type="file" id="upload" name="profil"
                                                                class="account-file-input" hidden
                                                                accept="image/png, image/jpeg" onchange="previewImage()" />
                                                        </label>
                                                        <label class="btn btn-outline-secondary me-2 mb-4" tabindex="0">
                                                            <input type="checkbox" name="delete_profile_picture"
                                                                class="form-check-input"> Hapus Foto Profil
                                                        </label>
                                                        <p class="text-muted mb-0">
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr class="my-0" />
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="mb-3 col-md-6">
                                                        <label for="username" class="form-label">Nama Lengkap</label>
                                                        <input type="text" name="nama"
                                                            class="form-control @error('nama') is-invalid @enderror"
                                                            value="{{ $user_log->nama }}" placeholder="Masukan nama lengkap"
                                                            required>
                                                        @error('nama')
                                                            <div class="invalid-feedback">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>

                                                    <div class="mb-3 col-md-6">
                                                        @if (auth()->user()->role === 'super admin' || auth()->user()->role === 'admin')
                                                            <label for="npm_nip" class="form-label">NIP</label>
                                                        @else
                                                            <label for="npm_nip" class="form-label">NPM</label>
                                                        @endif
                                                        <input type="text" name="npm_nip"
                                                            class="form-control npm_nip @error('npm_nip') is-invalid @enderror"
                                                            value="{{ $user_log->npm_nip }}"
                                                            placeholder="contoh : G1A021082" required
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
                                                            value="{{ $user_log->email }}" placeholder="Masukan Email anda"
                                                            required>
                                                        @error('email')
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
                                                                @if (old('jenis_kelamin') == 'Laki-Laki' || $user_log->jenis_kelamin === 'Laki-Laki') selected @endif>Laki-Laki
                                                            </option>
                                                            <option value="Perempuan"
                                                                @if (old('jenis_kelamin') == 'Perempuan' || $user_log->jenis_kelamin === 'Perempuan') selected @endif>Perempuan
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
                                                        <select name="jurusan" disabled
                                                            class="form-control @error('jurusan') is-invalid @enderror">
                                                            <option value="">{{ $user_log->jurusan }}</option>
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
                                                        <button type="submit"
                                                            class="btn btn-danger deactivate-account">Ubah
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
                </div>
                @include('partials.footer')
            </div>
        </div>
    </div>

    <script>
        function toUppercase() {
            let input = document.getElementByclassName("npm_nip");
            input.value = input.toUppercase();
        }

        function previewImage() {
            const image = document.querySelector('#upload');
            const imagePreview = document.querySelector('#uploadedAvatar');

            // imagePreview.style.display = 'block';

            const oFReader = new FileReader();
            oFReader.readAsDataURL(image.files[0]);

            oFReader.onload = function(oFREvent) {
                imagePreview.src = oFREvent.target.result
            }
        };
    </script>
@endsection
