<?php

namespace app\http\middleware;

use think\Request;

class Check
{
    public function handle($request, \Closure $next)
    {
        if ($request->param('title') == 'think') {
            return redirect('index/hello');
        }
        return $next($request);
    }
}
