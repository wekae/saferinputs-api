<?php


namespace App\Repositories;


use App\Facades\UtilsFacade;
use App\Http\Resources\CropsCollection;
use App\Http\Resources\CropsResource;
use App\Models\Agrochem;
use App\Models\Crops;
use App\Models\PestsDiseaseWeed;
use App\Services\ImageService;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\QueryException;

class CropsRepositoryMysqlImpl implements CropsRepository
{
    protected  $crops;
    protected  $imageService;
    private $columns_array;
    public function __construct(Crops $crops, ImageService $imageService)
    {
        $this->crops = $crops;
        $this->imageService = $imageService;
        $this->columns_array = array (
            'name'
        );
    }

    public function create($attributes)
    {
        try{
            $request = $attributes['request'];
            $data = $this->crops->create($request->only($this->columns_array))->refresh();

            $data->pestsDiseaseWeed()->saveMany(PestsDiseaseWeed::findMany($request->pests_disease_weed));
            $data->agrochem()->saveMany(Agrochem::findMany($request->agrochems));

            //Save image
            $image = $request->image;
            if($image) {
                $data = UtilsFacade::uploadImage($image, $data);
            }
            return array(
                'success'=>true,
                'item'=>$data
            );
        }catch (QueryException $e) {
            $error_code = $e->errorInfo[1];
            //Determine duplicate key using error code
            if ($error_code == 1062) {
                $return_date = array(
                    'success'=>false,
                    'duplicate'=>true);
                return $return_date;
            }
        }
//        //handle mass insert
//        return array(
//            'success'=>true,
//            'item'=>$this->crops->insertOrIgnore($attributes)
//        );
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
        return $this->crops
            ->orderBy($order_column, $order_direction)
            ->paginate($per_page);
    }

    public function find($id){
        return $this->crops->find($id);
    }
    public function findAgrochems($attributes){
        $request = $attributes['request'];

        $items = $this->findRelationItems("agrochem", $request);

        return $items;
    }
    public function findPestsDiseasesWeeds($attributes){
        $request = $attributes['request'];

        $items = $this->findRelationItems("pestsDiseaseWeed", $request);

        return $items;
    }
    private function findRelationItems($relation, $request){

        try{
            $items = Crops::with([$relation => function($query) use($request){
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

    public function getCropNames(){
        return $this->crops->select('id','name')->orderBy('name', 'asc')->get();
    }


    public function update($id, array $attributes)
    {
        $request = $attributes['request'];
        $item = $this->crops->find($id);

        if($item){
            $item->update($request->only($this->columns_array));
            $item->agrochem()->sync(Agrochem::findMany($request->agrochems));
            $item->pestsDiseaseWeed()->sync(PestsDiseaseWeed::findMany($request->pests_disease_weed));

            return $item->refresh();
        }else{
            return false;
        }
    }

    public function delete($id)
    {
        $item = $this->crops->find($id);
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

        $data = Crops::select('id');

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
    public function summaryCountAgrochems(array $attributes){
        $request = $attributes["request"];
        $data = $this->getCountSummaryForRelation("agrochem", $request);
        return $data;
    }
    public function summaryCountPestsDiseasesWeeds(array $attributes){
        $request = $attributes["request"];
        $data = $this->getCountSummaryForRelation("pestsDiseaseWeed", $request);
        return $data;
    }
    private function getCountSummaryForRelation($relation, $request){
        $data = Crops::whereHas($relation, function (Builder $query) use ($request){
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
            $order_direction="desc";
        }
        if($per_page==null){
            $per_page=config('app.items_per_page');
        }

        $data = Crops::select('id','name','image');



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
            $order_direction="desc";
        }
        if($per_page==null){
            $per_page=config('app.items_per_page');
        }

        $data = Crops::select();



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
        $data = Crops::select(
            'id',
            'name'
        );
        $recordsFiltered = Crops::count();


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

        $recordsTotal = Crops::count();



        return response()->json(['draw'=>$draw, 'recordsTotal'=>$recordsTotal, 'recordsFiltered'=>$recordsFiltered, 'data'=>$data]);


    }


}
