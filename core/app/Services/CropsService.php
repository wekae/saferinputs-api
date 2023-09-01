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

    public function findAll(Request $request){
        $attributes = array("request"=>$request);
        return $this->cropsRepository->all($attributes);
    }

    public function find($id){
        return $this->cropsRepository->find($id);
    }
    public function findPestsDiseasesWeeds($request){
        $attributes = array("request"=>$request);
        return $this->cropsRepository->findPestsDiseasesWeeds($attributes);
    }
    public function findAgrochems(Request $request){
        $attributes = array("request"=>$request);
        return $this->cropsRepository->findAgrochems($attributes);
    }
    public function findCommercialOrganic($request){
        $attributes = array("request"=>$request);
        return $this->cropsRepository->findCommercialOrganic($attributes);
    }
    public function findHomemadeOrganic($request){
        $attributes = array("request"=>$request);
        return $this->cropsRepository->findHomemadeOrganic($attributes);
    }
    public function findGap($request){
        $attributes = array("request"=>$request);
        return $this->cropsRepository->findGap($attributes);
    }

    public function getCropNames(){
        return $this->cropsRepository->getCropNames();
    }

    public function create(CropsRequest $request){
        $validated_request = $request->validated();

        //For mass insert into the database
//        if(is_array($validated_request["name"])){
//            $attributes = array();
//            $names = $validated_request["name"];
//            foreach ($names as $key => $name) {
//                array_push($attributes,
//                    [
//                        "name"=>$validated_request["name"][$key],
//                        'creation_date' => Carbon::now(),
//                        'last_update' => Carbon::now()
//                    ]
//                );
//            }
//        }else{
//            $attributes = array("request"=>$request);
//        }
        $attributes = array("request"=>$request);
        return $this->cropsRepository->create($attributes);
    }

    public function update(CropsRequest $request, $id){
        $attributes = array("request"=>$request);
        return $this->cropsRepository->update($id, $attributes);
    }

    public function delete($id){
        return $this->cropsRepository->delete($id);
    }

    public function filter(Request $request){
        $attributes = array("request"=>$request);
        return $this->cropsRepository->filter($attributes);
    }

    public function summaryCount(Request $request){
        $attributes = array('request'=>$request);
        return $this->cropsRepository->summaryCount($attributes);
    }
    public function summaryCountAgrochems(Request $request){
        $attributes = array('request'=>$request);
        return $this->cropsRepository->summaryCountAgrochems($attributes);
    }
    public function summaryCountPestsDiseasesWeeds(Request $request){
        $attributes = array('request'=>$request);
        return $this->cropsRepository->summaryCountPestsDiseasesWeeds($attributes);
    }

    public function summaryNames(Request $request){
        $attributes = array('request'=>$request);
        return $this->cropsRepository->summaryNames($attributes);
    }

    public function dataTable(Request $request){
        $attributes = array("request"=>$request);
        return $this->cropsRepository->datatable($attributes);
    }
}
