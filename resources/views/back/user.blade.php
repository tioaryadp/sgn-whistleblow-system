@extends('back.back-master')

@section('judul_halaman', 'User Management')

@section('back-konten')
<div class="account_list">
    <a class="tombol" href="/register">+ User Baru</a>
    <table border="1" class="table">
        <tr>
            <th>UserID</th>
            <th>Nama User</th>
            <th>Email</th>
            <th>Action</th>
        </tr>
        @foreach($user as $users)
        <tr>
            <td>{{ $users->id }}</td>
            <td>{{ $users->name }}</td>
            <td>{{ $users->email }}</td>
            <td>
                <a class="edit" href="/edit-user-{{ $users->id }}"><i class="fa-solid fa-pen-to-square"></i></a>
                <a class="delete" href="/delete-user-{{ $users->id }}"><i class="fa-solid fa-trash"></i></i></a>
            </td>
        </tr>
        @endforeach
    </table>
</div>
{{ $user->links() }}
@endsection