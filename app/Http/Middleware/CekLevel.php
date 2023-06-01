<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class CekLevel
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, ...$akses)
    {
        $user = \App\User::where('email', $request->email)->first();
        if ($user->status == 'admin') {
            return redirect('operator/dashboard');
        } elseif ($user->status == 'operator') {
            return redirect('operator/dashboard');
        }
        return abort(404);
    }
}
