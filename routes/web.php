<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/danisman-anasayfa', function () {
    return view('front.danisman-anasayfa');
});
Route::get('/danisman-giris', function () {
    return view('front.danisman-giris');
});

Route::get('/yonetici-giris', function () {
    return view('front.yonetici-giris');
});
Route::get('/ogrenci-giris', function () {
    return view('front.ogrenci-giris');
});

Route::get('/yonetici-kayitlar', [UserController::class, 'index']) ;
Route::get('/yonetici-anasayfa', [UserController::class, 'homepage']) ;
Route::get('/danisman-ogrenciler', [UserController::class, 'danismanOgrenciler']) ;
//Route::get('/', [UserController::class, 'shomepage']) ;
Route::get('/ogrenci-anasayfa', [UserController::class, 'shomepage']) ;
Route::get('/danisman-anasayfa', [UserController::class, 'chomepage']) ;
Route::post('/add-student', [UserController::class, 'studentAdd']) ;
Route::post('/add-consultant', [UserController::class, 'consultantAdd']) ;
Route::post('/add-semester', [UserController::class, 'semesterAdd']) ;
Route::post('/add-suggestion', [UserController::class, 'suggestionAdd']) ;
Route::post('/add-report', [UserController::class, 'reportAdd']) ;
Route::post('/add-thesis', [UserController::class, 'thesisAdd']) ;
Route::post('/soedit', [UserController::class, 'soedit']) ;
Route::post('/sredit', [UserController::class, 'sredit']) ;








Route::group([
    'prefix'=>config('admin.prefix'),
    'namespace'=>'App\\Http\\Controllers',
],function () {

    Route::get('login','LoginAdminController@formLogin')->name('admin.login');
    Route::post('login','LoginAdminController@login');

    Route::middleware(['auth:admin'])->group(function () {
        Route::post('logout','LoginAdminController@logout')->name('admin.logout');
        Route::view('/','dashboard')->name('dashboard');
        Route::view('/post','data-post')->name('post')->middleware('can:role,"admin","consultant"');
        Route::view('/admin','data-admin')->name('admin')->middleware('can:role,"admin"');
        Route::resource('users', 'UserController');

    });
});