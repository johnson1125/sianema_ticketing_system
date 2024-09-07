
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
<x-admin-Layout>
    <form id="seat-form" action="{{ route('seat.update', ['hall_id' => $hall->hall_id]) }}" method="POST">
        @csrf
        <div class="hallView">
            <div class="screen-container">
                <img class="screenImg" src="{{ asset('images/screen.png') }}" alt="Screen">
            </div>
            <div class="seat-container">
                @php
                    $rowLetters = $seats->unique('row_letter')->pluck('row_letter')->all();
                @endphp
                @if ($hall->hall_type === 'Standard')
                    @for ($i = 0; $i < sizeof($rowLetters); $i++)
                        <div class="standard-row">
                            <div class="standard-left-column">
                                @for ($j = 1; $j <= 3; $j++)
                                    @php
                                        $seat = $seats
                                            ->where('row_letter', $rowLetters[$i])
                                            ->where('column_number', $j)
                                            ->first();
                                    @endphp
                                    @if ($seat)
                                        <div class="seat-box">
                                            @if ($seat->status === 'open')
                                                <img class="standardSeatImg" src="{{ asset('images/standardSeat.png') }}"
                                                    alt="Seat {{ $seat->seat_id }}">
                                            @else
                                                <img class="standardSeatImg"
                                                    src="{{ asset('images/unavailableStandardSeat.png') }}"
                                                    alt="Seat {{ $seat->seat_id }}">
                                            @endif
                                            <div class="seat-info">{{ $seat->row_letter }}{{ $seat->column_number }}
                                            </div>
                                        </div>
                                    @endif
                                @endfor
                            </div>
                            <div class="standard-middle-column">
                                @for ($j = 4; $j <= 9; $j++)
                                    @php
                                        $seat = $seats
                                            ->where('row_letter', $rowLetters[$i])
                                            ->where('column_number', $j)
                                            ->first();
                                    @endphp
                                    @if ($seat)
                                        <div class="seat-box">
                                            @if ($seat->status === 'open')
                                                <img class="standardSeatImg" src="{{ asset('images/standardSeat.png') }}"
                                                    alt="Seat {{ $seat->seat_id }}">
                                            @else
                                                <img class="standardSeatImg"
                                                    src="{{ asset('images/unavailableStandardSeat.png') }}"
                                                    alt="Seat {{ $seat->seat_id }}">
                                            @endif
                                            <div class="seat-info">{{ $seat->row_letter }}{{ $seat->column_number }}
                                            </div>
                                        </div>
                                    @endif
                                @endfor
                            </div>
                            <div class="standard-right-column">
                                @for ($j = 10; $j <= 12; $j++)
                                    @php
                                        $seat = $seats
                                            ->where('row_letter', $rowLetters[$i])
                                            ->where('column_number', $j)
                                            ->first();
                                    @endphp
                                    @if ($seat)
                                        <div class="seat-box">
                                            @if ($seat->status === 'open')
                                                <img class="standardSeatImg" src="{{ asset('images/standardSeat.png') }}"
                                                    alt="Seat {{ $seat->seat_id }}">
                                            @else
                                                <img class="standardSeatImg"
                                                    src="{{ asset('images/unavailableStandardSeat.png') }}"
                                                    alt="Seat {{ $seat->seat_id }}">
                                            @endif
                                            <div class="seat-info">{{ $seat->row_letter }}{{ $seat->column_number }}
                                            </div>
                                        </div>
                                    @endif
                                @endfor
                            </div>
                        </div>
                    @endfor
                @endif
                @if ($hall->hall_type === 'Premium')
                    @for ($i = 0; $i < sizeof($rowLetters); $i++)
                        <div class="premium-row">
                            <div class="premium-left-column">
                                @for ($j = 1; $j <= 5; $j++)
                                    @php
                                        $seat = $seats
                                            ->where('row_letter', $rowLetters[$i])
                                            ->where('column_number', $j)
                                            ->first();
                                    @endphp
                                    @if ($seat)
                                        <div class="seat-box">
                                            @if ($seat->status === 'open')
                                                <img class="premiumSeatImg" src="{{ asset('images/premiumSeat.png') }}"
                                                    alt="Seat {{ $seat->seat_id }}">
                                            @else
                                                <img class="premiumSeatImg"
                                                    src="{{ asset('images/unavailablePremiumSeat.png') }}"
                                                    alt="Seat {{ $seat->seat_id }}">
                                            @endif
                                            <div class="seat-info">{{ $seat->row_letter }}{{ $seat->column_number }}
                                            </div>
                                        </div>
                                    @endif
                                @endfor
                            </div>
                            <div class="premium-right-column">
                                @for ($j = 6; $j <= 10; $j++)
                                    @php
                                        $seat = $seats
                                            ->where('row_letter', $rowLetters[$i])
                                            ->where('column_number', $j)
                                            ->first();
                                    @endphp
                                    @if ($seat)
                                        <div class="seat-box">
                                            @if ($seat->status === 'open')
                                                <img class="premiumSeatImg" src="{{ asset('images/premiumSeat.png') }}"
                                                    alt="Seat {{ $seat->seat_id }}">
                                            @else
                                                <img class="premiumSeatImg"
                                                    src="{{ asset('images/unavailablePremiumSeat.png') }}"
                                                    alt="Seat {{ $seat->seat_id }}">
                                            @endif
                                            <div class="seat-info">{{ $seat->row_letter }}{{ $seat->column_number }}
                                            </div>
                                        </div>
                                    @endif
                                @endfor
                            </div>
                        </div>
                    @endfor
                @endif
                @if ($hall->hall_type === 'Family')
                    @for ($i = 0; $i < sizeof($rowLetters); $i++)
                        <div class="family-row">
                            @dd($rowLetters);
                            @php
                                $seat = $seats->where('row_letter', $rowLetters[$i])->first();
                            @endphp
                            @if ($seat->status === 'open')
                                <div class="seat-box">
                                    <img class="familySeatImg" src="{{ asset('images/familySeat.png') }}"
                                        alt="Seat {{ $seat->seat_id }}">
                                    <div class="seat-info">{{ $seat->row_letter }}{{ $seat->column_number }}</div>
                                </div>
                            @else
                                <div class="seat-box">
                                    <img class="familySeatImg" src="{{ asset('images/unavailableFamilySeat.png') }}"
                                        alt="Seat {{ $seat->seat_id }}">
                                    <div class="seat-info">{{ $seat->row_letter }}{{ $seat->column_number }}</div>
                                </div>
                            @endif
                        </div>
                    @endfor
                @endif
            </div>
        </div>
        <div class="text-end mt-3">
            <button type="button" class="cancel" onClick="location.href='{{ route('manage.hall.index') }}';">Cancel</button>
            <button type="submit" class="btn btn-primary">Confirm Modify</button>
        </div>
    </form>
    @vite(['resources/css/admin/manageHall/edit.css','resources/js/admin/manageHall/edit.js'])
</x-admin-Layout>
