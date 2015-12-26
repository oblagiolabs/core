<?php

namespace App\Http\Middleware;

use Closure;

class Right
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $action = helper()->segmentAction();
        $right = helper()->getRight($action);
        if($right == 'true' || $right == 'go')
            return $next($request);
        else
            return redirect('401');
    }
}
