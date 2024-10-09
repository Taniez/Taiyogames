<?php

use App\Models\admin;
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
use App\Http\Controllers\guestController;
use App\Http\Controllers\Update_username;
use App\Http\Controllers\DB;

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
    Route::get('/Favorite', [WishlistController::class, 'index'])->name(' wishlist.index');
    Route::post('/Favorite', [WishlistController::class, 'store'])->name('wishlist.store');
    Route::delete('/Favorite/{id}', [WishlistController::class, 'destroy'])->name('wishlist.destroy');
    Route::get('/Favorite/search', [WishlistController::class,'favsearch']);
    Route::get('/Favorite/search-by-tag/{tag}', [WishlistController::class, 'favsearchByTag']);

});

Route::get('/guest', [guestController::class, 'index']);
Route::get('/guest/serch', [guestController::class,'guestserch']);
Route::get('/guest/search-by-tag/{tag}', [guestController::class, 'guestsearchByTag']);
Route::post('/setting/profile-information/update', [Update_username::class, 'updateProfileInformation'])->name('user-profile-information.update');


Route::get('/home', [Homecontroller::class,'index']);
Route::get('/admin', [Homecontroller::class,'in']);
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

Route::get('/admin/{adminid}/{adminpassword}', [adminController::class,"isaddmin"]);
Route::post('/admin/report/{report_toadmin}', [adminController::class,"report"]);

Route::get('/game', [gameController::class, "index"]);
Route::get('/user/favorite/{userID}', [userController::class, "index"])->name('profile.user');
Route::get('/user/allurcomment/{userID}', [userController::class, "posting"]);
Route::get('/user/donate', [userController::class, "donate"]);
Route::get('/game/{idgame}/gamelog/{log_topic}', [gameController::class, "toLog"]);
Route::get('/user/mygame/{userID}', [userController::class, "mygame"])->name("mygame");
Route::post('/addComment', [userController::class, "add_comment"]);
Route::get('/deleteComment/{commentID}', [userController::class, "del_comment"]);
Route::middleware('admin')->group(function () {
    Route::get('/adminlogin', [AdminLoginController::class, 'showLoginForm'])->name('admin-login');
    Route::post('/admin/login', [AdminLoginController::class, 'login'])->name('admin-login.submit');
});