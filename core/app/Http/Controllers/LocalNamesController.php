<?php

namespace App\Http\Controllers;

use App\Http\Requests\LocalNamesRequest;
use App\Http\Resources\LocalNamesResource;
use App\Services\LocalNamesService;
use Illuminate\Http\Request;

class LocalNamesController extends Controller
{
    protected $localNamesService;


    protected $successStatus = 200;
    protected $createdStatus = 201;
    protected $noContentStatus = 204;
    protected $badRequestStatus = 400;
    protected $unauthorizedStatus = 401;
    protected $notFoundStatus = 404;
    protected $unprocessableStatus = 404;
    protected $notImplementedStatus = 501;



    public function __construct(LocalNamesService $localNamesService)
    {
        $this->localNamesService = $localNamesService;
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
        $items = $this->localNamesService->findAll($request);

        if($items->count()>0){
            return LocalNamesResource::collection($items);
        }else{
            $status_code = $this->notFoundStatus;
            $message = "Items not found";
            $response = $this->failureMessage($status_code, $message);
            return response($response, $status_code);
        }
    }

    public function getLocalNameNames(){
        $items = $this->localNamesService->getLocalNameNames();

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

    public function find($id){
        $item = $this->localNamesService->find($id);
        if($item){
            return new localNamesResource($item);
        }else{
            $status_code = $this->notFoundStatus;
            $message = "Item not found";
            $response = $this->failureMessage($status_code, $message);
            return response($response, $status_code);
        }
    }


    public function findPestsDiseaseWeed(Request $request){
        $item = $this->localNamesService->findPestsDiseaseWeed($request);
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

    public function new(LocalNamesRequest $request){
        $saved = $this->localNamesService->create($request);

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

    public function update(LocalNamesRequest $request){
        $saved = $this->localNamesService->update($request, $request->id);

        if($saved){
            $status_code = $this->createdStatus;
            $message = "Updated";
            $response = $this->successMessage($status_code, $message, new LocalNamesResource($saved));

            return response($response, $status_code);
        }else{
            $status_code = $this->notImplementedStatus;
            $message = "Update Unsuccessful";
            $response = $this->failureMessage($status_code, $message);
            return response($response, $status_code);
        }
    }

    public function delete(Request $request){
        $deleted = $this->localNamesService->delete($request->id);
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
        $items = $this->localNamesService->filter($request);

        if($items->count()>0){
            return LocalNamesResource::collection($items);
        }else{
            $status_code = $this->notFoundStatus;
            $message = "Items not found";
            $response = $this->failureMessage($status_code, $message);
            return response($response, $status_code);
        }
    }

    public function summaryCount(Request $request){
        $count = $this->localNamesService->summaryCount($request);;
        $status_code = $this->successStatus;
        $response =  [
            "total" => $count
        ];
        return response($response, $status_code);
    }
    public function summaryCountPestsDiseaseWeed(Request $request){
        $count = $this->localNamesService->summaryCountPestsDiseaseWeed($request);;
        $status_code = $this->successStatus;
        $response =  [
            "total" => $count
        ];
        return response($response, $status_code);
    }

    public function summaryNames(Request $request){
        $items = $this->localNamesService->summaryNames($request);


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
        $items = $this->localNamesService->filter($request);
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
