@extends('back.back-master')

@section('judul_halaman', 'Bagian Unit')

@section('back-konten')
<a class="tombol" style="float:left" href="/bagian">Kembali</a>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    @foreach($data_bagian as $bagian)
                    <form method="POST" action="/update-bagian">
                        @csrf

                        <div class="row mb-3">
                            <label for="bagian_id" class="col-md-4 col-form-label text-md-end">{{ __('BagianID') }}</label>

                            <div class="col-md-6">
                                <input id="bagian_id" type="text" class="form-control" name="bagian_id" value="{{ $bagian->bagian_id }}" required autocomplete="bagian_id" autofocus readonly>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="bagian_nama" class="col-md-4 col-form-label text-md-end">{{ __('Bagian Unit') }}</label>

                            <div class="col-md-6">
                                <input id="bagian_nama" type="text" class="form-control" name="bagian_nama" value="{{ $bagian->bagian_nama }}" autocomplete="bagian_nama">
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