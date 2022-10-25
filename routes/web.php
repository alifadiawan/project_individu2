<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\mastersiswaController;
use App\Http\Controllers\masterkontakController;
use App\Http\Controllers\masterprojectController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\jeniskontakController;
use App\Http\Controllers\kontakController;

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





//guest
route::middleware('guest')->group(function(){
    Route::get('login', [loginController::class, 'index']);
    Route::post('login', [loginController::class, 'authenticate']);
   

        Route::get('/login', function () {
        return view('login');
    });

    Route::get('/admin', function () {
        return view('layout.admin');
    });
    Route::get('/TambahProject', function () {
        return view('TambahProject');
    });
    Route::get('/EditKontak', function () {
        return view('EditKontak');
    });

});



Route::get('/', function () {
    return view('home');
});

Route::get('/home', function () {
    return view('home');
});


Route::get('/about', function () {
    return view('about');
});

Route::get('/project', function () {
    return view('project');
});

Route::get('/contact', function () {
    return view('contact');
});




//controller
route::middleware('auth')->group(function(){
    Route::resource('/mastersiswa', mastersiswaController::class);
    Route::get('mastersiswa/{id_siswa}/hapus', [mastersiswaController::class, 'hapus'])->name('mastersiswa.hapus');

    Route::resource('/masterkontak', masterkontakController::class);
    Route::get('masterkontak/{jenis_kontak}/tambah', [masterkontakController::class, 'tambah'])->name('masterkontak.tambah');
    Route::get('masterkontak/{jenis_kontak}/hapus', [masterkontakController::class, 'hapus'])->name('masterkontak.hapus');

    Route::resource('/masterproject', masterprojectController::class);
    Route::get('masterproject/{id_siswa}/hapus', [masterprojectController::class, 'hapus'])->name('masterproject.hapus');
    Route::get('masterproject/{id_siswa}/tambah', [masterprojectController::class, 'tambah'])->name('masterproject.tambah');

    Route::resource('jeniskontak', jeniskontakController::class);
    Route::resource('kontak', kontakController::class);

    



    Route::resource('/dashboard', DashboardController::class);
    Route::post('logout', [loginController::class, 'logout']);


});

