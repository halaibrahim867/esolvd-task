@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Edit Permission</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('permissions.update', $permission->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="name" class="form-label">Permission Name</label>
                <input type="text" name="name" class="form-control" value="{{ old('name', $permission->name) }}">
            </div>

            <div class="mb-3">
                <label for="guard_name" class="form-label">Guard Name</label>
                <input type="text" name="guard_name" class="form-control" value="{{ old('guard_name', $permission->guard_name) }}">
            </div>

            <button type="submit" class="btn btn-primary">Update Permission</button>
            <a href="{{ route('permissions.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
@endsection
