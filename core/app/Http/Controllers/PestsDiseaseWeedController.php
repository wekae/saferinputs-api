<?php

namespace App\Http\Controllers;

use App\Http\Requests\PestsDiseaseWeedRequest;
use App\Http\Resources\PestsDiseaseWeedResource;
use App\Services\PestsDiseaseWeedService;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\Types\Array_;

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

    public function all(Request $request){
        $items = $this->pestDiseaseWeedService->findAll($request);

        if($items->count()>0){
            return PestsDiseaseWeedResource::collection($items);
        }else{
            $status_code = $this->notFoundStatus;
            $message = "Items not found";
            $response = $this->failureMessage($status_code, $message);
            return response($response, $status_code);
        }
    }

    public function getPestDiseasesWeedsNames(){
        $items = $this->pestDiseaseWeedService->getPestDiseasesWeedsNames();

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




    public function findAgrochems(Request $request){
        $item = $this->pestDiseaseWeedService->findAgrochems($request);
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
    public function findCommercialOrganic(Request $request){
        $item = $this->pestDiseaseWeedService->findCommercialOrganic($request);
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
    public function findControlMethods(Request $request){
        $item = $this->pestDiseaseWeedService->findControlMethods($request);
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
    public function findCrops(Request $request){
        $item = $this->pestDiseaseWeedService->findCrops($request);
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
    public function findGap(Request $request){
        $item = $this->pestDiseaseWeedService->findGap($request);
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
    public function findHomemadeOrganic(Request $request){
        $item = $this->pestDiseaseWeedService->findHomemadeOrganic($request);
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
    public function findLocalNames(Request $request){
        $item = $this->pestDiseaseWeedService->findLocalNames($request);
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
            $response = $this->successMessage($status_code, $message, new PestsDiseaseWeedResource($saved));

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


        //Implementation without relationships
//        if($items->count()>0){
//            $message = $items->count()." Items found";
//            $status_code = $this->successStatus;
//            $response =  [
//                'data' => $items,
//            ];
//            return response($response, $status_code);
//        }else{
//            $status_code = $this->notFoundStatus;
//            $message = "Items not found";
//            $response = $this->failureMessage($status_code, $message);
//            return response($response, $status_code);
//        }

        if($items->count()>0){
            return PestsDiseaseWeedResource::collection($items);
        }else{
            $status_code = $this->notFoundStatus;
            $message = "Items not found";
            $response = $this->failureMessage($status_code, $message);
            return response($response, $status_code);
        }
    }

    public function summaryNames(Request $request){
        $items = $this->pestDiseaseWeedService->summaryNames($request);


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

    public function summaryCount(Request $request){
        $count = $this->pestDiseaseWeedService->summaryCount($request);;
        $status_code = $this->successStatus;
        $response =  [
            "total" => $count
        ];
        return response($response, $status_code);
    }
    public function summaryCountAgrochem(Request $request){
        $count = $this->pestDiseaseWeedService->summaryCountAgrochem($request);;
        $status_code = $this->successStatus;
        $response =  [
            "total" => $count
        ];
        return response($response, $status_code);
    }
    public function summaryCountCommercialOrganic(Request $request){
        $count = $this->pestDiseaseWeedService->summaryCountCommercialOrganic($request);;
        $status_code = $this->successStatus;
        $response =  [
            "total" => $count
        ];
        return response($response, $status_code);
    }
    public function summaryCountControlMethods(Request $request){
        $count = $this->pestDiseaseWeedService->summaryCountControlMethods($request);;
        $status_code = $this->successStatus;
        $response =  [
            "total" => $count
        ];
        return response($response, $status_code);
    }
    public function summaryCountCrops(Request $request){
        $count = $this->pestDiseaseWeedService->summaryCountCrops($request);;
        $status_code = $this->successStatus;
        $response =  [
            "total" => $count
        ];
        return response($response, $status_code);
    }
    public function summaryCountGap(Request $request){
        $count = $this->pestDiseaseWeedService->summaryCountGap($request);;
        $status_code = $this->successStatus;
        $response =  [
            "total" => $count
        ];
        return response($response, $status_code);
    }
    public function summaryCountHomemadeOrganic(Request $request){
        $count = $this->pestDiseaseWeedService->summaryCountHomemadeOrganic($request);;
        $status_code = $this->successStatus;
        $response =  [
            "total" => $count
        ];
        return response($response, $status_code);
    }
    public function summaryCountLocalNames(Request $request){
        $count = $this->pestDiseaseWeedService->summaryCountLocalNames($request);;
        $status_code = $this->successStatus;
        $response =  [
            "total" => $count
        ];
        return response($response, $status_code);
    }

    public function dataTable(Request $request){
        $items = $this->pestDiseaseWeedService->dataTable($request);
        if($items){
            return response()->json($items);
        }else{
            $status_code = $this->notFoundStatus;
            $message = "Items not found";
            $response = $this->failureMessage($status_code, $message);
            return response($response, $status_code);
        }
    }
}
