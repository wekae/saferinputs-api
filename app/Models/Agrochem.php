<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Agrochem extends Model
{

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'agrochem';



    const CREATED_AT = 'creation_date';
    const UPDATED_AT = 'last_update';

    protected $fillable = [
        'product_name',
        'product_type',
        'distributing_company',
        'registrant',
        'type',
        'phi_days',
        'crops',
        'image',
        'active_ingredients',
        'pests_disease_weed',
    ];

    protected  $hidden = [
        'creation_date',
        'last_update',
        'created_at',
        'updated_at',
        'pivot',
    ];




    public function activeIngredients(){
        return $this->belongsToMany('App\Models\ActiveIngredients', 'agrochem_active_ingredients', 'agrochem_id', 'active_ingredients_id');
    }

    public function crops(){
        return $this->belongsToMany('App\Models\Crops', 'agrochem_crops', 'agrochem_id', 'crops_id');
    }

    public function pestsDiseaseWeed(){
        return $this->belongsToMany('App\Models\PestsDiseaseWeed','pests_disease_weed_agrochem', 'agrochem_id', 'pest_disease_weed_id');
    }
}
