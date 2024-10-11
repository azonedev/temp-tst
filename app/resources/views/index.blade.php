@extends('layouts.app')
@section('title', 'Home')
@section('content')
    <div class="text-center">
        <a href="{{ route('register') }}" class="btn btn-primary">Register</a>
        <a href="{{ route('checkStatus') }}" class="btn btn-outline-dark">Check Status</a>
    </div>
@endsection
