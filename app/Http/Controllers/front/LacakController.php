<?php 
namespace App\Http\Controllers\Front;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
 
class LacakController extends Controller{
    public function lacak(){
    	return view('front.lacak');
    }

    public function hasil_lacak(Request $request){
        $no_tiket = $request->no_tiket;
        $tiket = DB::table('tiket')
        ->leftJoin("identitas", "tiket.tiket_identitas", "=", "identitas.identitas_id")
        ->leftJoin("laporan", "tiket.tiket_laporan", "=", "laporan.laporan_id")
        ->leftJoin("provinsi", "identitas.identitas_provinsi", "=", "provinsi.provinsi_id")
        ->leftJoin("kota", "identitas.identitas_kota", "=", "kota.kota_id")
        ->leftJoin("kategori", "tiket.tiket_kategori", "=", "kategori.kategori_id")
        ->leftJoin("komunikasi", "tiket.tiket_komunikasi", "=", "komunikasi.komunikasi_id")
        ->leftJoin("status", "tiket.tiket_status", "=", "status.status_id")
        ->where('tiket_sid', $no_tiket)->get();
        return view('front.hasil-lacak', [
            'tiket' => $tiket
        ]);
    }
}
