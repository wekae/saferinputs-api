<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ActiveIngredients extends Model
{

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'active_ingredients';



    const CREATED_AT = 'creation_date';
    const UPDATED_AT = 'last_update';

    protected $fillable = [
        'id',
        'name',
        'potential_harm',
        'fish',
        'daphnia',
        'bee',
        'algae',
        'dt50',
        'koc',
        'gus',
        'carcinogenicity',
        'mutagenicity',
        'edc',
        'reproduction',
        'ache',
        'neurotoxicant',
        'who_classification',
        'tp_sum',
    ];

    protected  $hidden = [
        'creation_date',
        'last_update',
        'created_at',
        'updated_at',
        'pivot',
    ];




    public function pestsDiseaseWeed(){
        return $this->belongsToMany('App\Models\Agrochem');
    }



    //
}
