<?php

namespace App\Http\Controllers;

use App\Http\Requests\PestsDiseaseWeedRequest;
use App\Http\Resources\PestsDiseaseWeedResource;
use App\Services\PestsDiseaseWeedService;
use Illuminate\Http\Request;

class PestsDiseaseWeedController extends Controller
{
    protected $pestDiseaseWeedService;


    protected $successStatus = 200;
    protected $createdStatus = 201;
    protected $noContentStatus = 204;
    protected $badRequestStatus = 400;
    protected $unauthorizedStatus = 401;
    protected $notFoundStatus = 404;
    protected $unprocessableStatus = 404;
    protected $notImplementedStatus = 501;



    public function __construct(PestsDiseaseWeedService $pestsDiseaseWeedService)
    {
        $this->pestDiseaseWeedService = $pestsDiseaseWeedService;
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

    public function all(){
        $items = $this->pestDiseaseWeedService->findAll();

        if($items->count()>0){
            return PestsDiseaseWeedResource::collection($items);
        }else{
            $status_code = $this->notFoundStatus;
            $message = "Items not found";
            $response = $this->failureMessage($status_code, $message);
            return response($response, $status_code);
        }
    }

    public function find($id){
        $item = $this->pestDiseaseWeedService->find($id);
        if($item){
            return new PestsDiseaseWeedResource($item);
        }else{
            $status_code = $this->notFoundStatus;
            $message = "Item not found";
            $response = $this->failureMessage($status_code, $message);
            return response($response, $status_code);
        }
    }

    public function new(PestsDiseaseWeedRequest $request){
        $saved = $this->pestDiseaseWeedService->create($request);

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

    public function update(PestsDiseaseWeedRequest $request){
        $saved = $this->pestDiseaseWeedService->update($request, $request->id);

        if($saved){
            $status_code = $this->createdStatus;
            $message = "Updated";
            $response = $this->successMessage($status_code, $message, $saved);

            return response($response, $status_code);
        }else{
            $status_code = $this->notImplementedStatus;
            $message = "Update Unsuccessful";
            $response = $this->failureMessage($status_code, $message);
            return response($response, $status_code);
        }
    }

    public function delete(Request $request){
        $deleted = $this->pestDiseaseWeedService->delete($request->id);
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
        $items = $this->pestDiseaseWeedService->filter($request);
        if(sizeof($items)>0){
            $status_code = $this->createdStatus;
            $message = "Items found";
            $response = $this->successMessage($status_code, $message, $items);
            return response($response, $status_code);
        }else{
            $status_code = $this->notFoundStatus;
            $message = "Items not found";
            $response = $this->failureMessage($status_code, $message);
            return response($response, $status_code);
        }
    }

    public function dataTable(Request $request){
        $items = $this->pestDiseaseWeedService->filter($request);
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
