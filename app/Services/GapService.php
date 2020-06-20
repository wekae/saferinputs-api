<?php


namespace App\Services;


use App\Http\Requests\GapRequest;
use App\Repositories\GapRepositoryMySqlImpl;
use Illuminate\Http\Request;

class GapService
{
    protected $gapRepository;

    public function __construct(GapRepositoryMySqlImpl $gapRepository)
    {
        $this->gapRepository = $gapRepository;
    }

    public function findAll(Request $request)
    {
        $attributes = array("request" => $request);
        return $this->gapRepository->all($attributes);
    }

    public function find($id)
    {
        return $this->gapRepository->find($id);
    }
    public function findPestsDiseaseWeed(Request $request){
        $attributes = array("request"=>$request);
        return $this->gapRepository->findPestsDiseaseWeed($attributes);
    }

    public function getGapNames()
    {
        return $this->gapRepository->getGapNames();
    }

    public function create(GapRequest $request){
        $attributes = array("request"=>$request);
        return $this->gapRepository->create($attributes);
    }

    public function update(GapRequest $request, $id){
        $attributes = array("request"=>$request);
        return $this->gapRepository->update($id, $attributes);
    }

    public function delete($id)
    {
        return $this->gapRepository->delete($id);
    }

    public function filter(Request $request){
        $attributes = array("request"=>$request);
        return $this->gapRepository->filter($attributes);
    }

    public function summaryCount(Request $request){
        $attributes = array('request'=>$request);
        return $this->gapRepository->summaryCount($attributes);
    }
    public function summaryCountPestsDiseaseWeed(Request $request){
        $attributes = array('request'=>$request);
        return $this->gapRepository->summaryCountPestsDiseaseWeed($attributes);
    }

    public function summaryNames(Request $request){
        $attributes = array('request'=>$request);
        return $this->gapRepository->summaryNames($attributes);
    }

    public function dataTable(Request $request){
        $attributes = array("request"=>$request);
        return $this->gapRepository->datatable($attributes);
    }
}
