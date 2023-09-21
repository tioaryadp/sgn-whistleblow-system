<?php 
namespace App\Http\Controllers\Back;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

use function Laravel\Prompts\select;

class EmailController extends Controller{
    public function email(){
        $detail_tiket = DB::table('tiket')->where('tiket.tiket_id', 1)
        ->leftJoin("identitas", "tiket.tiket_identitas", "=", "identitas.identitas_id")
        ->leftJoin("provinsi", "identitas.identitas_provinsi", "=", "provinsi.provinsi_id")
        ->leftJoin("kota", "identitas.identitas_kota", "=", "kota.kota_id")
        ->leftJoin("kategori", "tiket.tiket_kategori", "=", "kategori.kategori_id")
        ->leftJoin("komunikasi", "tiket.tiket_komunikasi", "=", "komunikasi.komunikasi_id")
        ->leftJoin("laporan", "tiket.tiket_laporan", "=", "laporan.laporan_id")
        ->leftJoin("unit", "laporan.laporan_unit", "=", "unit.unit_id")
        ->leftJoin("bagian", "laporan.laporan_unitbagian", "=", "bagian.bagian_id")
        ->leftJoin("status", "tiket.tiket_status", "=", "status.status_id")
        ->leftJoin("pendukung", "tiket.tiket_pendukung", "=", "pendukung.pendukung_id")
        ->get();

        $email_header = DB::table('email_setting')->select('email_slope')->where('email_slope', 'mail-header')->first();
        $email_footer = DB::table('email_setting')->select('email_slope')->where('email_slope', 'mail-footer')->first();
        return view('back.email',[
            'detail_tiket' => $detail_tiket, 
            $email_header->email_slope,
            $email_footer->email_slope
        ]);
    }

    public function email_setting(){
        $email_setting = DB::table('email_setting')->get();
        return view('back.email-setting', ['email_setting' => $email_setting]);
    }

    public function edit_email($id){
        $email_setting = DB::table('email_setting')->where('email_slope', $id)->get();
        return view('back.edit-email', ['email_setting' => $email_setting]);
    }

    public function update_email(Request $request){
        DB::table('email_setting')->where('email_slope',$request->email_slope)->update([
            'email_setting.email_content' => $request->email_content
        ]);
        return redirect('email-setting');
    }
}
