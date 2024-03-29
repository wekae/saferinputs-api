<?php


namespace App\Services;


use App\Http\Requests\AgrochemRequest;
use App\Repositories\AgrochemRepositoryMySqlImpl;
use Illuminate\Http\Request;

class AgrochemService
{
    protected $agrochemRepository;

    public function __construct(AgrochemRepositoryMySqlImpl $agrochemRepository)
    {
        $this->agrochemRepository = $agrochemRepository ;
    }

    public function findAll(Request $request){
        $attributes = array("request"=>$request);
        return $this->agrochemRepository->all($attributes);
    }

    public function find($id){
        return $this->agrochemRepository->find($id);
    }
    public function findCrops($request){
        $attributes = array("request"=>$request);
        return $this->agrochemRepository->findCrops($attributes);
    }
    public function findCommercialOrganic($request){
        $attributes = array("request"=>$request);
        return $this->agrochemRepository->findCommercialOrganic($attributes);
    }
    public function findHomemadeOrganic($request){
        $attributes = array("request"=>$request);
        return $this->agrochemRepository->findHomemadeOrganic($attributes);
    }
    public function findGap($request){
        $attributes = array("request"=>$request);
        return $this->agrochemRepository->findGap($attributes);
    }
    public function findActiveIngredients($request){
        $attributes = array("request"=>$request);
        return $this->agrochemRepository->findActiveIngredients($attributes);
    }
    public function findPestDiseaseWeeds($request){
        $attributes = array("request"=>$request);
        return $this->agrochemRepository->findPestDiseaseWeeds($attributes);
    }

    public function getAgrochemNames(){
        return $this->agrochemRepository->getAgrochemNames();
    }

    public function create(AgrochemRequest $request){
        $attributes = array("request"=>$request);
        return $this->agrochemRepository->create($attributes);
    }

    public function update(AgrochemRequest $request, $id){
        $attributes = array("request"=>$request);
        return $this->agrochemRepository->update($id, $attributes);
    }

    public function delete($id){
        return $this->agrochemRepository->delete($id);
    }

    public function filter(Request $request){
        $attributes = array("request"=>$request);
        return $this->agrochemRepository->filter($attributes);
    }
    public function filterByPestsDiseaseWeed(Request $request){
        $attributes = array("request"=>$request);
        return $this->agrochemRepository->filterByPestsDiseaseWeed($attributes);
    }
    public function filterByActiveIngredients(Request $request){
        $attributes = array("request"=>$request);
        return $this->agrochemRepository->filterByActiveIngredients($attributes);
    }
    public function filterByCrops(Request $request){
        $attributes = array("request"=>$request);
        return $this->agrochemRepository->filterByCrops($attributes);
    }

    public function summaryCount(Request $request){
        $attributes = array('request'=>$request);
        return $this->agrochemRepository->summaryCount($attributes);
    }
    public function summaryCountActiveIngredients(Request $request){
        $attributes = array('request'=>$request);
        return $this->agrochemRepository->summaryCountActiveIngredients($attributes);
    }
    public function summaryCountPestsDiseaseWeed(Request $request){
        $attributes = array('request'=>$request);
        return $this->agrochemRepository->summaryCountPestsDiseaseWeed($attributes);
    }
    public function summaryCountCrops(Request $request){
        $attributes = array('request'=>$request);
        return $this->agrochemRepository->summaryCountCrops($attributes);
    }

    public function summaryNames(Request $request){
        $attributes = array('request'=>$request);
        return $this->agrochemRepository->summaryNames($attributes);
    }
    public function summaryNamesByCrops(Request $request){
        $attributes = array('request'=>$request);
        return $this->agrochemRepository->summaryNamesByCrops($attributes);
    }
    public function summaryNamesByActiveIngredients(Request $request){
        $attributes = array('request'=>$request);
        return $this->agrochemRepository->summaryNamesByActiveIngredients($attributes);
    }
    public function summaryNamesByPestsDiseaseWeed(Request $request){
        $attributes = array('request'=>$request);
        return $this->agrochemRepository->summaryNamesByPestsDiseaseWeed($attributes);
    }

    public function dataTable(Request $request){
        $attributes = array("request"=>$request);
        return $this->agrochemRepository->datatable($attributes);
    }

}
