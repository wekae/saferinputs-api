<?php


namespace App\Repositories;


use App\Models\CommercialOrganic;

class CommercialOrganicRepositoryMySqlImpl implements CommercialOrganicRepository
{
    protected  $commercialOrganic;
    public function __construct(CommercialOrganic $commercialOrganic)
    {
        $this->commercialOrganic = $commercialOrganic;
    }

    public function create($attributes)
    {
        return $this->commercialOrganic->create($attributes)->refresh();
    }

    public function all(){
        return $this->commercialOrganic->all();
    }

    public function find($id){
        return $this->commercialOrganic->find($id);
    }

    public function update($id, array $attributes)
    {
        $item = $this->commercialOrganic->find($id);
        if($item){
            $this->commercialOrganic->find($id)->update($attributes);
            return $item->refresh();
        }else{
            return false;
        }
    }

    public function delete($id)
    {
        $item = $this->commercialOrganic->find($id);
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
            'manufacturer',
            'distributor',
            'contact_details',
            'external_links',
            'application_details',
            'pests_diseases_weeds_controlled',
        );

        $data = CommercialOrganic::select();


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
        $data = CommercialOrganic::select(
            'id',
            'name',
            'manufacturer',
            'distributor',
            'contact_details',
            'external_links',
            'application_details',
            'pests_diseases_weeds_controlled'
        );
        $recordsFiltered = CommercialOrganic::count();


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

        $recordsTotal = CommercialOrganic::count();



        return response()->json(['draw'=>$draw, 'recordsTotal'=>$recordsTotal, 'recordsFiltered'=>$recordsFiltered, 'data'=>$data]);


    }


}
