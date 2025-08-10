@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Create Permission</h1>

        <form action="{{ route('permissions.store') }}" method="POST">
            @csrf


            <div class="mb-3">
                <label for="name" class="form-label">Permission Name</label>
                <input type="text"
                       id="name"
                       name="name"
                       class="form-control @error('name') is-invalid @enderror"
                       value="{{ old('name') }}"
                       placeholder="Enter permission name">
                @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            {{-- Submit --}}
            <div class="d-flex justify-content-end">
                <button type="submit" class="btn btn-success">
                    <i class="bi bi-save me-2"></i> Save Permission
                </button>
            </div>
        </form>
    </div>

    {{-- Bootstrap Icons --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
@endsection
