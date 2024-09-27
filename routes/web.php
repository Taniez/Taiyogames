<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Devmanage_controler;
use App\Http\Controllers\Settingcontroller;
use App\Http\Controllers\Homecontroller;
use App\Http\Controllers\gamecontroller;
use App\Http\Controllers\usercontroller;
use App\Http\Controllers\adminController;
use App\Http\Controllers\update_password;
use App\Http\Controllers\WishlistController;
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

Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::get('/wishlist', [WishlistController::class, 'index'])->name(' <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@yaireo/tagify/dist/tagify.css">');
    Route::post('/wishlist', [WishlistController::class, 'store'])->name('wishlist.store');
    Route::delete('/wishlist/{id}', [WishlistController::class, 'destroy'])->name('wishlist.destroy');
});

Route::get('/home', [Homecontroller::class,'index']);
Route::get('/home/serch', [Homecontroller::class,'serch']);
Route::get('/search-by-tag/{tag}', [Homecontroller::class, 'searchByTag']);
Route::get('/settings', [Settingcontroller::class, 'show'])->name('profile.Setting');

Route::get('/Update', [update_password::class, 'index']);
Route::get('/home', [Homecontroller::class,'index'])->name('home');

Route::get('Devmanage', [Devmanage_controler::class,'index']);
Route::post('/Devmanage/create', [Devmanage_controler::class,'create']);
Route::get('Devmanage', [Devmanage_controler::class,'index'])->name('Upload');
Route::get('/Devmanage/delete/{idgames}', [Devmanage_controler::class,'delete']);
Route::post('/Devmanage/update/{idgames}', [Devmanage_controler::class, 'update']);


Route::get('/game/{idgames}', [gameController::class, 'gameserch']);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('home');})->name('dashboard');
});

Route::get('/admin', [adminController::class, "index"]);
Route::get('/game', [gameController::class, "index"]);
Route::get('/user/collection', [userController::class, "index"]);
Route::get('/user/posting', [userController::class, "posting"]);
Route::get('/user/donate', [userController::class, "donate"]);