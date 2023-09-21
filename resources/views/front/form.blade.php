@extends('front.front-master')
@section('front-konten')
<head>
    <!-- Styles -->
    <link rel="stylesheet" href="css/form.css">
    <link rel="stylesheet" href="css/captcha.css">
</head>
@if (count($errors) > 0)
<div id="message">
    <div style="padding: 5px">
        <ul>
            @foreach ($errors->all() as $error)
            <label>
                <input type="checkbox" class="alertCheckbox" autocomplete="off">
                <div class="alert error">
                    <span class="alertText"> {{ $error }}
                    <br class="clear"/></span>
                </div>
            </label>
            @endforeach
        </ul>
    </div>
</div>
@endif


<main>
<div class="wrapper">
    <form action="/submit-laporan" enctype="multipart/form-data" method="POST">
    {{ csrf_field() }}
        <div class="form-box identitas">
            <h2>Identitas</h2>        
            <div class="form-grid-single input-box">
                <input type="email" name="komunikasi_email" value="{{ old('komunikasi_email') }}">
                <label>Email<span>*</span></label>
            </div>
            <div class="form-grid-single input-box">
                <input type="text" name="identitas_nama" value="{{ old('identitas_nama') }}">
                <label>Nama</label>
            </div>
            <div class="form-grid-single input-box">
                <input type="text" name="identitas_instansi" value="{{ old('identitas_instansi') }}">
                <label>Instansi</label>
            </div>
            <div class="form-grid-single input-box">
                <input type="text" name="identitas_alamat" value="{{ old('identitas_alamat') }}">
                <label>Alamat</label>
            </div>
            <div class="form-grid-double">
                <div class="input-box">
                    <select name="identitas_provinsi" id="identitas_provinsi">
                        <option value="none" selected disabled hidden>--Pilih Provinsi--</option>
                        @foreach ($provinsi as $provinsi)
                            <option value="{{ $provinsi->provinsi_id }}"> {{ $provinsi->provinsi_nama }} </option>
                        @endforeach
                    </select>
                    <label>Provinsi</label>
                </div>
                <div class="input-box">
                    <select name="identitas_kota" id="identitas_kota"></select>
                    <label>Kota</label>
                </div>              
            </div>
            <div style="grid-template-columns: 69% 29%;" class="form-grid-double">
                <div class="input-box">
                    <input type="text" name="komunikasi_nomorhp" value="{{ old('komunikasi_nomorhp') }}">
                    <label>No. HP / WhatsApp<span>*</span></label>
                </div>  
                <div class="input-box">
                    <input type="time" name="komunikasi_jam" value="{{ old('komunikasi_jam') }}">
                    <label>Jam Komunikasi</label>
                </div>               
            </div>
            <div style="grid-template-columns: 49% 49%;" class="form-grid-double">
                <div class="input-box">
                    <input type="date" name="komunikasi_tatapmuka" value="{{ old('komunikasi_tatapmuka') }}">
                    <label>Tanggal Tatap Muka</label>
                </div>
                <div class="radio-box">
                    <label class="lbl">Surat</label>
                    <div class="form-grid-double">
                        <div>
                            <input type="radio" name="komunikasi_surat" value="YA">
                            <label for="YA">YA</label>
                        </div>
                        <div>
                            <input type="radio" name="komunikasi_surat" value="TIDAK" checked>
                            <label for="TIDAK">TIDAK</label>
                        </div>
                    </div>
                </div>               
            </div>
            <div class="form-grid-single input-box">
                <input type="text" name="komunikasi_lainnya" value="{{ old('komunikasi_lainnya') }}">
                <label>Komunikasi Lainnya</label>
            </div>
            <!-- <button type="submit" class="btn-noanim"><span></span>Next</button> -->
        </div>
        <div class="form-box laporan">
            <h2>Laporan</h2>
            <div class="form-grid-single input-box">
                <select name="tiket_kategori">
                    <option value="none" selected disabled hidden>--Pilih Kategori--</option>
                    @foreach ($kategori as $kategori)
                        <option value="{{ $kategori->kategori_id }}"> {{ $kategori->kategori_detail }} </option>
                    @endforeach
                </select>
                <label>Kategori Laporan<span>*</span></label>
            </div>
            <div class="form-grid-single input-box">
                <input type="text" name="laporan_kejadian" value="{{ old('laporan_kejadian') }}">
                <label>Kejadian yang ingin dilaporkan?<span>*</span></label>
            </div>
            <div class="form-grid-double">
                <div class="input-box">
                    <input type="date" name="laporan_tanggal" value="{{ old('laporan_tanggal') }}">
                    <label>Kapan kejadian terjadi?<span>*</span></label>
                </div>
                <div class="input-box">
                    <input type="text" name="laporan_tempat" value="{{ old('laporan_tempat') }}">
                    <label>Dimana kejadian terjadi?<span>*</span></label>
                </div>              
            </div>
            <div class="form-grid-double">
                <div class="input-box">
                    <input type="text" name="laporan_terlapor" value="{{ old('laporan_terlapor') }}">
                    <label>Nama dan jabatan terlapor<span>*</span></label>
                </div>
                <div class="input-box">
                    <input type="text" name="laporan_terlaporlain" value="{{ old('laporan_terlaporlain') }}">
                    <label>Orang lain yang terlibat</label>
                </div>              
            </div>
            <div class="form-grid-double">
                <div class="input-box">
                    <select name="laporan_unit">
                        <option value="none" selected disabled hidden>--Pilih Unit--</option>
                        @foreach ($unit as $unit)
                            <option value="{{ $unit->unit_id }}"> {{ $unit->unit_nama }} </option>
                        @endforeach
                    </select>
                    <label>Diunit manakah terlapor berada?<span>*</span></label>
                </div>
                <div class="input-box">
                    <select name="laporan_unitbagian">
                        <option value="none" selected disabled hidden>--Pilih Bagian--</option>
                        @foreach ($bagian as $bagian)
                            <option value="{{ $bagian->bagian_id }}"> {{ $bagian->bagian_nama }} </option>
                        @endforeach
                    </select>
                </div>              
            </div>
            <div class="form-grid-single input-box" style="height: 200px;">
                <textarea class="form-control" id="laporan_detail" name="laporan_detail" rows="2">{{ old('laporan_detail') }}</textarea>
                <label>Bagaimana kejadian ini terjadi? (Jelaskan secara detail)<span>*</span></label>
            </div>
            <div class="form-grid-single input-box">
                <input type="text" name="laporan_kerugian" value="{{ old('laporan_kerugian') }}">
                <label>Apakah kejadian mengakibatkan kerugian terhadap perusahaan? Perkirakan besarannya</label>
            </div>
            <div class="form-grid-single input-box">
                <input type="text" name="laporan_kejadiansama" value="{{ old('laporan_kejadiansama') }}">
                <label>Apakah kejadian pernah terjadi sebelumnya? Jika ya, kapan?</label>
            </div>
            <div class="form-grid-single input-box">
                <input type="text" name="laporan_pihakberwajib" value="{{ old('laporan_pihakberwajib') }}">
                <label>Apakah kejadian dilaporkan ke pihak berwajib? Jika ya, dimana?</label>
            </div>
            <div class="form-grid-single input-box">
                <input type="text" name="laporan_kesaksianterlapor" value="{{ old('laporan_kesaksianterlapor') }}">
                <label>Apakah sudah bicara dengan terlapor? Bagaimana tanggapan terlapor?</label>
            </div>
            <div class="form-grid-single input-box">
                <input type="text" name="laporan_terulangkembali" value="{{ old('laporan_terulangkembali') }}">
                <label>Apakah kejadian dapat terulang kembali? Jelaskan</label>
            </div>
            <div class="form-grid-single input-box">
                <input type="text" name="laporan_tindaklanjut" value="{{ old('laporan_tindaklanjut') }}">
                <label>Apakah tindakan lanjut akan mengidentifikasi anda sebagai pelapor? Jelaskan</label>
            </div>
            <div style="grid-template-columns: 29% 69%;" class="form-grid-double">
                <div class="radio-box">
                    <label class="lbl">Apakah anda butuh perlindungan hukum?</label>
                    <div class="form-grid-double">
                        <div>
                            <input type="radio" style="transform: translateY(35px);" name="laporan_perlindunganhukum" value="YA">
                            <label style="transform: translateY(30px);" for="YA">YA</label>
                        </div>
                        <div>
                            <input type="radio" style="transform: translateY(35px);" name="laporan_perlindunganhukum" value="TIDAK" checked>
                            <label style="transform: translateY(30px);" for="TIDAK">TIDAK</label>
                        </div>
                    </div>
                </div>
                <div class="input-box">
                    <input type="text" name="laporan_alasanperlindungan" value="{{ old('laporan_alasanperlindungan') }}">
                    <label>Alasan membutuhkan perlindungan hukum</label>
                </div>           
            </div>
        </div>
        <div class="form-box pendukung">
            <h2>Pendukung</h2>
            <div style="grid-template-columns: 34% 64%;" class="form-grid-double">
                <div class="input-box" style="border-bottom: none;">
                    <input style="transform:translateY(25px)" type="file" name="pendukung_berkas" value="{{ old('pendukung_berkas') }}">
                    <label>Upload file pendukung</label>
                </div>
                <div class="input-box">
                    <input type="text" name="pendukung_link" value="{{ old('pendukung_link') }}">
                    <label>Link pendukung</label>
                </div>
            </div>
        </div>
        <div class="form-box submit">
            <div class="captcha-box" style="width: 50%; margin: auto;">
                <label style="font-size: 1.5rem;">Enter Captcha</label>
                <div class="preview"><span>{!! captcha_img('math') !!}</span></div>
                <div class="captcha-form">
                    <input type="text" id="captcha" name="captcha" placeholder="Enter captcha text">
                    <button type="button" class="captcha-refresh">
                        <i class="fa fa-refresh"></i>
                    </button>
                </div>
            </div>
            <button type="submit" class="btn-noanim"><span></span>Simpan</button>
        </div>
    </form>
</div>
</main>
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
<script>
    $(".captcha-refresh").click(function(){
        $.ajax({
            type:'GET',
            url:'/form/refresh',
            success:function(data){
               $(".captcha-box .preview span").html(data.captcha);
            }
        });
    });
</script>
@endsection
