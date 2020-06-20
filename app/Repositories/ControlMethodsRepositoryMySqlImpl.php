<?php


namespace App\Repositories;


use App\Facades\UtilsFacade;
use App\Models\CommercialOrganic;
use App\models\ControlMethods;
use App\Models\PestsDiseaseWeed;
use Illuminate\Database\Eloquent\Builder;

class ControlMethodsRepositoryMySqlImpl implements ControlMethodsRepository
{
    protected  $controlMethods;
    public function __construct(ControlMethods $controlMethods)
    {
        $this->controlMethods = $controlMethods;
    }

    public function create($attributes)
    {
        $request = $attributes['request'];
        $saved_item = $this->controlMethods->create($request->only(
            [
                'name',
                'options',
                'category',
                'external_links',
            ]
        ))->refresh();
        $saved_item->commercialOrganic()->saveMany(CommercialOrganic::findMany($request->commercial_organic));
        $saved_item->pestsDiseaseWeeds()->saveMany(PestsDiseaseWeed::findMany($request->pests_diseases_weeds));

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
        return $this->controlMethods
            ->orderBy($order_column, $order_direction)
            ->paginate($per_page);
    }

    public function find($id){
        return $this->controlMethods->find($id);
    }
    public function findPestsDiseasesWeeds($attributes){
        $request = $attributes['request'];

        $items = $this->findRelationItems("pestsDiseaseWeeds", $request);

        return $items;
    }
    public function findCommercialOrganic($attributes){
        $request = $attributes['request'];

        $items = $this->findRelationItems("commercialOrganic", $request);

        return $items;
    }
    private function findRelationItems($relation, $request){

        try{
            $items = ControlMethods::with([$relation => function($query) use($request){
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

    public function getControlMethodNames(){
        return $this->controlMethods->select('id','name')->orderBy('name', 'asc')
            ->with(['pestsDiseaseWeeds' => function($query) {
                $query->select('name');
            }])->get();
    }


    public function update($id, array $attributes)
    {
        $request = $attributes['request'];
        $item = $this->controlMethods->find($id);
        if($item){
            $this->controlMethods->find($id)->update($request->only(
                [
                    'name',
                    'options',
                    'category',
                    'external_links',
                ]
            ));

            $item->commercialOrganic()->sync(CommercialOrganic::findMany($request->commercial_organic));
            $item->pestsDiseaseWeeds()->sync(PestsDiseaseWeed::findMany($request->pests_diseases_weeds));

            //Save image
            $image = $request->image;
            if($image) {
                $item = UtilsFacade::uploadImage($image, $item);
            }
            return $item->refresh();
        }else{
            return false;
        }
    }

    public function delete($id)
    {
        $item = $this->controlMethods->find($id);
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
            'category',
            'options',
            'external_links',
        );

        $data = ControlMethods::select('id');

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
         * Get the total
         */
        $data = $data->count();
        return $data;
    }
    public function summaryCountPestsDiseasesWeeds(array $attributes){
        $request = $attributes["request"];
        $data = $this->getCountSummaryForRelation("pestsDiseaseWeeds", $request);
        return $data;
    }
    public function summaryCountCommercialOrganic(array $attributes){
        $request = $attributes["request"];
        $data = $this->getCountSummaryForRelation("commercialOrganic", $request);
        return $data;
    }
    private function getCountSummaryForRelation($relation, $request){
        $data = ControlMethods::whereHas($relation, function (Builder $query) use ($request){
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
            'name',
            'category',
            'options',
            'external_links',
        );

        $data = ControlMethods::select('id','name','image')
            ->with(['pestsDiseaseWeeds' => function($query) {
                $query->select('name');
            }]);



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
            'name',
            'category',
            'options',
            'external_links',
        );

        $data = ControlMethods::select();



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
        $data = ControlMethods::select(
            'id',
            'name',
            'category',
            'options',
            'external_links'
        );
        $recordsFiltered = ControlMethods::count();


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

        $recordsTotal = ControlMethods::count();



        return response()->json(['draw'=>$draw, 'recordsTotal'=>$recordsTotal, 'recordsFiltered'=>$recordsFiltered, 'data'=>$data]);


    }


}
