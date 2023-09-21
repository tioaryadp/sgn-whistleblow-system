<?php 
namespace App\Http\Controllers\Front;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
 
class FaqController extends Controller{
    public function faq(){
        $judul_faq = DB::table('web_content')->select('content_body')->where('web_content.content_name', 'judul-faq')->get();
        $subjudul_faq = DB::table('web_content')->select('content_body')->where('web_content.content_name', 'subjudul-faq')->get();
        $maintext_faq = DB::table('web_content')->select('content_body')->where('web_content.content_name', 'main-text-faq')->get();
        $faq = DB::table('faq')->get();
    	return view('front.faq', [
            'judul_faq' => $judul_faq,
            'subjudul_faq' => $subjudul_faq,
            'maintext_faq' => $maintext_faq,
            'faq' => $faq
        ]);
    }
}
