<?php


namespace App\Repositories;


use App\Facades\UtilsFacade;
use App\Models\Agrochem;
use App\Models\CommercialOrganic;
use App\models\ControlMethods;
use App\Models\Crops;
use App\Models\Gap;
use App\Models\HomeMadeOrganic;
use App\Models\LocalNames;
use App\Models\PestsDiseaseWeed;
use App\Services\ImageService;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Whoops\Exception\ErrorException;

class PestsDiseaseWeedRepositoryMySqlImpl implements  PestsDiseaseWeedRepository
{
    protected  $pestsDiseaseWeed;
    protected  $imageService;
    private $columns_array;

    public function __construct(PestsDiseaseWeed $pestsDiseaseWeed, ImageService $imageService)
    {
        $this->pestsDiseaseWeed = $pestsDiseaseWeed;
        $this->imageService = $imageService;
        $this->columns_array = array (
            'name',
            'type',
            'scientific_name',
            'description_pest',
            'description_impact',
            'references',
        );
    }

    public function create($attributes)
    {
        $request = $attributes['request'];
        $saved_item = $this->pestsDiseaseWeed->create($request->only($this->columns_array))->refresh();

        $saved_item->localNames()->saveMany(LocalNames::findMany($request->local_names));
        $saved_item->agrochemProducts()->saveMany(Agrochem::findMany($request->agrochem_products));
        $saved_item->gap()->saveMany(Gap::findMany($request->gap));
        $saved_item->homemadeOrganic()->saveMany(HomeMadeOrganic::findMany($request->homemade_organic));
        $saved_item->commercialOrganic()->saveMany(CommercialOrganic::findMany($request->commercial_organic));
        $saved_item->crops()->saveMany(Crops::findMany($request->crops));
        $saved_item->controlMethods()->saveMany(ControlMethods::findMany($request->control_methods));

        //Save image
        $image = $request->image;
        if($image) {
            $saved_item = UtilsFacade::uploadImage($image, $saved_item);
        }

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
        return $this->pestsDiseaseWeed
            ->orderBy($order_column, $order_direction)
            ->paginate($per_page);
    }

    public function find($id){

        return $this->pestsDiseaseWeed->find($id);
    }

    public function findAgrochems($attributes){
        $request = $attributes['request'];

        $items = $this->findRelationItems("agrochemProducts", $request);

        return $items;
    }
    public function findCommercialOrganic($attributes){
        $request = $attributes['request'];

        $items = $this->findRelationItems("commercialOrganic", $request);

        return $items;
    }
    public function findControlMethods($attributes){
        $request = $attributes['request'];

        $items = $this->findRelationItems("controlMethods", $request);

        return $items;
    }
    public function findCrops($attributes){
        $request = $attributes['request'];

        $items = $this->findRelationItems("crops", $request);

        return $items;
    }
    public function findGap($attributes){
        $request = $attributes['request'];

        $items = $this->findRelationItems("gap", $request);

        return $items;
    }
    public function findHomemadeOrganic($attributes){
        $request = $attributes['request'];

        $items = $this->findRelationItems("homemadeOrganic", $request);

        return $items;
    }
    public function findLocalNames($attributes){
        $request = $attributes['request'];

        $items = $this->findRelationItems("localNames", $request);

        return $items;
    }
    private function findRelationItems($relation, $request){

        try{
            $items = PestsDiseaseWeed::with([$relation => function($query) use($request){
                foreach ($request->except('id') as $key => $value){
                    if($key=="toxic"){
                        $query = $query->where($key,UtilsFacade::formatToBinary($value));
                    }else{
                        $query = $query->where($key,'like', '%'.$value.'%');
                    }
                }
            }])->where('id',$request->id)->firstOrFail();

            return $items;
        }catch(\Exception $e){
//            Log::info($e, [$this]);
            return null;
        }
    }

    public function getPestDiseasesWeedsNames(){
        return $this->pestsDiseaseWeed->select('id','name')->orderBy('name', 'asc')->get();
    }

    public function update($id, array $attributes)
    {
        $request = $attributes['request'];
        $item = $this->pestsDiseaseWeed->find($id);
        if($item){
            $this->pestsDiseaseWeed->find($id)->update($request->only($this->columns_array));

            $item->localNames()->sync(LocalNames::findMany($request->local_names));
            $item->agrochemProducts()->sync(Agrochem::findMany($request->agrochem_products));
            $item->gap()->sync(Gap::findMany($request->gap));
            $item->homemadeOrganic()->sync(HomeMadeOrganic::findMany($request->homemade_organic));
            $item->commercialOrganic()->sync(CommercialOrganic::findMany($request->commercial_organic));
            $item->crops()->sync(Crops::findMany($request->crops));

            return $item->refresh();
        }else{
            return false;
        }
    }

    public function delete($id)
    {
        $item = $this->pestsDiseaseWeed->find($id);
        if($item){
            $this->imageService->deleteImage($item);
            $item->delete();
            return true;
        }else{
            return false;
        }
    }

