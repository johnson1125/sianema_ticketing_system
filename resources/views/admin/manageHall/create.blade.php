<x-admin-Layout>
    <h1 class="pageTitle">Add Hall</h1>
    <form id="hallForm" action="{{ route('manage.hall.store') }}" method="POST">
        @csrf
        
        <div class="form-group">
            <label for="hallType">Hall Type:</label>
            <div class="radio-group">
                <input type="radio" id="standard" name="hallType" value="Standard" onclick="updateHallInfo()" required>
                <label for="standard">Standard</label>

                <input type="radio" id="premium" name="hallType" value="Premium" onclick="updateHallInfo()">
                <label for="premium">Premium</label>

                <input type="radio" id="family" name="hallType" value="Family" onclick="updateHallInfo()">
                <label for="family">Family</label>
            </div>
        </div>
        
        <div class="left-container">
            <div class="form-group">
                <label for="hallId">Hall ID:</label>
                <input type="text" id="hallId" name="hallId" readonly>
            </div>

            <div class="form-group">
                <label for="hallName">Hall Name:</label>
                <input type="text" id="hallName" name="hallName" readonly>
            </div>

            <div class="form-group">
                <label for="seatNumber">Total Seats:</label>
                <input type="text" id="seatNumber" name="seatNumber" readonly>
            </div>
        </div>

        <div class="right-container">
            <div class="form-group">
                <label for="hallImage">Hall Image:</label>
                <div id="hallImage"></div>
            </div>
        </div>

        <div class="form-actions">
            <button class="cancel" type="reset" onClick="location.href='{{ route('manage.hall.index') }}';">Cancel</button>
            <button class="submit" type="submit">Confirm</button>
        </div>
    </form>
</x-admin-Layout>
@vite(['resources/js/admin/manageHall/create.js', 'resources/css/admin/manageHall/create.css'])

