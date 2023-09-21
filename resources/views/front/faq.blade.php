@extends('front.front-master')
@section('front-konten')
<head>
    <!-- Styles -->
    <link rel="stylesheet" href="css/faq.css">
</head>
<main>
    <div class="wrapper">
        <div style="width: 100%;" class="form-box">
            <h2 style="font-weight: 700;"><span style="color: #033689;">
                @foreach($judul_faq as $judul_faq)
                    {{ $judul_faq->content_body }}
                @endforeach
            </span><br>
            @foreach($subjudul_faq as $subjudul_faq)
                {{ $subjudul_faq->content_body }}
            @endforeach</h2>
            <p style="margin-top: 1.8rem;" class="left text">
                @foreach($maintext_faq as $maintext_faq)
                    {{ $maintext_faq->content_body }}
                @endforeach
            </p><br>
            @foreach($faq as $faq)
                <div class="faq-content">
                    <p style="font-weight: 700;"><span style="color: #033689;">{{ $faq->faq_id }}.</span> {{ $faq->faq_question }}</p>
                    <p>{{ $faq->faq_answer }}</p><br>
                </div>
            @endforeach
        </div>
    </div>
</main>
@endsection
