<?php


namespace App\Services;


use App\Http\Requests\PestsDiseaseWeedRequest;
use App\Models\PestsDiseaseWeed;
use App\Repositories\PestsDiseaseWeedRepositoryMySqlImpl;
use Illuminate\Http\Request;

class PestsDiseaseWeedService
{
    protected $pestsDiseaseWeedRepository;

    public function __construct(PestsDiseaseWeedRepositoryMySqlImpl $pestsDiseaseWeedRepository)
    {
        $this->pestsDiseaseWeedRepository = $pestsDiseaseWeedRepository ;
    }

    public function findAll(Request $request){
        $attributes = array("request"=>$request);
        return $this->pestsDiseaseWeedRepository->all($attributes);
    }

    public function find($id){
        return $this->pestsDiseaseWeedRepository->find($id);
    }

    public function findAgrochems(Request $request){
        $attributes = array("request"=>$request);
        return $this->pestsDiseaseWeedRepository->findAgrochems($attributes);
    }
    public function findCommercialOrganic(Request $request){
        $attributes = array("request"=>$request);
        return $this->pestsDiseaseWeedRepository->findCommercialOrganic($attributes);
    }
    public function findControlMethods(Request $request){
        $attributes = array("request"=>$request);
        return $this->pestsDiseaseWeedRepository->findControlMethods($attributes);
    }
    public function findCrops(Request $request){
        $attributes = array("request"=>$request);
        return $this->pestsDiseaseWeedRepository->findCrops($attributes);
    }
    public function findGap(Request $request){
        $attributes = array("request"=>$request);
        return $this->pestsDiseaseWeedRepository->findGap($attributes);
    }
    public function findHomemadeOrganic(Request $request){
        $attributes = array("request"=>$request);
        return $this->pestsDiseaseWeedRepository->findHomemadeOrganic($attributes);
    }
    public function findLocalNames(Request $request){
        $attributes = array("request"=>$request);
        return $this->pestsDiseaseWeedRepository->findLocalNames($attributes);
    }


    public function getPestDiseasesWeedsNames(){
        return $this->pestsDiseaseWeedRepository->getPestDiseasesWeedsNames();
    }

    public function create(PestsDiseaseWeedRequest $request){
        $attributes = array("request"=>$request);
        return $this->pestsDiseaseWeedRepository->create($attributes);
    }

    public function update(PestsDiseaseWeedRequest $request, $id){
        $attributes = array("request"=>$request);
        return $this->pestsDiseaseWeedRepository->update($id, $attributes);
    }

    public function delete($id){
        return $this->pestsDiseaseWeedRepository->delete($id);
    }

    public function filter(Request $request){
        $attributes = array('request'=>$request);
        return $this->pestsDiseaseWeedRepository->filter($attributes);
    }

    public function summaryCount(Request $request){
        $attributes = array('request'=>$request);
        return $this->pestsDiseaseWeedRepository->summaryCount($attributes);
    }

    public function summaryNames(Request $request){
        $attributes = array('request'=>$request);
        return $this->pestsDiseaseWeedRepository->summaryNames($attributes);
    }
    public function summaryCountAgrochem(Request $request){
        $attributes = array('request'=>$request);
        return $this->pestsDiseaseWeedRepository->summaryCountAgrochem($attributes);
    }
    public function summaryCountCommercialOrganic(Request $request){
        $attributes = array('request'=>$request);
        return $this->pestsDiseaseWeedRepository->summaryCountCommercialOrganic($attributes);
    }
    public function summaryCountControlMethods(Request $request){
        $attributes = array('request'=>$request);
        return $this->pestsDiseaseWeedRepository->summaryCountControlMethods($attributes);
    }
    public function summaryCountCrops(Request $request){
        $attributes = array('request'=>$request);
        return $this->pestsDiseaseWeedRepository->summaryCountCrops($attributes);
    }
    public function summaryCountGap(Request $request){
        $attributes = array('request'=>$request);
        return $this->pestsDiseaseWeedRepository->summaryCountGap($attributes);
    }
    public function summaryCountHomemadeOrganic(Request $request){
        $attributes = array('request'=>$request);
        return $this->pestsDiseaseWeedRepository->summaryCountHomemadeOrganic($attributes);
    }
    public function summaryCountLocalNames(Request $request){
        $attributes = array('request'=>$request);
        return $this->pestsDiseaseWeedRepository->summaryCountLocalNames($attributes);
    }

    public function dataTable(Request $request){
        $attributes = array("request"=>$request);
        return $this->pestsDiseaseWeedRepository->datatable($attributes);
    }
}
