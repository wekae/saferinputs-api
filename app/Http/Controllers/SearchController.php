<?php

namespace App\Http\Controllers;

use App\Models\ActiveIngredients;
use App\Models\Agrochem;
use App\Models\CommercialOrganic;
use App\models\ControlMethods;
use App\Models\Crops;
use App\Models\Gap;
use App\Models\HomeMadeOrganic;
use App\Models\LocalNames;
use App\Models\PestsDiseaseWeed;
use App\Search\GlobalSearch;
use App\Services\PDWLengthAwarePaginator;
use App\Services\SearchService;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\DB;
use Spatie\Searchable\Search;

class SearchController extends Controller
{
    protected $successStatus = 200;
    protected $createdStatus = 201;
    protected $noContentStatus = 204;
    protected $badRequestStatus = 400;
    protected $unauthorizedStatus = 401;
    protected $notFoundStatus = 404;
    protected $unprocessableStatus = 404;
    protected $notImplementedStatus = 501;


    protected $searchService;

    public function __construct(SearchService $searchService){
        $this->searchService = $searchService;
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


    public function searchAgroChem(Request $request){
        $items = $this->searchService->searchAgroChem($request);
        return $this->returnResponse($items);
    }
    public function searchActiveIngredients(Request $request){
        $items = $this->searchService->searchActiveIngredients($request);
        return $this->returnResponse($items);
    }
    public function searchCommercialOrganic(Request $request){
        $items = $this->searchService->searchCommercialOrganic($request);
        return $this->returnResponse($items);
    }
    public function searchControlMethods(Request $request){
        $items = $this->searchService->searchControlMethods($request);
        return $this->returnResponse($items);
    }
    public function searchCrops(Request $request){
        $items = $this->searchService->searchCrops($request);
        return $this->returnResponse($items);
    }
    public function searchGap(Request $request){
        $items = $this->searchService->searchGap($request);
        return $this->returnResponse($items);
    }
    public function searchHomemadeOrganic(Request $request){
        $items = $this->searchService->searchHomemadeOrganic($request);
        return $this->returnResponse($items);
    }
    public function searchLocalNames(Request $request){
        $items = $this->searchService->searchLocalNames($request);
        return $this->returnResponse($items);
    }
    public function searchPestDiseaseWeed(Request $request){
        $items = $this->searchService->searchPestDiseaseWeed($request);
        return $this->returnResponse($items);
    }




    public function search(Request $request){
        $items = $this->searchService->search($request);
        $total = $items['total'];
        if($total > 0){
            $status_code = $this->successStatus;
            $message = $total." Items found";
            $response = $this->successMessage($status_code, $message, $items['items']);
            return response($response, $status_code);
        }else{
            $status_code = $this->notFoundStatus;
            $message = "Items not found";
            $response = $this->failureMessage($status_code, $message);
            return response($response, $status_code);
        }
    }




    public function searchAlt(Request $request){
        $items = $this->searchService->searchAlt($request);
        $total = $items['total'];
        if($total > 0){
            $status_code = $this->successStatus;
            $message = $total." Items found";
            $response = $this->successMessage($status_code, $message, $items['items']);
            return response($response, $status_code);
        }else{
            $status_code = $this->notFoundStatus;
            $message = "Items not found";
            $response = $this->failureMessage($status_code, $message);
            return response($response, $status_code);
        }
    }

    private function returnResponse($items){
        if(sizeof($items)>0){
            $status_code = $this->successStatus;
            $message = sizeof($items)." Items found";
            $response = $this->successMessage($status_code, $message, $items);
            return response($response, $status_code);
        }else{
            $status_code = $this->notFoundStatus;
            $message = "Items not found";
            $response = $this->failureMessage($status_code, $message);
            return response($response, $status_code);
        }
    }

}
