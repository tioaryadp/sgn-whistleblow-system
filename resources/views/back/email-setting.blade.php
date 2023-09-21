@extends('back.back-master')

@section('judul_halaman', 'Email Setting')

@section('back-konten')
    <div class="body">
        <a class="tombol" style="float: left;" href="/master">Kembali</a>
        <table border="1" class="table">
            <tr>
                <th style="width: 17%;">Slope Email</th>
                <th style="width: 75%;">Isi Email</th>
                <th style="width: 8%">Action</th>
            </tr>
            @foreach($email_setting as $email)
            <tr>
                <td>{{ $email->email_slope }}</td>
                <td>{{ $email->email_content }}</td>
                <td>
                    <a class="edit" href="/edit-email-{{ $email->email_slope }}"><i class="fa-solid fa-pen-to-square"></i></a>
                </td>
            </tr>
            @endforeach
        </table>
    </div>
@endsection