<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Devmanage_controler;
use App\Http\Controllers\Settingcontroller;
use App\Http\Controllers\Homecontroller;
use App\Http\Controllers\gamecontroller;
use App\Http\Controllers\usercontroller;
use App\Http\Controllers\adminController;
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
    return view('welcome');
});

Route::get('/home', [Homecontroller::class,'index']);
Route::get('/home/serch', [Homecontroller::class,'serch']);
Route::get('/search-by-tag/{tag}', [Homecontroller::class, 'searchByTag']);
Route::get('/settings', [Settingcontroller::class, 'show'])->name('profile.Setting');

Route::get('Devmanage', [Devmanage_controler::class,'index']);
Route::post('/Devmanage/create', [Devmanage_controler::class,'create']);
Route::get('/Devmanage/delete/{idgames}', [Devmanage_controler::class,'delete']);
Route::post('/Devmanage/update/{idgames}', [Devmanage_controler::class, 'update']);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('home');
    })->name('dashboard');
});

Route::get('/admin', [adminController::class, "index"]);
Route::get('/game', [gameController::class, "index"]);
Route::get('/user', [userController::class, "index"]);