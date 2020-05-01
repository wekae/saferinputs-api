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

    public function findAll(){
        return $this->agrochemRepository->all();
    }

    public function find($id){
        return $this->agrochemRepository->find($id);
    }

    public function create(AgrochemRequest $request){
        $attributes = array("request"=>$request);
        return $this->agrochemRepository->create($attributes);
    }

    public function update(AgrochemRequest $request, $id){
        $attributes = $request->validated();
        return $this->agrochemRepository->update($id, $attributes);
    }

    public function delete($id){
        return $this->agrochemRepository->delete($id);
    }

    public function filter(Request $request){
        $attributes = array("request"=>$request);
        return $this->agrochemRepository->filter($attributes);
    }

    public function dataTable(Request $request){
        $attributes = array("request"=>$request);
        return $this->agrochemRepository->datatable($attributes);
    }

}
