<?php


namespace App\Repositories\Cms;


use App\Models\Cms\Entity;
use App\Services\Cms\DownloadsService;
use App\Services\Cms\MediaService;
use App\Services\ImageService;

class EntityRepositoryMysqlImpl implements EntityRepository
{
    protected  $entity;
    private $columns_array;

    public function __construct(Entity $entity)
    {
        $this->entity = $entity;
        $this->columns_array = array (
        );
    }

    public function create($attributes)
    {
        $request = $attributes['request'];
        $saved_item = $this->entity->create($request->only($this->columns_array))->refresh();

        return $saved_item->refresh();
    }

    public function all($attributes){
        $request = $attributes["request"];
        $order_column = $request->order_column;
        $order_direction = $request->order_direction;
        $per_page = $request->per_page;
        if($order_column==null){
            $order_column="id";
        }
        if($order_direction==null){
            $order_direction="asc";
        }
        if($per_page==null){
            $per_page=config('app.items_per_page');
        }
        return $this->entity
            ->orderBy($order_column, $order_direction)
            ->paginate($per_page);
    }

    public function find($id){

        return $this->entity->find($id);
    }

    public function findMedia($attributes){
        $request = $attributes['request'];

        $items = $this->findRelationItems("media", $request);

        return $items;
    }
    public function findDownloads($attributes){
        $request = $attributes['request'];

        $items = $this->findRelationItems("downloads", $request);

        return $items;
    }
    private function findRelationItems($relation, $request){

        try{
            $items = Entity::with([$relation => function($query) use($request){
                foreach ($request->except('entity_id') as $key => $value){
                    $query = $query->where($key,'like', '%'.$value.'%');
                }
            }])->where('id',$request->entity_id)->firstOrFail();

            return $items;
        }catch(\Exception $e){
//            Log::info($e, [$this]);
            return null;
        }
    }

    public function update($id, array $attributes)
    {
        $request = $attributes['request'];
        $item = $this->entity->find($id);
        if($item){
            $this->entity->find($id)->update($request->only($this->columns_array));

            return $item->refresh();
        }else{
            return false;
        }
    }

    public function delete($id)
    {
        $item = $this->entity->find($id);
        if($item){
            // TODO Implement deleting media, downloads, posts and comments for the entity
            $item->delete();
            return true;
        }else{
            return false;
        }
    }


}
