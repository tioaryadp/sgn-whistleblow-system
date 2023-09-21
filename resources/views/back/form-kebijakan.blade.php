@extends('back.back-master')

@section('judul_halaman', 'Upload PDF Kebijakan')

@section('back-konten')
<a class="tombol" style="float:left" href="/master">Kembali</a>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="/upload-kebijakan" enctype="multipart/form-data">
                        @csrf

                        <div class="row mb-3">
                            <label for="pdf_kebijakan" class="col-md-4 col-form-label text-md-end">{{ __('PDF Kebijakan') }}</label>

                            <div class="col-md-6">
                                <input id="pdf_kebijakan" type="file" class="form-control" name="pdf_kebijakan" required accept="application/pdf">
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