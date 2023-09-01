<?php

namespace App\Http\Controllers;

use App\Http\Requests\HomeMadeOrganicRequest;
use App\Http\Resources\HomeMadeOrganicResource;
use App\Services\HomeMadeOrganicService;
use Illuminate\Http\Request;

class HomeMadeOrganicController extends Controller
{
    protected $homeMadeOrganicService;


    protected $successStatus = 200;
    protected $createdStatus = 201;
    protected $noContentStatus = 204;
    protected $badRequestStatus = 400;
    protected $unauthorizedStatus = 401;
    protected $notFoundStatus = 404;
    protected $unprocessableStatus = 404;
    protected $notImplementedStatus = 501;



    public function __construct(HomeMadeOrganicService $homeMadeOrganicService)
    {
        $this->homeMadeOrganicService = $homeMadeOrganicService;
    }

    private function failureMessage($code, $message)
    {

        return [
            'code' => $code,
            'message' => $message,
            'success' => false,
        ];

    }

    private function successMessage($code, $message, $payload)
    {

        return [
            'code' => $code,
            'message' => $message,
            'success' => true,
            'data' => $payload,
        ];

    }

    public function all(Request $request){
        $items = $this->homeMadeOrganicService->findAll($request);

        if($items->count()>0){
            return HomeMadeOrganicResource::collection($items);
        }else{
            $status_code = $this->notFoundStatus;
            $message = "Items not found";
            $response = $this->failureMessage($status_code, $message);
            return response($response, $status_code);
        }
    }

    public function find($id){
        $item = $this->homeMadeOrganicService->find($id);
        if($item){
            return new HomeMadeOrganicResource($item);
        }else{
            $status_code = $this->notFoundStatus;
            $message = "Item not found";
            $response = $this->failureMessage($status_code, $message);
            return response($response, $status_code);
        }
    }
    public function findPestsDiseaseWeed(Request $request){
        $item = $this->homeMadeOrganicService->findPestsDiseaseWeed($request);
        if($item){
//            return $item;
            return response()->json(['data'=>$item], $this->successStatus);
        }else{
            $status_code = $this->notFoundStatus;
            $message = "Item not found";
            $response = $this->failureMessage($status_code, $message);
            return response($response, $status_code);
        }
    }

    public function getHomemadeOrganicNames(){
        $items = $this->homeMadeOrganicService->getHomemadeOrganicNames();

        if($items->count()>0){
//            return response()->json(['data'=>$items], $this->successStatus);
            $status_code = $this->successStatus;
            $message = $items->count()." Items found";
            $response = $this->successMessage($status_code, $message, $items);
            return response($response, $this->successStatus);
        }else{
            $status_code = $this->notFoundStatus;
            $message = "Items not found";
            $response = $this->failureMessage($status_code, $message);
            return response($response, $status_code);
        }
    }

    public function new(HomeMadeOrganicRequest $request){
        $saved = $this->homeMadeOrganicService->create($request);

        if($saved){
            $status_code = $this->createdStatus;
            $message = "Saved";
            $response = $this->successMessage($status_code, $message, $saved);

            return response($response, $status_code);
        }else{
            $status_code = $this->notImplementedStatus;
            $message = "Not Created";
            $response = $this->failureMessage($status_code, $message);
            return response($response, $status_code);
        }
    }

    public function update(HomeMadeOrganicRequest $request){
        $saved = $this->homeMadeOrganicService->update($request, $request->id);

        if($saved){
            $status_code = $this->createdStatus;
            $message = "Updated";
            $response = $this->successMessage($status_code, $message, new HomeMadeOrganicResource($saved));

            return response($response, $status_code);
        }else{
            $status_code = $this->notImplementedStatus;
            $message = "Update Unsuccessful";
            $response = $this->failureMessage($status_code, $message);
            return response($response, $status_code);
        }
    }

    public function delete(Request $request){
        $deleted = $this->homeMadeOrganicService->delete($request->id);
        if($deleted){
            $status_code = $this->successStatus;
            $message = "Deleted";
            $response = $this->successMessage($status_code, $message, null);

            return response($response, $status_code);
        }else{
            $status_code = $this->notImplementedStatus;
            $message = "Item not found";
            $response = $this->failureMessage($status_code, $message);
            return response($response, $status_code);
        }

    }

    public function filter(Request $request){
        $items = $this->homeMadeOrganicService->filter($request);

        if($items->count()>0){
            return HomeMadeOrganicResource::collection($items);
        }else{
            $status_code = $this->notFoundStatus;
            $message = "Items not found";
            $response = $this->failureMessage($status_code, $message);
            return response($response, $status_code);
        }
    }

    public function summaryCount(Request $request){
        $count = $this->homeMadeOrganicService->summaryCount($request);;
        $status_code = $this->successStatus;
        $response =  [
            "total" => $count
        ];
        return response($response, $status_code);
    }
    public function summaryCountPestsDiseaseWeed(Request $request){
        $count = $this->homeMadeOrganicService->summaryCountPestsDiseaseWeed($request);;
        $status_code = $this->successStatus;
        $response =  [
            "total" => $count
        ];
        return response($response, $status_code);
    }

    public function summaryNames(Request $request){
        $items = $this->homeMadeOrganicService->summaryNames($request);


        //Implementation without relationships
        if($items->count()>0){
            $message = $items->count()." Items found";
            $status_code = $this->successStatus;
            $response =  $items;
            return response($response, $status_code);
        }else{
            $status_code = $this->notFoundStatus;
            $message = "Items not found";
            $response = $this->failureMessage($status_code, $message);
            return response($response, $status_code);
        }
    }

    public function dataTable(Request $request){
        $items = $this->homeMadeOrganicService->filter($request);
        if($items){
            return $items;
        }else{
            $status_code = $this->notFoundStatus;
            $message = "Items not found";
            $response = $this->failureMessage($status_code, $message);
            return response($response, $status_code);
        }
    }
}
