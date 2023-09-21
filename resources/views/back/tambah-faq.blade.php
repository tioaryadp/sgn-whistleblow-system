@extends('back.back-master')

@section('judul_halaman', 'Tambah FAQ')

@section('back-konten')
<header>
    <a class="tombol" href="/faq-list">Kembali</a>
</header>
<main>
<form action="/input-faq" method="POST">
{{ csrf_field() }}
    <table style="border-collapse: separate !important; border-spacing: 0 1em !important; width: 100%;">
        <tr>
            <td style="font-weight: 700;">FaqID</td>
            <td><input style="width: auto;" type="text" name="faq_id"></td>		
		</tr>
        <tr>
            <td style="font-weight: 700;">Question</td>
            <td><textarea style="width: 100%; resize: none;" rows="5" cols="100" id="faq_question" name="faq_question" required></textarea></td>	
		</tr>
        <tr>
            <td style="font-weight: 700;">Answer</td>
            <td><textarea style="width: 100%; resize: none;" rows="5" cols="100" id="faq_answer" name="faq_answer" required></textarea></td>	
		</tr>
    </table>
    <input type="submit" value="Simpan">
</form>
</main>
@endsection