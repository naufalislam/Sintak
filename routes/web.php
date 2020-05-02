<?php

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

use App\Mahasiswa;
use App\TugasAkhir;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function () {
    $guards = ['mahasiswa', 'admin', 'kaprodi', 'dosen'];
    foreach ($guards as $guard) {
        if (Auth::guard($guard)->check()) {
            return redirect()->route($guard . '.home');
        }
    }
    return view('welcome');
})->name('home');

Auth::routes();

Route::prefix('mahasiswa')->name('mahasiswa.')->middleware(['auth:mahasiswa'])->group(function () {
    Route::get('/home', 'Mahasiswa\HomeController@index')->name('home');
    Route::resource('/TA', 'Mahasiswa\TAController');
});

Route::prefix('admin')->name('admin.')->middleware(['auth:admin'])->group(function () {
    Route::get('/home', 'Admin\HomeController@index')->name('home');
    Route::prefix('master')->name('master.')->group(function () {
        Route::resource('mahasiswa', 'Admin\MasterMahasiswaController');
        Route::resource('kaprodi', 'Admin\MasterKaprodiController');
        Route::resource('dosen', 'Admin\MasterDosenController');
    });
    Route::prefix('managemen')->name('managemen.')->group(function () {
        Route::resource('mahasiswa', 'Admin\ManagemenMahasiswaController');
        Route::resource('kaprodi', 'Admin\ManagemenKaprodiController');
        Route::resource('dosen', 'Admin\ManagemenDosenController');
    });
});

Route::prefix('kaprodi')->name('kaprodi.')->middleware(['auth:kaprodi'])->group(function () {
    Route::get('/home', 'Kaprodi\HomeController@index')->name('home');
    Route::resource('/TA', 'Kaprodi\ListTAController');
    Route::resource('/pembimbing', 'Kaprodi\PembimbingController');
});

// Route::group(['middleware' => ['auth:dosen']], function () {
//     Route::get('/home', 'Dosen\DosenController@index')->name('home');
// });

Route::prefix('dosen')->name('dosen.')->middleware(['auth:dosen'])->group(function () {
    Route::get('/home', 'Dosen\HomeController@index')->name('home');
    Route::resource('managemen', 'Dosen\ManagemenJudulController');
});
