<?php

namespace App\Models\Cms;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Downloads extends Model
{


    use SoftDeletes;


    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'cms_downloads';


    protected $fillable = [
        'entity_id',
        'name',
        'description',
        'url',
        'file_name',
        'token',
        'year',
        'month',
        'path',
    ];


    protected  $hidden = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];


    public function entity(){
        return $this->belongsTo('App\Models\Cms\Entity', 'entity_id');
    }
}
