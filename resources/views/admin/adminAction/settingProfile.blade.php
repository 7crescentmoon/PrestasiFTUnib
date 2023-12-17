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
                                @if (session()->has(['success']))
                                    <div class="alert alert-success alert-dismissible" role="alert">
                                        {{ session('success') }}
                                        <button type="button" class="btn-close" data-bs-dismiss="alert"
                                            aria-label="Close"></button>
                                    </div>
                                @endif
                                <div class="card mb-4">
                                    <div class="card">
                                        <div class="container mt-3 mb-2 d-flex justify-content-start align-items-center ">
                                            <h3 class="text-primary my-auto fw-bold">Profil Anda</h3>
                                        </div>
                                        <form action="{{ route('editProfile', $user_log->id, encrypt($user_log->id)) }}"
                                            method="POST" enctype="multipart/form-data">
                                            @csrf
                                            @method('patch')
                                            <div class="card-body">
                                                <div class="d-flex align-items-start align-items-sm-center gap-4 ">
                                                    @if ($user_log->profil)
                                                        <div class="position-relative">
                                                            <img src="{{ asset('storage/' . $user_log->profil) }}"
                                                                id="uploadedAvatar" alt="user-avatar"
                                                                class="d-block rounded border"
                                                                style="width: 100px;height: 100px; object-fit: cover" />
                                                            <div class="position-absolute" data-bs-toggle="tooltip"
                                                                data-bs-placement="top" data-bs-title="Hapus Foto Profil"
                                                                style="top: -.5rem;right: -.4rem;">
                                                                <input type="checkbox" name="delete_profile_picture"
                                                                    class="form-check-input"
                                                                    style="border-radius:50px;border: 1px solid #696cff">
                                                            </div>
                                                        </div>
                                                    @else
                                                        <img src="{{ asset('assets/img/user-profile-default.png') }}"
                                                            alt="user-avatar" class="d-block rounded border"
                                                            id="uploadedAvatar"
                                                            style="width: 100px;height: 100px; object-fit: cover" />
                                                    @endif
                                                    <div class="button-wrapper">
                                                        <label for="upload" class="btn btn-primary me-2 mb-4"
                                                            tabindex="0">
                                                            <span class="d-none d-sm-block">Unggah Foto Profil</span>
                                                            <i class="bx bx-upload d-block d-sm-none"></i>
                                                            <input type="file" id="upload" name="profil"
                                                                class="account-file-input" hidden
                                                                accept="image/png, image/jpeg" onchange="previewImage()" />
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
                                                            value="{{ $user_log->nama }}"
                                                            placeholder="Masukan nama lengkap   " required>
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
                                                        <label for="email" class="form-label">Email</label>
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
                                                            <option value="Laki - Laki"
                                                                @if (old('jenis_kelamin') == 'Laki - Laki' || $user_log->jenis_kelamin === 'Laki - Laki') selected @endif>Laki -
                                                                Laki
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
                                                        <label for="role" class="form-label">Role</label>
                                                        <input type="text" class="form-control" id="role"
                                                            name="role" value="{{ $user_log->role }}" disabled />
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
                                                        <button type="submit"
                                                            class="btn btn-primary deactivate-account">Ubah
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
            </div>
        </div>
    </div>
@endsection
