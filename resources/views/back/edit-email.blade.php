@extends('back.back-master')

@section('judul_halaman', 'Update Email')

@section('back-konten')
<header>
    <a class="tombol" href="/email-setting">Kembali</a>
</header>
<main>
@foreach($email_setting as $email)
<form action="/update-email" method="POST">
{{ csrf_field() }}
    <table style="border-collapse: separate !important; border-spacing: 0 1em !important; width: 100%;">
        <tr>
            <td><input style="width: auto;" type="text" name="email_slope" value="{{ $email->email_slope }}" readonly></td>		
		</tr>
        <tr>
            <td><textarea style="width: 100%;" rows="8" cols="100" id="email_content" name="email_content" required>{{ $email->email_content }}</textarea></td>	
		</tr>
    </table>
    <input type="submit" value="Simpan">
</form>
@endforeach
</main>
@endsection