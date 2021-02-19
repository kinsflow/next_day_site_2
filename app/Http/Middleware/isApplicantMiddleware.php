<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class isApplicantMiddleware
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
        if (auth()->user()->role->id !== 2){
            return redirect()->to('/')->with('failure', 'You are not an applicant');
        }
        return $next($request);
    }
}
