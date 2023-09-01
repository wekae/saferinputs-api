<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Services\AuthService;
use App\Services\UsersService;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    private $authService;
    private $usersService;

    public function __construct(AuthService $authService, UsersService $usersService)
    {
        $this->authService = $authService;
        $this->usersService = $usersService;
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

    public function viewProfile(Request $request){
        $returnData = $this->usersService->getUser($request);
        if($returnData["success"]){
            return view('users.profile')
                ->with("user", $returnData["data"]);
        }else{
            if(array_key_exists('authenticated', $returnData) && $returnData['authenticated']===false){
                $data = array(
                    "message_type" => "warning",
                    "title" => "Log In to continue",
                    "message" => $returnData["message"]
                );
                return redirect('/login')
                    ->with($data);
            }


            $data = array(
                "message_type" => "danger",
                "title" => "Something went wrong",
                "message" => $returnData["message"]
            );
            return redirect()->back()
                ->with($data);
        }
    }

    public function editPersonalDetails(Request $request){
        $returnData = $this->usersService->getKoanUser($request);
        if($returnData["success"]){
            return view('users.edit-details')
                ->with("user", $returnData["data"]);
        }else{
            if(array_key_exists('authenticated', $returnData) && $returnData['authenticated']===false){
                $data = array(
                    "message_type" => "warning",
                    "title" => "Log In to continue",
                    "message" => $returnData["message"]
                );
                return redirect('/login')
                    ->with($data);
            }


            $data = array(
                "message_type" => "danger",
                "title" => "Something went wrong",
                "message" => $returnData["message"]
            );
            return redirect()->back()
                ->with($data);
        }

    }

    public function changeAccessLevel(Request $request){

        $returnData = $this->usersService->changeAccessLevel($request);
        if($returnData["success"]){
            return view('users.change-access-level')
                ->with("user", $returnData["data"]);
        }else{
            if(array_key_exists('authenticated', $returnData) && $returnData['authenticated']===false){
                $data = array(
                    "message_type" => "warning",
                    "title" => "Log In to continue",
                    "message" => $returnData["message"]
                );
                return redirect('/login')
                    ->with($data);
            }


            $data = array(
                "message_type" => "danger",
                "title" => "Something went wrong",
                "message" => $returnData["message"]
            );
            return redirect()->back()
                ->with($data);
        }
    }

    public function changePassword(Request $request){
        $returnData = $this->usersService->changePassword($request);
        if($returnData["success"]){
            return view('users.change-password')
                ->with("user", $returnData["data"]);
        }else{
            if(array_key_exists('authenticated', $returnData) && $returnData['authenticated']===false){
                $data = array(
                    "message_type" => "warning",
                    "title" => "Log In to continue",
                    "message" => $returnData["message"]
                );
                return redirect('/login')
                    ->with($data);
            }


            $data = array(
                "message_type" => "danger",
                "title" => "Something went wrong",
                "message" => $returnData["message"]
            );
            return redirect()->back()
                ->with($data);
        }
    }

    public function confirmDeactivateAccount(Request $request){

        $returnData = $this->usersService->changeAccessLevel($request);
        if($returnData["success"]){
            return view('users.confirm-deactivate-account')
                ->with("user", $returnData["data"]);
        }else{
            if(array_key_exists('authenticated', $returnData) && $returnData['authenticated']===false){
                $data = array(
                    "message_type" => "warning",
                    "title" => "Log In to continue",
                    "message" => $returnData["message"]
                );
                return redirect('/login')
                    ->with($data);
            }


            $data = array(
                "message_type" => "danger",
                "title" => "Something went wrong",
                "message" => $returnData["message"]
            );
            return redirect()->back()
                ->with($data);
        }

    }

    public function confirmDeleteAccount(Request $request){

        $returnData = $this->usersService->changeAccessLevel($request);
        if($returnData["success"]){
            return view('users.confirm-delete-account')
                ->with("user", $returnData["data"]);
        }else{
            if(array_key_exists('authenticated', $returnData) && $returnData['authenticated']===false){
                $data = array(
                    "message_type" => "warning",
                    "title" => "Log In to continue",
                    "message" => $returnData["message"]
                );
                return redirect('/login')
                    ->with($data);
            }


            $data = array(
                "message_type" => "danger",
                "title" => "Something went wrong",
                "message" => $returnData["message"]
            );
            return redirect()->back()
                ->with($data);
        }

    }

    public function confirmActivateAccount(Request $request){

        $returnData = $this->usersService->changeAccessLevel($request);
        if($returnData["success"]){
            return view('users.confirm-activate-account')
                ->with("user", $returnData["data"]);
        }else{
            if(array_key_exists('authenticated', $returnData) && $returnData['authenticated']===false){
                $data = array(
                    "message_type" => "warning",
                    "title" => "Log In to continue",
                    "message" => $returnData["message"]
                );
                return redirect('/login')
                    ->with($data);
            }


            $data = array(
                "message_type" => "danger",
                "title" => "Something went wrong",
                "message" => $returnData["message"]
            );
            return redirect()->back()
                ->with($data);
        }

    }

    public function updatePersonalDetails(Request $request){
        $koan_user_id = $request->koan_user_id;
        $returnData = $this->usersService->updateUser($request);
        if($returnData["success"]){

            $data = array(
                "message_type" => "success",
                "title" => "Updated",
                "message" => "Details Updated"
            );
            return redirect('/users/'.$koan_user_id.'/edit')
                ->with($data);
        }else{

            if(array_key_exists('authenticated', $returnData) && $returnData['authenticated']===false){
                $data = array(
                    "message_type" => "warning",
                    "title" => "Log In to continue",
                    "message" => $returnData["message"]
                );
                return redirect('/login')
                    ->with($data);
            }


            if(array_key_exists('not_found', $returnData) && $returnData["not_found"]){
                $message = "User not found";
            }else{
                $message = "User details not updated. ".$returnData['message'];;
            }

            $data = array(
                "message_type" => "danger",
                "title" => "Something went wrong",
                "message" => $message
            );
            return redirect()->back()
                ->with($data);
        }

    }

    public function updateAccessLevel(Request $request){
        $koan_user_id = $request->koan_user_id;
        $returnData = $this->usersService->updateAccessLevel($request);
        if($returnData["success"]){

            $data = array(
                "message_type" => "success",
                "title" => "Updated",
                "message" => "Access Level Updated"
            );
            return redirect('/users/'.$koan_user_id.'/access_level/edit')
                ->with($data);
        }else{

            if(array_key_exists('authenticated', $returnData) && $returnData['authenticated']===false){
                $data = array(
                    "message_type" => "warning",
                    "title" => "Log In to continue",
                    "message" => $returnData["message"]
                );
                return redirect('/login')
                    ->with($data);
            }


            if(array_key_exists('not_found', $returnData) && $returnData["not_found"]){
                $message = "User not found";
            }else{
                $message = "User details not updated. ".$returnData['message'];
            }

            $data = array(
                "message_type" => "danger",
                "title" => "Something went wrong",
                "message" => $message
            );
            return redirect()->back()
                ->with($data);
        }

    }

    public function updatePassword(Request $request){
        $koan_user_id = $request->koan_user_id;
        $returnData = $this->usersService->updatePassword($request);
        if($returnData["success"]){

            $data = array(
                "message_type" => "success",
                "title" => "Updated",
                "message" => "Password Updated"
            );
            return redirect('/users/'.$koan_user_id.'/password/change')
                ->with($data);
        }else{

            if(array_key_exists('authenticated', $returnData) && $returnData['authenticated']===false){
                $data = array(
                    "message_type" => "warning",
                    "title" => "Log In to continue",
                    "message" => $returnData["message"]
                );
                return redirect('/login')
                    ->with($data);
            }


            if(array_key_exists('not_found', $returnData) && $returnData["not_found"]){
                $message = "Old password is incorrect";
            }else{
                $message = "User password not updated. ".$returnData['message'];
            }

            $data = array(
                "message_type" => "danger",
                "title" => "Something went wrong",
                "message" => $message
            );
            return redirect()->back()
                ->with($data);
        }

    }

    public function deactivateAccount(Request $request){
        $koan_user_id = $request->koan_user_id;
        $returnData = $this->usersService->deactivateAccount($request);
        if($returnData["success"]){

            $data = array(
                "message_type" => "success",
                "title" => "Deactivated",
                "message" => "Account Deactivated"
            );
            return redirect('/users/'.$koan_user_id.'/details')
                ->with($data);
        }else{

            if(array_key_exists('authenticated', $returnData) && $returnData['authenticated']===false){
                $data = array(
                    "message_type" => "warning",
                    "title" => "Log In to continue",
                    "message" => $returnData["message"]
                );
                return redirect('/login')
                    ->with($data);
            }


            if(array_key_exists('not_found', $returnData) && $returnData["not_found"]){
                $message = "User not found";
            }else{
                $message = "User details not updated. ".$returnData['message'];
            }

            $data = array(
                "message_type" => "danger",
                "title" => "Something went wrong",
                "message" => $message
            );
            return redirect()->back()
                ->with($data);
        }

    }

    public function activateAccount(Request $request){
        $koan_user_id = $request->koan_user_id;
        $returnData = $this->usersService->activateAccount($request);
        if($returnData["success"]){

            $data = array(
                "message_type" => "success",
                "title" => "Activated",
                "message" => "Account Activated"
            );
            return redirect('/users/'.$koan_user_id.'/details')
                ->with($data);
        }else{

            if(array_key_exists('authenticated', $returnData) && $returnData['authenticated']===false){
                $data = array(
                    "message_type" => "warning",
                    "title" => "Log In to continue",
                    "message" => $returnData["message"]
                );
                return redirect('/login')
                    ->with($data);
            }


            if(array_key_exists('not_found', $returnData) && $returnData["not_found"]){
                $message = "User not found";
            }else{
                $message = "User details not updated. ".$returnData['message'];
            }

            $data = array(
                "message_type" => "danger",
                "title" => "Something went wrong",
                "message" => $message
            );
            return redirect()->back()
                ->with($data);
        }

    }

    public function deleteAccount(Request $request){
        $koan_user_id = $request->koan_user_id;
        $returnData = $this->usersService->deleteAccount($request);
        if($returnData["success"]){

            $data = array(
                "message_type" => "success",
                "title" => "Deactivated",
                "message" => $returnData["message"]
            );
            return redirect('/users/dashboard')
                ->with($data);
        }else{

            if(array_key_exists('authenticated', $returnData) && $returnData['authenticated']===false){
                $data = array(
                    "message_type" => "warning",
                    "title" => "Log In to continue",
                    "message" => $returnData["message"]
                );
                return redirect('/login')
                    ->with($data);
            }


            if(array_key_exists('not_found', $returnData) && $returnData["not_found"]){
                $message = "User not found";
            }else{
                $message = "User does not exist. ".$returnData['message'];
            }

            $data = array(
                "message_type" => "danger",
                "title" => "Something went wrong",
                "message" => $message
            );
            return redirect()->back()
                ->with($data);
        }

    }

    public function dashboard(Request $request){
        $returnData = $this->usersService->getUsersSummary();
        return view('users.dashboard')
            ->with($returnData);
    }

    public function datatable(Request $request){
        $data = $this->usersService->datatable($request);
        return $data;
    }
}
