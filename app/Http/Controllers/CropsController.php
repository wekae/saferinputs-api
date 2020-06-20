<?php

namespace App\Http\Controllers;

use App\Http\Requests\CropsRequest;
use App\Http\Resources\CropsResource;
use App\Http\Resources\PestsDiseaseWeedResource;
use App\Services\CropsService;
use Illuminate\Http\Request;

/**
 * Controller to handle Crops requests
 *
 * Class CropsController
 * @package App\Http\Controllers
 */
class CropsController extends Controller
{
    protected $cropsService;


    protected $successStatus = 200;
    protected $createdStatus = 201;
    protected $noContentStatus = 204;
    protected $badRequestStatus = 400;
    protected $unauthorizedStatus = 401;
    protected $notFoundStatus = 404;
    protected $unprocessableStatus = 404;
    protected $notImplementedStatus = 501;



    public function __construct(CropsService $cropsService)
    {
        $this->cropsService = $cropsService;
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
     * Get all crops
     * Return response as JSON
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Resources\Json\AnonymousResourceCollection|\Illuminate\Http\Response
     */
    public function all(Request $request){
        $items = $this->cropsService->findAll($request);

        if($items->count()>0){
            return CropsResource::collection($items);
        }else{
            $status_code = $this->notFoundStatus;
            $message = "Items not found";
            $response = $this->failureMessage($status_code, $message);
            return response($response, $status_code);
        }
    }

    /**
     * Find crops based on given ID.
     * Returns JSON response
     * @param $id
     * @return CropsResource|\Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function find($id){
        $item = $this->cropsService->find($id);
        if($item){
            return new CropsResource($item);
        }else{
            $status_code = $this->notFoundStatus;
            $message = "Item not found";
            $response = $this->failureMessage($status_code, $message);
            return response($response, $status_code);
        }
    }

    /**
     * Find pests, diseases, weeds based on the crops id and column values provided by query params
     * Returns response as JSON
     * @param $id
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\JsonResponse|\Illuminate\Http\Response
     */
    public function findPestsDiseasesWeeds(Request $request){
        $item = $this->cropsService->findPestsDiseasesWeeds($request);
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
     * Find agrochem products based on the crops id and column values provided by query params
     * Returns response as JSON
     * @param Request $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\JsonResponse|\Illuminate\Http\Response
     */
    public function findAgrochems(Request $request){
        $item = $this->cropsService->findAgrochems($request);
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
     * Get all crop names
     * Return response as JSON
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function getCropNames(){
        $items = $this->cropsService->getCropNames();

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
     * Adds a new crop item to database
     * @param CropsRequest $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function new(CropsRequest $request){
        $return_data = $this->cropsService->create($request);
        $saved = $return_data['success'];

        if($saved){
            $item = $return_data['item'];
            $status_code = $this->createdStatus;
            $message = "Saved";
            $response = $this->successMessage($status_code, $message, $item);

            return response($response, $status_code);
        }else{
            $status_code = $this->notImplementedStatus;
            if(array_key_exists('duplicate', $return_data) && $return_data['duplicate']){
                $message = 'Duplicate found';
            }else{
                $message = "Not Created";
            }
            $response = $this->failureMessage($status_code, $message);
            return response($response, $status_code);
        }
    }

    /**
     * Updates the crops based on the ID
     * @param CropsRequest $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function update(CropsRequest $request){
        $saved = $this->cropsService->update($request, $request->id);

        if($saved){
            $status_code = $this->createdStatus;
            $message = "Updated";
            $response = $this->successMessage($status_code, $message, new CropsResource($saved));

            return response($response, $status_code);
        }else{
            $status_code = $this->notImplementedStatus;
            $message = "Update Unsuccessful";
            $response = $this->failureMessage($status_code, $message);
            return response($response, $status_code);
        }
    }

    /**
     * Deletes a crop based on the id value
     * @param Request $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function delete(Request $request){
        $deleted = $this->cropsService->delete($request->id);
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
     * Performs search on crops records based on query parameter values
     * Query parameter keys are the columns
     * @param Request $request
     */
    public function filter(Request $request){
        $items = $this->cropsService->filter($request);

        if($items->count()>0){
            return CropsResource::collection($items);
        }else{
            $status_code = $this->notFoundStatus;
            $message = "Items not found";
            $response = $this->failureMessage($status_code, $message);
            return response($response, $status_code);
        }
    }

    /**
     * Performs aggregations on crops records based on query parameter values
     * Returns total
     * Query parameter keys are the columns
     * @param Request $request
     */
    public function summaryCount(Request $request){
        $count = $this->cropsService->summaryCount($request);;
        $status_code = $this->successStatus;
        $response =  [
            "total" => $count
        ];
        return response($response, $status_code);
    }
    public function summaryCountPestsDiseasesWeeds(Request $request){
        $count = $this->cropsService->summaryCountPestsDiseasesWeeds($request);;
        $status_code = $this->successStatus;
        $response =  [
            "total" => $count
        ];
        return response($response, $status_code);
    }
    public function summaryCountAgrochems(Request $request){
        $count = $this->cropsService->summaryCountAgrochems($request);;
        $status_code = $this->successStatus;
        $response =  [
            "total" => $count
        ];
        return response($response, $status_code);
    }


    /**
     * Performs search on crops records based on query parameter values
     * Returns only name, id and image
     * Query parameter keys are the columns
     * @param Request $request
     */
    public function summaryNames(Request $request){
        $items = $this->cropsService->summaryNames($request);


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
     * Implementation for Datatables API to populate table with crops records
     * @param Request $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function dataTable(Request $request){
        $items = $this->cropsService->filter($request);
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
