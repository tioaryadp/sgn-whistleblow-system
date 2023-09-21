<?php
namespace App\Http\Controllers\Back;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class MasterController extends Controller
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
    public function master_data(){
        return view('back.data-master');
    }

    // ===================KOTA==================
    public function master_kota(){
        $kota = DB::table('kota')
        ->leftJoin("provinsi", "kota.kota_provinsi", "=", "provinsi.provinsi_id")
        ->paginate(10);
        return view('back.data-kota', ['kota' => $kota]);
    }

    public function tambah_kota(){
        $daftar_provinsi = DB::table('provinsi')->whereNotIn('provinsi_id', array(0))->get();
        return view('back.tambah-kota', ['daftar_provinsi' => $daftar_provinsi]);
    }

    public function edit_kota($id){
        $data_kota = DB::table('kota')->where('kota_id', $id)->get();
        $daftar_provinsi = DB::table('provinsi')->whereNotIn('provinsi_id', array(0))->get();
        return view('back.edit-kota', ['data_kota' => $data_kota, 'daftar_provinsi' => $daftar_provinsi]);
    }

    public function delete_kota($id){
        DB::table('kota')->where('kota_id', $id)->delete();
        return redirect('kota');
    }

    public function input_kota(Request $request){
        $messages = [
            'required' => ':attribute wajib diisi',
            'numeric' => ':attribute harus berupa angka'
        ];

        $this->validate($request, [
            'kota_id' => 'required | numeric',
            'kota_provinsi' => 'required',
            'kota_nama' => 'required'
        ], $messages);

        DB::table('kota')->insert([
            'kota_id' => $request->kota_id,
            'kota_provinsi' => $request->kota_provinsi,
            'kota_nama' => $request->kota_nama
        ]);
        return redirect('kota');
    }

    public function update_kota(Request $request){
        $messages = [
            'required' => ':attribute wajib diisi',
            'numeric' => ':attribute harus berupa angka'
        ];

        $this->validate($request, [
            'kota_id' => 'required | numeric',
            'kota_provinsi' => 'required',
            'kota_nama' => 'required'
        ], $messages);

        DB::table('kota')->where('kota_id',$request->kota_id)->update([
            'kota.kota_id' => $request->kota_id,
            'kota.kota_provinsi' => $request->kota_provinsi,
            'kota.kota_nama' => $request->kota_nama
        ]);
        return redirect('kota');
    }

    // ===================PROVINSI==================
    public function master_provinsi(){
        $provinsi = DB::table('provinsi')->paginate(10);
        return view('back.data-provinsi', ['provinsi' => $provinsi]);
    }

    public function tambah_provinsi(){
        return view('back.tambah-provinsi');
    }

    public function edit_provinsi($id){
        $data_provinsi = DB::table('provinsi')->where('provinsi_id', $id)->get();
        return view('back.edit-provinsi', ['data_provinsi' => $data_provinsi]);
    }

    public function delete_provinsi($id){
        DB::table('provinsi')->where('provinsi_id', $id)->delete();
        return redirect('provinsi');
    }

    public function input_provinsi(Request $request){
        $messages = [
            'required' => ':attribute wajib diisi',
            'numeric' => ':attribute harus berupa angka'
        ];

        $this->validate($request, [
            'provinsi_id' => 'required | numeric',
            'provinsi_nama' => 'required'
        ], $messages);

        DB::table('provinsi')->insert([
            'provinsi_id' => $request->provinsi_id,
            'provinsi_nama' => $request->provinsi_nama
        ]);
        return redirect('provinsi');
    }

    public function update_provinsi(Request $request){
        $messages = [
            'required' => ':attribute wajib diisi',
            'numeric' => ':attribute harus berupa angka'
        ];

        $this->validate($request, [
            'provinsi_id' => 'required | numeric',
            'provinsi_nama' => 'required'
        ], $messages);

        DB::table('provinsi')->where('provinsi_id',$request->provinsi_id)->update([
            'provinsi.provinsi_id' => $request->provinsi_id,
            'provinsi.provinsi_nama' => $request->provinsi_nama
        ]);
        return redirect('provinsi');
    }

    // ===================KATEGORI==================
    public function master_kategori(){
        $kategori = DB::table('kategori')->paginate(10);
        return view('back.data-kategori', ['kategori' => $kategori]);
    }

    public function tambah_kategori(){
        return view('back.tambah-kategori');
    }

    public function edit_kategori($id){
        $data_kategori = DB::table('kategori')->where('kategori_id', $id)->get();
        return view('back.edit-kategori', ['data_kategori' => $data_kategori]);
    }

    public function delete_kategori($id){
        DB::table('kategori')->where('kategori_id', $id)->delete();
        return redirect('kategori');
    }

    public function input_kategori(Request $request){
        $messages = [
            'required' => ':attribute wajib diisi',
            'numeric' => ':attribute harus berupa angka'
        ];

        $this->validate($request, [
            'kategori_id' => 'required | numeric',
            'kategori_detail' => 'required'
        ], $messages);

        DB::table('kategori')->insert([
            'kategori_id' => $request->kategori_id,
            'kategori_detail' => $request->kategori_detail
        ]);
        return redirect('kategori');
    }

    public function update_kategori(Request $request){
        $messages = [
            'required' => ':attribute wajib diisi',
            'numeric' => ':attribute harus berupa angka'
        ];

        $this->validate($request, [
            'kategori_id' => 'required | numeric',
            'kategori_detail' => 'required'
        ], $messages);

        DB::table('kategori')->where('kategori_id',$request->kategori_id)->update([
            'kategori.kategori_id' => $request->kategori_id,
            'kategori.kategori_detail' => $request->kategori_detail
        ]);
        return redirect('kategori');
    }

    // ===================UNIT==================
    public function master_unit(){
        $unit = DB::table('unit')->paginate(10);
        return view('back.data-unit', ['unit' => $unit]);
    }

    public function tambah_unit(){
        return view('back.tambah-unit');
    }

    public function edit_unit($id){
        $data_unit = DB::table('unit')->where('unit_id', $id)->get();
        return view('back.edit-unit', ['data_unit' => $data_unit]);
    }

    public function delete_unit($id){
        DB::table('unit')->where('unit_id', $id)->delete();
        return redirect('unit');
    }

    public function input_unit(Request $request){
        $messages = [
            'required' => ':attribute wajib diisi',
            'numeric' => ':attribute harus berupa angka'
        ];

        $this->validate($request, [
            'unit_id' => 'required | numeric',
            'unit_nama' => 'required'
        ], $messages);

        DB::table('unit')->insert([
            'unit_id' => $request->unit_id,
            'unit_nama' => $request->unit_nama
        ]);
        return redirect('unit');
    }

    public function update_unit(Request $request){
        $messages = [
            'required' => ':attribute wajib diisi',
            'numeric' => ':attribute harus berupa angka'
        ];

        $this->validate($request, [
            'unit_id' => 'required | numeric',
            'unit_nama' => 'required'
        ], $messages);

        DB::table('unit')->where('unit_id',$request->unit_id)->update([
            'unit.unit_id' => $request->unit_id,
            'unit.unit_nama' => $request->unit_nama
        ]);
        return redirect('unit');
    }

    // ===================BAGIAN==================
    public function master_bagian(){
        $bagian = DB::table('bagian')->paginate(10);
        return view('back.data-bagian', ['bagian' => $bagian]);
    }

    public function tambah_bagian(){
        return view('back.tambah-bagian');
    }

    public function edit_bagian($id){
        $data_bagian = DB::table('bagian')->where('bagian_id', $id)->get();
        return view('back.edit-bagian', ['data_bagian' => $data_bagian]);
    }

    public function delete_bagian($id){
        DB::table('bagian')->where('bagian_id', $id)->delete();
        return redirect('bagian');
    }

    public function input_bagian(Request $request){
        $messages = [
            'required' => ':attribute wajib diisi',
            'numeric' => ':attribute harus berupa angka'
        ];

        $this->validate($request, [
            'bagian_id' => 'required | numeric',
            'bagian_nama' => 'required'
        ], $messages);

        DB::table('bagian')->insert([
            'bagian_id' => $request->bagian_id,
            'bagian_nama' => $request->bagian_nama
        ]);
        return redirect('bagian');
    }

    public function update_bagian(Request $request){
        $messages = [
            'required' => ':attribute wajib diisi',
            'numeric' => ':attribute harus berupa angka'
        ];

        $this->validate($request, [
            'bagian_id' => 'required | numeric',
            'bagian_nama' => 'required'
        ], $messages);

        DB::table('bagian')->where('bagian_id',$request->bagian_id)->update([
            'bagian.bagian_id' => $request->bagian_id,
            'bagian.bagian_nama' => $request->bagian_nama
        ]);
        return redirect('bagian');
    }
}