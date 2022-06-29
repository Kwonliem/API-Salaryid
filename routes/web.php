<?php

// use Illuminate\Routing\Route;
// use Illuminate\Support\Facades\Auth;

// use Illuminate\Routing\Route;

// use Illuminate\Routing\Route;

// use App\Http\Controllers\PenggajianController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::match(["get", "post"], "/register", function(){
    return redirect('login');
});

Route::get('/home', 'HomeController@index')->name('home');

// View Tunjangan
Route::view('/tampilan', 'layouts.template');

Route::resource('tunjangan', 'TunjanganController');

// View Jabatan
Route::resource('jabatan', 'JabatanController');

// View Berita
Route::resource('berita', 'BeritaController');

// View Konten
Route::resource('konten', 'KontenController');
// View Karyawan
Route::resource('karyawan', 'KaryawanController');

// View Penggajian
Route::get('list-karyawan', 'PenggajianController@index');
Route::get('create-gaji/{id}', 'PenggajianController@create_penggajian');
Route::post('post-gaji', 'PenggajianController@store');
Route::get('riwayat-gaji/{id}', 'PenggajianController@detail');