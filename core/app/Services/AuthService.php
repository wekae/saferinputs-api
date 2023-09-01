<?php


namespace App\Services;


use App\Models\Users\KoanUsers;
use App\Models\Users\ThirdPartyUsers;
use App\Notifications\SignupActivate;
use App\Repositories\AuthRepository;
use App\Repositories\AuthRepositoryMysqlImpl;
use App\User;
use Carbon\Carbon;
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
        if ($request->is('users/new')) {
            $return_data = $this->authRepository->createKoanUser($attributes);
        }

        if($return_data['success']){
            //User has been registered
            $accessToken = $return_data['user']->createToken('accessToken')->accessToken;

            // Send confirmation email
            //TODO Reactivate On Deployment
//            $return_data['user']->notify(new SignupActivate($return_data['user']));

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
        $credentials["email"] = $request->email;
        $credentials["password"] = $request->password;
        $credentials["active"] = 1;
        $credentials["deleted_at"] = null;
        if (Auth::attempt($credentials)) {
            $oClient = OClient::where('password_client', 1)->first();
            if($oClient){
                $accessToken = $this->getTokenAndRefreshToken($oClient, request('email'), request('password'));
            }else{
                $accessToken = "";
            }

        }
        else {

            $accountStatus = $this->getUserStatus($request->email);
            // Handle response if account has been deactivated
            if($accountStatus['exists'] && $accountStatus["active"] === false){
                return array(
                    'login' => false,
                    'message' => 'Your account has been deactivated. Contact the administrator for more information.'
                );
            }

            return array(
                'login' => false,
                'message' => 'Incorrect username/password provided.'
            );
        }


        if(auth()->user()->type == "koan_user"){
            $user_info = KoanUsers::find(auth()->user()->koan_users_id);
        }else if(auth()->user()->type == "third_party_user"){
            $user_info = ThirdPartyUsers::find(auth()->user()->third_party_users_id);
        }

        return array(
            'login' => true,
//            'user' => auth()->user(),
//            'user_info' => $user_info,
            'access_token' => $accessToken
        );

    }

    public function logout(Request $request){
//        $token = Auth::user();
//        $token->revoke();
        $this->revokeToken($request);
        Auth::logout();
//        return $token;
    }


    public function refreshToken(Request $request) {
        $refresh_token = $request->header('Refreshtoken');
        $oClient = OClient::where('password_client', 1)->first();
        $http = new Client;

        try {
            $response = $http->request('POST', config('app.base_url').'oauth/token', [
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
//        $response = $http->post(env('BASE_URL').'oauth/token', [
        $response = $http->post(config('app.base_url').'oauth/token', [
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

    public function revokeToken(Request $request){
        $attributes = array("request"=>$request);
        return $this->authRepository->revokeToken($attributes);
    }

    public function signupActivate(Request $request){

        $attributes = array("request"=>$request);
        return $this->authRepository->signupActivate($attributes);

    }


    private function getUserStatus($email){
        $user = User::where('email', $email)->first();
        if($user){
            if($user->active === 0){
                return array(
                  "exists" => true,
                  "active" =>false,
                );
            }else{
                return array(
                    "exists" => true,
                    "active" => true,
                );
            }
        }else{
            return array(
                "exists" => false,
                "active" =>false,
            );
        }
    }

}
