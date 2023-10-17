@extends('Auth.layouts.main')
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
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </small>
                        </p>
                    @endif
                    @if (session()->has(['success']))
                        <p class="text-center">
                            <small class="text-muted alert alert-success alert-dismissible " role="alert">
                                {{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </small>
                        </p>
                    @endif

                    <form id="formAuthentication" class="mb-3" action="/login" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="npm" class="form-label">NPM</label>
                            <input type="text" name="npm" id="npm"
                                class="form-control @error('npm') is-invalid @enderror" value="{{ old('npm') }}"
                                placeholder="Masukan npm anda" oninput="toUppercase(this)">
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

    <script>
        function toUppercase(el) {
            el.value = el.value.toUpperCase();
        }
    </script>
@endsection
