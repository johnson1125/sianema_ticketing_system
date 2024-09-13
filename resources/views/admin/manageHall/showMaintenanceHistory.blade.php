<x-admin-Layout>
    <div class="container">
        <h1>Maintenance History for Hall {{ $hall_id }}</h1>
        <div class="maintenance-history">
            {!! $maintenanceHistory !!}
        </div>
    </div>
    
    <div class="mb-3">
        <a href="{{ url()->previous() }}" class="btn btn-primary">Return</a>
    </div>
</x-admin-Layout>
