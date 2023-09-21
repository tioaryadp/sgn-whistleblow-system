@extends('back.back-master')

@section('judul_halaman', 'Master Provinsi')

@section('back-konten')
<div class="account_list">
    <a class="tombol" style="float: left;" href="/master">Kembali</a>
    <a class="tombol" href="/tambah-provinsi">+ Tambah Provinsi</a>
    <table border="1" class="table">
        <tr>
            <th>ProvinsiID</th>
            <th>Nama Provinsi</th>
            <th>Action</th>
        </tr>
        @foreach($provinsi as $provinsis)
        <tr>
            <td>{{ $provinsis->provinsi_id }}</td>
            <td>{{ $provinsis->provinsi_nama }}</td>
            <td>
                <a class="edit" href="/edit-provinsi-{{ $provinsis->provinsi_id }}"><i class="fa-solid fa-pen-to-square"></i></a>
                <a class="delete" href="/delete-provinsi-{{ $provinsis->provinsi_id }}"><i class="fa-solid fa-trash"></i></i></a>
            </td>
        </tr>
        @endforeach
    </table>
</div>
{{ $provinsi->links() }}
@endsection