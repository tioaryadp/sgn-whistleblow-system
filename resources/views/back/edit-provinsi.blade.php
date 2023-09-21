@extends('back.back-master')

@section('judul_halaman', 'Update Provinsi')

@section('back-konten')
<a class="tombol" style="float:left" href="/provinsi">Kembali</a>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    @foreach($data_provinsi as $provinsi)
                    <form method="POST" action="/update-provinsi">
                        @csrf

                        <div class="row mb-3">
                            <label for="provinsi_id" class="col-md-4 col-form-label text-md-end">{{ __('ProvinsiID') }}</label>

                            <div class="col-md-6">
                                <input id="provinsi_id" type="text" class="form-control" name="provinsi_id" value="{{ $provinsi->provinsi_id }}" required autocomplete="provinsi_id" autofocus readonly>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="provinsi_nama" class="col-md-4 col-form-label text-md-end">{{ __('Nama Provinsi') }}</label>

                            <div class="col-md-6">
                                <input id="provinsi_nama" type="text" class="form-control" name="provinsi_nama" value="{{ $provinsi->provinsi_nama }}" autocomplete="provinsi_nama">
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