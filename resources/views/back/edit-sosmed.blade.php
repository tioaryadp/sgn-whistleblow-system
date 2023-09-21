@extends('back.back-master')

@section('judul_halaman', 'Edit Social Media')

@section('back-konten')
<a class="tombol" style="float:left" href="/sosmed">Kembali</a>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    @foreach($daftar_sosmed as $sosmed)
                    <form method="POST" action="/update-sosmed">
                        @csrf

                        <div class="row mb-3">
                            <label for="sosmed_name" class="col-md-4 col-form-label text-md-end">{{ __('Nama Social Media') }}</label>

                            <div class="col-md-6">
                                <input id="sosmed_name" type="text" class="form-control" name="sosmed_name" value="{{ $sosmed->sosmed_name }}" required autocomplete="sosmed_name" autofocus readonly>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="sosmed_link" class="col-md-4 col-form-label text-md-end">{{ __('Link') }}</label>

                            <div class="col-md-6">
                                <input id="sosmed_link" type="text" class="form-control" name="sosmed_link" value="{{ $sosmed->sosmed_link }}" autocomplete="sosmed_link">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Submit') }}
                                </button>
                            </div>
                        </div>
                    </form>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection