
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
            <p>CRUD User</p>
        </div>
            @livewire('user-index')
    </div>
@endsection