@extends('front.front-master')
@section('front-konten')
<head>
    <!-- Styles -->
    <link rel="stylesheet" href="css/form.css">
</head>
<main>
<div style="height: auto; margin-top: 0;" class="wrapper">
    <div class="form-box identitas">
        @foreach($tiket as $tiket)
        <div class="no_tiket">
            <h3><span>No. Tiket : </span>{{ $tiket->tiket_sid }}</h3>
        </div>
        <div class="status">
            <h3>Status laporan anda saat ini : <br> <span>{{ $tiket->status_detail }}</span></h3>
        </div>
        @endforeach
    </div>
</div>
</main>
@endsection