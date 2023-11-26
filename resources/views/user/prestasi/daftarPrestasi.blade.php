@extends('user.layouts.main')
@section('content')
    <div class="layout-container">
        <!-- Layout container -->
        <div class="layout-page">
            <!-- Navbar -->
            @include('partials.navbar')
            <!-- / Navbar -->
            @livewire('prestasi-user')
            <!-- Content wrapper -->
            
        </div>
    </div>
@endsection
