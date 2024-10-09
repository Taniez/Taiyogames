<?php

namespace App\Providers;

use App\Actions\Fortify\CreateNewUser;
use App\Actions\Fortify\ResetUserPassword;
use App\Actions\Fortify\UpdateUserPassword;
use App\Actions\Fortify\UpdateUserProfileInformation;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;
use Laravel\Fortify\Fortify;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class FortifyServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // ใช้ Action Class ของ Fortify
        Fortify::createUsersUsing(CreateNewUser::class);
        Fortify::updateUserProfileInformationUsing(UpdateUserProfileInformation::class);
        Fortify::updateUserPasswordsUsing(UpdateUserPassword::class);
        Fortify::resetUserPasswordsUsing(ResetUserPassword::class);

        // ตั้งค่า Rate Limiter สำหรับการ login
        RateLimiter::for('login', function (Request $request) {
            $throttleKey = Str::transliterate(Str::lower($request->input(Fortify::username())).'|'.$request->ip());

            return Limit::perMinute(5)->by($throttleKey);
        });

        // ตั้งค่า Rate Limiter สำหรับ Two-factor authentication
        RateLimiter::for('two-factor', function (Request $request) {
            return Limit::perMinute(5)->by($request->session()->get('login.id'));
        });

        Fortify::authenticateUsing(function (Request $request) {
            $user = User::where('email', $request->email)->first();

            if ($user && Hash::check($request->password, $user->password)) {
                return $user;
            }
        });
    }

    // ฟังก์ชันนี้ใช้สำหรับกำหนดเส้นทางหลังจากล็อกอินเสร็จสิ้น
    protected function authenticated(Request $request, $user)
    {
        // ตรวจสอบว่าผู้ใช้เป็นแอดมินหรือไม่
        if ($user->isAdmin()) {
            // ถ้าเป็นแอดมิน จะเปลี่ยนเส้นทางไปที่หน้าแดชบอร์ดของแอดมิน
            return redirect()->route('admin.dashboard');
        }
    
        // ถ้าผู้ใช้ไม่ใช่แอดมิน จะเปลี่ยนเส้นทางไปที่หน้า HOME ปกติ
        return redirect(RouteServiceProvider::HOME);
    }
}

