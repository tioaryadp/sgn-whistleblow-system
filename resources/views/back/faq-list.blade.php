@extends('back.back-master')

@section('judul_halaman', 'List FAQ')

@section('back-konten')
<div class="account_list">
    <a class="tombol" style="float: left;" href="/master">Kembali</a>
    <a class="tombol" href="/tambah-faq">+ Tambah FAQ</a>
    <table border="1" class="table">
        <tr>
            <th style="width: 4%;">FaqID</th>
            <th style="width: 43%;">Question</th>
            <th style="width: 43%;">Answer</th>
            <th style="width: 10%;">Action</th>
        </tr>
        @foreach($data_faq as $faq)
        <tr>
            <td>{{ $faq->faq_id }}</td>
            <td>{{ $faq->faq_question }}</td>
            <td>{{ $faq->faq_answer }}</td>
            <td>
                <a class="edit" href="/edit-faq-{{ $faq->faq_id }}"><i class="fa-solid fa-pen-to-square"></i></a>
                <a class="delete" href="/delete-faq-{{ $faq->faq_id }}"><i class="fa-solid fa-trash"></i></i></a>
            </td>
        </tr>
        @endforeach
    </table>
</div>
{{ $data_faq->links() }}
@endsection