@extends('back.back-master')

@section('judul_halaman', 'Tambah Kota')

@section('back-konten')
<a class="tombol" style="float:left" href="/kota">Kembali</a>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="/input-kota">
                        @csrf

                        <div class="row mb-3">
                            <label for="kota_id" class="col-md-4 col-form-label text-md-end">{{ __('KotaID') }}</label>

                            <div class="col-md-6">
                                <input id="kota_id" type="text" class="form-control" name="kota_id" value="{{ old('kota_id') }}" required autocomplete="kota_id" autofocus>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="kota_provinsi" class="col-md-4 col-form-label text-md-end">{{ __('Provinsi Kota') }}</label>

                            <div class="col-md-6">
                                <select id="kota_provinsi" type="text" class="form-control" name="kota_provinsi" required>
                                    <option value="none" selected disabled hidden>--Pilih Provinsi--</option>
                                    @foreach ($daftar_provinsi as $daftar_provinsi)
                                        <option value="{{ $daftar_provinsi->provinsi_id }}"> {{ $daftar_provinsi->provinsi_nama }} </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="kota_nama" class="col-md-4 col-form-label text-md-end">{{ __('Nama Kota') }}</label>

                            <div class="col-md-6">
                                <input id="kota_nama" type="text" class="form-control" name="kota_nama" required autocomplete="kota_nama">
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