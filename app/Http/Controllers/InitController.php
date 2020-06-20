<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class InitController extends Controller
{

    public function index(Request $request){
        return view('welcome');
    }

    public function clearCache(Request $request){
        $exitCode = Artisan::call('cache:clear');
    }

    public function optimize(Request $request){
        $exitCode = Artisan::call('optimize');
    }

    public function routeCache(Request $request){
        $exitCode = Artisan::call('route:cache');
    }

    public function routeClear(Request $request){
        $exitCode = Artisan::call('route:clear');
    }

    public function viewClear(Request $request){
        $exitCode = Artisan::call('view:clear');
    }

    public function configCache(Request $request){
        $exitCode = Artisan::call('config:cache');
    }

    public function initCache(Request $request){
        Artisan::call('cache:clear');
        Artisan::call('config:clear');
        Artisan::call('view:clear');
        Artisan::call('route:clear');
        Artisan::call('route:clear');
        Artisan::call('config:cache');

        return "done";
    }
}
