<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Services\AuthService;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    private $authService;

    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }


    /**
     * Handle Log in For the web route
     * @param Request $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function webLogIn(Request $request){
        $return_data = $this->authService->login($request);

        if($return_data['login']){
            return redirect('/');
        }else{
            $data = array(
                "message_type" => "danger",
                "title" => "Incorrect Username/Password",
                "message" => "Incorrect Username/Password Provided"
            );
            return redirect('login')
                ->with($data);
        }
    }

    /**
     * Handle Log Out
     * @param Request $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function webLogOut(Request $request){
        $this->authService->logout($request);

        return redirect('login');
    }

    /**
     * Returns home view
     *
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function home(Request $request){
        return view('demo');
    }
    /**
     * Returns clients view
     *
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function clients(Request $request){
        return view('clients');
    }
    /**
     * Returns authorized-clients view
     *
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function authorizedClients(Request $request){
        return view('authorized-clients');
    }
    /**
     * Returns personal-access-tokens view
     *
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function personalAccessTokens(Request $request){
        return view('personal-access-tokens');
    }

    /**
     * Returns login form
     *
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function login(Request $request){
        return view('login');
    }
}
