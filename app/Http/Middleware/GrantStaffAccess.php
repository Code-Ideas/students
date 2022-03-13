<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class GrantStaffAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (!auth()->guard('admin')->check()) {
            return redirect()->route('login_form')->withErrors('برجاء تسجيل الدخول اولا !');
        }
        if (auth()->guard('admin')->user()->active) {
            if (auth()->guard('admin')->user()->role == 'staff') {
                return $next($request);
            } else {
                return redirect()->back()->withErrors('عذرا انت لاتمتلك صلاحية الوصول !');
            }
        } else {
            auth()->guard('admin')->logout();

            return redirect()->route('login_form')->withErrors('عفوا تم تعطيل الحساب الخاص بكم !');
        }
    }
}
