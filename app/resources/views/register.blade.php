@extends('layouts.app')
@section('title', 'Register')
@section('content')
    <h2 class="text-center mb-4">Register for Vaccination</h2>
    <form action="{{ route('register.submit') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="nid" class="form-label">National ID</label>
            <input type="text" class="form-control @error('nid') is-invalid @enderror" id="nid" name="nid" value="{{ old('nid') }}" required>
            @error('nid')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="name" class="form-label">Full Name</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" required>
            @error('name')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email Address</label>
            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" required>
            @error('email')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="phone" class="form-label">Phone Number</label>
            <input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" value="{{ old('phone') }}" required>
            @error('phone')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="vaccine_center" class="form-label">Vaccine Center</label>
            <select class="form-select @error('vaccine_center_id') is-invalid @enderror" id="vaccine_center" name="vaccine_center_id" required>
                <option value="" selected disabled>Select a center</option>
                @foreach($centers as $center)
                    <option value="{{ $center->id }}" {{ old('vaccine_center_id') == $center->id ? 'selected' : '' }}>
                        {{ $center->name }} - {{$center->location}}
                    </option>
                @endforeach
            </select>
            @error('vaccine_center_id')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Register</button>
    </form>
@endsection
