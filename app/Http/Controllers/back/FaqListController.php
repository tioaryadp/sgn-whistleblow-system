<?php
namespace App\Http\Controllers\Back;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class FaqListController extends Controller
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
    public function master_faq(){
        $data_faq = DB::table('faq')->paginate(10);
        return view('back.faq-list', ['data_faq' => $data_faq]);
    }

    public function tambah_faq(){
        return view('back.tambah-faq');
    }

    public function edit_faq($id){
        $data_faq = DB::table('faq')->where('faq_id', $id)->get();
        return view('back.edit-faq', ['data_faq' => $data_faq]);
    }

    public function delete_faq($id){
        DB::table('faq')->where('faq_id', $id)->delete();
        return redirect('faq-list');
    }

    public function input_faq(Request $request){
        $messages = [
            'required' => ':attribute wajib diisi',
            'numeric' => ':attribute harus berupa angka'
        ];

        $this->validate($request, [
            'faq_id' => 'required | numeric',
            'faq_question' => 'required',
            'faq_answer' => 'required'
        ], $messages);

        DB::table('faq')->insert([
            'faq_id' => $request->faq_id,
            'faq_question' => $request->faq_question,
            'faq_answer' => $request->faq_answer
        ]);
        return redirect('faq-list');
    }

    public function update_faq(Request $request){
        $messages = [
            'required' => ':attribute wajib diisi',
            'numeric' => ':attribute harus berupa angka'
        ];

        $this->validate($request, [
            'faq_id' => 'required | numeric',
            'faq_question' => 'required',
            'faq_answer' => 'required'
        ], $messages);

        DB::table('faq')->where('faq_id',$request->faq_id)->update([
            'faq.faq_id' => $request->faq_id,
            'faq.faq_question' => $request->faq_question,
            'faq.faq_answer' => $request->faq_answer
        ]);
        return redirect('faq-list');
    }
}