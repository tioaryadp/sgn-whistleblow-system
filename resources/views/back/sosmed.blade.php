@extends('back.back-master')

@section('judul_halaman', 'Daftar Sosial Media')

@section('back-konten')
<head>
    <style>
        td.upper::first-letter{
            text-transform: capitalize;
        }
    </style>
</head>
<div class="account_list">
    <a class="tombol" style="float: left;" href="/master">Kembali</a>
    <table border="1" class="table">
        <tr>
            <th>Social Media</th>
            <th>Link</th>
            <th>Action</th>
        </tr>
        @foreach($daftar_sosmed as $sosmed)
        <tr>
            <td class="upper">{{ $sosmed->sosmed_name }}</td>
            <td>{{ $sosmed->sosmed_link }}</td>
            <td>
                <a class="edit" href="/edit-sosmed-{{ $sosmed->sosmed_name }}"><i class="fa-solid fa-pen-to-square"></i></a>
            </td>
        </tr>
        @endforeach
    </table>
</div>
@endsection