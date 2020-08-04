<?php


namespace App\Services;


use App\Facades\UtilsFacade;
use App\Http\Requests\ActiveIngredientsRequest;
use App\Repositories\ActiveIngredientsRepositoryMySqlImpl;
use Illuminate\Http\Request;

class ActiveIngredientsService
{
    protected $activeIngredientsRepository;

    public function __construct(ActiveIngredientsRepositoryMySqlImpl $activeIngredientsRepository)
    {
        $this->activeIngredientsRepository = $activeIngredientsRepository ;
    }

    public function findAll(Request $request){
        $attributes = array("request"=>$request);
        return $this->activeIngredientsRepository->all($attributes);
    }

    public function find($id){
        return $this->activeIngredientsRepository->find($id);
    }

    public function findAgrochems(Request $request){
        $attributes = array("request"=>$request);
        return $this->activeIngredientsRepository->findAgrochems($attributes);
    }

    public function findCommercialOrganic(Request $request){
        $attributes = array("request"=>$request);
        return $this->activeIngredientsRepository->findCommercialOrganic($attributes);
    }

    public function findHomemadeOrganic(Request $request){
        $attributes = array("request"=>$request);
        return $this->activeIngredientsRepository->findHomemadeOrganic($attributes);
    }

    public function findGap(Request $request){
        $attributes = array("request"=>$request);
        return $this->activeIngredientsRepository->findGap($attributes);
    }

    public function getActiveIngredientNames(){
        return $this->activeIngredientsRepository->getActiveIngredientNames();
    }

    public function create(ActiveIngredientsRequest $request){
        $attributes = array("request"=>$request);
        return $this->activeIngredientsRepository->create($attributes);
    }

    public function update(ActiveIngredientsRequest $request, $id){
        $attributes = array("request"=>$request);
        return $this->activeIngredientsRepository->update($id, $attributes);
    }

    public function delete($id){
        return $this->activeIngredientsRepository->delete($id);
    }

    public function filter(Request $request){
        $attributes = array("request"=>$request);
        return $this->activeIngredientsRepository->filter($attributes);
    }

    public function summaryCount(Request $request){
        $attributes = array('request'=>$request);
        return $this->activeIngredientsRepository->summaryCount($attributes);
    }
    public function summaryCountAgrochem(Request $request){
        $attributes = array('request'=>$request);
        return $this->activeIngredientsRepository->summaryCountAgrochem($attributes);
    }

    public function summaryNames(Request $request){
        $attributes = array('request'=>$request);
        return $this->activeIngredientsRepository->summaryNames($attributes);
    }

    public function dataTable(Request $request){
        $attributes = array("request"=>$request);
        return $this->activeIngredientsRepository->datatable($attributes);
    }
}
