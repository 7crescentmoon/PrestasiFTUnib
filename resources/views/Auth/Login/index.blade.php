@extends('Auth.layouts.layout')
@section('content')
    <div class="authentication-wrapper authentication-basic container-p-y">
        <div class="authentication-inner">
            <!-- Register -->
            <div class="card">
                <div class="card-body">
                    <!-- Logo -->
                    <div class="app-brand justify-content-center">
                        <img src="assets/img/unib.png" style="width: 10rem;height: 10rem;" alt="">
                    </div>
                    <!-- /Logo -->
                    <h4 class="mb-2 text-center">Selamat datang di UniAchive.FT 👋</h4>
                    <p class="mb-4 text-center">Silahkan LOGIN terlebih dahulu</p>

                    @if (session()->has(['error']))
                    <p class="text-center">
                        <small class="text-muted alert alert-danger alert-dismissible " role="alert">
                            {{ session('error') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </small>
                    </p>
                    @endif

                    <form id="formAuthentication" class="mb-3" action="/login" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="username" class="form-label">NPM</label>
                            <input type="text" name="npm" class="form-control @error('npm') is-invalid @enderror"
                                value="{{ old('npm') }}" placeholder="Masukan npm anda">
                            @error('npm')
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
                                    placeholder="Masukan password anda" required>
                            </div>
                            @error('password')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>


                        <div class="mb-3">
                            <button class="btn btn-primary d-grid w-100">Login</button>
                        </div>
                    </form>

                    <p class="text-center">
                        <span>Belum punya akun ?</span>
                        <a href="/register">
                            <span>Register disini</span>
                        </a>
                    </p>
                </div>
            </div>
            <!-- /Register -->
        </div>
    </div>
@endsection
