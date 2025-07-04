<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        /** @var \Illuminate\Contracts\Auth\Guard $auth */
        $auth = auth();

        if (!$auth->check() || !$auth->user()->is_admin) {
            abort(403, 'Acesso não autorizado.');
        }

        return $next($request);
    }
}
