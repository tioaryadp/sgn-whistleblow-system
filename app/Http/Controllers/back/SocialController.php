<?php 
namespace App\Http\Controllers\Back;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
 
class SocialController extends Controller{
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
    
    public function sosmed(){
        $daftar_sosmed = DB::table('social_media')->get();
        return view('back.sosmed',[
            'daftar_sosmed' => $daftar_sosmed, 
        ]);
    }

    public function edit_sosmed($id){
        $daftar_sosmed = DB::table('social_media')->where('sosmed_name', $id)->get();
        return view('back.edit-sosmed', ['daftar_sosmed' => $daftar_sosmed]);
    }

    public function update_sosmed(Request $request){
        DB::table('social_media')->where('sosmed_name',$request->sosmed_name)->update([
            'social_media.sosmed_link' => $request->sosmed_link
        ]);
        return redirect('sosmed');
    }
}
