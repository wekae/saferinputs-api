<?php

namespace App\Http\Controllers;

use App\Services\AuthService;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    private $authService;


    protected $successStatus = 200;
    protected $createdStatus = 201;
    protected $noContentStatus = 204;
    protected $badRequestStatus = 400;
    protected $unauthorizedStatus = 401;
    protected $notFoundStatus = 404;
    protected $unprocessableStatus = 404;
    protected $notImplementedStatus = 501;

    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }

    /**
     * Wrapper for the JSON response for failure during execution
     *
     * @param $code
     * @param $message
     * @return array
     */
    private function failureMessage($code, $message)
    {

        return [
            'code' => $code,
            'message' => $message,
            'success' => false,
        ];

    }

    /**
     * Wrapper for the JSON response for success during execution
     *
     * @param $code
     * @param $message
     * @param $payload
     * @return array
     */
    private function successMessage($code, $message, $payload)
    {

        return [
            'code' => $code,
            'message' => $message,
            'success' => true,
            'data' => $payload,
        ];

    }

    /**
     * Adds a new user to database
     * @param Request $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function register(Request $request){
        $return_data = $this->authService->register($request);
        $registered = $return_data['success'];

        if($registered){
            $user = $return_data['user'];
            $access_token = $return_data['access_token'];
            $item = array(
                'user' => $user,
                'access_token' => $access_token
            );
            $status_code = $this->createdStatus;
            $message = "Saved";
            $response = $this->successMessage($status_code, $message, $item);

            return response($response, $status_code);
        }else{
            $status_code = $this->notImplementedStatus;
            if(array_key_exists('duplicate', $return_data) && $return_data['duplicate']){
                $message = 'Email address already exists';
            }else{
                $message = "Not Created";
            }
            $response = $this->failureMessage($status_code, $message);
            return response($response, $status_code);
        }
    }



    /**
     * Handle Lpg in
     * @param Request $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function logIn(Request $request){
        $return_data = $this->authService->login($request);

        if($return_data['login']){
            $user = $return_data['user'];
            $access_token = $return_data['access_token'];
            $item = array(
                'user' => $user,
                'user_info' => $return_data['user_info'],
                'access_token' => $access_token
            );
            $status_code = $this->successStatus;
            $message = "Welcome";
            $response = $this->successMessage($status_code, $message, $item);

            return response($response, $status_code);
        }else{
//            $status_code = $this->unauthorizedStatus;
            $status_code = 422;
            $message = "Incorrect username/password";
            $response = $this->failureMessage($status_code, $message);
            return response($response, $status_code);
        }
    }

    /**
     * Handle Lpg Out
     * @param Request $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function logOut(Request $request){
        $data = $this->authService->logout($request);
        $response = $this->successMessage($this->successStatus, 'Later', $data);
        return response($response, $this->successStatus);
    }


    /**
     * Find user based on given ID.
     * Returns JSON response
     * @param $id
     * @return
     */
    public function find($id){
        $item = $this->authService->find($id);
        if($item){
            return $this->successMessage($this->successStatus, '', $item);
        }else{
            $status_code = $this->notFoundStatus;
            $message = "Item not found";
            $response = $this->failureMessage($status_code, $message);
            return response($response, $status_code);
        }
    }



    /**
     * Updates the user based on the ID
     * @param Request $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function update(Request $request){
        $saved = $this->authService->update($request, $request->id);

        if($saved){
            $status_code = $this->createdStatus;
            $message = "Updated";
            $response = $this->successMessage($status_code, $message, $saved);

            return response($response, $status_code);
        }else{
            $status_code = $this->notImplementedStatus;
            $message = "Update Unsuccessful";
            $response = $this->failureMessage($status_code, $message);
            return response($response, $status_code);
        }
    }

    /**
     * Updates the user's password based on the ID
     * @param Request $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function updatePassword(Request $request){
        $saved = $this->authService->updatePassword($request, $request->id);

        if($saved){
            $status_code = $this->createdStatus;
            $message = "Updated";
            $response = $this->successMessage($status_code, $message, $saved);

            return response($response, $status_code);
        }else{
            $status_code = $this->notImplementedStatus;
            $message = "Update Unsuccessful";
            $response = $this->failureMessage($status_code, $message);
            return response($response, $status_code);
        }
    }


    /**
     * Deletes a user based on the id value
     * @param Request $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function delete(Request $request){
        $deleted = $this->authService->delete($request->id);
        if($deleted){
            $status_code = $this->successStatus;
            $message = "Deleted";
            $response = $this->successMessage($status_code, $message, null);

            return response($response, $status_code);
        }else{
            $status_code = $this->notImplementedStatus;
            $message = "Item not found";
            $response = $this->failureMessage($status_code, $message);
            return response($response, $status_code);
        }

    }
}
