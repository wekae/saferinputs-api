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

    public function findAll()
    {
        return $this->commercialOrganicRepository->all();
    }

    public function find($id)
    {
        return $this->commercialOrganicRepository->find($id);
    }

    public function create(CommercialOrganicRequest $request)
    {
        $attributes = $request->validated();
        return $this->commercialOrganicRepository->create($attributes);
    }

    public function update(CommercialOrganicRequest $request, $id)
    {
        $attributes = $request->validated();
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

    public function dataTable(Request $request){
        $attributes = array("request"=>$request);
        return $this->commercialOrganicRepository->datatable($attributes);
    }
}
