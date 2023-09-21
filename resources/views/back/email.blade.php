<header>
    <h4>Tiket Telah Dibuat!</h4>
    <p>{{ $email_header }}</p>
</header>
<div class="body">
    <table>
        @foreach($data as $d_tiket)
        <tr>
            <td style="font-weight: 700;">Nomor Tiket</td>
            <td>{{ $d_tiket->tiket_sid }}</td>
        </tr>
        <tr>
            <td style="font-weight: 700;">Nama Pengaju</td>
            <td>{{ $d_tiket->identitas_nama }}</td>
        </tr>
        <tr>
            <td style="font-weight: 700;">Instansi Pengaju</td>
            <td>{{ $d_tiket->identitas_instansi }}</td>
        </tr>
        <tr>
            <td style="font-weight: 700;">Alamat Pengaju</td>
            <td>{{ $d_tiket->identitas_alamat }}</td>
        </tr>
        <tr>
            <td style="font-weight: 700;">Daerah Pengaju</td>
            <td>{{ $d_tiket->kota_nama }}, {{ $d_tiket->provinsi_nama }}</td>
        </tr>
        <tr>
            <td style="font-weight: 700;">Kategori</td>
            <td>{{ $d_tiket->kategori_detail }}</td>
        </tr>
        <tr>
            <td style="font-weight: 700;">Nomor HP</td>
            <td>{{ $d_tiket->komunikasi_nomorhp }}</td>
        </tr>
        <tr>
            <td style="font-weight: 700;">Email</td>
            <td>{{ $d_tiket->komunikasi_email }}</td>
        </tr>
        <tr>
            <td style="font-weight: 700;">Surat</td>
            <td>{{ $d_tiket->komunikasi_surat }}</td>
        </tr>
        <tr>
            <td style="font-weight: 700;">Tanggal Tatap Muka</td>
            <td>{{ $d_tiket->komunikasi_tatapmuka }}</td>
        </tr>
        <tr>	
            <td style="font-weight: 700;">Komunikasi Lain</td>
            <td>{{ $d_tiket->komunikasi_lainnya }}</td>
        </tr>
        <tr>
            <td style="font-weight: 700;">Waktu Komunikasi</td>
            <td>{{ $d_tiket->komunikasi_jam }}</td>
        </tr>
        <tr>
            <td style="font-weight: 700;">Tanggal Dibuat</td>
            <td>{{ $d_tiket->tiket_tanggal }}</td>
        </tr>
        @endforeach
    </table>

    <br>
    <h4>Laporan</h4>
    <table>
        @foreach($data as $d_tiket)
        <tr>
            <td style="font-weight: 700;">Kejadian yang dilaporkan</td>
            <td>{{ $d_tiket->laporan_kejadian }}</td>
        </tr>
        <tr>
            <td style="font-weight: 700;">Tanggal kejadian terjadi</td>
            <td>{{ $d_tiket->laporan_tanggal }}</td>
        </tr>
        <tr>
            <td style="font-weight: 700;">Tempat kejadian terjadi</td>
            <td>{{ $d_tiket->laporan_tempat }}</td>
        </tr>
        <tr>
            <td style="font-weight: 700;">Nama dan jabatan terlapor</td>
            <td>{{ $d_tiket->laporan_terlapor }}</td>
        </tr>
        <tr>
            <td style="font-weight: 700;">Unit terlapor berada</td>
            <td>{{ $d_tiket->unit_nama }}, {{ $d_tiket->bagian_nama }}</td>
        </tr>
        <tr>
            <td style="font-weight: 700;">Orang lain yang terlibat</td>
            <td>{{ $d_tiket->laporan_terlaporlain }}</td>
        </tr>
    </table>
    <br>
    <table>
        <tr style="font-weight: 700;"><td>Detail kejadian terjadi<br></td></tr>
        <tr><td>{{ $d_tiket->laporan_detail }}<br><br></td></tr>
        <tr style="font-weight: 700;"><td>Kerugian yang diakibatkan oleh kejadian<br></td></tr>
        <tr><td>{{ $d_tiket->laporan_kerugian }}<br><br></td></tr>
        <tr style="font-weight: 700;"><td>Waktu kejadian serupa pernah terjadi<br></td></tr>
        <tr><td>{{ $d_tiket->laporan_kejadiansama }}<br><br></td></tr>
        <tr style="font-weight: 700;"><td>Tempat melaporkan ke pihak berwajib<br></td></tr>
        <tr><td>{{ $d_tiket->laporan_pihakberwajib }}<br><br></td></tr>
        <tr style="font-weight: 700;"><td>Komentar/alasan terlapor<br></td></tr>
        <tr><td>{{ $d_tiket->laporan_kesaksianterlapor }}<br><br></td></tr>
        <tr style="font-weight: 700;"><td>Peluang kejadian terulang kembali<br></td></tr>
        <tr><td>{{ $d_tiket->laporan_terulangkembali }}<br><br></td></tr>
        <tr style="font-weight: 700;"><td>Indentifikasi pelapor terhadap tindakan lanjut<br></td></tr>
        <tr><td>{{ $d_tiket->laporan_tindaklanjut }}<br><br></td></tr>
        <tr style="font-weight: 700;"><td>Pelapor membutuhkan perlindungan hukum<br></td></tr>
        <tr><td>{{ $d_tiket->laporan_perlindunganhukum }}<br><br></td></tr>
        <tr style="font-weight: 700;"><td>Alasan pelapor membutuhkan perlindungan hukum<br></td></tr>
        <tr><td>{{ $d_tiket->laporan_alasanperlindungan }}<br><br></td></tr>
    </table>
    <br>
    <h4>Bukti Pendukung</h4>
    <table>
        <tr>
            <td style="font-weight: 700;">File Pendukung</td>
            <td>{{ $d_tiket->pendukung_berkas }}</td>
        </tr>
        <tr>
            <td style="font-weight: 700;">Link Pendukung</td>
            <td>{{ $d_tiket->pendukung_link }}</td>
        </tr>
        @endforeach
    </table>
    <br>
    <br>
</div>
<footer>
    <p>{{ $email_footer }}</p>
</footer>