@extends('admin.layouts.main')
@section('content')
<div class="layout-container">
    <!-- Layout container -->
    <div class="layout-page">
        <!-- Navbar -->
        @include('partials.navbar')
        @livewire('load-userlist')
        @include('partials.footer') 
        @include('sweetalert::alert')

    </div>
</div>

@endsection
