
@extends('layouts.main')

@push('style')
    @livewireStyles
@endpush

@push('script')
    @livewireScripts    
@endpush
@section('container')
    <div class="container">
        <div class="row text-center">
            <p>Create User</p>
        </div>
        <div class="row">
            @livewire('user-create')
        </div>
        <div class="row mt-3">
            <hr>
            @livewire('user-index')
        </div>
    </div>
@endsection