<?php


namespace App\Services;


use App\Http\Requests\ControlMethodsRequest;
use App\Repositories\ControlMethodsRepositoryMySqlImpl;
use Illuminate\Http\Request;

class ControlMethodsService
{
    protected $controlMethodsRepository;

    public function __construct(ControlMethodsRepositoryMySqlImpl $controlMethodsRepository)
    {
        $this->controlMethodsRepository = $controlMethodsRepository;
    }

    public function findAll(Request $request){
        $attributes = array("request"=>$request);
        return $this->controlMethodsRepository->all($attributes);
    }

    public function find($id)
    {
        return $this->controlMethodsRepository->find($id);
    }
    public function findPestsDiseasesWeeds($request){
        $attributes = array("request"=>$request);
        return $this->controlMethodsRepository->findPestsDiseasesWeeds($attributes);
    }
    public function findCommercialOrganic($request){
        $attributes = array("request"=>$request);
        return $this->controlMethodsRepository->findCommercialOrganic($attributes);
    }

    public function getControlMethodNames(){
        return $this->controlMethodsRepository->getControlMethodNames();
    }

    public function create(ControlMethodsRequest $request){
        $attributes = array("request"=>$request);
        return $this->controlMethodsRepository->create($attributes);
    }

    public function update(ControlMethodsRequest $request, $id){
        $attributes = array("request"=>$request);
        return $this->controlMethodsRepository->update($id, $attributes);
    }

    public function delete($id)
    {
        return $this->controlMethodsRepository->delete($id);
    }

    public function filter(Request $request){
        $attributes = array("request"=>$request);
        return $this->controlMethodsRepository->filter($attributes);
    }

    public function summaryCount(Request $request){
        $attributes = array('request'=>$request);
        return $this->controlMethodsRepository->summaryCount($attributes);
    }
    public function summaryCountPestsDiseasesWeeds(Request $request){
        $attributes = array('request'=>$request);
        return $this->controlMethodsRepository->summaryCountPestsDiseasesWeeds($attributes);
    }
    public function summaryCountCommercialOrganic(Request $request){
        $attributes = array('request'=>$request);
        return $this->controlMethodsRepository->summaryCountCommercialOrganic($attributes);
    }

    public function summaryNames(Request $request){
        $attributes = array('request'=>$request);
        return $this->controlMethodsRepository->summaryNames($attributes);
    }

    public function dataTable(Request $request){
        $attributes = array("request"=>$request);
        return $this->controlMethodsRepository->datatable($attributes);
    }
}
