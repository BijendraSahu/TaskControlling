<?php

namespace App\Http\Middleware;

use Closure;

class Checkadmin
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
        $value = $request->session()->get('admin')->isAdmin;
        if ($value == 0) {

//                return redirect('formakepaymentlist');
                return back()->with('status', 'You are already logged in!');
            }
            return $next($request);
        }

}
