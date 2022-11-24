<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/backend', [\App\Http\Controllers\backendcontroller::class,'index']);
Route::get('/login', [\App\Http\Controllers\backendcontroller::class,'login']);
Route::get('/checkuser',[\App\Http\Controllers\backendcontroller::class,'checkuser'])->name('checkuser');
Route::get('/logged',[\App\Http\Controllers\backendcontroller::class,'logged'])->name('logged');
Route::get('/viewposts',[\App\Http\Controllers\backendcontroller::class,'viewposts'])->name('viewposts');
Route::get('/viewcomments',[\App\Http\Controllers\backendcontroller::class,'viewcommentsCTL'])->name('viewcomments');
Route::post('/delete_comment', [\App\Http\Controllers\backendcontroller::class,'del_comment'] );
Route::post('/restore_comment', [\App\Http\Controllers\backendcontroller::class,'restore_comment'] );
Route::post('/Add_comment', [\App\Http\Controllers\backendcontroller::class,'Add_comment'] );
Route::post('/Delete_post', [\App\Http\Controllers\backendcontroller::class,'delete_post'] );
Route::post('/Add_post', [\App\Http\Controllers\backendcontroller::class,'Add_post'] );
Route::post('/Restore_post', [\App\Http\Controllers\backendcontroller::class,'restore_post'] );
Route::get('/check_code', [\App\Http\Controllers\CheckNewCode_ForTest::class,'check_code'] );

Route::get('/loglogout',function(){
    if (\Illuminate\Support\Facades\Cache::store('database')->has('user_valid_web_level_0'))
    {
        \Illuminate\Support\Facades\Cache::store('database')->pull('user_valid_web_level_0');
    }elseif(\Illuminate\Support\Facades\Cache::store('database')->has('user_valid_web_level_1'))
    {
        \Illuminate\Support\Facades\Cache::store('database')->pull('user_valid_web_level_0');
    }
    return redirect('login');
}
);
//Route::get('/token', function () {
//    return csrf_token();
//});


//Auth::routes();
//
//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//
//Auth::routes();
//
//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
