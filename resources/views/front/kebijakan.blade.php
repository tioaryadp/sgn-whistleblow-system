@extends('front.front-master')
@section('front-konten')

<section class="home kebijakan">
    <div class="content">
        <h3><span>
            @foreach($judul_kebijakan as $judul_kebijakan)
                {{ $judul_kebijakan->content_body }}
            @endforeach
        </span><br>
        @foreach($subjudul_kebijakan as $subjudul_kebijakan)
            {{ $subjudul_kebijakan->content_body }}
        @endforeach</h3>
        <p class="left text">
            {{ $maintext_kebijakan }}
        </p>
        <div class="pdf" style="text-align: center; animation: slideTop .5s ease forwards;">
            <canvas id="pdfArea" class="pdfArea" style="width: 75%; justify-content: center; display:inline; margin: 25px auto"></canvas>
        </div>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.12.313/pdf.min.js"></script>
        <script src="{{ asset('assets/js/main.js') }}"></script>
        <script>
            let main = new Main();
        </script>
        <nav style="margin:0px auto 75px auto; width: 75%;">
            <a class="btn prev" onclick="Main.showPrevPage()"><span></span>Prev</a>
            <a class="btn next" style="float: right;" onclick="Main.showNextPage()"><span></span>Next</a>
        </nav>
    </div>
</section>
@endsection