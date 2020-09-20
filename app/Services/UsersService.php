<?php


namespace App\Services;


use App\Models\Users\KoanUsers;
use App\Notifications\AccessLevelChanged;
use App\Notifications\AccountActivated;
use App\Notifications\AccountDeactivated;
use App\Notifications\PasswordChanged;
use App\Repositories\AuthRepositoryMysqlImpl;
use App\Repositories\UsersRepositoryMysqlImpl;
use Illuminate\Http\Request;

class UsersService
{
    private $usersRepository;
    private $authRepository;

    public function __construct(AuthRepositoryMysqlImpl $authRepository, UsersRepositoryMysqlImpl $usersRepository)
    {
        $this->authRepository = $authRepository;
        $this->usersRepository = $usersRepository;
    }

    public function getUser(Request $request){
        $attributes = array("request"=>$request);
        return $this->usersRepository->getUser($attributes);
    }

    public function getUsersSummary(){
        $activeUserAccounts = $this->usersRepository->getCountActiveUserAccounts();
        $accountsPendingVerification = $this->usersRepository->getCountAccountsPendingVerification();
        $deactivatedAccounts = $this->usersRepository->getCountDeactivatedAccounts();

        $data = array(
            "active_user_accounts" => $activeUserAccounts,
            "accounts_pending_verification" => $accountsPendingVerification,
            "deactivated_accounts" => $deactivatedAccounts
        );
        return $data;
    }

    public function getKoanUser(Request $request){
        $attributes = array("request"=>$request);
        return $this->usersRepository->getKoanUser($attributes);
    }

    public function changeAccessLevel(Request $request){
        $attributes = array("request"=>$request);
        return $this->usersRepository->changeAccessLevel($attributes);
    }

    public function changePassword(Request $request){
        $attributes = array("request"=>$request);
        return $this->usersRepository->changePassword($attributes);
    }

    public function updateUser(Request $request){
        $attributes = array("request"=>$request);
        return $this->usersRepository->updateUser($attributes);
    }

    public function updateAccessLevel(Request $request){
        $attributes = array("request"=>$request);
        $returnData = $this->usersRepository->updateAccessLevel($attributes);
        if($returnData["success"]){
            // Notify user via email of password change
            //TODO Reactivate On Deployment
            $returnData['user']->notify(new AccessLevelChanged($returnData['user']));
        }
        return $returnData;
    }

    public function updatePassword(Request $request){
        $attributes = array("request"=>$request);
        $returnData =  $this->usersRepository->updatePassword($attributes);
        if($returnData["success"]){
            // Notify user via email of password change
            //TODO Reactivate On Deployment
//            $returnData['user']->notify(new PasswordChanged($returnData['user']));
        }
        return $returnData;
    }

    public function deactivateAccount(Request $request){
        $attributes = array("request"=>$request);
        $returnData = $this->usersRepository->deactivateAccount($attributes);
        if($returnData["success"]){
            // Notify user via email of password change
            //TODO Reactivate On Deployment
//            $returnData['user']->notify(new AccountDeactivated($returnData['user']));
        }
        return $returnData;
    }

    public function activateAccount(Request $request){
        $attributes = array("request"=>$request);
        $returnData = $this->usersRepository->activateAccount($attributes);
        if($returnData["success"]){
            // Notify user via email of password change
            //TODO Reactivate On Deployment
//            $returnData['user']->notify(new AccountActivated($returnData['user']));
        }
        return $returnData;
    }



    public function deleteAccount(Request $request){
        $attributes = array("request"=>$request);
        $returnData = $this->usersRepository->deleteAccount($attributes);
        if($returnData["success"]){
            // Notify user via email of password change
            //TODO Reactivate On Deployment
//            $returnData['user']->notify(new AccountDeactivated($returnData['user']));
        }
        return $returnData;
    }



    public function datatable(Request $request){
        $attributes = array("request"=>$request);
        return $this->usersRepository->datatable($attributes);
    }
}
