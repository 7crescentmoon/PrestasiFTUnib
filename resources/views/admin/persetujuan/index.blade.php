@extends('admin.layouts.main')
@section('content')
<div class="layout-container">
    <div class="layout-page">
        @include('partials.navbar')
        @livewire('daftar-persetujuan')
        @include('partials.footer') 
    </div>
</div>
@endsection
