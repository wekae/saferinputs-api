<?php


namespace App\Repositories\Cms;


use App\Events\MediaUpdated;
use App\Http\Requests\cms\EntityRequest;
use App\Models\Cms\Media;
use App\Services\Cms\EntityService;
use App\Services\MediaFilesService;
use Carbon\Carbon;

class MediaRepositoryMysqlImpl implements MediaRepository
{
    protected $media;
    protected $mediaFilesService;
    private $columns_array;

    public function __construct(Media $media, MediaFilesService $mediaFilesService)
    {
        $this->media = $media;
        $this->mediaFilesService = $mediaFilesService;
        $this->columns_array = array (
            'name',
            'description',
            'file_name',
        );
    }

    public function create(array $attributes)
    {
        $request = $attributes['request'];
        $saved_item = $this->media->create($request->only($this->columns_array))->refresh();

        $year = Carbon::now()->year;
        $month = Carbon::now()->month;

        $saved_item->year = $year;
        $saved_item->month = $month;

        //Save image
        $file = $request->file;
        if($file) {
            $extension = $this->mediaFilesService->fileExtension($file);
            $token = $this->mediaFilesService->generateToken();
            $fileName = $token . "." . $extension;

            $result = $this->mediaFilesService->saveMedia($file, $fileName, $year, $month);
            if($result["status"]){
                // File uploaded, update record with path
                $saved_item->file_name = $fileName;
                $saved_item->token = $token;
            }
        }

        // Create a new enity and associate media to it
//        $saved_item = $this->associateEntityToMedia($saved_item);

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
        return $this->media
            ->orderBy($order_column, $order_direction)
            ->paginate($per_page);
    }

    public function find($id)
    {
        return $this->media->find($id);
    }

    public function findByToken($token){
        return $this->media->where('token', $token)->first();
    }

    public function update($id, array $attributes)
    {
        $request = $attributes['request'];
        $item = $this->media->find($id);
        if($item){
//            $this->createEntityIfNone($item);

            $this->media->find($id)->update($request->only($this->columns_array));
            $updatedMedia = $item->refresh();
            return $updatedMedia;
        }else{
            return false;
        }
    }

    public function delete($id)
    {
        $item = $this->media->find($id);
        if($item){
            $year = $item->year;
            $month = $item->month;
            $this->mediaFilesService->deleteMedia($item->file_name, $year, $month);
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


        $data = Media::select('id');

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

        $data = Media::select('id','name','token');



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

        $data = Media::select();



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
        $data = Media::select(
            'id',
            'name',
            'description',
            'file_name',
            'token'
        );
        $recordsFiltered = Media::count();


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

        $recordsTotal = Media::count();



        return ['draw'=>$draw, 'recordsTotal'=>$recordsTotal, 'recordsFiltered'=>$recordsFiltered, 'data'=>$data];


    }

}
