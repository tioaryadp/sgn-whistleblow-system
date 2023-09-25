@extends('front.front-master')
@section('front-konten')
<head>
    <!-- Styles -->
    <link rel="stylesheet" href="css/form.css">
    <style>
        .detail-laporan{
            margin-top: 25px;
        }

        .detail-laporan h3{
            font-size: 1.5rem;
            margin-bottom: 1rem;
        }

        .detail-laporan table{
            font-size: 1.5rem;
        }

        .detail-laporan table .td-header{
            padding-right: 1rem;
        }
    </style>
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
        <div class="detail-laporan">
            <h3>Overview Laporan</h3>
            <table>
                <tr>
                    <td class="td-header">Email</td>
                    <td>: {{ $tiket->komunikasi_email }}</td>
                </tr>
                <tr>
                    <td class="td-header">Tanggal Dibuat</td>
                    <td>: {{ $tiket->tiket_tanggal }}</td>
                </tr>
                <tr>
                    <td class="td-header">Kategori</td>
                    <td>: {{ $tiket->kategori_detail }}</td>
                </tr>
                <tr>
                    <td class="td-header">Kejadian</td>
                    <td>: {{ $tiket->laporan_kejadian }}</td>
                </tr>
            </table>
        </div>
        @endforeach
    </div>
</div>
</main>
@endsection