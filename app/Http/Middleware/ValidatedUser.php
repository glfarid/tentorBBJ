<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class ValidatedUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle($request, Closure $next)
    {
        // Check if the user is a 'Peserta' and their personal data is validated
        if (
            auth()->check() &&
            auth()->user()->usertype == 'Peserta' &&
            auth()->user()->dpribadi != null &&
            auth()->user()->dpribadi->status == 'Validasi'
        ) {
            // Redirect or handle unauthorized access
            // return redirect()->route('dpribadi.index')->with('error', 'Please validate your personal data first.');
        return $next($request);

        }
        
        // Continue to the next middleware or the requested route
        return redirect('reject');
    }
}
