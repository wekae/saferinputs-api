<?php


namespace App\Services;


use App\Models\Cms\Media;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Exception\NotWritableException;

class MediaFilesService extends ImageService
{
    protected $directory = 'media';
    protected $directoryPath;



    public function __construct()
    {
        parent::__construct();
        $this->directoryPath = $this->storageBasePath.DIRECTORY_SEPARATOR.$this->directory.DIRECTORY_SEPARATOR;

    }

    public function saveMedia($file, $fileName, $year, $month){
        $subDirectory = $year.DIRECTORY_SEPARATOR.$month;
        $filePath = $this->directoryPath.$subDirectory;

        // Create directory if it doesn't exist
        $this->createDirectory($filePath);

        $path = $filePath;

        try{
            $generatedPath = Storage::putFileAs(
                $path,
                $file,
                $fileName
            );
            return array(
                'status' => true,
                'path' => $generatedPath
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

    public function getMedia($fileName, $year, $month){
        $basePath = $this->storagePublicPath;
        $this->imagePath = $basePath.DIRECTORY_SEPARATOR.$this->directory.DIRECTORY_SEPARATOR.$year.DIRECTORY_SEPARATOR.$month.DIRECTORY_SEPARATOR;
        return parent::get($fileName);
    }

    public function getMediaResizedRectangle($filename, $year, $month, $dimX, $dimY)
    {
        $basePath = $this->storagePublicPath;
        $this->imagePath = $basePath.DIRECTORY_SEPARATOR.$this->directory.DIRECTORY_SEPARATOR.$year.DIRECTORY_SEPARATOR.$month.DIRECTORY_SEPARATOR;
        return parent::getResizedRectangle($filename, $dimX, $dimY);
    }

    public function getMediaResizedSquare($filename, $year, $month, $dim)
    {
        $basePath = $this->storagePublicPath;
        $this->imagePath = $basePath.DIRECTORY_SEPARATOR.$this->directory.DIRECTORY_SEPARATOR.$year.DIRECTORY_SEPARATOR.$month.DIRECTORY_SEPARATOR;
        return parent::getResizedSquare($filename, $dim);
    }

    public function updateMedia(Request $request){
        $item = Media::find($request->id);
        $result = $this->performUpdate($request, $item);
        return $result;
    }

    public function deleteMedia($file, $year, $month)
    {
        if(Storage::exists(DIRECTORY_SEPARATOR.$this->storageBasePath.DIRECTORY_SEPARATOR.$this->directory.DIRECTORY_SEPARATOR.$year.DIRECTORY_SEPARATOR.$month.DIRECTORY_SEPARATOR.$file)){
            return Storage::delete(DIRECTORY_SEPARATOR.$this->storageBasePath.DIRECTORY_SEPARATOR.$this->directory.DIRECTORY_SEPARATOR.$year.DIRECTORY_SEPARATOR.$month.DIRECTORY_SEPARATOR.$file);
        }else{
            return false;
        }
    }

    public function performUpdate(Request $request, $item): array
    {
        if ($item) {
            //Save File
            $file = $request->file;
            if ($file) {
                $item = $this->updateFileOp($file, $item);
                $result = array(
                    'status' => true,
                    'item' => $item
                );
                return $result; // File found in request and uploaded
            } else {
                $result = array(
                    'status' => false,
                    'message' => 'File not found'
                );
                return $result; // File not found in request
            }
        } else {
            $result = array(
                'status' => false,
                'message' => 'Item not found'
            );
            return $result; // Item not found
        }
    }

    /**
     * @param $file
     * @param $saved_item
     */
    public function updateFileOp($file, $saved_item)
    {
        $extension = $this->fileExtension($file);
        $token = $this->generateToken();
        $fileName = $token . "." . $extension;

        $this->deleteMedia($saved_item->file_name, $saved_item->year, $saved_item->month);

        $uploaded = $this->saveMedia($file, $fileName, $saved_item->year, $saved_item->month);
        if ($uploaded['status']) {
            $saved_item->file_name = $fileName;
            $saved_item->token = $token;
            $saved_item->save();
        }

        return $saved_item;
    }

    public function createDirectory($path)
    {
        if(!Storage::exists($path)){
            Storage::makeDirectory($path);
        }
    }

}
