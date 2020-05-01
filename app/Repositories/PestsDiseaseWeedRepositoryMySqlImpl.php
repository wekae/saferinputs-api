<?php


namespace App\Repositories;


use App\Models\Agrochem;
use App\Models\CommercialOrganic;
use App\Models\Crops;
use App\Models\Gap;
use App\Models\HomeMadeOrganic;
use App\Models\LocalNames;
use App\Models\PestsDiseaseWeed;

class PestsDiseaseWeedRepositoryMySqlImpl implements  PestsDiseaseWeedRepository
{
    protected  $pestsDiseaseWeed;
    public function __construct(PestsDiseaseWeed $pestsDiseaseWeed)
    {
        $this->pestsDiseaseWeed = $pestsDiseaseWeed;
    }

    public function create($attributes)
    {
        $request = $attributes['request'];
        $saved_item = $this->pestsDiseaseWeed->create($request->only(
            [
                'name',
                'type',
                'scientific_name',
                'crops_affected',
                'description_pest',
                'description_impact',
                'image',
                'references',
            ]
        ))->refresh();

        $saved_item->localNames()->saveMany(LocalNames::findMany($request->local_names));
        $saved_item->agrochemProducts()->saveMany(Agrochem::findMany($request->agrochem_products));
        $saved_item->gap()->saveMany(Gap::findMany($request->gap));
        $saved_item->homemadeOrganic()->saveMany(HomeMadeOrganic::findMany($request->homemade_organic));
        $saved_item->commercialOrganic()->saveMany(CommercialOrganic::findMany($request->commercial_organic));
        $saved_item->crops()->saveMany(Crops::findMany($request->crops));

        return $saved_item->refresh();
    }

    public function all(){
        return $this->pestsDiseaseWeed->all();
    }

    public function find($id){
        return $this->pestsDiseaseWeed->find($id);
    }

    public function update($id, array $attributes)
    {
        $request = $attributes['request'];
        $item = $this->pestsDiseaseWeed->find($id);
        if($item){
            $this->pestsDiseaseWeed->find($id)->update($request->only(
                [
                    'name',
                    'type',
                    'scientific_name',
                    'crops_affected',
                    'description_pest',
                    'description_impact',
                    'image',
                    'references',
                ]
            ));
            return $item->refresh();
        }else{
            return false;
        }
    }

    public function delete($id)
    {
        $item = $this->pestsDiseaseWeed->find($id);
        if($item){
            $item->delete();
            return true;
        }else{
            return false;
        }
    }

    public function filter(array $attributes){
        $request = $attributes["request"];
        $search_value = $request->search_value;
        $order_column = $request->order_column;
        $order_direction = $request->order_direction;
        $limit = $request->limit;
        $offset = $request->offset;

        if($order_column==null){
            $order_column="id";
        }
        if($order_direction==null){
            $order_direction="desc";
        }
        if($limit==null){
            $limit=10;
        }
        if($offset==null){
            $offset=0;
        }

        $columns_array = array (
            'name',
            'type',
            'scientific_name',
            'description_pest',
            'description_impact',
            'references',
        );

        $data = PestsDiseaseWeed::select();


        /**
         * Filter data based on the search query
         */
        if($search_value){
            /**
             * create a nested OR clause
             */
            $data = $data->where(function($query) use($columns_array, $search_value){
                /**
                 * append each table column to the query
                 */
                foreach ($columns_array as $column){
                    $query->orWhere($column,'like','%'.$search_value.'%');
                }

            });
        }


        /**
         * Set ordering
         */
        $data = $data->orderBy($order_column, $order_direction);

        /**
         * Set limit and offset for pagination
         */
        $data = $data
            ->skip($offset)
            ->take($limit);


        /**
         * Get the filtered records
         */
        $data = $data->get();

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



        return response()->json(['draw'=>$draw, 'recordsTotal'=>$recordsTotal, 'recordsFiltered'=>$recordsFiltered, 'data'=>$data]);


    }

}
