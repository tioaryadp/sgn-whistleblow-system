@extends('front.front-master')
@section('front-konten')
<head>
    <link rel="stylesheet" href="css/toast.css">
    <style>
        header{
            position: static !important;
        }
    </style>
</head>
    <script>
        var successMessage = null;
        @if(Session::has('success'))
            var successMessage = "{{ Session::get('success') }}";
        @endif
    </script>
    <section class="home">
        <div class="toast">
            <div class="toast-content">
                <i class="fas fa-solid fa-check check"></i>
                <div class="toast-message">
                    <span class="toast-text text-1">Success!</span>
                    <span class="toast-text text-2">Laporan anda telah berhasil disimpan</span>
                </div>
            </div>
            <i class="fa-solid fa-xmark close"></i>
            <div class="toast-progress"></div>
        </div>
        <div class="content">
            <h3><span>
                    @foreach($judul_beranda as $judul_beranda)
                        {{ $judul_beranda->content_body }}
                    @endforeach
                </span><br>
                @foreach($subjudul_beranda as $subjudul_beranda)
                    {{ $subjudul_beranda->content_body }}
                @endforeach
            </h3>
            <p class="left text">
                @foreach($maintext_beranda as $maintext_beranda)
                    {{ $maintext_beranda->content_body }}
                @endforeach
            </p>
            <div class="sci">
                <a href="{{ $facebook }}" style="--j:1"><i class="fa-brands fa-facebook-f"></i></a>
                <a href="{{ $twitter }}" style="--j:2"><i class="fa-brands fa-twitter"></i></a>
                <a href="{{ $instagram }}" style="--j:3"><i class="fa-brands fa-instagram"></i></a>
                <a href="{{ $tiktok }}" style="--j:4"><i class="fa-brands fa-tiktok"></i></a>
            </div>
        </div>

        <div class="menu">
            <nav>
                <a href="/form" class="btn"><span></span>Buat Laporan</a>
                <a href="/lacak" class="btn" style="float: right;"><span></span>Lacak Laporan</a>
            </nav>
            <p class="right-text">
                @foreach($subtext1_beranda as $subtext1_beranda)
                    {{ $subtext1_beranda->content_body }}
                @endforeach
            </p>
            <div class="bottom-text">
                <p>
                    @foreach($subtext2_beranda as $subtext2_beranda)
                        {{ $subtext2_beranda->content_body }}
                    @endforeach
                </p>
            </div>            
        </div>
    </section>
    <script type="text/javascript" src="js/toast.js"></script>
@endsection
