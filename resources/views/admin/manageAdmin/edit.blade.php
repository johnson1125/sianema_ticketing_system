<!-- Author: Lim Yu Her  -->
<!-- using the master page layout -->
@extends('layouts.masterAdmin')

<!-- The title for this page -->
@section('title', 'Edit Admin')


<!-- all css for this page -->
@push('styles')
@vite(['resources/css/admin/manageAdmin/edit.css'])
@endpush

@section('content')
<div id="container">
    <div id="section1">
        <div id='header'>
            <h6>Edit Admin</h6>
        </div>
    </div>
    <div id="section2" class="relative overflow-x-auto shadow-md sm:rounded-lg bg-gray-50">
        <form action="{{ route('adminManagement.update', [ 'userId' => $admin->id ]) }}" method="POST">
            @csrf
            @method('PATCH')
            <div class="form-container">
                <div class="form-top-left">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input class="normal-input" type="text" id="name" name="name" value="{{ old('name', $admin->name) }}" required>
                        @if ($errors->has('name'))
                        @foreach ($errors->get('name') as $error)
                        <span class="block text-red-500">{{ $error }}</span>
                        @endforeach
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input class="normal-input" type="email" id="email" name="email" value="{{ old('email', $admin->email) }}" required>
                        @if ($errors->has('email'))
                        @foreach ($errors->get('email') as $error)
                        <span class="block text-red-500">{{ $error }}</span>
                        @endforeach
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="mobile_number">Mobile Number</label>
                        <input class="normal-input" type="text" id="mobile_number" name="mobile_number" placeholder="0123456789" value="{{ old('mobile_number', $admin->mobile_number) }}" required>
                        @if ($errors->has('mobile_number'))
                        @foreach ($errors->get('mobile_number') as $error)
                        <span class="block text-red-500">{{ $error }}</span>
                        @endforeach
                        @endif
                    </div>
                    <div class="form-group">
                        <div class="relative max-w-sm">
                            <label for="date_of_birth">Date Of Birth</label>
                            <div class="calendar-icon-container absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                                </svg>
                            </div>
                            <input required id="datepicker-actions" name="date_of_birth"
                                placeholder="Select date" value="{{ old('date_of_birth', $admin->date_of_birth) }}" datepicker-format="yyyy-mm-dd"
                                datepicker datepicker-buttons datepicker-autoselect-today datepicker-autohide type="text"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Select date">
                        </div>
                    </div>

                    <div class="form-group role-picker">
                        <label for="roles-display">Role(s):</label>
                        <br>
                        <div id="roles-checkbox-container">
                            @foreach($roles as $role)
                                @if($role->name != 'Admin' && $role->name != 'User' && $role->name != 'Root')
                                    <input id="role_{{ $role->name }}" name="roles[]" type="checkbox"
                                        {{ in_array($role->name, old('roles', $admin->roles->pluck('name')->toArray())) ? 'checked' : '' }}
                                        class="role-checkbox" value="{{ $role->name }}">
                                    <label for="role_{{ $role->name }}"> {{ $role->name }}</label>
                                @endif
                            @endforeach
                        </div>
                        <input disabled class="normal-input" type="text" id="roles-display" name="roles-display" placeholder="Specify role(s) for this admin.">
                        @if ($errors->has('roles'))
                        @foreach ($errors->get('roles') as $error)
                        <span class="block text-red-500">{{ $error }}</span>
                        @endforeach
                        @endif
                    </div>
                </div>
            </div>

            <div class="form-actions">
                <button class="cancel" type="reset" onClick="location.href='{{ route('adminManagement') }}';">Cancel</button>
                <button type="submit" class="submit btn btn-primary">Update Admin</button>
            </div>
        </form>
    </div>
</div>
@endsection

<!-- all js for this page -->
@push('scripts')
@vite(['resources/js/admin/manageAdmin/edit.js'])
@endpush