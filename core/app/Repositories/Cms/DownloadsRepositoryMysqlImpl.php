<?php


namespace App\Repositories\Cms;


use App\Models\Cms\Downloads;
use App\Services\DownloadFilesService;
use Carbon\Carbon;

class DownloadsRepositoryMysqlImpl implements DownloadsRepository
{
    protected $downloads;
    protected $downloadFilesService;
    private $columns_array;

    public function __construct(Downloads $downloads, DownloadFilesService $downloadFilesService)
    {
        $this->downloads = $downloads;
        $this->downloadFilesService = $downloadFilesService;
        $this->columns_array = array (
            'name',
            'description',
            'url',
        );
    }

    public function create($attributes)
    {
        $request = $attributes['request'];
        $saved_item = $this->downloads->create($request->only($this->columns_array))->refresh();

        $year = Carbon::now()->year;
        $month = Carbon::now()->month;

        $saved_item->year = $year;
        $saved_item->month = $month;

        //Save image
        $file = $request->file;
        if($file) {
            $extension = $this->downloadFilesService->fileExtension($file);
            $token = $this->downloadFilesService->generateToken();
            $fileName = $token . "." . $extension;

            $result = $this->downloadFilesService->save($file, $fileName, $year, $month);
            if($result["status"]){
                // File uploaded, update record with path
                $saved_item->path = $result["path"];
                $saved_item->file_name = $fileName;
                $saved_item->token = $token;
            }
        }

        $saved_item->save();

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
        return $this->downloads
            ->orderBy($order_column, $order_direction)
            ->paginate($per_page);
    }

    public function find($id){
        return $this->downloads->find($id);
    }

    public function findByToken($token){
        return $this->downloads->where('token', $token)->first();
    }

    public function update($id, array $attributes)
    {
        $request = $attributes['request'];
        $item = $this->downloads->find($id);
        if($item){
            $this->downloads->find($id)->update($request->only($this->columns_array));
            return $item->refresh();
        }else{
            return false;
        }
    }

    public function delete($id)
    {
        $item = $this->downloads->find($id);
        if($item){
            $year = $item->year;
            $month = $item->month;
            $this->downloadFilesService->deleteDownload($item->file_name, $year, $month);
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


        $data = Downloads::select('id');

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

        $data = Downloads::select('id','name','token','url');



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

        $data = Downloads::select();



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
        $data = Downloads::select(
            'id',
            'name',
            'description',
            'url',
            'file_name',
            'year',
            'month',
            'path'
        );
        $recordsFiltered = Downloads::count();


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

        $recordsTotal = Downloads::count();



        return ['draw'=>$draw, 'recordsTotal'=>$recordsTotal, 'recordsFiltered'=>$recordsFiltered, 'data'=>$data];


    }

}
