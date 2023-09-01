<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommercialOrganicRequest;
use App\Http\Resources\CommercialOrganicResource;
use App\Services\CommercialOrganicService;
use Illuminate\Http\Request;

/**
 * Controller to handle CommercialOrganic requests
 *
 * Class CommercialOrganicController
 * @package App\Http\Controllers
 */
class CommercialOrganicController extends Controller
{
    protected $commercialOrganicService;


    protected $successStatus = 200;
    protected $createdStatus = 201;
    protected $noContentStatus = 204;
    protected $badRequestStatus = 400;
    protected $unauthorizedStatus = 401;
    protected $notFoundStatus = 404;
    protected $unprocessableStatus = 404;
    protected $notImplementedStatus = 501;



    public function __construct(CommercialOrganicService $commercialOrganicService)
    {
        $this->commercialOrganicService = $commercialOrganicService;
    }

    /**
     * Wrapper for the JSON response for failure during execution
     *
     * @param $code
     * @param $message
     * @return array
     */
    private function failureMessage($code, $message)
    {

        return [
            'code' => $code,
            'message' => $message,
            'success' => false,
        ];

    }

    /**
     * Wrapper for the JSON response for success during execution
     *
     * @param $code
     * @param $message
     * @param $payload
     * @return array
     */
    private function successMessage($code, $message, $payload)
    {

        return [
            'code' => $code,
            'message' => $message,
            'success' => true,
            'data' => $payload,
        ];

    }

    /**
     * Get all CommercialOrganic items
     * Returns response as JSON
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Resources\Json\AnonymousResourceCollection|\Illuminate\Http\Response
     */
    public function all(Request $request){
        $items = $this->commercialOrganicService->findAll($request);

        if($items->count()>0){
            return CommercialOrganicResource::collection($items);
        }else{
            $status_code = $this->notFoundStatus;
            $message = sizeof($items)." Items not found";
            $response = $this->failureMessage($status_code, $message);
            return response($response, $status_code);
        }
    }

    /**
     * Find commercial organic item based on given ID.
     * Returns JSON response
     * @param $id
     * @return CommercialOrganicResource|\Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function find($id){
        $item = $this->commercialOrganicService->find($id);
        if($item){
            return new commercialOrganicResource($item);
        }else{
            $status_code = $this->notFoundStatus;
            $message = "Item not found";
            $response = $this->failureMessage($status_code, $message);
            return response($response, $status_code);
        }
    }
    public function findPestsDiseaseWeed(Request $request){
        $item = $this->commercialOrganicService->findPestsDiseaseWeed($request);
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
        $item = $this->commercialOrganicService->findControlMethods($request);
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
    public function findAgrochemProducts(Request $request){
        $item = $this->commercialOrganicService->findAgrochemProducts($request);
        if($item){
//            return $item;
            return response()->json(
                [
                    'total'=>$item["total"],
                    'data'=>$item["items"]
                ], $this->successStatus);
        }else{
            $status_code = $this->notFoundStatus;
            $message = "Item not found";
            $response = $this->failureMessage($status_code, $message);
            return response($response, $status_code);
        }
    }
    public function findGap(Request $request){
        $item = $this->commercialOrganicService->findGap($request);
        if($item){
//            return $item;
            return response()->json(
                [
                    'total'=>$item["total"],
                    'data'=>$item["items"]
                ], $this->successStatus);
        }else{
            $status_code = $this->notFoundStatus;
            $message = "Item not found";
            $response = $this->failureMessage($status_code, $message);
            return response($response, $status_code);
        }
    }
    public function findHomemadeOrganic(Request $request){
        $item = $this->commercialOrganicService->findHomemadeOrganic($request);
        if($item){
//            return $item;
            return response()->json(
                [
                    'total'=>$item["total"],
                    'data'=>$item["items"]
                ], $this->successStatus);
        }else{
            $status_code = $this->notFoundStatus;
            $message = "Item not found";
            $response = $this->failureMessage($status_code, $message);
            return response($response, $status_code);
        }
    }

    public function getCommercialOrganicNames(){
        $items = $this->commercialOrganicService->getCommercialOrganicNames();

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


    /**
     * Adds a new commercial organic item to database
     * @param CommercialOrganicRequest $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function new(CommercialOrganicRequest $request){
        $saved = $this->commercialOrganicService->create($request);

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

    /**
     * Updates the commercial organic item based on the ID
     * @param CommercialOrganicRequest $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function update(CommercialOrganicRequest $request){
        $saved = $this->commercialOrganicService->update($request, $request->id);

        if($saved){
            $status_code = $this->createdStatus;
            $message = "Updated";
            $response = $this->successMessage($status_code, $message, new CommercialOrganicResource($saved));

            return response($response, $status_code);
        }else{
            $status_code = $this->notImplementedStatus;
            $message = "Update Unsuccessful";
            $response = $this->failureMessage($status_code, $message);
            return response($response, $status_code);
        }
    }

    /**
     * Deletes a commercial organic item based on the id value
     * @param Request $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function delete(Request $request){
        $deleted = $this->commercialOrganicService->delete($request->id);
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

    /**
     * Performs search on commercial organic records based on query parameter values
     * Query parameter keys are the columns
     * @param Request $request
     */
    public function filter(Request $request){
        $items = $this->commercialOrganicService->filter($request);

        if($items->count()>0){
            return CommercialOrganicResource::collection($items);
        }else{
            $status_code = $this->notFoundStatus;
            $message = "Items not found";
            $response = $this->failureMessage($status_code, $message);
            return response($response, $status_code);
        }
    }

    /**
     * Performs aggregations on commercial organic records based on query parameter values
     * Returns total
     * Query parameter keys are the columns
     * @param Request $request
     */
    public function summaryCount(Request $request){
        $count = $this->commercialOrganicService->summaryCount($request);;
        $status_code = $this->successStatus;
        $response =  [
            "total" => $count
        ];
        return response($response, $status_code);
    }
    public function summaryCountPestsDiseaseWeed(Request $request){
        $count = $this->commercialOrganicService->summaryCountPestsDiseaseWeed($request);;
        $status_code = $this->successStatus;
        $response =  [
            "total" => $count
        ];
        return response($response, $status_code);
    }
    public function summaryCountControlMethods(Request $request){
        $count = $this->commercialOrganicService->summaryCountControlMethods($request);;
        $status_code = $this->successStatus;
        $response =  [
            "total" => $count
        ];
        return response($response, $status_code);
    }

    /**
     * Performs search on commercial organic records based on query parameter values
     * Returns only name, id and image
     * Query parameter keys are the columns
     * @param Request $request
     */
    public function summaryNames(Request $request){
        $items = $this->commercialOrganicService->summaryNames($request);


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

    /**
     * Implementation for Datatables API to populate table with commercial organic records
     * @param Request $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function dataTable(Request $request){
        $items = $this->commercialOrganicService->filter($request);
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
