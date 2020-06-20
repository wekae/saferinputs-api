<?php


namespace App\Services;


use App\Http\Requests\HomeMadeOrganicRequest;
use App\Repositories\HomeMadeOrganicRepositoryMySqlImpl;
use Illuminate\Http\Request;

class HomeMadeOrganicService
{
    protected $homeMadeOrganicRepository;

    public function __construct(HomeMadeOrganicRepositoryMySqlImpl $homeMadeOrganicRepository)
    {
        $this->homeMadeOrganicRepository = $homeMadeOrganicRepository ;
    }

    public function findAll(Request $request){
        $attributes = array("request"=>$request);
        return $this->homeMadeOrganicRepository->all($attributes);
    }

    public function find($id){
        return $this->homeMadeOrganicRepository->find($id);
    }
    public function findPestsDiseaseWeed($request){
        $attributes = array("request"=>$request);
        return $this->homeMadeOrganicRepository->findPestsDiseaseWeed($attributes);
    }

    public function getHomemadeOrganicNames(){
        return $this->homeMadeOrganicRepository->getHomemadeOrganicNames();
    }

    public function create(HomeMadeOrganicRequest $request){
        $attributes = array("request"=>$request);
        return $this->homeMadeOrganicRepository->create($attributes);
    }

    public function update(HomeMadeOrganicRequest $request, $id){
        $attributes = array("request"=>$request);
        return $this->homeMadeOrganicRepository->update($id, $attributes);
    }

    public function delete($id){
        return $this->homeMadeOrganicRepository->delete($id);
    }

    public function filter(Request $request){
        $attributes = array("request"=>$request);
        return $this->homeMadeOrganicRepository->filter($attributes);
    }

    public function summaryCount(Request $request){
        $attributes = array('request'=>$request);
        return $this->homeMadeOrganicRepository->summaryCount($attributes);
    }
    public function summaryCountPestsDiseaseWeed(Request $request){
        $attributes = array('request'=>$request);
        return $this->homeMadeOrganicRepository->summaryCountPestsDiseaseWeed($attributes);
    }

    public function summaryNames(Request $request){
        $attributes = array('request'=>$request);
        return $this->homeMadeOrganicRepository->summaryNames($attributes);
    }

    public function dataTable(Request $request){
        $attributes = array("request"=>$request);
        return $this->homeMadeOrganicRepository->datatable($attributes);
    }

}
