<!-- using the master page layout -->
@extends('layouts.masterAdmin')

<!-- The title for this page -->
@section('title', 'Manage Admin')


<!-- all css for this page -->
@push('styles')
{{--@vite(['resources/css/admin/hallTimeSlot/index.css'])--}}
@endpush

@section('content')
<h1>Admin Management</h1>

<a href="{{ route('adminManagement.create') }}" class="btn btn-primary">Create New Admin</a>

<table class="table">
    <thead>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Roles</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($admins as $admin)
        <tr>
            <td>{{ $admin->name }}</td>
            <td>{{ $admin->email }}</td>
            <td>{{ implode(', ', $admin->getRoleNames()->toArray()) }}</td>
            <td>
                <a href="{{ route('admin-management.edit', $admin->id) }}" class="btn btn-sm btn-warning">Edit</a>
                <form action="{{ route('admin-management.destroy', $admin->id) }}" method="POST" style="display:inline-block;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection

<!-- all js for this page -->
@push('scripts')
{{--@vite(['resources/js/admin/hallTimeSlot/index.js'])--}}
@endpush