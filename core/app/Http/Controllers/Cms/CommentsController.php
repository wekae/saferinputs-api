<?php

namespace App\Http\Controllers\Cms;

use App\Http\Controllers\Controller;
use App\Http\Requests\cms\CommentsRequest;
use App\Http\Resources\Cms\CommentsResource;
use App\Services\Cms\CommentsService;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
    protected $commentsService;


    protected $successStatus = 200;
    protected $createdStatus = 201;
    protected $noContentStatus = 204;
    protected $badRequestStatus = 400;
    protected $unauthorizedStatus = 401;
    protected $notFoundStatus = 404;
    protected $unprocessableStatus = 404;
    protected $notImplementedStatus = 501;



    public function __construct(CommentsService $commentsService)
    {
        $this->commentsService = $commentsService;
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
        $items = $this->commentsService->findAll($request);

        if($items->count()>0){
            return CommentsResource::collection($items);
        }else{
            $status_code = $this->notFoundStatus;
            $message = "Items not found";
            $response = $this->failureMessage($status_code, $message);
            return response($response, $status_code);
        }
    }

    public function findByPost(Request $request){
        $item = $this->commentsService->findByPost($request);
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

    public function find($id){
        $item = $this->commentsService->find($id);
        if($item){
            return new CommentsResource($item);
        }else{
            $status_code = $this->notFoundStatus;
            $message = "Item not found";
            $response = $this->failureMessage($status_code, $message);
            return response($response, $status_code);
        }
    }

    public function new(CommentsRequest $request){
        $saved = $this->commentsService->create($request);

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

    public function update(CommentsRequest $request){
        $saved = $this->commentsService->update($request, $request->id);

        if($saved){
            $status_code = $this->createdStatus;
            $message = "Updated";
            $response = $this->successMessage($status_code, $message, new CommentsResource($saved));

            return response($response, $status_code);
        }else{
            $status_code = $this->notImplementedStatus;
            $message = "Update Unsuccessful";
            $response = $this->failureMessage($status_code, $message);
            return response($response, $status_code);
        }
    }

    public function delete(Request $request){
        $deleted = $this->commentsService->delete($request->id);
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
        $items = $this->commentsService->filter($request);

        if($items->count()>0){
            return CommentsResource::collection($items);
        }else{
            $status_code = $this->notFoundStatus;
            $message = "Items not found";
            $response = $this->failureMessage($status_code, $message);
            return response($response, $status_code);
        }
    }

    public function summaryCount(Request $request){
        $count = $this->commentsService->summaryCount($request);;
        $status_code = $this->successStatus;
        $response =  [
            "total" => $count
        ];
        return response($response, $status_code);
    }
}
