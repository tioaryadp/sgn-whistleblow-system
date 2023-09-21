<?php 
namespace App\Http\Controllers\Front;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
 
class KebijakanController extends Controller{
    public function kebijakan(){
        $judul_kebijakan = DB::table('web_content')->select('content_body')->where('web_content.content_name', 'judul-kebijakan')->get();
        $subjudul_kebijakan = DB::table('web_content')->select('content_body')->where('web_content.content_name', 'subjudul-kebijakan')->get();
        $maintext_kebijakan = DB::table('web_content')->select('content_body')->where('web_content.content_name', 'main-text-kebijakan')->first();
    	return view('front.kebijakan', [
            'judul_kebijakan' => $judul_kebijakan,
            'subjudul_kebijakan' => $subjudul_kebijakan,
            'maintext_kebijakan' => $maintext_kebijakan->content_body
        ]);
    }
}
