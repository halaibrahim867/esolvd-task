@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Role</h1>

        <form action="{{ route('roles.update', $role->id) }}" method="POST">
            @csrf @method('PUT')
            <div class="mb-3">
                <label>Role Name</label>
                <input type="text" name="name" value="{{ $role->name }}" class="form-control" required>
                @error('name') <div class="text-danger">{{ $message }}</div> @enderror
            </div>

            <div class="mb-3">
                <label>Permissions</label>
                <div class="row">
                    @foreach($permissions as $permission)
                        <div class="col-md-3">
                            <label>
                                <input type="checkbox" name="permissions[]" value="{{ $permission->id }}"
                                    {{ in_array($permission->id, $rolePermissions) ? 'checked' : '' }}>
                                {{ $permission->name }}
                            </label>
                        </div>
                    @endforeach
                </div>
            </div>

            <button class="btn btn-success">Update</button>
        </form>
    </div>
@endsection
