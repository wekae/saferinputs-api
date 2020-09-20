<?php


namespace App\Repositories;


use App\Models\Users\KoanUsers;
use App\Models\Users\ThirdPartyUsers;
use App\Notifications\SignupActivate;
use App\User;
use Carbon\Carbon;
use Illuminate\Database\QueryException;

class AuthRepositoryMysqlImpl implements AuthRepository
{
    private $user;
    private $koanUser;
    private $thirdPartyUser;
    public function __construct(User $user, KoanUsers $koanUser, ThirdPartyUsers $thirdPartyUser)
    {
        $this->user = $user;
        $this->koanUser = $koanUser;
        $this->thirdPartyUser = $thirdPartyUser;
    }

    public function create(array $attributes)
    {
        // TODO: Implement create() method.
    }

    public function all(array $attributes)
    {
        // TODO: Implement all() method.
    }

    public function createKoanUser(array $attributes)
    {
        try{
            $request = $attributes['request'];

            $validatedData = $request->validate([
                'first_name' => 'required|max:255',
                'last_name' => 'required|max:255',
                'email' => 'email|required|unique:users',
                'password' => 'required|confirmed',
                'access_level' => 'required|integer',
            ]);


            $validatedData['password'] = bcrypt($request->password);

            $userData = array(
                "name" => $validatedData['first_name']." ".$validatedData['last_name'],
                "email" => $validatedData['email'],
                "password" => $validatedData['password'],
                "type" => "koan_user",
                "access_level" => $validatedData['access_level'],
                "activation_token" => str_random(60)
            );

            $koanUserData = array(
                "first_name" => $validatedData['first_name'],
                "last_name" => $validatedData['last_name'],
                "email" => $validatedData['email']
            );


            // Create user record
            $createdUser = $this->user->create($userData);
            $createdUser->refresh();

            // Create KOAN user record
            $createdKoanUser = $this->koanUser->create($koanUserData);
            // Update KOAN user record to include user id
            $createdKoanUser->user()->save($createdUser);
            $createdKoanUser->save();
            $createdKoanUser->refresh();


            $return_data =array(
                'success' => true,
                'user' => $createdUser,
                'koan_user' => $createdKoanUser
            );

            return $return_data;

        }catch (QueryException $e) {
            $error_code = $e->errorInfo[1];
            //Determine duplicate key using error code
            if ($error_code == 1062) {
                $return_data = array(
                    'success'=>false,
                    'duplicate'=>true);
                return $return_data;
            }else{
                $return_data = array(
                    'success' => false
                );
                return $return_data;
            }
        }
    }

    public function createThirdPartyUser(array $attributes)
    {
        try{
            $request = $attributes['request'];

            $validatedData = $request->validate([
                'name' => 'required|max:255',
                'organization' => 'required|max:255',
                'phone' => 'alpha_dash|required',
                'email' => 'email|required|unique:users',
                'password' => 'required|confirmed'
            ]);


            $validatedData['password'] = bcrypt($request->password);

            $userData = array(
                "name" => $validatedData['name'],
                "email" => $validatedData['email'],
                "password" => $validatedData['password'],
                "type" => "third_party_user",
                'access_level' => 20,
                "activation_token" => str_random(60)
            );

            $thirdPartyUserData = array(
                "name" => $validatedData['name'],
                "organization" => $validatedData['organization'],
                "phone" => $validatedData['phone'],
                "email" => $validatedData['email']
            );


            // Create user record
            $createdUser = $this->user->create($userData);
            $createdUser->refresh();

            // Create third party user record
            $createdThirdPartyUserData = $this->thirdPartyUser->create($thirdPartyUserData);
            // Update third party user record to include user id
            $createdThirdPartyUserData->user()->save($createdUser);
            $createdThirdPartyUserData->save();
            $createdThirdPartyUserData->refresh();


            $return_data =array(
                'success' => true,
                'user' => $createdUser,
                'third_party_user' => $createdThirdPartyUserData
            );

            return $return_data;

        }catch (QueryException $e) {
            $error_code = $e->errorInfo[1];
            //Determine duplicate key using error code
            if ($error_code == 1062) {
                $return_data = array(
                    'success'=>false,
                    'duplicate'=>true);
                return $return_data;
            }else{
                $return_data = array(
                    'success' => false
                );
                return $return_data;
            }
        }
    }

    public function find($id)
    {
        return $this->user->find($id);
    }

    public function update($id, array $attributes)
    {

        $request = $attributes['request'];

        $item = $this->user->find($id);
        if($item){
            $validatedData = $request->validate([
                'name' => 'required|max:55',
                'email' => 'email|required|unique:users'
            ]);
            $this->user->find($id)->update($request->only($validatedData));

            return $item->refresh();
        }else{
            return false;
        }
    }

    public function updatePassword($id, array $attributes)
    {

        $request = $attributes['request'];

        $item = $this->user->find($id);
        if($item){
            $validatedData = $request->validate([
                'password' => 'required|confirmed'
            ]);
            $this->user->find($id)->update($request->only($validatedData));

            return $item->refresh();
        }else{
            return false;
        }
    }

    public function signupActivate(array $attributes){

        $request = $attributes["request"];

        $token = $request->token;

        $user = User::where('activation_token', $token)->first();

        if(!$user){
            return array(
                "success" => false
            );
        }else{
            $user->active = true;
            $user->activation_token = '';
            $user->email_verified_at=Carbon::now()->toDateTimeString();
            $user->save();
            $user->refresh();

            return array(
                "success" => true,
                "data" => $user
            );
        }
    }

    public function delete($id)
    {
        $item = $this->user->find($id);
        if($item){
            $item->delete();
            return true;
        }else{
            return false;
        }
    }
}
