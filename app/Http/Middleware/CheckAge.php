<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckAge
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!session()->has('age')) {
            return redirect('/age');
        }
        $age = session('age');

        if (!is_numeric($age) || $age < 18) {
            return response("Không được phép truy cập");
        }
        return $next($request);
    }
}
