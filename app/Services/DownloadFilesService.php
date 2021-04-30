<?php


namespace App\Services;


use App\Models\Cms\Downloads;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Exception\NotWritableException;
use Intervention\Image\Facades\Image;

class DownloadFilesService extends FileService
{
    protected $directory = 'downloads';
    protected $directoryPath;



    public function __construct()
    {
        parent::__construct();
        $this->directoryPath = $this->storageBasePath.DIRECTORY_SEPARATOR.$this->directory.DIRECTORY_SEPARATOR;

    }


    public function save($file, $fileName, $year, $month){
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

    public function get($filename, $name, $year, $month){
        $path = $this->directoryPath.$year.DIRECTORY_SEPARATOR.$month.DIRECTORY_SEPARATOR.$filename;
        try{
//            $url = Storage::temporaryUrl(
//                $path,
//                now()->addMinutes(55),
//                [
//                    'ResponseContentType' => 'application/octet-stream',
//                    'ResponseContentDisposition' => 'attachment; filename='.$filename,
//                ]
//            );
//            return array(
//                'status'=>true,
//                'url'=>$url
//            );
            return Storage::download($path, $filename);

        }catch(Exception $e){
            return array(
                'status'=>false,
                'message'=>'File does not exist'
            );
        }
    }


    public function updateFile(Request $request){
        $item = Downloads::find($request->id);
        $result = $this->performUpdate($request, $item);
        return $result;
    }

    public function deleteDownload($file, $year, $month)
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

        $this->deleteDownload($saved_item->file_name, $saved_item->year, $saved_item->month);

        $uploaded = $this->save($file, $fileName, $saved_item->year, $saved_item->month);
        if ($uploaded['status']) {
            $saved_item->file_name = $fileName;
            $saved_item->token = $token;
            $saved_item->path = $uploaded["path"];
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