    public function summaryCount(array $attributes){
        $request = $attributes["request"];
        $search_value = $request->search_value;


        $data = PestsDiseaseWeed::select('id');

        /**
         * Filter data based on the search query
         */
        if($search_value) {
            /**
             * create a nested OR clause to search by specific column
             */
            $data = $data->where(function ($query) use ($search_value, $request) {
                /**
                 * append each table column to the query
                 */
                foreach ($this->columns_array as $column) {
                    $query->orWhere($column, 'like', '%' . $search_value . '%');
                }
            });


        }
//        }else{
            /*
             * Search spefific columns
             */
            foreach ($request->only($this->columns_array) as $key => $value){
                $data = $data->where($key,'like', '%'.$value.'%');
            }
//        }

        /**
         * Get the total
         */
        $data = $data->count();
        return $data;
    }
    public function summaryCountAgrochem(array $attributes){
        $request = $attributes["request"];
        $data = $this->getCountSummaryForRelation("agrochemProducts", $request);
        return $data;
    }
    public function summaryCountCommercialOrganic(array $attributes){
        $request = $attributes["request"];
        $data = $this->getCountSummaryForRelation("commecialOrganic", $request);
        return $data;
    }
    public function summaryCountControlMethods(array $attributes){
        $request = $attributes["request"];
        $data = $this->getCountSummaryForRelation("controlMethods", $request);
        return $data;
    }
    public function summaryCountCrops(array $attributes){
        $request = $attributes["request"];
        $data = $this->getCountSummaryForRelation("crops", $request);
        return $data;
    }
    public function summaryCountGap(array $attributes){
        $request = $attributes["request"];
        $data = $this->getCountSummaryForRelation("gap", $request);
        return $data;
    }
    public function summaryCountHomemadeOrganic(array $attributes){
        $request = $attributes["request"];
        $data = $this->getCountSummaryForRelation("homemadeOrganic", $request);
        return $data;
    }
    public function summaryCountLocalNames(array $attributes){
        $request = $attributes["request"];
        $data = $this->getCountSummaryForRelation("localNames", $request);
        return $data;
    }
    private function getCountSummaryForRelation($relation, $request){
        $data = PestsDiseaseWeed::whereHas($relation, function (Builder $query) use ($request){
            foreach ($request->except('id') as $key => $value){
                if($key=="toxic"){
                    $toxic = UtilsFacade::formatToBinary($value);
                    $query = $query->where($key,'like', '%'.$toxic.'%');
                }else{
                    $query = $query->where($key,'like', '%'.$value.'%');
                }
            }
        })->count();
        return $data;
    }

    public function summaryNames(array $attributes){
        $request = $attributes["request"];
        $search_value = $request->search_value;
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

        $data = PestsDiseaseWeed::select('id','name','image');



        /**
         * Filter data based on the search query
         */
        if($search_value) {
            /**
             * create a nested OR clause to search by specific column
             */
            $data = $data->where(function ($query) use ($search_value, $request) {
                /**
                 * append each table column to the query
                 */
                foreach ($this->columns_array as $column) {
                    $query->orWhere($column, 'like', '%' . $search_value . '%');
                }
            });


        }
//        }else{
            /*
             * Search spefific columns
             */
            foreach ($request->only($this->columns_array) as $key => $value){
                $data = $data->where($key,'like', '%'.$value.'%');
            }
//        }


        /**
         * Set ordering
         */
        $data = $data->orderBy($order_column, $order_direction);


        /**
         * Get the filtered records
         */
        $data = $data->paginate($per_page);
        return $data;
    }

    public function filter(array $attributes){
        $request = $attributes["request"];
        $search_value = $request->search_value;
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

        $data = PestsDiseaseWeed::select();



        /**
         * Filter data based on the search query
         */
        if($search_value) {
            /**
             * create a nested OR clause to search by specific column
             */
            $data = $data->where(function ($query) use ($search_value, $request) {
                /**
                 * append each table column to the query
                 */
                foreach ($this->columns_array as $column) {
                    $query->orWhere($column, 'like', '%' . $search_value . '%');
                }
            });


        }
//        }else{
            /*
             * Search spefific columns
             */
            foreach ($request->only($this->columns_array) as $key => $value){
                $data = $data->where($key,'like', '%'.$value.'%');
            }
//        }


        /**
         * Set ordering
         */
        $data = $data->orderBy($order_column, $order_direction);


        /**
         * Get the filtered records
         */
        $data = $data->paginate($per_page);
        return $data;
    }

    public function datatable(array $attributes)
    {
        $request = $attributes["request"];


        (int)$draw = $request->draw;
        $start = $request->start;
        $length = $request->length;
        $search_value = $request->search["value"];
        $order_array = $request->order;
        $columns_array = $request->columns;

//        Initial Query  with fields to be selected
        $data = PestsDiseaseWeed::select(
            'id',
            'name',
            'type',
            'scientific_name',
            'description_pest',
            'description_impact',
            'references'
        );
        $recordsFiltered = PestsDiseaseWeed::count();


//        Filter data based on the search query
        if($search_value){
//            create an AND with nested OR clause
            $data = $data->where(function($query) use($columns_array, $search_value){
//                append each table column to the query
                foreach ($columns_array as $column){
                    $query->orWhere($column['data'],'like','%'.$search_value.'%');
                }

            });
            $recordsFiltered = $data->count();
        }


//        Set ordering
        if($order_array){
            foreach ($order_array as $order){
                $column_index = $order['column'];

                $order_column = $columns_array[$column_index]['data'];
                $order_direction = $order["dir"];

                $data = $data->orderBy($order_column, $order_direction);
            }
        }


//        Set limit and offset for pagination
        if($start){
            $data = $data
                ->skip($start);
        }
        if($length){
            $data = $data
                ->take($length);
        }

        $data = $data->get();

        $recordsTotal = PestsDiseaseWeed::count();



        return ['draw'=>$draw, 'recordsTotal'=>$recordsTotal, 'recordsFiltered'=>$recordsFiltered, 'data'=>$data];


    }
}
