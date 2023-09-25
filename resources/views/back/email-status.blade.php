<header>
    <h4>Status Laporan Telah Berubah!</h4>
</header>
<div class="body">
<p>{{ $email_content }}</p> @foreach($data as $d_tiket) <span style="font-weight: 700;">{{ $d_tiket->status_detail }}</span> @endforeach
