<?php
namespace App\Http\Controllers;

// Allows passport:keys command to run without errors. Remove in production environment after initialization
define('STDIN',fopen("php://stdin","r"));

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

    public function initPassport(Request $request){
        Artisan::call('passport:install --uuids --force');
        Artisan::call('passport:keys --force');
        return Artisan::output();
    }

    public function initCache(Request $request){
        Artisan::call('cache:clear');
        echo Artisan::output();
        Artisan::call('config:clear');
        echo "<br>".Artisan::output();
        Artisan::call('view:clear');
        echo "<br>".Artisan::output();
        Artisan::call('route:clear');
        echo "<br>".Artisan::output();
        Artisan::call('route:cache');
        echo "<br>".Artisan::output();
        Artisan::call('config:cache');
        echo "<br>".Artisan::output();
        Artisan::call('optimize');
        echo "<br>".Artisan::output();

        return "<br>"."Done";
    }
}
