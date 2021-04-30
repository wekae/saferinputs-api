<?php


namespace App\Repositories\Cms;



use App\Http\Requests\cms\EntityRequest;
use App\Models\Cms\Posts;
use App\Services\Cms\EntityService;
use App\Services\MediaFilesService;
use Carbon\Carbon;

class PostsRepositoryMysqlImpl implements PostsRepository
{
    protected  $posts;
    protected  $entityService;
    protected  $mediaFilesService;
    private $columns_array;

    public function __construct(Posts $posts, EntityService $entityService, MediaFilesService $mediaFilesService)
    {
        $this->posts = $posts;
        $this->entityService = $entityService;
        $this->mediaFilesService = $mediaFilesService;
        $this->columns_array = array (
            'name',
            'content',
            'summary',
            'standalone',
            'tags',
            'status',
        );
    }

    public function create(array $attributes)
    {
        $request = $attributes['request'];
        $saved_item = $this->posts->create($request->only($this->columns_array))->refresh();
        $year = Carbon::now()->year;
        $month = Carbon::now()->month;
        $saved_item->year = $year;
        $saved_item->month = $month;

        $saved_item->save();

        return $saved_item->refresh();
    }

    public function all(array $attributes)
    {
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
        return $this->posts
            ->orderBy($order_column, $order_direction)
            ->paginate($per_page);
    }

    public function find($id)
    {
        return $this->posts->find($id);
    }
    public function findByToken($token){
        return $this->posts->where('image_token', $token)->first();
    }
    public function findByYear($attributes){
        $request = $attributes["request"];
        $year = $request->year;
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

        $data = $this->posts->where('year', $year);

        /*
         * Search spefific columns
         */
        foreach ($request->only($this->columns_array) as $key => $value){
            $data = $data->where($key,'like', '%'.$value.'%');
        }


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
    public function findByMonth($attributes){
        $request = $attributes["request"];
        $month = $request->month;
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

        $data = $this->posts->where('month', $month);

        /*
         * Search spefific columns
         */
        foreach ($request->only($this->columns_array) as $key => $value){
            $data = $data->where($key,'like', '%'.$value.'%');
        }


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
    public function findByYearAndMonth($attributes){
        $request = $attributes["request"];
        $year = $request->year;
        $month = $request->month;
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

        $data = $this->posts
            ->where('year', $year)
            ->where('month', $month);

        /*
         * Search spefific columns
         */
        foreach ($request->only($this->columns_array) as $key => $value){
            $data = $data->where($key,'like', '%'.$value.'%');
        }


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

    public function update($id, array $attributes)
    {
        $request = $attributes['request'];
        $item = $this->posts->find($id);
        if($item){

//            $this->createEntityIfNone($item);

            $this->posts->find($id)->update($request->only($this->columns_array));

            return $item->refresh();
        }else{
            return false;
        }
    }

    public function updateImageToken($id, array $attributes)
    {
        $image_token = $attributes['image_token'];
        $item = $this->posts->find($id);
        if($item){
            $item->image_token = $image_token;
            $item->save();

            return $item->refresh();
        }else{
            return false;
        }
    }

    public function delete($id)
    {
        $item = $this->posts->find($id);
        if($item){
            // TODO Implement deletion of post media and downloads
            // $this->mediaFilesService->deleteImage($item);
            $item->delete();
            return true;
        }else{
            return false;
        }
    }

    public function summaryCount(array $attributes)
    {
        $request = $attributes["request"];
        $search_value = $request->search_value;


        $data = Posts::select('id');

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

    public function summaryNames(array $attributes)
    {
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

        $data = Posts::select('id','name','summary','image_token');



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

    public function filter(array $attributes)
    {
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

        $data = Posts::select();



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

    public function findByTag(array $attributes)
    {
        $request = $attributes["request"];
        $tag = $request->tag;
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

        $data = Posts::select();



        /**
         * Filter data based on the tag
         */
        if($tag) {
            /**
             * create a nested OR clause to search by specific column
             */
            $data = $data->where('tags', 'like', '%' . $tag . '%');
        }


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
        $data = Posts::select(
            'id',
            'name',
            'summary',
            'standalone',
            'tags',
            'status',
            'year',
            'month'
        );
        $recordsFiltered = Posts::count();


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

        $recordsTotal = Posts::count();



        return ['draw'=>$draw, 'recordsTotal'=>$recordsTotal, 'recordsFiltered'=>$recordsFiltered, 'data'=>$data];


    }


}
