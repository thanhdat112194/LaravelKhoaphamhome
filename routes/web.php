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
use App\TheLoai;
Route::get('/', function () {
    return view('welcome');
});
Route::get('test',function(){
    $theloai= TheLoai::find(1);
    foreach ($theloai->loaitin as $loaitin){
        echo $loaitin->Ten;
    }

});
Route::get('test1', function () {
    return view('admin.theloai.danhsach');
});

Route::prefix('admin')->group(function(){
    Route::prefix('theloai')->group(function(){
        Route::get('danhsach','TheloaiController@getDanhsach');
        Route::get('sua','TheloaiController@getSua');
        Route::get('them','TheloaiController@getThem');
        Route::post('them','TheloaiController@postThem');
    });
    Route::prefix('loaitin')->group(function(){
        Route::get('danhsach','LoaitinController@getDanhsach');
        Route::get('sua','LoaitinController@getSua');
        Route::get('them','LoaitinController@getThem');
    });
    Route::prefix('tintuc')->group(function(){
        Route::get('danhsach','TintucController@getDanhsach');
        Route::get('sua','TintucController@getSua');
        Route::get('them','TintucController@getThem');
    });
});