<?php

namespace App\Http\Middleware;

use Closure;
use App\user;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Response;
class test
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
        $user = DB::table('user') -> get();
        $userName;
        $userPassword;
        $userToken;

        foreach ($user as $key) {
            $userName = $key -> login;
            $userPassword = $key -> password;
            $userToken = $key -> bearer_token;
        }

        if ($userName == 'admin' && $userPassword == '12345') {
           return $next($request);
        }
       
    }
}
