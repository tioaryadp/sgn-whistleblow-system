<?php 
namespace App\Http\Controllers\Front;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
 
class BerandaController extends Controller{
    public function beranda(){
        $judul_beranda = DB::table('web_content')->select('content_body')->where('web_content.content_name', 'judul-beranda')->get();
        $subjudul_beranda = DB::table('web_content')->select('content_body')->where('web_content.content_name', 'subjudul-beranda')->get();
        $maintext_beranda = DB::table('web_content')->select('content_body')->where('web_content.content_name', 'main-text-beranda')->get();
        $subtext1_beranda = DB::table('web_content')->select('content_body')->where('web_content.content_name', 'subtext-1-beranda')->get();
        $subtext2_beranda = DB::table('web_content')->select('content_body')->where('web_content.content_name', 'subtext-2-beranda')->get();
        $instagram = DB::table('social_media')->select('sosmed_link')->where('sosmed_name', 'instagram')->first();
        $facebook = DB::table('social_media')->select('sosmed_link')->where('sosmed_name', 'facebook')->first();
        $twitter = DB::table('social_media')->select('sosmed_link')->where('sosmed_name', 'twitter')->first();
        $tiktok = DB::table('social_media')->select('sosmed_link')->where('sosmed_name', 'tiktok')->first();
        return view('front.beranda',[
            'judul_beranda' => $judul_beranda,
            'subjudul_beranda' => $subjudul_beranda,
            'maintext_beranda' => $maintext_beranda,
            'subtext1_beranda' => $subtext1_beranda,
            'subtext2_beranda' => $subtext2_beranda,
            'instagram' => $instagram->sosmed_link,
            'facebook' => $facebook->sosmed_link,
            'tiktok' => $tiktok->sosmed_link,
            'twitter' => $twitter->sosmed_link
        ]);
    }
}