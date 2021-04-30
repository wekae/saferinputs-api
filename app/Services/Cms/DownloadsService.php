<?php


namespace App\Services\Cms;


use App\Enums\EntityAssociationEnum;
use App\Http\Requests\cms\DownloadsRequest;
use App\Repositories\Cms\DownloadsRepositoryMysqlImpl;
use App\Services\DownloadFilesService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class DownloadsService
{
    protected $downloadsRepository;
    protected $downloadFilesService;
    protected $entityService;

    public function __construct(DownloadsRepositoryMysqlImpl $downloadsRepository, DownloadFilesService $downloadFilesService, EntityService $entityService)
    {
        $this->downloadsRepository = $downloadsRepository ;
        $this->downloadFilesService = $downloadFilesService ;
        $this->entityService = $entityService ;
    }

    public function findAll(Request $request){
        $attributes = array("request"=>$request);
        return $this->downloadsRepository->all($attributes);
    }

    public function find($id){
        return $this->downloadsRepository->find($id);
    }

    public function download($token){
        $downloadItem = $this->downloadsRepository->findByToken($token);
        if($downloadItem){
            return $this->downloadFilesService->get($downloadItem->file_name, $downloadItem->name, $downloadItem->year, $downloadItem->month);
        }else{
            return null;
        }
    }

    public function create(DownloadsRequest $request){
        $attributes = array("request"=>$request);

        $item = $this->downloadsRepository->create($attributes);
        if($item){
            $this->entityService->associateToEntity($item, EntityAssociationEnum::DOWNLOADS_ASSOCIATION());
            $item->refresh();
        }
        return $item;
    }

    public function addAssociationDownload(DownloadsRequest $request){
        $returnArray = array();
        foreach ($request->name as $index => $name){
//            try{
                $description = $request->description[$index] ? $request->description[$index]: null;
                $file = array_key_exists($index, $request->file) ? $request->file[$index]: null;
                $url = array_key_exists($index, $request->url) ? $request->url[$index]: null;
                $mediaRequest = new DownloadsRequest();
                $mediaRequest->replace([
                    "name" => $name? $name: null,
                    "description" => $description,
                    "file" => $file,
                    "url" => $url,
                ]);

                $attr = array("request"=>$mediaRequest);
                $item = $this->downloadsRepository->create($attr);
                if($item){
                    $this->entityService->associateToExistingEntity($request->entity_id, $item, EntityAssociationEnum::MEDIA_ASSOCIATION());
                    $item->refresh();
                }
                array_push($returnArray, $item) ;
//            }catch (\Exception $e){
//                Log::error($e->getMessage());
//            }
        }

        return $returnArray;
    }

    public function update(DownloadsRequest $request, $id){
        $attributes = array("request"=>$request);
        $item = $this->downloadsRepository->find($id);
        if($item){
            $this->entityService->createEntityIfNone($item, EntityAssociationEnum::DOWNLOADS_ASSOCIATION());
            return $this->downloadsRepository->update($id, $attributes);
        }else{
            return false;
        }
    }

    public function updateFile(Request $request){
        $item = $this->downloadsRepository->find($request->id);
        if($item){
            $this->entityService->createEntityIfNone($item, EntityAssociationEnum::DOWNLOADS_ASSOCIATION());
            return $this->downloadFilesService->updateFile($request);
        }else{
            return false;
        }
    }

    public function delete($id){
        return $this->downloadsRepository->delete($id);
    }

    public function filter(Request $request){
        $attributes = array('request'=>$request);
        return $this->downloadsRepository->filter($attributes);
    }

    public function summaryCount(Request $request){
        $attributes = array('request'=>$request);
        return $this->downloadsRepository->summaryCount($attributes);
    }

    public function summaryNames(Request $request){
        $attributes = array('request'=>$request);
        return $this->downloadsRepository->summaryNames($attributes);
    }

    public function dataTable(Request $request){
        $attributes = array("request"=>$request);
        return $this->downloadsRepository->datatable($attributes);
    }


}
