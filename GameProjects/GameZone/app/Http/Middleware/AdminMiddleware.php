<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        if (!$request->session()->get('is_admin')) {
            return redirect()->route('admin.login')
                ->withErrors([
                    'email' => 'Сначала войдите в аккаунт администратора.',
                ]);
        }

        return $next($request);
    }
}
