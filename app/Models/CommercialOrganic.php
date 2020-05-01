<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CommercialOrganic extends Model
{

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'commercialorganic';



    const CREATED_AT = 'creation_date';
    const UPDATED_AT = 'last_update';

    protected $fillable = [
        'name',
        'manufacturer',
        'distributor',
        'contact_details',
        'external_links',
        'application_details',
        'pests_diseases_weeds_controlled',
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
