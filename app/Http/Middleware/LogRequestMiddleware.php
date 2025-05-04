<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class LogRequestMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        $message = sprintf(
            '[%s] %s %s %s',
            now()->toDateTimeString(),
            $request->method(),
            $request->fullUrl(),
            json_encode($request->all())
        );

        Log::channel('customlog')->info($message);

        return $next($request);
    }
}
