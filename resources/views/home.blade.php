<link rel="stylesheet" type="text/css" href="{{ URL::asset('/style.css') }}">
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                {{-- <div class="card-header">{{ __('Dashboard') }}</div> --}}

                <a href="admin" class="d">Dashboard</a>
            </div>
        </div>
    </div>
</div>
@endsection
