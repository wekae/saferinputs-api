<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class PestsDiseaseWeed extends Model
{

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'pests_disease_weed';



    const CREATED_AT = 'creation_date';
    const UPDATED_AT = 'last_update';

    protected $fillable = [
        'name',
        'type',
        'scientific_name',
        'description_pest',
        'description_impact',
        'image',
        'references',
        'crops',
        'local_names',
        'agrochem_products',
        'gap',
        'homemade_organic',
        'commercial_organic',
    ];

    protected  $hidden = [
        'creation_date',
        'last_update',
        'created_at',
        'updated_at',
        'pivot',
    ];


//    protected $attributes = [
//        'local_names' => 0,
//        'agrochem_products' => 0,
//        'gap' => 0,
//        'homemade_organic' => 0,
//        'commercial_organic' => 0,
//    ];


    public function localNames(){
        return $this->belongsToMany('App\Models\LocalNames', 'pests_disease_weed_local_names', 'pest_disease_weed_id', 'local_names_id');
    }

    public function agrochemProducts(){
        return $this->belongsToMany('App\Models\Agrochem', 'pests_disease_weed_agrochem', 'pest_disease_weed_id', 'agrochem_id');
    }

    public function gap(){
        return $this->belongsToMany('App\Models\Gap', 'pests_disease_weed_gap', 'pest_disease_weed_id', 'gap_id');
    }

    public function homemadeOrganic(){
        return $this->belongsToMany('App\Models\HomeMadeOrganic', 'pests_disease_weed_homemade_organic', 'pest_disease_weed_id', 'homemade_organic_id');
    }

    public function commercialOrganic(){
        return $this->belongsToMany('App\Models\CommercialOrganic', 'pests_disease_weed_commercial_organic', 'pest_disease_weed_id', 'commercial_organic_id');
    }

    public function crops(){
        return $this->belongsToMany('App\Models\Crops', 'pests_disease_weed_crops', 'pest_disease_weed_id', 'crops_id');
    }
}
