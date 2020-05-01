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

    public function findAll(){
        return $this->localNamesRepository->all();
    }

    public function find($id){
        return $this->localNamesRepository->find($id);
    }

    public function create(LocalNamesRequest $request){
        $attributes = $request->validated();
        return $this->localNamesRepository->create($attributes);
    }

    public function update(LocalNamesRequest $request, $id){
        $attributes = $request->validated();
        return $this->localNamesRepository->update($id, $attributes);
    }

    public function delete($id){
        return $this->localNamesRepository->delete($id);
    }

    public function filter(Request $request){
        $attributes = array("request"=>$request);
        return $this->localNamesRepository->filter($attributes);
    }

    public function dataTable(Request $request){
        $attributes = array("request"=>$request);
        return $this->localNamesRepository->datatable($attributes);
    }

}
