@vite(['resources/css/admin/manageHall/index.css'], ['resources/js/admin/manageHall/index.js'])
<x-admin-Layout>
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
                                <form action="{{ route('manage.hall.change-status', $hall->hall_id) }}" method="POST">
                                    @csrf
                                    @method('POST')
                                    <button type="submit" class="btn">Change Hall Status</button>
                                </form>
                                <a href="{{ route('manage.hall.edit.seat', ['id' => $hall->hall_id])}}" class="btn" >Change Seat Status</a>
                                <button class="btn">Maintanance History</button>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-admin-Layout>

