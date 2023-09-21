@extends('back.back-master')

@section('judul_halaman', 'Tambah Tiket')

@section('back-konten')

@if (count($errors) > 0)
<div class="alert alert-danger">
	<ul>
		@foreach ($errors->all() as $error)
			<li>{{ $error }}</li>
		@endforeach
	</ul>
</div>
@endif

<a class="tombol" style="float:left" href="/tiket">Lihat Semua Data</a>
<br>
<br>
<h4>Detail</h4>
<form action="/input-tiket" enctype="multipart/form-data" method="post">	
{{ csrf_field() }}
	<table>
		<tr>
			<td class="td-header">Email<span>*</span></td>
			<td><input style="width: clamp(120px, 50vw, 100%);" type="email" name="komunikasi_email" value="{{ old('komunikasi_email') }}" required></td>					
		</tr>
		<tr>
			<td class="td-header">Nama Pengaju</td>
			<td><input style="width: clamp(120px, 50vw, 100%);" type="text" name="identitas_nama" value="{{ old('identitas_nama') }}">			
		</tr>
		<tr>
			<td class="td-header">Instansi Pengaju</td>
			<td><input style="width: clamp(120px, 50vw, 100%);" type="text" name="identitas_instansi" value="{{ old('identitas_instansi') }}">			
		</tr>
		<tr>
			<td class="td-header">Alamat Pengaju</td>
			<td><input style="width: clamp(120px, 50vw, 100%);" type="text" name="identitas_alamat" value="{{ old('identitas_alamat') }}">			
		</tr>
		<tr>
			<td class="td-header">Daerah</td>
			<td><select style="width: clamp(120px, 50vw, 49.5%);" name="identitas_provinsi" id="identitas_provinsi">
                <option value="none" selected disabled hidden>--Pilih Provinsi--</option>
                @foreach ($provinsi as $provinsi)
                    <option value="{{ $provinsi->provinsi_id }}"> {{ $provinsi->provinsi_nama }} </option>
                @endforeach
			</select>
			<select style="width: clamp(120px, 50vw, 49.5%); float:right;" name="identitas_kota" id="identitas_kota"></select></td>					
		</tr>	
		<tr>
			<td class="td-header">Kategori<span>*</span></td>
			<td><select style="width: clamp(120px, 50vw, 100%);" name="tiket_kategori" required>
                <option value="none" selected disabled hidden>--Pilih Kategori--</option>
                @foreach ($kategori as $kategori)
                    <option value="{{ $kategori->kategori_id }}"> {{ $kategori->kategori_detail }} </option>
                @endforeach
			</select></td>					
		</tr>	
		<tr>
			<td class="td-header">Nomor HP<span>*</span></td>
			<td><input style="width: clamp(120px, 50vw, 100%);" type="text" name="komunikasi_nomorhp" value="{{ old('komunikasi_nomorhp') }}"></td>					
		</tr>
        <tr>
			<td class="td-header">Surat</td>
			<td>
                <input type="radio" name="komunikasi_surat" value="YA">
                <label for="yes">YA</label>
                <input type="radio" name="komunikasi_surat" value="TIDAK" checked>
                <label for="no">TIDAK</label>
			</td>				
		</tr>
        <tr>
			<td class="td-header">Tanggal Tatap Muka</td>
			<td><input style="width: clamp(120px, 50vw, 100%);" type="date" name="komunikasi_tatapmuka" value="{{ old('komunikasi_tatapmuka') }}"></td>					
		</tr>
		<tr>
			<td class="td-header">Komunikasi Lain</td>
			<td><input style="width: clamp(120px, 50vw, 100%);" type="text" name="komunikasi_lainnya" value="{{ old('komunikasi_lainnya') }}"></td>					
		</tr>
		<tr>
			<td class="td-header">Jam Komunikasi</td>
			<td><input style="width: clamp(120px, 50vw, 100%);" type="time" name="komunikasi_jam" value="{{ old('komunikasi_jam') }}"></td>					
		</tr>				
	</table>
	<br>
	<h4>Laporan</h4>
	<table>
		<tr>
			<td class="td-header">Kejadian apa yang ingin dilaporkan? (Jelaskan lengkap)<span>*</span></td>
			<td><input style="width: clamp(120px, 50vw, 100%);" type="text" name="laporan_kejadian" value="{{ old('laporan_kejadian') }}" required></td>					
		</tr>
		<tr>
			<td class="td-header">Kapan kejadian terjadi?<span>*</span></td>
			<td><input style="width: clamp(120px, 50vw, 100%);" type="date" name="laporan_tanggal" value="{{ old('laporan_tanggal') }}" required></td>					
		</tr>
		<tr>
			<td class="td-header">Dimana kejadian terjadi?<span>*</span></td>
			<td><input style="width: clamp(120px, 50vw, 100%);" type="text" name="laporan_tempat" value="{{ old('laporan_tempat') }}" required></td>					
		</tr>
		<tr>
			<td class="td-header">Siapa nama dan jabatan terlapor?<span>*</span></td>
			<td><input style="width: clamp(120px, 50vw, 100%);" type="text" name="laporan_terlapor" value="{{ old('laporan_terlapor') }}" required></td>					
		</tr>
		<tr>
			<td class="td-header">Di unit manakah terlapor berada?<span>*</span></td>
			<td><select style="width: clamp(120px, 50vw, 49.5%);" name="laporan_unit" required>
                <option value="none" selected disabled hidden>--Pilih Unit--</option>
                @foreach ($unit as $unit)
                    <option value="{{ $unit->unit_id }}"> {{ $unit->unit_nama }} </option>
                @endforeach
			</select>
			<select style="width: clamp(120px, 50vw, 49.5%); float:right;" name="laporan_unitbagian">
                <option value="none" selected disabled hidden>--Pilih Bagian--</option>
                @foreach ($bagian as $bagian)
                    <option value="{{ $bagian->bagian_id }}"> {{ $bagian->bagian_nama }} </option>
                @endforeach
			</select></td>					
		</tr>
		<tr>
			<td class="td-header">Adakah orang lain yang terlibat dalam kejadian selain terlapor?</td>
			<td><input style="width: clamp(120px, 50vw, 100%);" type="text" name="laporan_terlaporlain" value="{{ old('laporan_terlaporlain') }}"></td>					
		</tr>
		<tr>
			<td class="td-header">Bagaimana kejadian ini terjadi? (Jelaskan secara detail)<span>*</span></td>
			<td><textarea style="width: clamp(120px, 50vw, 100%);" id="laporan_detail" name="laporan_detail" rows="4" cols="100" required>{{ old('laporan_detail') }}</textarea></td>
		</tr>
		<tr>
			<td class="td-header">Apakah kejadian mengakibatkan kerugian secara finansial terhadap perusahaan? (Perkirakan besarannya)</td>
			<td><input style="width: clamp(120px, 50vw, 100%);" type="text" name="laporan_kerugian" value="{{ old('laporan_kerugian') }}"></td>					
		</tr>
		<tr>
			<td class="td-header">Apakah kejadian pernah terjadi sebelumnya? Jika ya, kapan?</td>
			<td><input style="width: clamp(120px, 50vw, 100%);" type="text" name="laporan_kejadiansama" value="{{ old('laporan_kejadiansama') }}"></td>					
		</tr>
		<tr>
			<td class="td-header">Apakah kejadian dilaporkan ke pihak berwajib? Jika ya, dimana?</td>
			<td><input style="width: clamp(120px, 50vw, 100%);" type="text" name="laporan_pihakberwajib" value="{{ old('laporan_pihakberwajib') }}"></td>					
		</tr>
		<tr>
			<td class="td-header">Apakah anda sudah berbicara dengan terlapor? Jika sudah, bagaimana komentar terlapor?</td>
			<td><input style="width: clamp(120px, 50vw, 100%);" type="text" name="laporan_kesaksianterlapor" value="{{ old('laporan_kesaksianterlapor') }}"></td>					
		</tr>
		<tr>
			<td class="td-header">Apakah pelanggaran dapat terulang kembali? Berikan alasannya</td>
			<td><input style="width: clamp(120px, 50vw, 100%);" type="text" name="laporan_terulangkembali" value="{{ old('laporan_terulangkembali') }}"></td>					
		</tr>
		<tr>
			<td class="td-header">Apakah tindakan lanjut akan mengidentifikasi anda sebagai pelapor? Jelaskan</td>
			<td><input style="width: clamp(120px, 50vw, 100%);" type="text" name="laporan_tindaklanjut" value="{{ old('laporan_tindaklanjut') }}"></td>					
		</tr>
		<tr>
			<td class="td-header">Apakah anda memerlukan perlindungan hukum?</td>
			<td>
                <input type="radio" name="laporan_perlindunganhukum" value="YA">
                <label for="yes">YA</label>
                <input type="radio" name="laporan_perlindunganhukum" value="TIDAK" checked>
                <label for="no">TIDAK</label>
			</td>				
		</tr>
		<tr>
			<td class="td-header">Apa alasan anda memerlukan perlindungan hukum?</td>
			<td><input style="width: clamp(120px, 50vw, 100%);" type="text" name="laporan_alasanperlindungan" value="{{ old('laporan_alasanperlindungan') }}"></td>					
		</tr>
	</table>
	<br>
	<h4>Bukti Pendukung</h4>
	<table>
		<tr>
			<td class="td-header">Upload Berkas Pendukung</td>
			<td><input type="file" name="pendukung_berkas" value="{{ old('pendukung_berkas') }}"></td>					
		</tr>
		<tr>
			<td class="td-header">Upload Link Bukti</td>
			<td><input style="width: clamp(120px, 50vw, 100%);" type="text" name="pendukung_link" value="{{ old('pendukung_link') }}"></td>					
		</tr>
	</table>
	<br>
	<input type="submit" value="Simpan">
</form>
<br>
<br>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script>
	$(document).ready(function(){
		$('#identitas_provinsi').on('change', function(){
			var provinsi_id = $(this).val();
			if(provinsi_id){
				$.ajax({
					url: '/getKota/'+provinsi_id,
					type: "GET",
					data: {"_token":"{{ csrf_token() }}"},
					dataType: "json",
					success: function(data){
						if(data){
							$('#identitas_kota').empty();
							$('#identitas_kota').append('<option hidden>--Pilih Kota--</option>');
							$.each(data, function(key, kota){
								$('select[name="identitas_kota"]').append('<option value="'+key+'">'+kota.kota_nama+'</option>');
							});
						}else{
							$('#identitas_kota').empty();
						}
					}
				});
			}else{
				$('#identitas_kota').empty();
			}
		});
	});
</script>
@endsection