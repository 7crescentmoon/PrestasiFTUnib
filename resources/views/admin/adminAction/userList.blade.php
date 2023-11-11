@extends('admin.layouts.main')
@section('content')
<div class="layout-container">
    <!-- Layout container -->
    <div class="layout-page">
        <!-- Navbar -->
        @include('partials.navbar')
        @livewire('load-userlist')
    </div>
</div>

@endsection
