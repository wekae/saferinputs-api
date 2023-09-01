<?php


namespace App\Repositories\Cms;


use App\Models\Cms\Comments;
use App\Models\Cms\Posts;

class CommentsRepositoryMysqlImpl implements CommentsRepository
{
    protected  $posts;
    protected  $comments;
    private $columns_array;

    public function __construct(Posts $posts, Comments $comments)
    {
        $this->posts = $posts;
        $this->comments = $comments;
        $this->columns_array = array (
            'comment',
        );
    }

    public function create(array $attributes)
    {
        $request = $attributes['request'];
        $postId = $request->post_id;
        $post = $this->posts->find($postId);
        if($post){
            $saved_item = $this->comments->create($request->only($this->columns_array))->refresh();
            $post->comments()->save($saved_item);
            $post->save();
            $post->refresh();

            return $post->refresh();
        }

        return null;
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
        return $this->comments
            ->orderBy($order_column, $order_direction)
            ->paginate($per_page);
    }

    public function find($id)
    {
        return $this->comments->find($id);
    }

    public function findByPost($attributes){
        $request = $attributes['request'];

        $items = $this->findRelationItems("comments", $request);

        return $items;
    }
    private function findRelationItems($relation, $request){

        try{
            $items = Posts::with([$relation => function($query) use($request){
                foreach ($request->except('post_id') as $key => $value){
                    $query = $query->where($key,'like', '%'.$value.'%');
                }
            }])->where('id',$request->post_id)->firstOrFail();

            return $items;
        }catch(\Exception $e){
//            Log::info($e, [$this]);
            return null;
        }
    }


    public function update($id, array $attributes)
    {
        $request = $attributes['request'];
        $item = $this->comments->find($id);
        if($item){
            $this->comments->find($id)->update($request->only($this->columns_array));

            return $item->refresh();
        }else{
            return false;
        }
    }

    public function delete($id)
    {
        $item = $this->comments->find($id);
        if($item){
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


        $data = Comments::select('id');

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

        // Search comments for a specific post
        if($request->post_id){
            $data = $data->where('post_id', $request->post_id);
        }
//        }

        /**
         * Get the total
         */
        $data = $data->count();
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

        $data = Comments::select();



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

        // Search comments for a specific post
        if($request->post_id){
            $data = $data->where('post_id', $request->post_id);
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
}
