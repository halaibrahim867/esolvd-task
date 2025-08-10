@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Create Role</h1>

        <form action="{{ route('roles.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label>Role Name</label>
                <input type="text" name="name" class="form-control" required>
                @error('name') <div class="text-danger">{{ $message }}</div> @enderror
            </div>

            <div class="mb-3">
                <label>Permissions</label>
                <div class="row">
                    @foreach($permissions as $permission)
                        <div class="col-md-3">
                            <label>
                                <input type="checkbox" name="permissions[]" value="{{ $permission->id }}">
                                {{ $permission->name }}
                            </label>
                        </div>
                    @endforeach
                </div>
            </div>

            <button class="btn btn-success">Save</button>
        </form>
    </div>
@endsection
