<?php
namespace App\Http\Controllers\Back;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function dashboard()
    {
        $total_tiket = DB::table('tiket')->count();
        $total_dibuat = DB::table(('tiket'))->where('tiket_status', '=', '0')->count();
        $total_diproses = DB::table(('tiket'))->where('tiket_status', '=', '1')->count();
        $total_selesai = DB::table(('tiket'))->where('tiket_status', '=', '2')->count();
        $total_batal = DB::table(('tiket'))->where('tiket_status', '=', '3')->count();
        $kategori_count = DB::table('tiket')
        ->leftJoin('kategori', 'tiket.tiket_kategori', '=', 'kategori.kategori_id')
        ->select('kategori_detail', DB::raw('count(*) as total'))
        ->groupBy('kategori_detail')
        ->orderBy('total', 'desc')
        ->get();
    	return view('back.dashboard',[
            'total_tiket' => $total_tiket,
            'total_dibuat' => $total_dibuat,
            'total_diproses' => $total_diproses,
            'total_selesai' => $total_selesai,
            'total_batal' => $total_batal,
            'kategori_count' => $kategori_count
        ]);
    }
}
