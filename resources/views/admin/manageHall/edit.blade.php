<x-admin-Layout>
    <form id="seat-form" action="{{ route('seat.update', ['hall_id' => $hall->hall_id]) }}" method="POST">
        @csrf
        <div class="hallView">
            <div class="screen-container">
                <img class="screenImg" src="{{ asset('images/screen.png')}}"  alt="Screen">
            </div>
            <div class="seat-container">
                @php
                    $rowLetters = $seats->unique('row_letter')->pluck('row_letter')->all();
                @endphp
                @if ($hall->hall_type === 'Standard')
                    @for($i=0; $i<sizeof($rowLetters); $i++)
                        <div class="standard-row">
                            <div class="standard-left-column">
                                @for($j=1; $j<=3;$j++)
                                    @php
                                        $seat = $seats->where('row_letter', $rowLetters[$i])->where('column_number', $j)->first();
                                    @endphp
                                    @if($seat)
                                        @if($seat->status === 'open')
                                        <img class="seatImg" src="{{ asset('images/Standard_seat.png')}}" alt="Seat {{ $seat->seat_id }}">
                                        @else
                                        <img class="seatImg" src="{{ asset('images/Unavailable_Standard_seat.png')}}" alt="Seat {{ $seat->seat_id }}">
                                        @endif
                                    @endif
                                @endfor
                            </div>
                            <div class="standard-middle-column">
                                @for($j=4; $j<=9;$j++)
                                    @php
                                        $seat = $seats->where('row_letter', $rowLetters[$i])->where('column_number', $j)->first();
                                    @endphp
                                    @if($seat)
                                        @if($seat->status === 'open')
                                        <img class="seatImg" src="{{ asset('images/Standard_seat.png')}}" alt="Seat {{ $seat->seat_id }}">
                                        @else
                                        <img class="seatImg" src="{{ asset('images/Unavailable_Standard_seat.png')}}" alt="Seat {{ $seat->seat_id }}">
                                        @endif
                                    @endif
                                @endfor
                            </div>
                            <div class="standard-right-column">
                                @for($j=10; $j<=12;$j++)
                                    @php
                                        $seat = $seats->where('row_letter', $rowLetters[$i])->where('column_number', $j)->first();
                                    @endphp
                                    @if($seat)
                                        @if($seat->status === 'open')
                                        <img class="seatImg" src="{{ asset('images/Standard_seat.png')}}" alt="Seat {{ $seat->seat_id }}">
                                        @else
                                        <img class="seatImg" src="{{ asset('images/Unavailable_Standard_seat.png')}}" alt="Seat {{ $seat->seat_id }}">
                                        @endif
                                    @endif
                                @endfor
                            </div>
                        </div>
                    @endfor
                @endif
            </div>
        </div>
        <div class="text-end mt-3"> 
            <button type="submit" class="btn btn-primary">Confirm Modify</button>
        </div>
        <p>Number of unique row letters: {{ sizeof($rowLetters) }}</p>
        @foreach($rowLetters as $letter)
           <p>Current letter: {{ $letter }}</p>
        @endforeach
            
        @foreach ($seats as $seat)
        <p>Current seat: {{ $seat }}</p>
    @endforeach
            
    </form>
    
@vite(['resources/css/admin/manageHall/edit.css'], ['resources/js/admin/manageHall/edit.js'])
</x-admin-Layout>