<?php

use App\Http\Controllers\BarangController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Models\Barang;

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

Route::get('/', function () {
    return view('Home');
});

Route::get('/market', function () {
    return view('Market');
});

Route::get('/login', function () {
    return view('Login');
});

Route::get('/register', function () {
    return view('admin/Register');
});
Route::get('/tambahbrg', function () {
    return view('admin/tambahBarang');
});

// Route::get('/dashboard', function () {
//     return view('admin/dashboard');
// })->middleware('auth');

Route::get('/user', [UserController::class, 'listuser']);

Route::get('/barang', [BarangController::class, 'index']);

Route::get('/tmbhbarang', function () {
    return view('admin/Tambah_barang');
});

Route::get('/detailbrg', function () {
    return view('DetailBarang');
});
Route::post('/dashboard/save', [UserController::class, 'store']); //route untuk menyimpan data ke database
Route::get('/User/create', [UserController::class, 'create']); //route untuk ke halaman tambah data
Route::post('/User/store', [UserController::class, 'store']); //route untuk menyimpan data ke database
Route::get('/user/{id}', [UserController::class, 'hapus']); //route untuk menghapus data di database
Route::get('user/hapus/{id}', [UserController::class, 'hapuss'])->name('hapuss');
Route::get('login', [UserController::class, 'login'])->name('login');
Route::post('actionlogin', [UserController::class, 'actionlogin'])->name('actionlogin');
Route::get('/dashboard', [UserController::class, 'index'])->name('dashboard');
Route::get('actionlogout', [UserController::class, 'actionlogout'])->name('actionlogout')->middleware('auth');
// Route::get('/upload', 'UploadController@index');
Route::post('/upload/proses', [BarangController::class, 'store']);
Route::get('barang/hapus/{id}', [BarangController::class, 'hapus'])->name('hapus');
Route::get('barang/ubah/{id}', [BarangController::class, 'ubah'])->name('ubah');
Route::post('barang/update', [BarangController::class, 'update']);
Route::get('/market', [BarangController::class, 'market']);
Route::get('detail/{id}', [BarangController::class, 'detail'])->name('detail');
