@extends('front.front-master')
@section('front-konten')
<head>
    <!-- Styles -->
    <link rel="stylesheet" href="css/form.css">
</head>
<main>
<div style="height: 150px; margin-top: -200px" class="wrapper">
    <form action="/lacak-tiket" method="get">
        <div class="form-box lacak">
            <div style="grid-template-columns: 69% 29%;" class="form-grid-double">
                <div class="input-box">
                    <input type="text" name="no_tiket">
                    <label>No. Tiket</label>
                </div>
                <div>
                    <button type="submit" class="btn-noanim"><span></span>Lacak</button>
                </div>
            </div>
        </div>
    </form>
</div>
</main>
@endsection