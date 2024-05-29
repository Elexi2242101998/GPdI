<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Response;
use Illuminate\Http\Request;

class CheckRole
{
    public function handle(Request $request, Closure $next, $role)
    {
        
     
        
        if (!auth()->check()) {
            return redirect('/login');
        }

        
        if (auth()->user()->role === 'admin' && $role === 'user') {
            
            return $next($request);
        }

        
        if (auth()->user()->role !== $role) {
            return new Response(view('content.abort.errors'), 403);
        }

        return $next($request);
    }
}
