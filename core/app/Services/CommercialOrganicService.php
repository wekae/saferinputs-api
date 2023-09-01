<?php


namespace App\Services;


use App\Http\Requests\CommercialOrganicRequest;
use App\Repositories\CommercialOrganicRepositoryMySqlImpl;
use Illuminate\Http\Request;

class CommercialOrganicService
{
    protected $commercialOrganicRepository;

    public function __construct(CommercialOrganicRepositoryMySqlImpl $commercialOrganicRepository)
    {
        $this->commercialOrganicRepository = $commercialOrganicRepository;
    }

    public function findAll(Request $request){
        $attributes = array("request"=>$request);
        return $this->commercialOrganicRepository->all($attributes);
    }

    public function find($id)
    {
        return $this->commercialOrganicRepository->find($id);
    }
    public function findPestsDiseaseWeed(Request $request){
        $attributes = array("request"=>$request);
        return $this->commercialOrganicRepository->findPestsDiseaseWeed($attributes);
    }
    public function findControlMethods(Request $request){
        $attributes = array("request"=>$request);
        return $this->commercialOrganicRepository->findControlMethods($attributes);
    }
    public function findAgrochemProducts(Request $request){
        $attributes = array("request"=>$request);
        return $this->commercialOrganicRepository->findAgrochemProducts($attributes);
    }
    public function findGap(Request $request){
        $attributes = array("request"=>$request);
        return $this->commercialOrganicRepository->findGap($attributes);
    }
    public function findHomemadeOrganic(Request $request){
        $attributes = array("request"=>$request);
        return $this->commercialOrganicRepository->findHomemadeOrganic($attributes);
    }

    public function getCommercialOrganicNames()
    {
        return $this->commercialOrganicRepository->getCommercialOrganicNames();
    }

    public function create(CommercialOrganicRequest $request){
        $attributes = array("request"=>$request);
        return $this->commercialOrganicRepository->create($attributes);
    }

    public function update(CommercialOrganicRequest $request, $id){
        $attributes = array("request"=>$request);
        return $this->commercialOrganicRepository->update($id, $attributes);
    }

    public function delete($id)
    {
        return $this->commercialOrganicRepository->delete($id);
    }

    public function filter(Request $request){
        $attributes = array("request"=>$request);
        return $this->commercialOrganicRepository->filter($attributes);
    }

    public function summaryCount(Request $request){
        $attributes = array('request'=>$request);
        return $this->commercialOrganicRepository->summaryCount($attributes);
    }
    public function summaryCountPestsDiseaseWeed(Request $request){
        $attributes = array('request'=>$request);
        return $this->commercialOrganicRepository->summaryCountPestsDiseaseWeed($attributes);
    }
    public function summaryCountControlMethods(Request $request){
        $attributes = array('request'=>$request);
        return $this->commercialOrganicRepository->summaryCountControlMethods($attributes);
    }

    public function summaryNames(Request $request){
        $attributes = array('request'=>$request);
        return $this->commercialOrganicRepository->summaryNames($attributes);
    }

    public function dataTable(Request $request){
        $attributes = array("request"=>$request);
        return $this->commercialOrganicRepository->datatable($attributes);
    }
}
