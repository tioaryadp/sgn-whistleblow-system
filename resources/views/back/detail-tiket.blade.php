@extends('back.back-master')

@section('judul_halaman', 'Detail Tiket')

@section('back-konten')
    <header>
        <a class="tombol" href="/tiket">Kembali</a>
    </header>
    <div class="body">
        <form action="/update-tiket" method="post">
            {{ csrf_field() }}
            <table>
                @foreach($detail_tiket as $d_tiket)
                <tr>
                    <td class="td-header">Nomor Tiket</td>
                    <td>{{ $d_tiket->tiket_sid }}</td>
                </tr>
                <tr>
                    <td class="td-header">Nama Pengaju</td>
                    <td>{{ $d_tiket->identitas_nama }}</td>
                </tr>
                <tr>
                    <td class="td-header">Instansi Pengaju</td>
                    <td>{{ $d_tiket->identitas_instansi }}</td>
                </tr>
                <tr>
                    <td class="td-header">Alamat Pengaju</td>
                    <td>{{ $d_tiket->identitas_alamat }}</td>
                </tr>
                <tr>
                    <td class="td-header">Daerah Pengaju</td>
                    <td>{{ $d_tiket->kota_nama }}, {{ $d_tiket->provinsi_nama }}</td>
                </tr>
                <tr>
                    <td class="td-header">Kategori</td>
                    <td>{{ $d_tiket->kategori_detail }}</td>
                </tr>
                <tr>
                    <td class="td-header">Nomor HP</td>
                    <td>{{ $d_tiket->komunikasi_nomorhp }}</td>
                </tr>
                <tr>
                    <td class="td-header">Email</td>
                    <td>{{ $d_tiket->komunikasi_email }}</td>
                </tr>
                <tr>
                    <td class="td-header">Surat</td>
                    <td>{{ $d_tiket->komunikasi_surat }}</td>
                </tr>
                <tr>
                    <td class="td-header">Tanggal Tatap Muka</td>
                    <td>{{ $d_tiket->komunikasi_tatapmuka }}</td>
                </tr>
                <tr>	
                    <td class="td-header">Komunikasi Lain</td>
                    <td>{{ $d_tiket->komunikasi_lainnya }}</td>
                </tr>
                <tr>
                    <td class="td-header">Waktu Komunikasi</td>
                    <td>{{ $d_tiket->komunikasi_jam }}</td>
                </tr>
                <tr>
                    <td class="td-header">Tanggal Dibuat</td>
                    <td>{{ $d_tiket->tiket_tanggal }}</td>
                </tr>
                <tr>
                    <td class="td-header">Status Tiket</td>
                    <td>
                        <input type="hidden" name="id" value="{{ $d_tiket->tiket_id }}">
                        <select name="tiket_status" required>
                            @foreach ($status as $status)
                                <option value="{{ $status->status_id }}" @selected($d_tiket->tiket_status == $status->status_id)> {{ $status->status_detail }} </option>
                            @endforeach
                        </select>
                    </td>
                </tr>
                @endforeach
            </table>
            <input type="submit" value="Simpan">                    
        </form>
        <br>
        <h4>Laporan</h4>
        <form>
            <table class="laporan">
                @foreach($detail_tiket as $d_tiket)
                <tr>
                    <td class="td-header">Kejadian yang dilaporkan</td>
                    <td>{{ $d_tiket->laporan_kejadian }}</td>
                </tr>
                <tr>
                    <td class="td-header">Tanggal kejadian terjadi</td>
                    <td>{{ $d_tiket->laporan_tanggal }}</td>
                </tr>
                <tr>
                    <td class="td-header">Tempat kejadian terjadi</td>
                    <td>{{ $d_tiket->laporan_tempat }}</td>
                </tr>
                <tr>
                    <td class="td-header">Nama dan jabatan terlapor</td>
                    <td>{{ $d_tiket->laporan_terlapor }}</td>
                </tr>
                <tr>
                    <td class="td-header">Unit terlapor berada</td>
                    <td>{{ $d_tiket->unit_nama }}, {{ $d_tiket->bagian_nama }}</td>
                </tr>
                <tr>
                    <td class="td-header">Orang lain yang terlibat</td>
                    <td>{{ $d_tiket->laporan_terlaporlain }}</td>
                </tr>
            </table>
            <br>
            <table>
                <tr class="tr-header"><td>Detail kejadian terjadi<br></td></tr>
                <tr><td>{{ $d_tiket->laporan_detail }}<br><br></td></tr>
                <tr class="tr-header"><td>Kerugian yang diakibatkan oleh kejadian<br></td></tr>
                <tr><td>{{ $d_tiket->laporan_kerugian }}<br><br></td></tr>
                <tr class="tr-header"><td>Waktu kejadian serupa pernah terjadi<br></td></tr>
                <tr><td>{{ $d_tiket->laporan_kejadiansama }}<br><br></td></tr>
                <tr class="tr-header"><td>Tempat melaporkan ke pihak berwajib<br></td></tr>
                <tr><td>{{ $d_tiket->laporan_pihakberwajib }}<br><br></td></tr>
                <tr class="tr-header"><td>Komentar/alasan terlapor<br></td></tr>
                <tr><td>{{ $d_tiket->laporan_kesaksianterlapor }}<br><br></td></tr>
                <tr class="tr-header"><td>Peluang kejadian terulang kembali<br></td></tr>
                <tr><td>{{ $d_tiket->laporan_terulangkembali }}<br><br></td></tr>
                <tr class="tr-header"><td>Indentifikasi pelapor terhadap tindakan lanjut<br></td></tr>
                <tr><td>{{ $d_tiket->laporan_tindaklanjut }}<br><br></td></tr>
                <tr class="tr-header"><td>Pelapor membutuhkan perlindungan hukum<br></td></tr>
                <tr><td>{{ $d_tiket->laporan_perlindunganhukum }}<br><br></td></tr>
                <tr class="tr-header"><td>Alasan pelapor membutuhkan perlindungan hukum<br></td></tr>
                <tr><td>{{ $d_tiket->laporan_alasanperlindungan }}<br><br></td></tr>
                @endforeach
            </table>
            <br>
            <h4>Bukti Pendukung</h4>
            <table>
            <tr>
                <td class="td-header">File Pendukung</td>
                <td><a href="/download-{{ $d_tiket->pendukung_berkas }}">{{ $d_tiket->pendukung_berkas }}</a></td>
            </tr>
            <tr>
                <td class="td-header">Link Pendukung</td>
                <td>{{ $d_tiket->pendukung_link }}</td>
            </tr>
            </table>
        </form>
        <br>
        <br>
    </div>
@endsection