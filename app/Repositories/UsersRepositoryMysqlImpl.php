<?php


namespace App\Repositories;


use App\Models\Users\KoanUsers;
use App\Models\Users\ThirdPartyUsers;
use App\User;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UsersRepositoryMysqlImpl implements UsersRepository
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

    public function getUser(array $attributes){
        $request = $attributes["request"];
        $koan_user_id = $request->koan_user_id;
        // Determine if request is from an authenticated request
        if(Auth::check()){
            // Check if details to be requested are of the currently authenticated user
            if(Auth::user()->koan_users_id !== $koan_user_id){
                // Deny access if user is not Super Admin
                if(Auth::user()->access_level > 1){
                    $returnData = array(
                        "success" => false,
                        "message" => "You have insufficient privileges to perfom this operation"
                    );

                    return $returnData;
                }
            }



            $user = User::where('koan_users_id',$koan_user_id)->first();
            if($user){
                $returnData = array(
                    "success" => true,
                    "data" => $user
                );
                return $returnData;
            }else{
                $returnData = array(
                    "success" => false,
                    "message" => "User not found"
                );
                return $returnData;
            }
        }else{

            $return_data =array(
                'success' => false,
                'message' => 'Not Authenticated',
                'authenticated' => false,
            );

            return $return_data;
        }
    }

    public function getKoanUser(array $attributes){
        $request = $attributes["request"];
        $koan_user_id = $request->koan_user_id;
        // Determine if request is from an authenticated request
        if(Auth::check()){
            // Check if details to be requested are of the currently authenticated user
            if(Auth::user()->koan_users_id !== $koan_user_id){
                // Deny access if user is not Super Admin
                if(Auth::user()->access_level > 1){
                    $returnData = array(
                        "success" => false,
                        "message" => "You have insufficient privileges to perfom this operation"
                    );

                    return $returnData;
                }
            }



            $user = KoanUsers::where('id',$koan_user_id)->first();
            if($user){
                $returnData = array(
                    "success" => true,
                    "data" => $user
                );
                return $returnData;
            }else{
                $returnData = array(
                    "success" => false,
                    "message" => "User not found"
                );
                return $returnData;
            }
        }else{

            $return_data =array(
                'success' => false,
                'message' => 'Not Authenticated',
                'authenticated' => false,
            );

            return $return_data;
        }
    }

    public function changeAccessLevel(array $attributes){
        if(Auth::check()){
            if(Auth::user()->access_level > 1){
                $returnData = array(
                    "success" => false,
                    "message" => "You have insufficient privileges to perfom this operation"
                );

                return $returnData;
            }

            $request = $attributes["request"];
            $koan_user_id = $request->koan_user_id;


            $user = User::where('koan_users_id',$koan_user_id)->first();
            if($user){
                $returnData = array(
                    "success" => true,
                    "data" => $user
                );
                return $returnData;
            }else{
                $returnData = array(
                    "success" => false,
                    "message" => "User not found"
                );
                return $returnData;
            }
        }else{

            $return_data =array(
                'success' => false,
                'message' => 'Not Authenticated',
                'authenticated' => false,
            );

            return $return_data;
        }
    }

    public function changePassword(array $attributes){
        $request = $attributes["request"];
        $koan_user_id = $request->koan_user_id;
        if(Auth::check()){
            // Check if details to be requested are of the currently authenticated user
            if(Auth::user()->koan_users_id !== $koan_user_id){
                // Deny access if user is not Super Admin
                if(Auth::user()->access_level > 1){
                    $returnData = array(
                        "success" => false,
                        "message" => "You have insufficient privileges to perfom this operation"
                    );

                    return $returnData;
                }
            }



            $user = User::where('id',Auth::user()->id)
                ->where('email',Auth::user()->email)
                ->where('koan_users_id',$koan_user_id)
                ->first();
            if($user){
                $returnData = array(
                    "success" => true,
                    "data" => $user
                );
                return $returnData;
            }else{
                $returnData = array(
                    "success" => false,
                    "message" => "User not found"
                );
                return $returnData;
            }
        }else{

            $return_data =array(
                'success' => false,
                'message' => 'Not Authenticated',
                'authenticated' => false,
            );

            return $return_data;
        }
    }

    public function updateUser(array $attributes){
        $request = $attributes["request"];
        $koan_user_id = $request->koan_user_id;
        if(Auth::check()){
            // Check if details to be requested are of the currently authenticated user
            if(Auth::user()->koan_users_id !== $koan_user_id){
                // Deny access if user is not Super Admin
                if(Auth::user()->access_level > 1){
                    $returnData = array(
                        "success" => false,
                        "message" => "You have insufficient privileges to perfom this operation"
                    );

                    return $returnData;
                }
            }



            try{
                $request = $attributes['request'];

                $validatedData = $request->validate([
                    'first_name' => 'required|max:255',
                    'last_name' => 'required|max:255',
                ]);

                $userData = array(
                    "name" => $validatedData['first_name']." ".$validatedData['last_name'],
                );

                $koanUserData = array(
                    "first_name" => $validatedData['first_name'],
                    "last_name" => $validatedData['last_name']
                );


                // Create user record
                $koanUser = $this->koanUser->where('id', $koan_user_id)->first();
                if($koanUser){
                    $koanUser->update($koanUserData);
                    $koanUser->refresh();

                    $user = $this->user->where('koan_users_id', $koan_user_id)->first();
                    if($user){
                        $user->update($userData);
                        $user->refresh();
                    }

                    $return_data =array(
                        'success' => true,
                        'user' => $user,
                        'koan_user' => $koanUser
                    );
                    return $return_data;
                }else{
                    $return_data =array(
                        'success' => false,
                        'not_found' => true,
                    );

                    return $return_data;
                }


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
        }else{

            $return_data =array(
                'success' => false,
                'message' => 'Not Authenticated',
                'authenticated' => false,
            );

            return $return_data;
        }

    }

    public function updateAccessLevel(array $attributes){
        if(Auth::check()){
            if(Auth::user()->access_level > 1){
                $returnData = array(
                    "success" => false,
                    "message" => "You have insufficient privileges to perfom this operation"
                );

                return $returnData;
            }

            $request = $attributes["request"];
            $koan_user_id = $request->koan_user_id;


            try{
                $request = $attributes['request'];

                $validatedData = $request->validate([
                    'access_level' => 'required|integer',
                ]);


                // Update user record
                $user = $this->user->where('koan_users_id', $koan_user_id)->first();
                if($user){
                    $user->update($validatedData);
                    $user->refresh();

                    $return_data =array(
                        'success' => true,
                        'user' => $user,
                    );
                    return $return_data;
                }else{
                    $return_data =array(
                        'success' => false,
                        'not_found' => true,
                    );

                    return $return_data;
                }


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
        }else{

            $return_data =array(
                'success' => false,
                'message' => 'Not Authenticated',
                'authenticated' => false,
            );

            return $return_data;
        }

    }

    public function updatePassword(array $attributes){
        $request = $attributes["request"];
        $koan_user_id = $request->koan_user_id;
        if(Auth::check()){
            // Check if details to be requested are of the currently authenticated user
            if(Auth::user()->koan_users_id !== $koan_user_id){
                // Deny access if user is not Super Admin
                if(Auth::user()->access_level > 1){
                    $returnData = array(
                        "success" => false,
                        "message" => "You have insufficient privileges to perfom this operation"
                    );

                    return $returnData;
                }
            }



            try{

                $validatedData = $request->validate([
                    'old_password' => 'required',
                    'password' => 'required|confirmed',
                ]);

//                $validatedData['old_password'] = bcrypt($request->old_password);
                $validatedData['password'] = bcrypt($request->password);

                $userData = array(
                    "password" => $validatedData['password'],
                );


                // Update user record
                $user = $this->user
                    ->where('koan_users_id', $koan_user_id)
                    ->where('id', Auth::user()->id)
                    ->where('email', Auth::user()->email)
                    ->first();

                // Check if old password provided matches password in the database
                if($user && Hash::check($validatedData['old_password'], $user->getAuthPassword())){
                    $user->update($userData);
                    $user->refresh();

                    // Prevent automatic logout on password change
                    Auth::login($user);

                    $return_data =array(
                        'success' => true,
                        'user' => $user,
                    );
                    return $return_data;
                }else{
                    $return_data =array(
                        'success' => false,
                        'not_found' => true,
                    );

                    return $return_data;
                }


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
        }else{

            $return_data =array(
                'success' => false,
                'message' => 'Not Authenticated',
                'authenticated' => false,
            );

            return $return_data;
        }

    }

    public function deactivateAccount(array $attributes){
        if(Auth::check()){
            if(Auth::user()->access_level > 1){
                $returnData = array(
                    "success" => false,
                    "message" => "You have insufficient privileges to perfom this operation"
                );

                return $returnData;
            }

            $request = $attributes["request"];
            $koan_user_id = $request->koan_user_id;


            try{

                $userData = array(
                    'active' => 0,
                );


                // Update user record
                $user = $this->user->where('koan_users_id', $koan_user_id)->first();
                if($user){
                    $user->update($userData);
                    $user->refresh();

                    $return_data =array(
                        'success' => true,
                        'user' => $user,
                    );
                    return $return_data;
                }else{
                    $return_data =array(
                        'success' => false,
                        'not_found' => true,
                    );

                    return $return_data;
                }


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
        }else{

            $return_data =array(
                'success' => false,
                'message' => 'Not Authenticated',
                'authenticated' => false,
            );

            return $return_data;
        }

    }

    public function activateAccount(array $attributes){
        if(Auth::check()){
            if(Auth::user()->access_level > 1){
                $returnData = array(
                    "success" => false,
                    "message" => "You have insufficient privileges to perfom this operation"
                );

                return $returnData;
            }

            $request = $attributes["request"];
            $koan_user_id = $request->koan_user_id;


            try{

                $userData = array(
                    'active' => 1,
                );


                // Update user record
                $user = $this->user->where('koan_users_id', $koan_user_id)->first();
                if($user){
                    $user->update($userData);
                    $user->refresh();

                    $return_data =array(
                        'success' => true,
                        'user' => $user,
                    );
                    return $return_data;
                }else{
                    $return_data =array(
                        'success' => false,
                        'not_found' => true,
                    );

                    return $return_data;
                }


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
        }else{

            $return_data =array(
                'success' => false,
                'message' => 'Not Authenticated',
                'authenticated' => false,
            );

            return $return_data;
        }

    }

    public function deleteAccount(array $attributes){
        if(Auth::check()){
            if(Auth::user()->access_level > 1){
                $returnData = array(
                    "success" => false,
                    "message" => "You have insufficient privileges to perfom this operation"
                );

                return $returnData;
            }

            $request = $attributes["request"];
            $koan_user_id = $request->koan_user_id;
            $delete_type = $request->delete_type;


            try{

                if($delete_type === "soft"){
                    /**
                     * Perform soft delete
                     */


                    // Update user record
                    $user = $this->user->where('koan_users_id', $koan_user_id)->first();
                    if($user){
                        $koan_user = $this->koanUser->where('id', $koan_user_id)->first();

                        $koan_user->delete();
                        $user->delete();

                        $return_data =array(
                            'success' => true,
                            'message' => "Soft Delete Succesful",
                        );
                        return $return_data;
                    }else{
                        $return_data =array(
                            'success' => false,
                            'not_found' => true,
                        );

                        return $return_data;
                    }

                }elseif ($delete_type === "permanent"){

                    /**
                     * Perform permanent delete
                     */

                    // Update user record
                    $user = $this->user->where('koan_users_id', $koan_user_id)->first();
                    if($user){
                        $koan_user = $this->koanUser->where('id', $koan_user_id)->first();

                        $koan_user->forceDelete();
                        $user->forceDelete();


                        $return_data =array(
                            'success' => true,
                            'message' => "Permanent delete succesful",
                        );
                        return $return_data;
                    }else{
                        $return_data =array(
                            'success' => false,
                            'not_found' => true,
                        );

                        return $return_data;
                    }

                }else{

                    /**
                     * Failsafe
                     */
                    $return_data =array(
                        'success' => false,
                        'message' => "Delete option not selected.",
                    );
                    return $return_data;

                }


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
        }else{

            $return_data =array(
                'success' => false,
                'message' => 'Not Authenticated',
                'authenticated' => false,
            );

            return $return_data;
        }

    }

    public function getCountActiveUserAccounts(){
        $total = User::where('active',1)
            ->whereNotNull('email_verified_at')
            ->count();
        return $total;
    }
    public function getCountAccountsPendingVerification(){
        $total = User::where('active',0)
            ->where('activation_token','!=',"")
            ->whereNull('email_verified_at')
            ->count();
        return $total;
    }
    public function getCountDeactivatedAccounts(){
        $total = User::where('active',0)
            ->where('activation_token',"")
            ->whereNotNull('email_verified_at')
            ->count();
        return $total;
    }


    public function datatable(array $attributes)
    {
        $request = $attributes["request"];


        (int)$draw = $request->draw;
        $start = $request->start;
        $length = $request->length;
        $search_value = $request->search["value"];
        $order_array = $request->order;
        $columns_array = $request->columns;

//        Initial Query  with fields to be selected
        $data = User::select(
            'id',
            'name',
            'email',
            'type',
            'access_level',
            'active',
            'koan_users_id'
        );
        $recordsFiltered = User::count();


//        Filter data based on the search query
        if($search_value){
//            create an AND with nested OR clause
            $data = $data->where(function($query) use($columns_array, $search_value){
//                append each table column to the query
                foreach ($columns_array as $column){
                    $query->orWhere($column['data'],'like','%'.$search_value.'%');
                }

            });
            $recordsFiltered = $data->count();
        }


//        Set ordering
        if($order_array){
            foreach ($order_array as $order){
                $column_index = $order['column'];

                $order_column = $columns_array[$column_index]['data'];
                $order_direction = $order["dir"];

                $data = $data->orderBy($order_column, $order_direction);
            }
        }


//        Set limit and offset for pagination
        if($start){
            $data = $data
                ->skip($start);
        }
        if($length){
            $data = $data
                ->take($length);
        }

        $data = $data->get();

        $recordsTotal = User::count();



        return ['draw'=>$draw, 'recordsTotal'=>$recordsTotal, 'recordsFiltered'=>$recordsFiltered, 'data'=>$data];


    }
}
