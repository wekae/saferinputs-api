<?php

namespace App\Models\Cms;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comments extends Model
{

    use SoftDeletes;


    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'cms_comments';


    protected $fillable = [
        'comment',
        'post_id',
    ];


    protected  $hidden = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];


    public function post(){
        return $this->belongsTo('App\Models\Cms\Posts', 'post_id');
    }
}
