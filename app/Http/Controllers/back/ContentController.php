<?php
namespace App\Http\Controllers\Back;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ContentController extends Controller
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
    public function content()
    {
        $content = DB::table('web_content')->get();
        return view('back.content',['content' => $content]);
    }

    public function edit_content($id){
        $cont = DB::table('web_content')->where('content_name', $id)->get();
        return view('back.edit-content', ['cont' => $cont]);
    }

    public function update_content(Request $request){
        DB::table('web_content')->where('content_name',$request->content_name)->update([
            'web_content.content_body' => $request->content_body
        ]);
        return redirect('content');
    }
}
