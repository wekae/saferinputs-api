<?php


namespace App\Services;


use App\Http\Requests\CropsRequest;
use App\Repositories\CropsRepositoryMysqlImpl;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class CropsService
{
    protected $cropsRepository;

    public function __construct(CropsRepositoryMySqlImpl $cropsRepository)
    {
        $this->cropsRepository = $cropsRepository ;
    }

    public function findAll(){
        return $this->cropsRepository->all();
    }

    public function find($id){
        return $this->cropsRepository->find($id);
    }

    public function create(CropsRequest $request){
        $validated_request = $request->validated();

        //For mass insert into the database
        if(is_array($validated_request["name"])){
            $attributes = array();
            $names = $validated_request["name"];
            foreach ($names as $key => $name) {
                array_push($attributes,
                    [
                        "name"=>$validated_request["name"][$key],
                        'creation_date' => Carbon::now(),
                        'last_update' => Carbon::now()
                    ]
                );
            }
        }else{
            $attributes = $request->validated();
        }
        return $this->cropsRepository->create($attributes);
    }

    public function update(CropsRequest $request, $id){
        $attributes = $request->validated();
        return $this->cropsRepository->update($id, $attributes);
    }

    public function delete($id){
        return $this->cropsRepository->delete($id);
    }

    public function filter(Request $request){
        $attributes = array("request"=>$request);
        return $this->cropsRepository->filter($attributes);
    }

    public function dataTable(Request $request){
        $attributes = array("request"=>$request);
        return $this->cropsRepository->datatable($attributes);
    }
}
