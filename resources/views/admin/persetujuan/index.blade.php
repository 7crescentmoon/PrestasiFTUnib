@extends('admin.layouts.main')
@section('content')
<div class="layout-container">
    <!-- Layout container -->
    {{-- style="background-color: #f5f5f9 --}}
    <div class="layout-page">
        
        @include('partials.navbar')
        @livewire('daftar-persetujuan')

    </div>
</div>
@endsection
