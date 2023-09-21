@extends('back.back-master')

@section('judul_halaman', 'Master Kota')

@section('back-konten')
<div class="account_list">
    <a class="tombol" style="float: left;" href="/master">Kembali</a>
    <a class="tombol" href="/tambah-kota">+ Tambah Kota</a>
    <table border="1" class="table">
        <tr>
            <th>KotaID</th>
            <th>Provinsi Kota</th>
            <th>Nama Kota</th>
            <th>Action</th>
        </tr>
        @foreach($kota as $kotas)
        <tr>
            <td>{{ $kotas->kota_id }}</td>
            <td>{{ $kotas->provinsi_nama }}</td>
            <td>{{ $kotas->kota_nama }}</td>
            <td>
                <a class="edit" href="/edit-kota-{{ $kotas->kota_id }}"><i class="fa-solid fa-pen-to-square"></i></a>
                <a class="delete" href="/delete-kota-{{ $kotas->kota_id }}"><i class="fa-solid fa-trash"></i></i></a>
            </td>
        </tr>
        @endforeach
    </table>
</div>
{{ $kota->links() }}
@endsection