<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Role
{
    public function handle(Request $request, Closure $next,...$roles)
    {
        if (in_array($request->user()->role,$roles)) {
            return $next($request);
        }
        // toastr()->warning('Anda tidak memiliki akses!');
        return redirect()->back()->with('error', 'Anda tidak memiliki akses!');
    }
}
