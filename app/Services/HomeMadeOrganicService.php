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

    public function findAll(){
        return $this->homeMadeOrganicRepository->all();
    }

    public function find($id){
        return $this->homeMadeOrganicRepository->find($id);
    }

    public function create(HomeMadeOrganicRequest $request){
        $attributes = $request->validated();
        return $this->homeMadeOrganicRepository->create($attributes);
    }

    public function update(HomeMadeOrganicRequest $request, $id){
        $attributes = $request->validated();
        return $this->homeMadeOrganicRepository->update($id, $attributes);
    }

    public function delete($id){
        return $this->homeMadeOrganicRepository->delete($id);
    }

    public function filter(Request $request){
        $attributes = array("request"=>$request);
        return $this->homeMadeOrganicRepository->filter($attributes);
    }

    public function dataTable(Request $request){
        $attributes = array("request"=>$request);
        return $this->homeMadeOrganicRepository->datatable($attributes);
    }

}
