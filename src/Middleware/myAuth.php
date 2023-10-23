<?php

namespace Insyghts\Authentication\Middleware;

use Closure;
use Illuminate\Http\Request;
use Insyghts\Authentication\Helpers\Helpers;
use Insyghts\Authentication\LoginUser;
use Insyghts\Authentication\Models\SessionToken;
use Insyghts\Authentication\Models\User;

class myAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next )
    {

        if (isset($_SERVER['HTTP_TOKEN'])) {

            $Token = $_SERVER['HTTP_TOKEN'];
            $user = new User();
            // Checking User Session Existed or Not
            if ($user->checkToken($Token)) {
                $result = SessionToken::checkExpiry($Token);
                if ($result['status']) {

                    app('loginUser')->setUser($result['sessionToken']->user_id);
                    return $next($request);
                } else {
                    return response()->json($result);
                }
            } else {
                return response()->json([
                    'status' => false,
                    'message' => "Unauthenticated Invalid Token"

                ]);
            }
        } else {
            return response()->json([
                'status' => false,
                'message' => "Unauthenticated Token Required"

            ]);
        }
    }
}
