@extends('back.back-master')

@section('judul_halaman', 'Management Content')

@section('back-konten')
    <div class="body">
        <table border="1" class="table">
            <tr>
                <th style="width: 17%;">Slope Content</th>
                <th style="width: 75%;">Isi Content</th>
                <th style="width: 8%">Action</th>
            </tr>
            @foreach($content as $content)
            <tr>
                <td>{{ $content->content_name }}</td>
                <td>{{ $content->content_body }}</td>
                <td>
                    <a class="edit" href="/edit-content-{{ $content->content_name }}"><i class="fa-solid fa-pen-to-square"></i></a>
                </td>
            </tr>
            @endforeach
        </table>
    </div>
@endsection