@extends('back.back-master')

@section('judul_halaman', 'Update User')

@section('back-konten')
<header>
    <a class="tombol" href="/user">Kembali</a>
</header>
<main>
@foreach($user as $user)
<form action="/update-user" method="POST">
{{ csrf_field() }}
    <table style="border-collapse: separate !important; border-spacing: 0 1em !important;">
        <tr>
            <td class="td-header">UserID</td>
            <td><input style="width: 100%;" type="text" name="id" value="{{ $user->id }}" readonly></td>		
		</tr>
        <tr>
            <td class="td-header">User Name</td>
            <td><input style="width: 100%;" type="text" name="name" value="{{ $user->name }}"></td>	
		</tr>
        <tr>
            <td class="td-header">User Email</td>
            <td><input style="width: 100%;" type="email" name="email" value="{{ $user->email }}"></td>	
		</tr>
    </table>
    <input type="submit" value="Simpan">
</form>
@endforeach
</main>
@endsection