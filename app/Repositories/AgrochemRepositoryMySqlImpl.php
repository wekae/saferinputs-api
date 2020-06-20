<?php


namespace App\Repositories;


use App\Facades\UtilsFacade;
use App\Models\ActiveIngredients;
use App\Models\Agrochem;
use App\Models\Crops;
use App\Models\PestsDiseaseWeed;
use App\Services\ImageService;
use Illuminate\Database\Eloquent\Builder;

class AgrochemRepositoryMySqlImpl implements AgrochemRepository
{
    protected  $agrochem;
    protected  $imageService;
    public function __construct(Agrochem $agrochem, ImageService $imageService)
    {
        $this->agrochem = $agrochem;
        $this->imageService = $imageService;
    }

    public function create($attributes)
    {
        $request = $attributes['request'];
        $saved_item = $this->agrochem->create($request->only(
            [
                'product_name',
                'pcpb_number',
                'distributing_company',
                'who_class',
                'composition',
                'registrant',
                'type',
                'phi_days',
            ]
        ))->refresh();

        if($request->toxic){
            $saved_item->toxic = UtilsFacade::formatToBinary($request->toxic);
            $saved_item->update();
        }

        $saved_item->activeIngredients()->saveMany(ActiveIngredients::findMany($request->active_ingredients));
        $saved_item->crops()->saveMany(Crops::findMany($request->crops));
        $saved_item->pestsDiseaseWeed()->saveMany(PestsDiseaseWeed::findMany($request->pests_disease_weed));

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
        return $this->agrochem
            ->orderBy($order_column, $order_direction)
            ->paginate($per_page);
    }

    public function find($id){
        return $this->agrochem->find($id);
    }

    public function findCrops($attributes){
        $request = $attributes['request'];

        $items = $this->findRelationItems("crops", $request);

        return $items;
    }
    public function findActiveIngredients($attributes){
        $request = $attributes['request'];

        $items = $this->findRelationItems("activeIngredients", $request);

        return $items;
    }
    public function findPestDiseaseWeeds($attributes){
        $request = $attributes['request'];

        $items = $this->findRelationItems("pestsDiseaseWeed", $request);

        return $items;
    }
    private function findRelationItems($relation, $request){

        try{
            $items = Agrochem::with([$relation => function($query) use($request){
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

    public function getAgrochemNames(){
        return $this->agrochem->select('id','product_name')->orderBy('product_name', 'asc')->get();
    }

    public function update($id, array $attributes)
    {
        $request = $attributes['request'];
        $item = $this->agrochem->find($id);
        if($item){
            $item->update($request->only(
                [
                    'product_name',
                    'pcpb_number',
                    'distributing_company',
                    'who_class',
                    'composition',
                    'registrant',
                    'type',
                    'phi_days',
                ]
            ));

            if($request->toxic){
                $item->toxic = UtilsFacade::formatToBinary($request->toxic);
                $item->update();
            }

            $item->activeIngredients()->sync(ActiveIngredients::findMany($request->active_ingredients));
            $item->crops()->sync(Crops::findMany($request->crops));
            $item->pestsDiseaseWeed()->sync(PestsDiseaseWeed::findMany($request->pests_disease_weed));

            return $item->refresh();
        }else{
            return false;
        }
    }

    public function delete($id)
    {
        $item = $this->agrochem->find($id);
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

        $columns_array = array (
            'product_name',
            'pcpb_number',
            'distributing_company',
            'toxic',
            'who_class',
            'composition',
            'registrant',
            'type',
            'phi_days',
            'image'
        );

        $data = Agrochem::select('id');



        /**
         * Filter data based on the search query
         */
        if($search_value) {
            /**
             * create a nested OR clause to search by specific column
             */
            $data = $data->where(function ($query) use ($columns_array, $search_value, $request) {
                /**
                 * append each table column to the query
                 */
                foreach ($columns_array as $column) {
                    $query->orWhere($column, 'like', '%' . $search_value . '%');
                }
            });
        }
//        }else{
            /*
             * Search spefific columns
             */
            foreach ($request->all() as $key => $value){
                $data = $data->where($key,'like', '%'.$value.'%');
            }
//        }

        /**
         * Get the filtered records
         */
        $data = $data->count();
        return $data;
    }
    public function summaryCountActiveIngredients(array $attributes){
        $request = $attributes["request"];
        $data = $this->getCountSummaryForRelation("activeIngredients", $request);
        return $data;
    }
    public function summaryCountPestsDiseaseWeed(array $attributes){
        $request = $attributes["request"];
        $data = $this->getCountSummaryForRelation("pestsDiseaseWeed", $request);
        return $data;
    }
    public function summaryCountCrops(array $attributes){
        $request = $attributes["request"];
        $data = $this->getCountSummaryForRelation("crops", $request);
        return $data;
    }
    private function getCountSummaryForRelation($relation, $request){
        $data = Agrochem::whereHas($relation, function (Builder $query) use ($request){
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

        $columns_array = array (
            'product_name',
            'pcpb_number',
            'distributing_company',
            'toxic',
            'who_class',
            'composition',
            'registrant',
            'type',
            'phi_days',
            'image'
        );

        $data = Agrochem::select('id','product_name','image');



        /**
         * Filter data based on the search query
         */
        if($search_value) {
            /**
             * create a nested OR clause to search by specific column
             */
            $data = $data->where(function ($query) use ($columns_array, $search_value, $request) {
                /**
                 * append each table column to the query
                 */
                foreach ($columns_array as $column) {
                    $query->orWhere($column, 'like', '%' . $search_value . '%');
                }
            });
        }
//        }else{
            /*
             * Search spefific columns
             */
            foreach ($request->all() as $key => $value){
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

        $columns_array = array (
            'product_name',
            'pcpb_number',
            'distributing_company',
            'toxic',
            'who_class',
            'composition',
            'registrant',
            'type',
            'phi_days',
            'image'
        );

        $data = Agrochem::select();



        /**
         * Filter data based on the search query
         */
        if($search_value) {
            /**
             * create a nested OR clause to search by specific column
             */
            $data = $data->where(function ($query) use ($columns_array, $search_value, $request) {
                /**
                 * append each table column to the query
                 */
                foreach ($columns_array as $column) {
                    $query->orWhere($column, 'like', '%' . $search_value . '%');
                }
            });
        }
//        }else{
            /*
             * Search spefific columns
             */
            foreach ($request->all() as $key => $value){
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
        $data = Agrochem::select(
            'product_name',
            'pcpb_number',
            'distributing_company',
            'toxic',
            'who_class',
            'composition',
            'registrant',
            'type',
            'phi_days',
            'image'
        );
        $recordsFiltered = Agrochem::count();


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

        $recordsTotal = Agrochem::count();



        return response()->json(['draw'=>$draw, 'recordsTotal'=>$recordsTotal, 'recordsFiltered'=>$recordsFiltered, 'data'=>$data]);


    }
}
