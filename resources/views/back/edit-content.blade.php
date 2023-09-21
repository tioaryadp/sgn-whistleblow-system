@extends('back.back-master')

@section('judul_halaman', 'Update Content')

@section('back-konten')
<header>
    <a class="tombol" href="/content">Kembali</a>
</header>
<main>
@foreach($cont as $cont)
<form action="/update-content" method="POST">
{{ csrf_field() }}
    <table style="border-collapse: separate !important; border-spacing: 0 1em !important; width: 100%;">
        <tr>
            <td><input style="width: auto;" type="text" name="content_name" value="{{ $cont->content_name }}" readonly></td>		
		</tr>
        <tr>
            <td><textarea style="width: 100%;" rows="8" cols="100" id="content_body" name="content_body" required>{{ $cont->content_body }}</textarea></td>	
		</tr>
    </table>
    <input type="submit" value="Simpan">
</form>
@endforeach
</main>
@endsection