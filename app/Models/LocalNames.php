<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LocalNames extends Model
{

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'local_names';



    const CREATED_AT = 'creation_date';
    const UPDATED_AT = 'last_update';

    protected $fillable = [
        'language_ethnic_group',
        'english_name',
        'local_name',
    ];

    protected  $hidden = [
        'creation_date',
        'last_update',
        'created_at',
        'updated_at',
        'pivot',
    ];




    public function pestsDiseaseWeed(){
        return $this->belongsToMany('App\Models\PestsDiseaseWeed');
    }
}
