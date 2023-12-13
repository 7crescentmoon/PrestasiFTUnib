@extends('admin.layouts.main')
@section('content')
<div class="layout-container">
    <!-- Layout container -->
    <div class="layout-page">
        <!-- Navbar -->
        @include('partials.navbar')
        <!-- / Navbar -->
        @livewire('daftar-prestasi')

        @include('partials.footer') 
        
    </div>
</div>

@endsection
