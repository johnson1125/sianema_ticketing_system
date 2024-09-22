<!-- Author: Sia Yeong Sheng-->
@extends('layouts.masterAdmin')

<!-- The title for this page -->
@section('title', 'View Hall Maintenance History')


@section('content')
    <div class="mb-3">
        <a href="{{ url()->previous() }}" class="btn"
            style="float:right; color:white; background:rgb(4, 108, 78); display:inline-block; padding:8px 15px; font-size:small; font-weight:bold; text-align:center; text-decoration:none; border-radius:5px; transition:background-color 0.3s ease, color 0.3s ease; margin-bottom:20px;" 
            onmouseover="this.style.background='rgb(3, 84, 63)'" 
            onmouseout="this.style.background='rgb(4, 108, 78)'">
            Return</a>
    </div>
    <div class="container">
        <h1>Maintenance History for Hall {{ $hall_id }}</h1>
        <div class="maintenance-history">
            {!! $maintenanceHistory !!}
        </div>
    </div>
@endsection

