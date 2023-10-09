@extends('Auth.layouts.layout')
@section('links')
<link rel="stylesheet" href="/css/login.css">
@endsection
@section('content')
    <div class="form-content">
        <div class="login-form">
            <div class="title">Login</div>
            <form action="/login" method="POST">
                @csrf
                <div class="input-boxes">
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
                    </div>
                    
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
                        <input type="submit" value="Login">
                    </div>
                    <div class="text sign-up-text"> Don't have an account? <label for="flip"><a href="/register">Sigup
                                now</a></label></div>
                </div>
            </form>
        </div>
    </div>
@endsection
