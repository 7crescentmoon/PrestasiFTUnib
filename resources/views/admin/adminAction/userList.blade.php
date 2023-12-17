@extends('admin.layouts.main')
@section('content')
<div class="layout-container">
    <div class="layout-page">
        @include('partials.navbar')
        @livewire('load-userlist')
        @include('partials.footer') 
        @include('sweetalert::alert')

    </div>
</div>

@endsection
