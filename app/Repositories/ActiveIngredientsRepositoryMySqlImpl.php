<?php


namespace App\Repositories;


use App\Models\ActiveIngredients;

class ActiveIngredientsRepositoryMySqlImpl implements ActiveIngredientsRepository
{

    protected  $activeIngredients;
    public function __construct(ActiveIngredients $activeIngredients)
    {
        $this->activeIngredients = $activeIngredients;
    }

    public function create($attributes)
    {
        return $this->activeIngredients->create($attributes)->refresh();
    }

    public function all(){
        return $this->activeIngredients->all();
    }

    public function find($id){
        return $this->activeIngredients->find($id);
    }

    public function update($id, array $attributes)
    {
        $item = $this->activeIngredients->find($id);
        if($item){
            $this->activeIngredients->find($id)->update($attributes);
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
            'potential_harm',
            'fish',
            'daphnia',
            'bee',
            'algae',
            'dt50',
            'koc',
            'gus',
            'carcinogenicity',
            'mutagenicity',
            'edc',
            'reproduction',
            'ache',
            'neurotoxicant',
            'who_classification',
            'tp_sum',
        );

        $data = ActiveIngredients::select();


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
        $data = ActiveIngredients::select(
            'id',
            'name',
            'potential_harm',
            'fish',
            'daphnia',
            'bee',
            'algae',
            'dt50',
            'koc',
            'gus',
            'carcinogenicity',
            'mutagenicity',
            'edc',
            'reproduction',
            'ache',
            'neurotoxicant',
            'who_classification',
            'tp_sum'
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
