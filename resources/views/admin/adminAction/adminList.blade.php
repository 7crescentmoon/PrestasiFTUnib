@extends('admin.layouts.main')
@section('content')
<div class="layout-container">
    <!-- Layout container -->
    <div class="layout-page">
        <!-- Navbar -->
        @include('partials.navbar')
        <!-- / Navbar -->
        @livewire('load-adminlist')    
    </div>
</div>

@endsection
