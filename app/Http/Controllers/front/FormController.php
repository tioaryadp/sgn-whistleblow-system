<?php 
namespace App\Http\Controllers\Front;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

use App\Mail\TiketEmail;
use Illuminate\Support\Facades\Mail;
 
class FormController extends Controller{
    public function form(){
        $kategori = DB::table('kategori')->get();
        $unit = DB::table('unit')->get();
        $bagian = DB::table('bagian')->get();
        $provinsi = DB::table('provinsi')->whereNotIn('provinsi_id', array(0))->get();
        $kota = DB::table('kota')->whereNotIn('kota_id', array(0))->get();
        return view('front.form',[
            'kategori' => $kategori,
            'provinsi' => $provinsi,
            'unit' => $unit,
            'bagian' => $bagian,
            'kota' => $kota
        ]);
    }

    public function submit_form(Request $request){
        $messages = [
            'required' => ':attribute wajib diisi',
            'max' => ':attribute maksimal :max karakter',
            'numeric' => ':attribute harus berisi angka',
            'email' => ':attribute harus sesuai dengan format email'
        ];
        $this->validate($request,[
            'tiket_kategori' => 'required',
            'identitas_nama' => 'max:50',
            'identitas_instansi' => 'max:50',
            'identitas_alamat' => 'max:100',
            'komunikasi_nomorhp' => 'numeric|required',
            'komunikasi_email' => 'required|email|max:50',
            'komunikasi_lainnya' => 'max:50',
            'pendukung_link' => 'max:250',
            'laporan_kejadian' => 'required|max:50',
            'laporan_tanggal' => 'required',
            'laporan_tempat' => 'required|max:50',
            'laporan_terlapor' => 'required|max:50',
            'laporan_unit' => 'required',
            'laporan_unitbagian' => 'required',
            'laporan_terlaporlain' => 'max:50',
            'laporan_detail' => 'max:500',
            'laporan_kerugian' => 'max:50',
            'laporan_kejadiansama' => 'max:50',
            'laporan_pihakberwajib' => 'max:50',
            'laporan_kesaksianterlapor' => 'max:50',
            'laporan_terulangkembali' => 'max:50',
            'laporan_tindaklanjut' => 'max:50',
            'laporan_perlindunganhukum' => 'required',
            'laporan_alasanperlindungan' => 'max:100',
            'captcha' => 'required|captcha',
        ], $messages,
        ['captcha.captcha'=>'Invalid captcha code.']);
        $date_now = Carbon::now()->setTimezone("Asia/Jakarta");
        DB::table('tiket')->insert([
            'tiket_kategori' => $request->tiket_kategori,
            'tiket_tanggal' => $date_now
        ]);
        DB::table('identitas')->insert([
            'identitas_nama' => $request->identitas_nama,
            'identitas_instansi' => $request->identitas_instansi,
            'identitas_alamat' => $request->identitas_alamat,
            'identitas_provinsi' => $request->identitas_provinsi,
            'identitas_kota' => $request->identitas_kota
        ]);
        DB::table('komunikasi')->insert([
            'komunikasi_nomorhp' => $request->komunikasi_nomorhp,
            'komunikasi_email' => $request->komunikasi_email,
            'komunikasi_surat' => $request->komunikasi_surat,
            'komunikasi_tatapmuka' => $request->komunikasi_tatapmuka,
            'komunikasi_lainnya' => $request->komunikasi_lainnya,
            'komunikasi_jam' => $request->komunikasi_jam
        ]);
        DB::table('laporan')->insert([
            'laporan_kejadian' => $request->laporan_kejadian,
            'laporan_tanggal' => $request->laporan_tanggal,
            'laporan_tempat' => $request->laporan_tempat,
            'laporan_terlapor' => $request->laporan_terlapor,
            'laporan_unit' => $request->laporan_unit,
            'laporan_unitbagian' => $request->laporan_unitbagian,
            'laporan_terlaporlain' => $request->laporan_terlaporlain,
            'laporan_detail' => $request->laporan_detail,
            'laporan_kerugian' => $request->laporan_kerugian,
            'laporan_kejadiansama' => $request->laporan_kejadiansama,
            'laporan_pihakberwajib' => $request->laporan_pihakberwajib,
            'laporan_kesaksianterlapor' => $request->laporan_kesaksianterlapor,
            'laporan_terulangkembali' => $request->laporan_terulangkembali,
            'laporan_tindaklanjut' => $request->laporan_tindaklanjut,
            'laporan_perlindunganhukum' => $request->laporan_perlindunganhukum,
            'laporan_alasanperlindungan' => $request->laporan_alasanperlindungan
        ]);
        $id_tiket = DB::table('tiket')->max('tiket_id');
        $current_date = sprintf("%02d" , Carbon::now()->format('d'));
        $current_month = sprintf("%02d", Carbon::now()->format('m'));
        $current_year = sprintf("%02d", Carbon::now()->format('y'));
        $random_str = strtoupper(Str::random(4));
        $padded_id = sprintf("%04d", $id_tiket);
        $sid = $random_str . $current_month . $current_date . $current_year . $padded_id;
        DB::table('tiket')->where('tiket.tiket_id',$id_tiket)->update([
            'tiket.tiket_sid' => $sid]);

        $file = $request->file('pendukung_berkas');
        $tujuan_upload = 'file-upload';
        $nama_file = NULL;
        if(!empty($file)){
            $nama_file = 'WBS_FILE #'.$id_tiket.'.'.$file->getClientOriginalExtension();
            $file->move($tujuan_upload, $nama_file);
        }
        DB::table('pendukung')->insert([
            'pendukung_berkas' => $nama_file,
            'pendukung_link' => $request->pendukung_link
        ]);
        Mail::to($request->komunikasi_email)->send(new TiketEmail($id_tiket));
        return redirect('/');
    }
}
