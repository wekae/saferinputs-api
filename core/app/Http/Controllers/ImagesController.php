<?php

namespace App\Http\Controllers;


use App\Services\ImageService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class ImagesController extends Controller
{
    protected $imageService;


    protected $successStatus = 200;
    protected $createdStatus = 201;
    protected $noContentStatus = 204;
    protected $badRequestStatus = 400;
    protected $unauthorizedStatus = 401;
    protected $notFoundStatus = 404;
    protected $unprocessableStatus = 404;
    protected $notImplementedStatus = 501;



    public function __construct(ImageService $imageService)
    {
        $this->imageService = $imageService;
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

    public function test(Request $request){

        $status_code = $this->successStatus;
        $message = $request->type;
        $response = $this->successMessage($status_code, $message, true);
        return response($response, $status_code);
    }

    public function upload(Request $request){
        $image = $request->image;
//        $fileName = $this->imageService->fileName($image);

        $fileName = $request->name;
        $extension = $this->imageService->fileExtension($image);
        $fileName = $fileName.".".$extension;

        $uploaded = $this->imageService->save($image, $fileName);



        if($uploaded['status']){
            $status_code = $this->createdStatus;
            $message = "Uploaded";
            $response = $this->successMessage($status_code, $message, $uploaded);

            return response($response, $status_code);
        }else{
            $status_code = $this->notImplementedStatus;
            $message = $uploaded['message']? $uploaded['message']: "Not Uploaded";
            $response = $this->failureMessage($status_code, $message);
            return response($response, $status_code);
        }
    }

    public function getImageOriginalSize(Request $request){
        $fileName = $request->fileName;

        $image = $this->imageService->get($fileName);



        if($image['status']){
            return $image['image']->response();
        }else{
            $status_code = $this->notImplementedStatus;
            $message = $image['message']? $image['message']: "Not Found";
            $response = $this->failureMessage($status_code, $message);
            return response($response, $status_code);
        }
    }

    public function getImageResizedSquare(Request $request){
        $fileName = $request->fileName;
        $dim = $request->dim;

        $image = $this->imageService->getResizedSquare($fileName,$dim);



        if($image['status']){
            return $image['image']->response();
        }else{
            $status_code = $this->notImplementedStatus;
            $message = $image['message']? $image['message']: "Not Found";
            $response = $this->failureMessage($status_code, $message);
            return response($response, $status_code);
        }
    }

    public function getImageResizedRectangle(Request $request){
        $fileName = $request->fileName;
        $dimX = $request->dimX;
        $dimY = $request->dimY;

        $image = $this->imageService->getResizedRectangle($fileName,$dimX, $dimY);



        if($image['status']){
            return $image['image']->response();
        }else{
            $status_code = $this->notImplementedStatus;
            $message = $image['message']? $image['message']: "Not Found";
            $response = $this->failureMessage($status_code, $message);
            return response($response, $status_code);
        }
    }

    public function updateImage(Request $request){
//        return public_path(DIRECTORY_SEPARATOR.'assets'.DIRECTORY_SEPARATOR.'img'.DIRECTORY_SEPARATOR."imaeg");
        $updated = $this->imageService->updateImage($request);
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
}
