<?php


namespace App\Services;


use App\Facades\UtilsFacade;
use App\Models\ActiveIngredients;
use App\Models\Agrochem;
use App\Models\CommercialOrganic;
use App\models\ControlMethods;
use App\Models\Crops;
use App\Models\Gap;
use App\Models\HomeMadeOrganic;
use App\Models\LocalNames;
use App\Models\PestsDiseaseWeed;
use Exception;
use Illuminate\Http\Request;
use Intervention\Image\Exception\NotWritableException;
use Intervention\Image\Facades\Image;

class ImageService extends FileService
{

    protected $directory = 'img';
    protected $imagePath;



    public function __construct()
    {
        parent::__construct();
        $this->imagePath = $this->basePath.DIRECTORY_SEPARATOR.$this->directory.DIRECTORY_SEPARATOR;
    }

    public function encode($image){

    }

    public function save($image, $fileName){
        $path = $this->imagePath.$fileName;

        // resizing an uploaded file
        try{
            Image::make($image)->save($path);
            return array(
                'status'=>true
            );
        }catch (NotWritableException $e){
            return array(
                'status'=>false,
                'message'=>'Path does not exist'
            );
        }catch (Exception $e){
            return array(
                'status'=>false
            );
        }
    }

    public function get($filename){
        $path = $this->imagePath.$filename;
//        return $path;
        try{
//            $img = Image::make($path);
            // pass calls to image cache
            $img = Image::cache(function($image) use ($path) {
                $image->make($path);
            }, 10, true);
            return array(
                'status'=>true,
                'image'=>$img
            );
        }catch(Exception $e){
            return $e->getMessage();
//            return array(
//                'status'=>false,
//                'message'=>'Image does not exist'
//            );
        }
    }

    public function getResizedSquare($filename, $dim){
        $path = $this->imagePath.$filename;
        try{
//            $img = Image::make($path)->resize($dim, $dim);
            // pass calls to image cache
            $img = Image::cache(function($image) use ($path, $dim) {
                $image->make($path)->resize($dim, $dim);
            }, 10, true);
            return array(
                'status'=>true,
                'image'=>$img
            );
        }catch(Exception $e){
            return array(
                'status'=>false,
                'message'=>'Image does not exist'
            );
        }
    }

    public function getResizedRectangle($filename, $dimX, $dimY){
        $path = $this->imagePath.$filename;
        try{
//            $img = Image::make($path)->resize($dimX, $dimY);
            // pass calls to image cache
            $img = Image::cache(function($image) use ($path, $dimX, $dimY) {
                $image->make($path)->resize($dimX, $dimY);
            }, 10, true);
            return array(
                'status'=>true,
                'image'=>$img
            );
        }catch(Exception $e){
            return array(
                'status'=>false,
                'message'=>'Image does not exist'
            );
        }
    }

    public function updateImage(Request $request){
        if ($request->is('api/active_ingredients/*/image')) {
            $item = ActiveIngredients::find($request->id);
            $result = $this->performUpdate($request, $item);
            return $result;
        }else if ($request->is('api/agrochem/*/image')) {
            $item = Agrochem::find($request->id);
            $result = $this->performUpdate($request, $item);
            return $result;
        }else if ($request->is('api/commercial_organic/*/image')) {
            $item = CommercialOrganic::find($request->id);
            $result = $this->performUpdate($request, $item);
            return $result;
        }else if ($request->is('api/crops/*/image')) {
            $item = Crops::find($request->id);
            $result = $this->performUpdate($request, $item);
            return $result;
        }else if ($request->is('api/control_methods/*/image')) {
            $item = ControlMethods::find($request->id);
            $result = $this->performUpdate($request, $item);
            return $result;
        }else if ($request->is('api/gap/*/image')) {
            $item = Gap::find($request->id);
            $result = $this->performUpdate($request, $item);
            return $result;
        }else if ($request->is('api/homemade_organic/*/image')) {
            $item = HomeMadeOrganic::find($request->id);
            $result = $this->performUpdate($request, $item);
            return $result;
        }else if ($request->is('api/local_names/*/image')) {
            $item = LocalNames::find($request->id);
            $result = $this->performUpdate($request, $item);
            return $result;
        }else if ($request->is('api/pdw/*/image')) {
            $item = PestsDiseaseWeed::find($request->id);
            $result = $this->performUpdate($request, $item);
            return $result;
        }else
            return array('status' => false);
    }

    /**
     * @param $image
     * @param $saved_item
     */
    public function updateImageOp($image, $saved_item)
    {
        $extension = $this->fileExtension($image);
        $fileName = $this->generateToken() . "." . $extension;

        $this->delete($saved_item->image);

        $uploaded = $this->save($image, $fileName);
        if ($uploaded['status']) {
            $saved_item->image = $fileName;
            $saved_item->save();
        }

        return $saved_item;
    }

    /**
     * @param $image
     * @param $saved_item
     */
    public function deleteImage($saved_item)
    {
        $this->delete($saved_item->image);
        return $saved_item;
    }

    /**
     * @param Request $request
     * @param $item
     * @return bool
     */
    public function performUpdate(Request $request, $item): array
    {
        if ($item) {
            //Save image
            $image = $request->image;
            if ($image) {
                $item = $this->updateImageOp($image, $item);
                $result = array(
                    'status' => true,
                    'item' => $item
                );
                return $result; // Image found in request and uploaded
            } else {
                $result = array(
                    'status' => false,
                    'message' => 'Image not found'
                );
                return $result; // Image not found in request
            }
        } else {
            $result = array(
                'status' => false,
                'message' => 'Item not found'
            );
            return $result; // Item not found
        }
    }

}
