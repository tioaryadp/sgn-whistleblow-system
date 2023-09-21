@extends('back.back-master')

@section('judul_halaman', 'Update Kategori')

@section('back-konten')
<a class="tombol" style="float:left" href="/kategori">Kembali</a>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    @foreach($data_kategori as $kategori)
                    <form method="POST" action="/update-kategori">
                        @csrf

                        <div class="row mb-3">
                            <label for="kategori_id" class="col-md-4 col-form-label text-md-end">{{ __('KategoriID') }}</label>

                            <div class="col-md-6">
                                <input id="kategori_id" type="text" class="form-control" name="kategori_id" value="{{ $kategori->kategori_id }}" required autocomplete="kategori_id" autofocus readonly>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="kategori_detail" class="col-md-4 col-form-label text-md-end">{{ __('Nama Kategori') }}</label>

                            <div class="col-md-6">
                                <input id="kategori_detail" type="text" class="form-control" name="kategori_detail" value="{{ $kategori->kategori_detail }}" autocomplete="kategori_detail">
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