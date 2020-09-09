<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Services\AuthService;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    private $authService;

    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }

    public function newUser(Request $request){
        return view('users.new');
    }

    public function createUser(Request $request){
        $returnData = $this->authService->register($request);
        $success = $returnData["success"];
        if($success){
            $data = array(
                "message_type" => "success",
                "title" => "All Done",
                "message" => "User ".$request->first_name." ".$request->last_name." created. Email sent to ".$request->email." for account activation."
            );
            return redirect('users\new')
                ->with($data);
        }else if(!$success && $returnData["duplicate"]){
            $data = array(
                "message_type" => "warning",
                "title" => "Email Already Exists",
                "message" => "The email ".$request->email." is in use for another user."
            );
            return redirect('users\new')
                ->with($data);
        }else{
            $data = array(
                "message_type" => "warning",
                "title" => "Something went wrong",
                "message" => ""
            );
            return redirect('users\new')
                ->with($data)
                ->withInput();
        }
    }
}
