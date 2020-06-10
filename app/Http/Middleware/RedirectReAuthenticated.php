<?php

namespace Funaffect\LaravelReAuth\Http\Middleware;

use Closure;

class RedirectIfReAuthenticated
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
        $session = $request->session()->get('re-auth');

        if (is_null($session) OR ! $session)
        {
            // セッションの保存
            $request->session()->flash('re-auth', url()->current()); // 飛ぼうとしているURLを保存

            return redirect(config('reauth.reauth'));
        }

        return $next($request);
    }
}
