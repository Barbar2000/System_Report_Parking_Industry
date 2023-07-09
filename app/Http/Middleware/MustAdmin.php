<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class MustAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        // dd(Auth::user());
        if(Auth::user()->id != 1){
            $notification = array
                (
                'message' => 'Hanya Admin Yang Dapat Mengakses !',
                'alert-type' => 'error',
            );
            return back()->with($notification);
        }
        return $next($request);
    }
}
