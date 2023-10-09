@extends('Auth.layouts.layout')
@section('links')
    <link rel="stylesheet" href="/css/regist.css">
@endsection
@section('content')
    <div class="form-content">
        <div class="signup-form">
            <div class="title">Signup</div>

            <form action="/register" method="post">
                @csrf
                <div class="input-boxes">
                    <div class="input-box">
                        {{-- //name --}}
                        <i class="fas fa-user"></i>
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                            value="{{ old('name') }}" placeholder="Nama Lengkap" required>
                        </div>
                        @error('username')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                            
                    <div class="input-box">
                        {{-- npm --}}
                        <i class="fa-solid fa-address-card"></i>
                        <input type="text" name="npm" class="form-control @error('npm') is-invalid @enderror"
                            value="{{ old('npm') }}" placeholder="NPM">
                        </div>
                        @error('npm')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror

                    <div class="input-box">
                        {{-- //email --}}
                        <i class="fas fa-envelope"></i>
                        <input type="text" name="email" class="form-control @error('email') is-invalid @enderror"
                            value="{{ old('email') }}" placeholder="Enter your email" required>
                        </div>
                        @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror

                    <div class="input-box">
                        {{-- //jurusan --}}
                        <i class="fa-solid fa-building"></i>
                        <select name="jurusan" class="form-control @error('jurusan') is-invalid @enderror">
                            <option value="">Pilih Jurusan</option>
                            <option value="Informatika" @if (old('jurusan') == 'Informatika') selected @endif>Informatika
                            </option>
                            <option value="Teknik Sipil" @if (old('jurusan') == 'Teknik Sipil') selected @endif>Teknik Sipil
                            </option>
                            <option value="Teknik Elektro" @if (old('jurusan') == 'Teknik Elektro') selected @endif>Teknik Elektro
                            </option>
                            <option value="Teknik Mesin" @if (old('jurusan') == 'Teknik Mesin') selected @endif>Teknik Mesin
                            </option>
                            <option value="Arsiterktur" @if (old('jurusan') == 'Arsitektur') selected @endif>Arsitektur
                            </option>
                            <option value="Sistem Informasi" @if (old('jurusan') == 'Sistem Informasi') selected @endif>Sistem
                                Informasi</option>
                        </select>
                    </div>
                    @error('jurusan')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror

                    <div class="input-box">
                        {{-- //gender --}}
                        <i class="fa-solid fa-venus-mars"></i>
                        <select name="gender" class="form-control  @error('gender') is-invalid @enderror">
                            <option value="">Jenis Kelamin</option>
                            <option value="Laki-Laki" @if (old('gender') == 'Laki-Laki') selected @endif>Laki-Laki</option>
                            <option value="Perempuan" @if (old('gender') == 'Perempuan') selected @endif>Perempuan</option>
                        </select>
                    </div>
                    @error('gender')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror

                    <div class="input-box">
                        {{-- //password --}}
                        <i class="fas fa-lock"></i>
                        <input type="password" name="password"
                            class="form-control @error('password') is-invalid @enderror" placeholder="Enter your password"
                            required>
                    </div>
                    @error('password')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                    <div class="button input-box">
                        <input type="submit" value="Register">
                    </div>
                    <div class="text sign-up-text">Already have an account? <label for="flip"><a href="/login">Login
                                now</a></label></div>
                </div>
            </form>
        </div>
    </div>
@endsection
