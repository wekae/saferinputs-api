<?php

namespace App\Models\Cms;

use GoldSpecDigital\LaravelEloquentUUID\Database\Eloquent\Uuid;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Contracts\Auditable;

class Entity extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;



    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'cms_entity';

    use Uuid, SoftDeletes;
    protected $keyType = 'string';
    public $incrementing = false;


    protected  $hidden = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];


    public function downloads(){
        return $this->hasMany('App\Models\Cms\Downloads');
    }

    public function media(){
        return $this->hasMany('App\Models\Cms\Media');
    }

    public function post(){
        return $this->hasOne('App\Models\Cms\Posts');
    }
}
