<?php


namespace App\Services;


use App\Http\Requests\ActiveIngredientsRequest;
use App\Repositories\ActiveIngredientsRepositoryMySqlImpl;
use Illuminate\Http\Request;

class ActiveIngredientsService
{
    protected $activeIngredientsRepository;

    public function __construct(ActiveIngredientsRepositoryMySqlImpl $activeIngredientsRepository)
    {
        $this->activeIngredientsRepository = $activeIngredientsRepository ;
    }

    public function findAll(){
        return $this->activeIngredientsRepository->all();
    }

    public function find($id){
        return $this->activeIngredientsRepository->find($id);
    }

    public function create(ActiveIngredientsRequest $request){
        $attributes = $request->validated();
        return $this->activeIngredientsRepository->create($attributes);
    }

    public function update(ActiveIngredientsRequest $request, $id){
        $attributes = $request->validated();
        return $this->activeIngredientsRepository->update($id, $attributes);
    }

    public function delete($id){
        return $this->activeIngredientsRepository->delete($id);
    }

    public function filter(Request $request){
        $attributes = array("request"=>$request);
        return $this->activeIngredientsRepository->filter($attributes);
    }

    public function dataTable(Request $request){
        $attributes = array("request"=>$request);
        return $this->activeIngredientsRepository->datatable($attributes);
    }
}
