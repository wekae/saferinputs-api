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

    public function findAll(){
        return $this->pestsDiseaseWeedRepository->all();
    }

    public function find($id){
        return $this->pestsDiseaseWeedRepository->find($id);
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
        $attributes = array("request"=>$request);
        return $this->pestsDiseaseWeedRepository->filter($attributes);
    }

    public function dataTable(Request $request){
        $attributes = array("request"=>$request);
        return $this->pestsDiseaseWeedRepository->datatable($attributes);
    }
}
