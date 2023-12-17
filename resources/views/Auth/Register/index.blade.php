@extends('Auth.layouts.main')
@section('content')
    <div class="authentication-wrapper authentication-basic container-p-y">
        <div class="authentication-inner">
            <div class="card">
                <div class="card-body">
                    <div class="app-brand justify-content-center">
                        <img src="assets/img/unib.png" style="width: 10rem;height: 10rem;" alt="">
                    </div>
                    <h4 class="mb-2 text-center">Register akun disini!</h4>
                    <p class="mb-4 text-center">Buat akun anda untuk UniAchive.FT</p>

                    <form id="formAuthentication" class="mb-3" action="/register" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama Lengkap</label>
                            <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror"
                                value="{{ old('nama') }}" placeholder="Masukan nama lengkap anda" required>
                            @error('nama')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="username" class="form-label">NPM</label>
                            <input type="text" name="npm_nip" class="form-control @error('npm_nip') is-invalid @enderror"
                                value="{{ old('npm_nip') }}" placeholder="contoh : G1A021082" oninput="toUppercase(this)" required>
                            @error('npm_nip')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="username" class="form-label">Email</label>
                            <input type="text" name="email" class="form-control @error('email') is-invalid @enderror"
                                value="{{ old('email') }}" placeholder="Masukan Email anda" required>
                            @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="username" class="form-label">Jurusan</label>
                            <select name="jurusan" class="form-control @error('jurusan') is-invalid @enderror" required>
                                <option value="">Pilih Jurusan</option>
                                <option value="Informatika" @if (old('jurusan') == 'Informatika') selected @endif>Informatika
                                </option>
                                <option value="Teknik Sipil" @if (old('jurusan') == 'Teknik Sipil') selected @endif>Teknik Sipil
                                </option>
                                <option value="Teknik Elektro" @if (old('jurusan') == 'Teknik Elektro') selected @endif>Teknik
                                    Elektro
                                </option>
                                <option value="Teknik Mesin" @if (old('jurusan') == 'Teknik Mesin') selected @endif>Teknik Mesin
                                </option>
                                <option value="Arsiterktur" @if (old('jurusan') == 'Arsitektur') selected @endif>Arsitektur
                                </option>
                                <option value="Sistem Informasi" @if (old('jurusan') == 'Sistem Informasi') selected @endif>Sistem
                                    Informasi</option>
                            </select>
                            @error('jurusan')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Jenis Kelamin</label>
                            <select name="jenis_kelamin" class="form-control  @error('jenis_kelamin') is-invalid @enderror" required>
                                <option value="">Jenis Kelamin</option>
                                <option value="Laki - Laki" @if (old('jenis_kelamin') == 'Laki - Laki') selected @endif>Laki - Laki
                                </option>
                                <option value="Perempuan" @if (old('jenis_kelamin') == 'Perempuan') selected @endif>Perempuan
                                </option>
                            </select>
                            @error('jenis_kelamin')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3 form-password-toggle">
                            <label class="form-label" for="password">Password</label>
                            <div class="input-group input-group-merge">
                                <input type="password" name="password"
                                    class="form-control @error('password') is-invalid @enderror"
                                    placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                    aria-describedby="password" required>
                                <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                            </div>
                            @error('password')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <button class="btn btn-primary d-grid w-100">Daftar</button>
                    </form>

                    <p class="text-center">
                        <span>Sudah punya akun <b> UniAchive.FT </b> ?</span>
                        <a href="/login">
                            Login </a>
                    </p>
                </div>
            </div>
        </div>
    </div>

    <script>
        function toUppercase(el) {
            el.value = el.value.toUpperCase();
        }
    </script>
@endsection
