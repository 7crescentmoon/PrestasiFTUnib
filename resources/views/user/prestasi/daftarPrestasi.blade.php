@extends('user.layouts.main')
@section('content')
    <div class="layout-container">

        <div class="layout-page">

            @include('partials.navbar')

            @livewire('prestasi-user')

            @include('partials.footer')
        </div>
    </div>
@endsection
