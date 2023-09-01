<?php


namespace App\Services\Cms;


use App\Enums\EntityAssociationEnum;
use App\Http\Requests\cms\EntityRequest;
use App\Repositories\Cms\EntityRepositoryMysqlImpl;
use Illuminate\Http\Request;

class EntityService
{

    protected $entityRepository;

    public function __construct(EntityRepositoryMysqlImpl $entityRepository)
//    public function __construct(EntityRepositoryMysqlImpl $entityRepository)
    {
        $this->entityRepository = $entityRepository ;
    }

    public function findAll(Request $request){
        $attributes = array("request"=>$request);
        return $this->entityRepository->all($attributes);
    }

    public function find($id){
        return $this->entityRepository->find($id);
    }

    public function create(EntityRequest $request){
        $attributes = array("request" => $request);
        return $this->entityRepository->create($attributes);
    }

    public function update(EntityRequest $request, $id){
        $attributes = array("request"=>$request);
        return $this->entityRepository->update($id, $attributes);
    }

    public function delete($id){
        return $this->entityRepository->delete($id);
    }

    public function findDownloads(Request $request){
        $attributes = array("request"=>$request);
        return $this->entityRepository->findDownloads($attributes);
    }
    public function findMedia(Request $request){
        $attributes = array("request"=>$request);
        return $this->entityRepository->findMedia($attributes);
    }


    /**
     * @return mixed
     */
    public function createEntity(){
        $entity_item = $this->create(new EntityRequest());
        return $entity_item;
    }

    /**
     * @param $item
     * @param EntityAssociationEnum $association
     */
    public function createEntityIfNone($item, EntityAssociationEnum $association): void
    {
        if ($item->entity == null) {
            //Create new entity if post is not associated with an entity
            $entity = $this->createEntity();
            switch($association){
                case EntityAssociationEnum::POST_ASSOCIATION():
                    $entity->post()->save($item);
                    break;
                case EntityAssociationEnum::MEDIA_ASSOCIATION():
                    $entity->media()->save($item);
                    break;
                case EntityAssociationEnum::DOWNLOADS_ASSOCIATION():
                    $entity->downloads()->save($item);
                    break;
            }
            $entity->save();
        }
    }

    /**
     * @param $item
     * @param EntityAssociationEnum $association
     * @return mixed
     */
    public function associateToEntity($item, EntityAssociationEnum $association)
    {
        $entity = $this->createEntity();
        switch($association){
            case EntityAssociationEnum::POST_ASSOCIATION():
                $entity->post()->save($item);
                break;
            case EntityAssociationEnum::MEDIA_ASSOCIATION():
                $entity->media()->save($item);
                break;
            case EntityAssociationEnum::DOWNLOADS_ASSOCIATION():
                $entity->downloads()->save($item);
                break;
        }
        $entity->save();

        return $item;
    }


    /**
     * @param $entityId
     * @param EntityAssociationEnum $association
     * @return mixed
     */
    public function associateToExistingEntity($entityId, $item, EntityAssociationEnum $association)
    {
        $entity = $this->find($entityId);
        if($entity){
            switch($association){
                case EntityAssociationEnum::POST_ASSOCIATION():
                    $entity->post()->save($item);
                    break;
                case EntityAssociationEnum::MEDIA_ASSOCIATION():
                    $entity->media()->save($item);
                    break;
                case EntityAssociationEnum::DOWNLOADS_ASSOCIATION():
                    $entity->downloads()->save($item);
                    break;
            }
            $entity->save();
        }

        return $item;
    }

}
