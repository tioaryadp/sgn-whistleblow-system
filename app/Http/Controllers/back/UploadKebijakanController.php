<?php 
namespace App\Http\Controllers\Back;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
 
class UploadKebijakanController extends Controller{
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
    
    public function upload_form(){
        return view('back.form-kebijakan');
    }

    public function upload_file(Request $request){
        $file = $request->file('pdf_kebijakan');
        $tujuan_upload = 'assets';
        $nama_file = 'kebijakan_wbs.pdf';
        if(!empty($file)){
            $file->move($tujuan_upload, $nama_file);
        return redirect('master');
        }
    }
}