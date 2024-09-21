<!-- using the master page layout -->
@extends('layouts.masterAdmin')

<!-- The title for this page -->
@section('title', 'Add Admin')


<!-- all css for this page -->
@push('styles')
{{--@vite(['resources/css/admin/hallTimeSlot/index.css'])--}}
@endpush

@section('content')
<h1>Create New Admin</h1>

<form action="{{ route('adminManagement.store') }}" method="POST">
    @csrf

    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" name="name" id="name" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" name="email" id="email" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="password">Password</label>
        <input type="password" name="password" id="password" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="password_confirmation">Confirm Password</label>
        <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="roles">Roles</label>
        <select name="roles[]" id="roles" class="form-control" multiple required>
            @foreach($roles as $role)
            <option value="{{ $role->name }}">{{ $role->name }}</option>
            @endforeach
        </select>
    </div>

    <button type="submit" class="btn btn-primary">Create Admin</button>
</form>
@endsection

<!-- all js for this page -->
@push('scripts')
{{--@vite(['resources/js/admin/hallTimeSlot/index.js'])--}}
@endpush