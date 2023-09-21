@extends('back.back-master')

@section('judul_halaman', 'Daftar Tiket')

@section('back-konten')
    <div class="body">
        <a class="tombol" href="/tambah-tiket">+ Baru</a>
        <table border="1" class="table">
            <tr>
                <th>Nomor Tiket</th>
                <th>Nama Pengaju</th>
                <th>Kategori</th>
                <th>Tanggal Dibuat</th>
                <th>Status Tiket</th>
                <th>Action</th>
            </tr>
            @foreach($tikets as $tiket)
            <tr>
                <td>{{ $tiket->tiket_id }}</td>
                <td>{{ $tiket->identitas_nama }}</td>
                <td>{{ $tiket->kategori_detail }}</td>
                <td>{{ $tiket->tiket_tanggal }}</td>
                <td>{{ $tiket->status_detail }}</td>
                <td>
                    <a class="detail" href="/detail-tiket-{{ $tiket->tiket_id }}"><i class="fa-solid fa-magnifying-glass"></i></a>
                </td>
            </tr>
            @endforeach
        </table>
    </div>
    {{ $tikets->links() }}
    
@endsection