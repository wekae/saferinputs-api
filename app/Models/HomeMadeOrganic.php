<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HomeMadeOrganic extends Model
{

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'homemadeorganic';



    const CREATED_AT = 'creation_date';
    const UPDATED_AT = 'last_update';

    protected $fillable = [
        'practices',
        'external_links',
        'pests_diseases_weeds_controlled',
        'references',
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
