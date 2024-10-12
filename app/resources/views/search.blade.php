@extends('layouts.app')
@section('title', 'Check Status')
@section('content')
    <h2 class="text-center mb-4">Check Vaccination Status</h2>
    <form action="{{ route('checkStatus') }}" method="GET">
        <div class="mb-3">
            <label for="nid" class="form-label">Enter Your NID</label>
            <input type="text" class="form-control" id="nid" name="nid" value="{{\Illuminate\Support\Facades\Request::get('nid')}}" required>
        </div>
        <button type="submit" class="btn btn-primary w-100">Check Status</button>
    </form>

    <!-- Status Display -->
    <div class="mt-4">
        @if(isset($searchResult))
            <div class="card shadow-sm border-0">
                <div class="card-header bg-white border-0">
                    <h5 class="text-center text-uppercase" style="color: #000;">Search Result</h5>
                </div>
                <div class="card-body">
                    <!-- Name -->
                    <div class="row mb-3">
                        <div class="col-6">
                            <strong>Name:</strong>
                        </div>
                        <div class="col-6">
                            <span>{{ $searchResult->name ?? 'N/A' }}</span>
                        </div>
                    </div>
                    <!-- NID -->
                    <div class="row mb-3">
                        <div class="col-6">
                            <strong>NID:</strong>
                        </div>
                        <div class="col-6">
                            <span>{{ $searchResult->nid ?? 'N/A' }}</span>
                        </div>
                    </div>
                    <!-- Status -->
                    <div class="row mb-3">
                        <div class="col-6">
                            <strong>Status:</strong>
                        </div>
                        <div class="col-6">
                            <span>{{ $searchResult->status->name }}</span>
                        </div>
                    </div>
                    <!-- Schedule Date -->
                    <div class="row mb-3">
                        <div class="col-6">
                            <strong>Schedule Date:</strong>
                        </div>
                        <div class="col-6">
                            <span>{{ $searchResult->scheduledDate ?? 'N/A' }}</span>
                        </div>
                    </div>
                    <!-- Center -->
                    <div class="row mb-3">
                        <div class="col-6">
                            <strong>Vaccine Center:</strong>
                        </div>
                        <div class="col-6">
                            <span>{{ $searchResult->center ?? 'N/A' }}</span>
                        </div>
                    </div>
                    <!-- Location -->
                    <div class="row mb-3">
                        <div class="col-6">
                            <strong>Location:</strong>
                        </div>
                        <div class="col-6">
                            <span>{{ $searchResult->location ?? 'N/A' }}</span>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
@endsection
