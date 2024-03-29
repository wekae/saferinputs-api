<?php

namespace App\Models\Cms;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Contracts\Auditable;

class Media extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;

    use SoftDeletes;


    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'cms_media';


    protected $fillable = [
        'entity_id',
        'name',
        'description',
        'url',
        'file_name',
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
