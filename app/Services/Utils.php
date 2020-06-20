<?php


namespace App\Services;


class Utils
{
    protected  $imageService;
    public function __construct(ImageService $imageService)
    {
        $this->imageService = $imageService;
    }

    public function formatToBinary($value){
        if($value=="true"|| $value>0){
            $binary_value = 1;
        }else if($value=="false"|| $value<=0){
            $binary_value = 0;
        }else if($value==false){
            $binary_value = 0;
        }else if($value==true){
            $binary_value = 1;
        }

        return $binary_value;
    }



    /**
     * @param $image
     * @param $saved_item
     */
    public function uploadImage($image, $saved_item)
    {
        $extension = $this->imageService->fileExtension($image);
        $fileName = $this->imageService->generateToken() . "." . $extension;

        $uploaded = $this->imageService->save($image, $fileName);
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
    public function updateImage($image, $saved_item)
    {
        $extension = $this->imageService->fileExtension($image);
        $fileName = $this->imageService->generateToken() . "." . $extension;

        $this->imageService->delete($saved_item->image);

        $uploaded = $this->imageService->save($image, $fileName);
        if ($uploaded['status']) {
            $saved_item->image = $fileName;
            $saved_item->save();
        }

        return $saved_item;
    }

}
