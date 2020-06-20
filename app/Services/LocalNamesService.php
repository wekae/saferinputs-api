<?php


namespace App\Services;


use App\Http\Requests\LocalNamesRequest;
use App\Repositories\LocalNamesRepositoryMySqlImpl;
use Illuminate\Http\Request;

class LocalNamesService
{
    protected $localNamesRepository;

    public function __construct(LocalNamesRepositoryMySqlImpl $localNamesRepository)
    {
        $this->localNamesRepository = $localNamesRepository ;
    }

    public function findAll(Request $request){
        $attributes = array("request"=>$request);
        return $this->localNamesRepository->all($attributes);
    }

    public function find($id){
        return $this->localNamesRepository->find($id);
    }

    public function findPestsDiseaseWeed(Request $request){
        $attributes = array("request"=>$request);
        return $this->localNamesRepository->findPestsDiseaseWeed($attributes);
    }

    public function getLocalNameNames(){
        return $this->localNamesRepository->getLocalNameNames();
    }

    public function create(LocalNamesRequest $request){
        $attributes = array("request"=>$request);
        return $this->localNamesRepository->create($attributes);
    }

    public function update(LocalNamesRequest $request, $id){
        $attributes = array("request"=>$request);
        return $this->localNamesRepository->update($id, $attributes);
    }

    public function delete($id){
        return $this->localNamesRepository->delete($id);
    }

    public function filter(Request $request){
        $attributes = array("request"=>$request);
        return $this->localNamesRepository->filter($attributes);
    }

    public function summaryCount(Request $request){
        $attributes = array('request'=>$request);
        return $this->localNamesRepository->summaryCount($attributes);
    }
    public function summaryCountPestsDiseaseWeed(Request $request){
        $attributes = array('request'=>$request);
        return $this->localNamesRepository->summaryCountPestsDiseaseWeed($attributes);
    }

    public function summaryNames(Request $request){
        $attributes = array('request'=>$request);
        return $this->localNamesRepository->summaryNames($attributes);
    }

    public function dataTable(Request $request){
        $attributes = array("request"=>$request);
        return $this->localNamesRepository->datatable($attributes);
    }

}
