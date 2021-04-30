<?php


namespace App\Services\Cms;


use App\Enums\EntityAssociationEnum;
use App\Events\MediaUpdated;
use App\Http\Requests\cms\MediaRequest;
use App\Repositories\Cms\MediaRepositoryMysqlImpl;
use App\Services\MediaFilesService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class MediaService
{
    protected $mediaRepository;
    protected $mediaFilesService;
    protected $entityService;

    public function __construct(MediaRepositoryMysqlImpl $mediaRepository, MediaFilesService $mediaFilesService, EntityService $entityService)
    {
        $this->mediaRepository = $mediaRepository ;
        $this->mediaFilesService = $mediaFilesService ;
        $this->entityService = $entityService ;
    }

    public function findAll(Request $request){
        $attributes = array("request"=>$request);
        return $this->mediaRepository->all($attributes);
    }

    public function find($id){
        return $this->mediaRepository->find($id);
    }
    public function findByToken($token){
        return $this->mediaRepository->findByToken($token);
    }

    public function getMedia($token){
        $mediaItem = $this->mediaRepository->findByToken($token);
        if($mediaItem){
            return $this->mediaFilesService->getMedia($mediaItem->file_name, $mediaItem->year, $mediaItem->month);
        }else{
            return array(
                "status" => false
            );
        }
    }

    public function getMediaResizedSquare($token, $dim){
        $mediaItem = $this->mediaRepository->findByToken($token);
        if($mediaItem){
            return $this->mediaFilesService->getMediaResizedSquare($mediaItem->file_name, $mediaItem->year, $mediaItem->month, $dim);
        }else{
            return array(
                "status" => false
            );
        }
    }

    public function getMediaResizedRectangle($token, $dimX, $dimY){
        $mediaItem = $this->mediaRepository->findByToken($token);
        if($mediaItem){
            return $this->mediaFilesService->getMediaResizedRectangle($mediaItem->file_name, $mediaItem->year, $mediaItem->month, $dimX, $dimY);
        }else{
            return array(
                "status" => false
            );
        }
    }

    public function create(MediaRequest $request){
        $attributes = array("request"=>$request);

        $item = $this->mediaRepository->create($attributes);
        if($item){
            $this->entityService->associateToEntity($item, EntityAssociationEnum::MEDIA_ASSOCIATION());
            $item->refresh();
        }
        return $item;
    }

    public function addAssociationMedia(MediaRequest $request){
        $returnArray = array();
        foreach ($request->name as $index => $name){
            try{

                $description = array_key_exists($index, $request->description) ? $request->description[$index]: null;
                $file = $request->file[$index] ? $request->file[$index]: null;
                $mediaRequest = new MediaRequest();
                $mediaRequest->replace([
                    "name" => $name? $name: null,
                    "description" => $description,
                    "file" => $file,
                ]);

                $attr = array("request"=>$mediaRequest);
                $item = $this->mediaRepository->create($attr);
                if($item){
                    $this->entityService->associateToExistingEntity($request->entity_id, $item, EntityAssociationEnum::MEDIA_ASSOCIATION());
                    $item->refresh();
                }
                array_push($returnArray, $item) ;
            }catch (\Exception $e){
                Log::error($e->getMessage());
            }
        }

        return $returnArray;
    }

    public function update(MediaRequest $request, $id){
        $attributes = array("request"=>$request);
        $item = $this->mediaRepository->find($id);
        if($item){
            $this->entityService->createEntityIfNone($item, EntityAssociationEnum::MEDIA_ASSOCIATION());
            return $this->mediaRepository->update($id, $attributes);
        }else{
            return false;
        }
    }

    public function updateFile(Request $request){
        $item = $this->mediaRepository->find($request->id);
        if($item){
            $this->entityService->createEntityIfNone($item, EntityAssociationEnum::MEDIA_ASSOCIATION());
            $result = $this->mediaFilesService->updateMedia($request);

            //Update token if media belongs to post
            $oldToken = $item->token;
            event(new MediaUpdated($oldToken, $result["item"]->token));

            return $result;
        }else{
            return false;
        }
    }

    public function delete($id){
        return $this->mediaRepository->delete($id);
    }

    public function filter(Request $request){
        $attributes = array('request'=>$request);
        return $this->mediaRepository->filter($attributes);
    }

    public function summaryCount(Request $request){
        $attributes = array('request'=>$request);
        return $this->mediaRepository->summaryCount($attributes);
    }

    public function summaryNames(Request $request){
        $attributes = array('request'=>$request);
        return $this->mediaRepository->summaryNames($attributes);
    }

    public function dataTable(Request $request){
        $attributes = array("request"=>$request);
        return $this->mediaRepository->datatable($attributes);
    }





}
