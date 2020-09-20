<?php

namespace App\Http\Middleware\AccessLevels;

use Closure;
use Illuminate\Support\Facades\Auth;

class AuthorAuth
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
        if(Auth::guard('api')->check()){
            if($request->user()->active===0){
                //Check if account is active
                Auth::logout();
                $message = "You're account has been deactivated. Contact the Administrator";
                return redirect("login")
                    ->with('message_type','secondary')
                    ->with('message',$message);
            }else{
                //Check if user's access level matches approved access level
                if ($request->user()->access_level <= 3) {
                    return $next($request);
                } else {
                    $message = ["message" => "Permission Denied. Your Access Level Does Not Allow This Operation. "];
                    return response($message, 401);
                }
            }
        }else if(Auth::guard('web')->check()){
            if($request->user()->active===0){
                //Check if account is active
                Auth::logout();
                $message = "You're account has been deactivated. Contact the Administrator";
                return redirect("login")
                    ->with('message_type','secondary')
                    ->with('message',$message);
            }else{
                //Check if user's access level matches approved access level
                if ($request->user()->access_level <= 3) {
                    return $next($request);
                } else {
                    $title = "Access Denied.";
                    $message = "Your Access Level Does Not Allow This Operation.";
                    return redirect("login")
                        ->with('title',$title)
                        ->with('message_type','secondary')
                        ->with('message',$message);
                }
            }
        }else {
            // No Guard Defined
            $message = ["message" => "No Guard Detected. "];
            return response($message, 401);
        }
    }
}
