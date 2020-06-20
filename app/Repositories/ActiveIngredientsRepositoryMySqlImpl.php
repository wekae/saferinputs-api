<?php


namespace App\Repositories;


use App\Facades\UtilsFacade;
use App\Models\ActiveIngredients;
use App\Models\Agrochem;
use Illuminate\Database\Eloquent\Builder;

class ActiveIngredientsRepositoryMySqlImpl implements ActiveIngredientsRepository
{

    protected  $activeIngredients;
    public function __construct(ActiveIngredients $activeIngredients)
    {
        $this->activeIngredients = $activeIngredients;
    }

    public function create($attributes)
    {
        $request = $attributes['request'];
        $saved_item = $this->activeIngredients->create($request->only(
            [
                'name',
                'potential_harm',
                'aquatic',
                'aquatic_desc',
                'bees',
                'bees_desc',
                'earthworm',
                'earthworm_desc',
                'birds',
                'birds_desc',
                'leachability',
                'leachability_desc',
                'carcinogenicity',
                'mutagenicity',
                'edc',
                'reproduction',
                'ache',
                'neurotoxicant',
                'who_classification',
                'eu_approved',
            ]
        ))->refresh();

        $saved_item->agrochem()->saveMany(Agrochem::findMany($request->agrochems));

        //Save image
        $image = $request->image;
        if($image!=null) {
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
        return $this->activeIngredients
            ->orderBy($order_column, $order_direction)
            ->paginate($per_page);
    }

    public function find($id){
        return $this->activeIngredients->find($id);
    }

    public function findAgrochems($attributes){
        $request = $attributes['request'];

        $items = $this->findRelationItems("agrochem", $request);

        return $items;
    }
    private function findRelationItems($relation, $request){

        try{
            $items = ActiveIngredients::with([$relation => function($query) use($request){
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

    public function getActiveIngredientNames(){
        return $this->activeIngredients->select('id','name')->orderBy('name', 'asc')->get();
    }

    public function update($id, array $attributes)
    {
        $request = $attributes['request'];

        $item = $this->activeIngredients->find($id);
        if($item){
            $this->activeIngredients->find($id)->update($request->only(
                [
                    'name',
                    'potential_harm',
                    'aquatic',
                    'aquatic_desc',
                    'bees',
                    'bees_desc',
                    'earthworm',
                    'earthworm_desc',
                    'birds',
                    'birds_desc',
                    'leachability',
                    'leachability_desc',
                    'carcinogenicity',
                    'mutagenicity',
                    'edc',
                    'reproduction',
                    'ache',
                    'neurotoxicant',
                    'who_classification',
                    'eu_approved',
                ]
            ));


            $item->agrochem()->sync(Agrochem::findMany($request->agrochems));

            return $item->refresh();
        }else{
            return false;
        }
    }

    public function delete($id)
    {
        $item = $this->activeIngredients->find($id);
        if($item){
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
            'name',
            'potential_harm',
            'aquatic',
            'aquatic_desc',
            'bees',
            'bees_desc',
            'earthworm',
            'earthworm_desc',
            'birds',
            'birds_desc',
            'leachability',
            'leachability_desc',
            'carcinogenicity',
            'mutagenicity',
            'edc',
            'reproduction',
            'ache',
            'neurotoxicant',
            'who_classification',
            'eu_approved',
        );

        $data = ActiveIngredients::select('id');

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
         * Get the count
         */
        $data = $data->count();
        return $data;
    }
    public function summaryCountAgrochem(array $attributes){
        $request = $attributes["request"];
        $data = $this->getCountSummaryForRelation("agrochem", $request);
        return $data;
    }
    private function getCountSummaryForRelation($relation, $request){
        $data = ActiveIngredients::whereHas($relation, function (Builder $query) use ($request){
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
            $per_page=config('app.items_per_page');;
        }

        $columns_array = array (
            'name',
            'potential_harm',
            'aquatic',
            'aquatic_desc',
            'bees',
            'bees_desc',
            'earthworm',
            'earthworm_desc',
            'birds',
            'birds_desc',
            'leachability',
            'leachability_desc',
            'carcinogenicity',
            'mutagenicity',
            'edc',
            'reproduction',
            'ache',
            'neurotoxicant',
            'who_classification',
            'eu_approved',
        );

        $data = ActiveIngredients::select('id','name','image');



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
            $per_page=config('app.items_per_page');;
        }

        $columns_array = array (
            'name',
            'potential_harm',
            'aquatic',
            'aquatic_desc',
            'bees',
            'bees_desc',
            'earthworm',
            'earthworm_desc',
            'birds',
            'birds_desc',
            'leachability',
            'leachability_desc',
            'carcinogenicity',
            'mutagenicity',
            'edc',
            'reproduction',
            'ache',
            'neurotoxicant',
            'who_classification',
            'eu_approved',
        );

        $data = ActiveIngredients::select();



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
        $data = ActiveIngredients::select(
            'id',
            'name',
            'potential_harm',
            'aquatic',
            'aquatic_desc',
            'bees',
            'bees_desc',
            'earthworm',
            'earthworm_desc',
            'birds',
            'birds_desc',
            'leachability',
            'leachability_desc',
            'carcinogenicity',
            'mutagenicity',
            'edc',
            'reproduction',
            'ache',
            'neurotoxicant',
            'who_classification',
            'eu_approved'
        );
        $recordsFiltered = ActiveIngredients::count();


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

        $recordsTotal = ActiveIngredients::count();



        return response()->json(['draw'=>$draw, 'recordsTotal'=>$recordsTotal, 'recordsFiltered'=>$recordsFiltered, 'data'=>$data]);


    }


}
