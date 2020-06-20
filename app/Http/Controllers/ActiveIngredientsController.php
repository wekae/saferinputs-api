<?php

namespace App\Http\Controllers;

use App\Http\Requests\ActiveIngredientsRequest;
use App\Http\Resources\ActiveIngredientsResource;
use App\Services\ActiveIngredientsService;
use Illuminate\Http\Request;

/**
 * Controller to handle ActiveIngredients requests
 *
 * Class ActiveIngredientsController
 * @package App\Http\Controllers
 */
class ActiveIngredientsController extends Controller
{
    protected $activeIngredientsService;


    protected $successStatus = 200;
    protected $createdStatus = 201;
    protected $noContentStatus = 204;
    protected $badRequestStatus = 400;
    protected $unauthorizedStatus = 401;
    protected $notFoundStatus = 404;
    protected $unprocessableStatus = 404;
    protected $notImplementedStatus = 501;



    public function __construct(ActiveIngredientsService $activeIngredientsService)
    {
        $this->activeIngredientsService = $activeIngredientsService;
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
     * Get all active ingredients
     * Return response as JSON
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Resources\Json\AnonymousResourceCollection|\Illuminate\Http\Response
     */
    public function all(Request $request){
        $items = $this->activeIngredientsService->findAll($request);

        if($items->count()>0){
            return ActiveIngredientsResource::collection($items);
        }else{
            $status_code = $this->notFoundStatus;
            $message = "Items not found";
            $response = $this->failureMessage($status_code, $message);
            return response($response, $status_code);
        }
    }

    /**
     * Get all active ingredient names
     * Return response as JSON
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function getActiveIngredientNames(){
        $items = $this->activeIngredientsService->getActiveIngredientNames();

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
     * Find active ingredient based on given ID.
     * Returns JSON response
     * @param $id
     * @return ActiveIngredientsResource|\Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function find($id){
        $item = $this->activeIngredientsService->find($id);
        if($item){
            return new ActiveIngredientsResource($item);
        }else{
            $status_code = $this->notFoundStatus;
            $message = "Item not found";
            $response = $this->failureMessage($status_code, $message);
            return response($response, $status_code);
        }
    }

    /**
     * Find agrochem products based on the active ingredient id and column values provided by query params
     * Returns response as JSON
     * @param Request $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\JsonResponse|\Illuminate\Http\Response
     */
    public function findAgrochems(Request $request){
        $item = $this->activeIngredientsService->findAgrochems($request);
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
     * Adds a new active ingredient item to database
     * @param ActiveIngredientsRequest $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function new(ActiveIngredientsRequest $request){
        $saved = $this->activeIngredientsService->create($request);

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
     * Updates the active ingredient based on the ID
     * @param ActiveIngredientsRequest $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function update(ActiveIngredientsRequest $request){
        $saved = $this->activeIngredientsService->update($request, $request->id);

        if($saved){
            $status_code = $this->createdStatus;
            $message = "Updated";
            $response = $this->successMessage($status_code, $message, new ActiveIngredientsResource($saved));

            return response($response, $status_code);
        }else{
            $status_code = $this->notImplementedStatus;
            $message = "Update Unsuccessful";
            $response = $this->failureMessage($status_code, $message);
            return response($response, $status_code);
        }
    }

    /**
     * Deletes an active ingredient based on the id value
     * @param Request $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function delete(Request $request){
        $deleted = $this->activeIngredientsService->delete($request->id);
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
     * Performs search on active ingredient records based on query parameter values
     * Query parameter keys are the columns
     * @param Request $request
     */
    public function filter(Request $request){
        $items = $this->activeIngredientsService->filter($request);

        if($items->count()>0){
            return ActiveIngredientsResource::collection($items);
        }else{
            $status_code = $this->notFoundStatus;
            $message = "Items not found";
            $response = $this->failureMessage($status_code, $message);
            return response($response, $status_code);
        }
    }

    /**
     * Performs aggregations on active ingredient records based on query parameter values
     * Returns total
     * Query parameter keys are the columns
     * @param Request $request
     */
    public function summaryCount(Request $request){
        $count = $this->activeIngredientsService->summaryCount($request);;
        $status_code = $this->successStatus;
        $response =  [
            "total" => $count
        ];
        return response($response, $status_code);
    }
    public function summaryCountAgrochem(Request $request){
        $count = $this->activeIngredientsService->summaryCountAgrochem($request);;
        $status_code = $this->successStatus;
        $response =  [
            "total" => $count
        ];
        return response($response, $status_code);
    }

    /**
     * Performs search on active ingredient records based on query parameter values
     * Returns only name, id and image
     * Query parameter keys are the columns
     * @param Request $request
     */
    public function summaryNames(Request $request){
        $items = $this->activeIngredientsService->summaryNames($request);


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
     * Implementation for Datatables API to populate table with active ingredients records
     * @param Request $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function dataTable(Request $request){
        $items = $this->activeIngredientsService->filter($request);
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
