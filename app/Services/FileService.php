<?php


namespace App\Services;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class FileService
{
    protected $basePath = 'assets';
    protected $storageBasePath = 'public'.DIRECTORY_SEPARATOR.'assets';
    protected $storagePublicPath = 'storage'.DIRECTORY_SEPARATOR.'assets';
    protected $directory = '';

    public function __construct()
    {

    }

    public function setDirectory($directory){
        $this->directory = $directory;
    }

    public function fileName($file){
        $file_name = $file->getClientOriginalName();
//        $file_name = $file->getClientOriginalName();
        return $file_name;
    }

    public function fileExtension($file){
        $file_extension = $file->getClientOriginalExtension();
        return $file_extension;
    }

    public function realPath($file){
        $real_path = $file->getRealPath();
        return $real_path;
    }

    public function size($file){
        $size = $file->getSize();
        return $size;
    }

    public function mimeType($file){
        $mime_type = $file->getMimeType();
        return $mime_type;
    }

    public function upload($file, $file_name, $path){
        $file->move($path, $file_name);
    }

    public function delete($image){
        if(File::exists(public_path(DIRECTORY_SEPARATOR.'assets'.DIRECTORY_SEPARATOR.$this->directory.DIRECTORY_SEPARATOR.$image))){
            return File::delete(public_path(DIRECTORY_SEPARATOR.'assets'.DIRECTORY_SEPARATOR.$this->directory.DIRECTORY_SEPARATOR.$image));
        }else{
            return false;
        }
    }

    function generateToken()
    {
        return md5(rand(1, 10) . microtime());
    }
}
