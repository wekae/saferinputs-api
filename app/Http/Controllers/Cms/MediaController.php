<?php

namespace App\Http\Controllers\Cms;

use App\Http\Controllers\Controller;
use App\Http\Requests\cms\MediaRequest;
use App\Http\Resources\Cms\MediaResource;
use App\Services\Cms\MediaService;
use App\Services\MediaFilesService;
use Illuminate\Http\Request;

class MediaController extends Controller
{
    protected $mediaService;


    protected $successStatus = 200;
    protected $createdStatus = 201;
    protected $noContentStatus = 204;
    protected $badRequestStatus = 400;
    protected $unauthorizedStatus = 401;
    protected $notFoundStatus = 404;
    protected $unprocessableStatus = 404;
    protected $notImplementedStatus = 501;



    public function __construct(MediaService $mediaService)
    {
        $this->mediaService = $mediaService;
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
        $items = $this->mediaService->findAll($request);

        if($items->count()>0){
            return MediaResource::collection($items);
        }else{
            $status_code = $this->notFoundStatus;
            $message = "Items not found";
            $response = $this->failureMessage($status_code, $message);
            return response($response, $status_code);
        }
    }

    public function find($id){
        $item = $this->mediaService->find($id);
        if($item){
            return new MediaResource($item);
        }else{
            $status_code = $this->notFoundStatus;
            $message = "Item not found";
            $response = $this->failureMessage($status_code, $message);
            return response($response, $status_code);
        }
    }
    public function findByToken($token){
        $item = $this->mediaService->findByToken($token);
        if($item){
            return new MediaResource($item);
        }else{
            $status_code = $this->notFoundStatus;
            $message = "Item not found";
            $response = $this->failureMessage($status_code, $message);
            return response($response, $status_code);
        }
    }

    public function getMediaOriginalSize($token){

        $media = $this->mediaService->getMedia($token);

//        return $media;


        if($media['status']){
            return $media['image']->response();
        }else{
            $status_code = $this->notImplementedStatus;
            $message = "File Not Found";
            $response = $this->failureMessage($status_code, $message);
            return response($response, $status_code);
        }
    }

    public function getMediaResizedSquare(Request $request){
        $token = $request->token;
        $dim = $request->dim;

        $image = $this->mediaService->getMediaResizedSquare($token,$dim);



        if($image['status']){
            return $image['image']->response();
        }else{
            $status_code = $this->notImplementedStatus;
            $message = $image['message']? $image['message']: "Not Found";
            $response = $this->failureMessage($status_code, $message);
            return response($response, $status_code);
        }
    }

    public function getMediaResizedRectangle(Request $request){
        $token = $request->token;
        $dimX = $request->dimX;
        $dimY = $request->dimY;

        $image = $this->mediaService->getMediaResizedRectangle($token, $dimX, $dimY);



        if($image['status']){
            return $image['image']->response();
        }else{
            $status_code = $this->notImplementedStatus;
            $message = $image['message']? $image['message']: "Not Found";
            $response = $this->failureMessage($status_code, $message);
            return response($response, $status_code);
        }
    }

    public function new(MediaRequest $request){
        $saved = $this->mediaService->create($request);

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

    public function newWithAssociation(MediaRequest $request){
        $saved = $this->mediaService->addAssociationMedia($request);

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

    public function update(MediaRequest $request){
        $saved = $this->mediaService->update($request, $request->id);

        if($saved){
            $status_code = $this->createdStatus;
            $message = "Updated";
            $response = $this->successMessage($status_code, $message, new MediaResource($saved));

            return response($response, $status_code);
        }else{
            $status_code = $this->notImplementedStatus;
            $message = "Update Unsuccessful";
            $response = $this->failureMessage($status_code, $message);
            return response($response, $status_code);
        }
    }

    public function updateFile(Request $request){
        $updated = $this->mediaService->updateFile($request);
        if($updated['status']){
            $status_code = $this->createdStatus;
            $message = "Uploaded";
            $response = $this->successMessage($status_code, $message, $updated['item']);

            return response($response, $status_code);
        }else{
            $status_code = $this->notImplementedStatus;
            $message = $updated['message']? $updated['message']: "Not Uploaded";
            $response = $this->failureMessage($status_code, $message);
            return response($response, $status_code);
        }
    }

    public function delete(Request $request){
        $deleted = $this->mediaService->delete($request->id);
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
        $items = $this->mediaService->filter($request);
        if($items->count()>0){
            return MediaResource::collection($items);
        }else{
            $status_code = $this->notFoundStatus;
            $message = "Items not found";
            $response = $this->failureMessage($status_code, $message);
            return response($response, $status_code);
        }
    }

    public function summaryNames(Request $request){
        $items = $this->mediaService->summaryNames($request);


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
        $count = $this->mediaService->summaryCount($request);;
        $status_code = $this->successStatus;
        $response =  [
            "total" => $count
        ];
        return response($response, $status_code);
    }

    public function dataTable(Request $request){
        $items = $this->mediaService->dataTable($request);
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
