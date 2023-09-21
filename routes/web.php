<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use App\Http\Controllers\Front\BerandaController;
use App\Http\Controllers\Front\KebijakanController;
use App\Http\Controllers\Front\FaqController;
use App\Http\Controllers\Front\LacakController;
use App\Http\Controllers\Front\FormController;
use App\Http\Controllers\Back\DashboardController;
use App\Http\Controllers\Back\TiketController;
use App\Http\Controllers\Back\EmailController;
use App\Http\Controllers\Back\ContentController;
use App\Http\Controllers\Back\UserController;
use App\Http\Controllers\Back\MasterController;
use App\Http\Controllers\Back\SocialController;
use App\Http\Controllers\Back\FaqListController;
use App\Http\Controllers\Back\UploadKebijakanController;

use App\Http\Controllers\Back\HomeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Auth::routes();
Route::get('/home', [HomeController::class, 'index']);

Route::get('/', [BerandaController::class, 'beranda']);
Route::get('/rights', [KebijakanController::class, 'kebijakan']);
Route::get('/faq', [FaqController::class, 'faq']);
Route::get('/form', [FormController::class, 'form']);
Route::match(array('GET', 'POST'), '/submit-laporan', [FormController::class, 'submit_form']);

Route::get('/dashboard', [DashboardController::class, 'dashboard']);

Route::get('/tiket', [TiketController::class, 'tiket']);
Route::get('/tambah-tiket', [TiketController::class, 'tambah_tiket']);
Route::match(array('GET', 'POST'), '/input-tiket', [TiketController::class, 'input_new_tiket']);
Route::get('/detail-tiket-{id}', [TiketController::class, 'detail_tiket']);
Route::get('/download-{file}', [TiketController::class, 'download_file']);
Route::post('/update-tiket', [TiketController::class, 'update_tiket']);

Route::get('/email', [EmailController::class, 'email']);

Route::get('/content', [ContentController::class, 'content']);
Route::get('/edit-content-{id}', [ContentController::class, 'edit_content']);
Route::post('/update-content', [ContentController::class, 'update_content']);

Route::get('/user', [UserController::class, 'user_data']);
Route::get('/edit-user-{id}', [UserController::class, 'edit_user']);
Route::post('/update-user', [UserController::class, 'update_user']);
Route::get('/delete-user-{id}', [UserController::class, 'delete_user']);

Route::get('/master', [MasterController::class, 'master_data']);

Route::get('/kota', [MasterController::class, 'master_kota']);
Route::get('/tambah-kota', [MasterController::class, 'tambah_kota']);
Route::get('/edit-kota-{id}', [MasterController::class, 'edit_kota']);
Route::get('/delete-kota-{id}',[MasterController::class, 'delete_kota']);
Route::post('/input-kota', [MasterController::class, 'input_kota']);
Route::post('/update-kota', [MasterController::class, 'update_kota']);

Route::get('/provinsi', [MasterController::class, 'master_provinsi']);
Route::get('/tambah-provinsi', [MasterController::class, 'tambah_provinsi']);
Route::get('/edit-provinsi-{id}', [MasterController::class, 'edit_provinsi']);
Route::get('/delete-provinsi-{id}',[MasterController::class, 'delete_provinsi']);
Route::post('/input-provinsi', [MasterController::class, 'input_provinsi']);
Route::post('/update-provinsi', [MasterController::class, 'update_provinsi']);

Route::get('/kategori', [MasterController::class, 'master_kategori']);
Route::get('/tambah-kategori', [MasterController::class, 'tambah_kategori']);
Route::get('/edit-kategori-{id}', [MasterController::class, 'edit_kategori']);
Route::get('/delete-kategori-{id}',[MasterController::class, 'delete_kategori']);
Route::post('/input-kategori', [MasterController::class, 'input_kategori']);
Route::post('/update-kategori', [MasterController::class, 'update_kategori']);

Route::get('/unit', [MasterController::class, 'master_unit']);
Route::get('/tambah-unit', [MasterController::class, 'tambah_unit']);
Route::get('/edit-unit-{id}', [MasterController::class, 'edit_unit']);
Route::get('/delete-unit-{id}',[MasterController::class, 'delete_unit']);
Route::post('/input-unit', [MasterController::class, 'input_unit']);
Route::post('/update-unit', [MasterController::class, 'update_unit']);

Route::get('/bagian', [MasterController::class, 'master_bagian']);
Route::get('/tambah-bagian', [MasterController::class, 'tambah_bagian']);
Route::get('/edit-bagian-{id}', [MasterController::class, 'edit_bagian']);
Route::get('/delete-bagian-{id}',[MasterController::class, 'delete_bagian']);
Route::post('/input-bagian', [MasterController::class, 'input_bagian']);
Route::post('/update-bagian', [MasterController::class, 'update_bagian']);

Route::get('/email-setting', [EmailController::class, 'email_setting']);
Route::get('/edit-email-{id}', [EmailController::class, 'edit_email']);
Route::post('/update-email', [EmailController::class, 'update_email']);

Route::get('/sosmed', [SocialController::class, 'sosmed']);
Route::get('/edit-sosmed-{id}', [SocialController::class, 'edit_sosmed']);
Route::post('/update-sosmed', [SocialController::class, 'update_sosmed']);

Route::get('/faq-list', [FaqListController::class, 'master_faq']);
Route::get('/tambah-faq', [FaqListController::class, 'tambah_faq']);
Route::get('/edit-faq-{id}', [FaqListController::class, 'edit_faq']);
Route::get('/delete-faq-{id}',[FaqListController::class, 'delete_faq']);
Route::post('/input-faq', [FaqListController::class, 'input_faq']);
Route::post('/update-faq', [FaqListController::class, 'update_faq']);

Route::get('/kebijakan-pdf', [UploadKebijakanController::class, 'upload_form']);
Route::post('/upload-kebijakan', [UploadKebijakanController::class, 'upload_file']);

Route::get('/lacak', [LacakController::class, 'lacak']);
Route::get('/lacak-tiket', [LacakController::class, 'hasil_lacak']);

Route::get('/getKota/{id}', function($id){
    $kota = DB::table('kota')
    ->whereNotIn('kota_id', array(0))
    ->where('kota_provinsi', $id)
    ->get();
    return response()->json($kota);
});

Route::get('/form/refresh', function(){
    return response()->json(['captcha' => captcha_img('math')]);
});