@extends('back.back-master')

@section('judul_halaman', 'Master Kategori')

@section('back-konten')
<div class="account_list">
    <a class="tombol" style="float: left;" href="/master">Kembali</a>
    <a class="tombol" href="/tambah-kategori">+ Tambah Kategori</a>
    <table border="1" class="table">
        <tr>
            <th>KategoriID</th>
            <th>Nama Kategori</th>
            <th>Action</th>
        </tr>
        @foreach($kategori as $kategoris)
        <tr>
            <td>{{ $kategoris->kategori_id }}</td>
            <td>{{ $kategoris->kategori_detail }}</td>
            <td>
                <a class="edit" href="/edit-kategori-{{ $kategoris->kategori_id }}"><i class="fa-solid fa-pen-to-square"></i></a>
                <a class="delete" href="/delete-kategori-{{ $kategoris->kategori_id }}"><i class="fa-solid fa-trash"></i></i></a>
            </td>
        </tr>
        @endforeach
    </table>
</div>
{{ $kategori->links() }}
@endsection