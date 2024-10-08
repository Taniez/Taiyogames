<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    public function handle($request, Closure $next)
    {
        // ตรวจสอบว่าผู้ใช้เข้าสู่ระบบและเป็นผู้ดูแลระบบ
        if (Auth::check() && Auth::user()->isAdmin()) {
            return $next($request);
        }

        // หากไม่ใช่ผู้ดูแลระบบ ให้เปลี่ยนเส้นทางไปที่หน้าแรกหรือหน้าที่ไม่อนุญาต
        return redirect('/')->with('error', 'You do not have admin access.');
    }
}
