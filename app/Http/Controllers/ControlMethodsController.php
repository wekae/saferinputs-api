<?php

namespace App\Http\Controllers;

use App\Http\Requests\ControlMethodsRequest;
use App\Http\Resources\ControlMethodsResource;
use App\Services\ControlMethodsService;
use Illuminate\Http\Request;

/**
 * Controller to handle CommercialOrganic requests
 *
 * Class ControlMethodsController
 * @package App\Http\Controllers
 */
class ControlMethodsController extends Controller
{
    protected $controlMethodsService;


    protected $successStatus = 200;
    protected $createdStatus = 201;
    protected $noContentStatus = 204;
    protected $badRequestStatus = 400;
    protected $unauthorizedStatus = 401;
    protected $notFoundStatus = 404;
    protected $unprocessableStatus = 404;
    protected $notImplementedStatus = 501;



    public function __construct(ControlMethodsService $controlMethodsService)
    {
        $this->controlMethodsService = $controlMethodsService;
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
     * Get all control methods
     * Return response as JSON
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Resources\Json\AnonymousResourceCollection|\Illuminate\Http\Response
     */
    public function all(Request $request){
        $items = $this->controlMethodsService->findAll($request);

        if($items->count()>0){
            return ControlMethodsResource::collection($items);
        }else{
            $status_code = $this->notFoundStatus;
            $message = "Items not found";
            $response = $this->failureMessage($status_code, $message);
            return response($response, $status_code);
        }
    }

    /**
     * Find control method based on given ID.
     * Returns JSON response
     * @param $id
     * @return ControlMethodsResource|\Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function find($id){
        $item = $this->controlMethodsService->find($id);
        if($item){
            return new ControlMethodsResource($item);
        }else{
            $status_code = $this->notFoundStatus;
            $message = "Item not found";
            $response = $this->failureMessage($status_code, $message);
            return response($response, $status_code);
        }
    }



    /**
     * Find pests, diseases, weeds based on the control method id and column values provided by query params
     * Returns response as JSON
     * @param Request $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\JsonResponse|\Illuminate\Http\Response
     */
    public function findPestsDiseasesWeeds(Request $request){
        $item = $this->controlMethodsService->findPestsDiseasesWeeds($request);
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

    /**
     * Find pests, commercial organic items based  on the control method id and column values provided by query params
     * Returns response as JSON
     * @param $id
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\JsonResponse|\Illuminate\Http\Response
     */
    public function findCommercialOrganic(Request $request){
        $item = $this->controlMethodsService->findCommercialOrganic($request);
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

    /**
     * Get all control method names
     * Return response as JSON
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function getControlMethodNames(){
        $items = $this->controlMethodsService->getControlMethodNames();

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
     * Adds a new control method to database
     * @param ControlMethodsRequest $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function new(ControlMethodsRequest $request){
        $saved = $this->controlMethodsService->create($request);

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
     * Updates the control method based on the ID
     * @param ControlMethodsRequest $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function update(ControlMethodsRequest $request){
        $saved = $this->controlMethodsService->update($request, $request->id);

        if($saved){
            $status_code = $this->createdStatus;
            $message = "Updated";
            $response = $this->successMessage($status_code, $message, new ControlMethodsResource($saved));

            return response($response, $status_code);
        }else{
            $status_code = $this->notImplementedStatus;
            $message = "Update Unsuccessful";
            $response = $this->failureMessage($status_code, $message);
            return response($response, $status_code);
        }
    }

    /**
     * Deletes an control method based on the id value
     * @param Request $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function delete(Request $request){
        $deleted = $this->controlMethodsService->delete($request->id);
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
     * Performs search on control methods records based on query parameter values
     * Query parameter keys are the columns
     * @param Request $request
     */
    public function filter(Request $request){
        $items = $this->controlMethodsService->filter($request);

        if($items->count()>0){
            return ControlMethodsResource::collection($items);
        }else{
            $status_code = $this->notFoundStatus;
            $message = "Items not found";
            $response = $this->failureMessage($status_code, $message);
            return response($response, $status_code);
        }
    }

    /**
     * Performs aggregations on controlmethods records based on query parameter values
     * Returns total
     * Query parameter keys are the columns
     * @param Request $request
     */
    public function summaryCount(Request $request){
        $count = $this->controlMethodsService->summaryCount($request);;
        $status_code = $this->successStatus;
        $response =  [
            "total" => $count
        ];
        return response($response, $status_code);
    }
    public function summaryCountPestsDiseasesWeeds(Request $request){
        $count = $this->controlMethodsService->summaryCountPestsDiseasesWeeds($request);;
        $status_code = $this->successStatus;
        $response =  [
            "total" => $count
        ];
        return response($response, $status_code);
    }
    public function summaryCountCommercialOrganic(Request $request){
        $count = $this->controlMethodsService->summaryCountCommercialOrganic($request);;
        $status_code = $this->successStatus;
        $response =  [
            "total" => $count
        ];
        return response($response, $status_code);
    }


    /**
     * Performs search on control methods records based on query parameter values
     * Returns only namd, id and image
     * Query parameter keys are the columns
     * @param Request $request
     */
    public function summaryNames(Request $request){
        $items = $this->controlMethodsService->summaryNames($request);


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
     * Implementation for Datatables API to populate table with control methods records
     * @param Request $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function dataTable(Request $request){
        $items = $this->controlMethodsService->filter($request);
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
