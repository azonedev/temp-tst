@extends('layouts.app')
@section('title', 'Check Status')
@section('content')
    <h2 class="text-center mb-4">Check Vaccination Status</h2>
    <form action="{{ route('checkStatus.submit') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="nid" class="form-label">Enter Your NID</label>
            <input type="text" class="form-control" id="nid" name="nid" required>
        </div>
        <button type="submit" class="btn btn-primary w-100">Check Status</button>
    </form>

    <!-- Status Display -->
    <div class="mt-4">
        @if(session('status'))
            <div class="alert alert-light text-center">
                {{ session('status') }}
            </div>
        @endif
    </div>
@endsection
