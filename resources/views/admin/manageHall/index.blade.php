<!-- Author: Sia Yeong Sheng-->
<!-- using the master page layout -->
@extends('layouts.masterAdmin')

<!-- The title for this page -->
@section('title', 'Hall Management')

@push('styles')
    @vite(['resources/css/admin/manageHall/index.css'])
@endpush

@if(session('success'))
    <script>
        alert("{{ session('success') }}");
    </script>
@endif
@if(session('error'))
    <script>
        alert("{{ session('error') }}");
    </script>
@endif


@section('content')
    <div class="container">
        <div class="header-container">
            <h1 class="pageTitle">Manage Hall</h1>
            <div class="text-end mb-3">
                
                <button class="btn" onClick="location.href='{{ route('manage.hall.create') }}';"> Add Hall </button>
            </div>
        </div>
        <table class="manage-hall-table-list">
            <thead>
                <tr>
                    <th>Hall ID</th>
                    <th>Name</th>
                    <th>Type</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($halls as $hall)
                    <tr>                     
                        <td>{{ $hall->hall_id }}</td>
                        <td>{{ $hall->hall_name }}</td>
                        <td>{{ $hall->hall_type }}</td>
                        <td> <span class="status {{ $hall->status === 'open' ? 'status-open' : 'status-closed' }}">
                            {{ ucfirst($hall->status) }}
                        </span></td>
                        <td>
                            <div class="actionButtons">
                                <form action="{{ route('manage.hall.change-status', $hall->hall_id) }}" method="POST" class="status-form">
                                    @csrf
                                    @method('POST')
                                    <button type="submit" class="btn">Change Hall Status</button>
                                </form>
                                <a href="{{ route('manage.hall.edit.seat', ['hall_id' => $hall->hall_id])}}" class="btn" >Change Seat Status</a>
                                <a href="{{ route('hall.maintenance.history', ['hall_id' => $hall->hall_id]) }}" class="btn">Maintenance History</a>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

<!-- all js for this page -->
@push('scripts')
    @vite(['resources/js/admin/manageMovie/index.js'])
@endpush
