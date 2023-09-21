@extends('back.back-master')

@section('judul_halaman', 'Tambah Unit')

@section('back-konten')
<a class="tombol" style="float:left" href="/unit">Kembali</a>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="/input-unit">
                        @csrf

                        <div class="row mb-3">
                            <label for="unit_id" class="col-md-4 col-form-label text-md-end">{{ __('UnitID') }}</label>

                            <div class="col-md-6">
                                <input id="unit_id" type="text" class="form-control" name="unit_id" value="{{ old('unit_id') }}" required autocomplete="unit_id" autofocus>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="unit_nama" class="col-md-4 col-form-label text-md-end">{{ __('Nama Unit') }}</label>

                            <div class="col-md-6">
                                <input id="unit_nama" type="text" class="form-control" name="unit_nama" required autocomplete="unit_nama">
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
                </div>
            </div>
        </div>
    </div>
</div>
@endsection