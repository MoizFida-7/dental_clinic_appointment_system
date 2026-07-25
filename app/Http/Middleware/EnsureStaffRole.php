<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EnsureStaffRole
{
    /**
     * Only admins/receptionists may manage clinic staff & billing records.
     */
    public function handle(Request $request, Closure $next)
    {
        if (! Auth::check() || ! Auth::user()->isStaff()) {
            abort(403, 'You do not have permission to access this section.');
        }

        return $next($request);
    }
}
