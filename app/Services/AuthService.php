<?php


namespace App\Services;


use App\Models\Users\KoanUsers;
use App\Models\Users\ThirdPartyUsers;
use App\Repositories\AuthRepository;
use App\Repositories\AuthRepositoryMysqlImpl;
use App\User;
use Exception;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Passport\Client as OClient;
use InvalidArgumentException;

class AuthService
{
    private $authRepository;

    public function __construct(AuthRepositoryMysqlImpl $authRepository)
    {
        $this->authRepository = $authRepository;
    }

    public function register(Request $request){
        $attributes = array("request"=>$request);


        if ($request->is('api/register')) {
            $return_data = $this->authRepository->createKoanUser($attributes);
        }
        if ($request->is('api/subscribe')) {
            $return_data = $this->authRepository->createThirdPartyUser($attributes);
        }

        if($return_data['success']){
            //User has been registered
            $accessToken = $return_data['user']->createToken('accessToken')->accessToken;
            $return_data['access_token'] = $accessToken;
            return $return_data;
        }else{
            // Registration has failed
            return $return_data;
        }
    }

    public function find($id){
        return $this->authRepository->find($id);
    }

    public function update(Request $request, $id){
        $attributes = array("request"=>$request);
        return $this->authRepository->update($id, $attributes);
    }

    public function updatePassword(Request $request, $id){
        $attributes = array("request"=>$request);
        return $this->authRepository->updatePassword($id, $attributes);
    }

    public function delete($id){
        return $this->authRepository->delete($id);
    }

    public function login(Request $request)
    {
        $loginData = $request->validate([
            'email' => 'email|required',
            'password' => 'required'
        ]);

//        if (!auth()->attempt($loginData)) {
//            return array(
//                'login' => false,
//                'message' => 'Invalid Credentials'
//            );
//        }
//
//        $accessToken = auth()->user()->createToken('Laravel Password Grant Client')->accessToken;


//        if (Auth::attempt(['email' => request('email'), 'password' => request('password')])) {
        if (Auth::attempt($loginData)) {
            $oClient = OClient::where('password_client', 1)->first();
            if($oClient){
                $accessToken = $this->getTokenAndRefreshToken($oClient, request('email'), request('password'));
            }else{
                $accessToken = "";
            }

        }
        else {
            return array(
                'login' => false,
                'message' => 'Invalid Credentials'
            );
        }


        if(auth()->user()->type == "koan_user"){
            $user_info = KoanUsers::find(auth()->user()->koan_users_id);
        }else if(auth()->user()->type == "third_party_user"){
            $user_info = ThirdPartyUsers::find(auth()->user()->third_party_users_id);
        }

        return array(
            'login' => true,
            'user' => auth()->user(),
            'user_info' => $user_info,
            'access_token' => $accessToken
        );

    }

    public function logout(Request $request){
//        $token = $request->user();
//        $token->revoke();
        Auth::logout();
//        return $token;
    }


    public function refreshToken(Request $request) {
        $refresh_token = $request->header('Refreshtoken');
        $oClient = OClient::where('password_client', 1)->first();
        $http = new Client;

        try {
            $response = $http->request('POST', env('BASE_URL').'oauth/token', [
                'form_params' => [
                    'grant_type' => 'refresh_token',
                    'refresh_token' => $refresh_token,
                    'client_id' => $oClient->id,
                    'client_secret' => $oClient->secret,
                    'scope' => '*',
                ],
            ]);
            return json_decode((string) $response->getBody(), true);
        } catch (Exception $e) {
            return response()->json("unauthorized", 401);
        }
    }


    private function getTokenAndRefreshToken(OClient $oClient, $email, $password) {
//        $oClient = OClient::where('password_client', 1)->first();
        $http = new Client();
        $response = $http->post(env('BASE_URL').'oauth/token', [
            'form_params' => [
                'grant_type' => 'password',
                'client_id' => $oClient->id,
                'client_secret' => $oClient->secret,
                'username' => $email,
                'password' => $password,
                'scope' => '*',
            ],
            'timeout' => 5
        ]);

        $result = json_decode((string) $response->getBody(), true);
        return $result;
//        return response()->json($result, $this->successStatus);
    }

}
