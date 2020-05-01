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

    public function findAll()
    {
        return $this->gapRepository->all();
    }

    public function find($id)
    {
        return $this->gapRepository->find($id);
    }

    public function create(GapRequest $request)
    {
        $attributes = $request->validated();
        return $this->gapRepository->create($attributes);
    }

    public function update(GapRequest $request, $id)
    {
        $attributes = $request->validated();
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

    public function dataTable(Request $request){
        $attributes = array("request"=>$request);
        return $this->gapRepository->datatable($attributes);
    }
}
