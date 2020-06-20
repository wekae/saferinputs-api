<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
use Laravel\Scout\Searchable;
use Spatie\Searchable\SearchResult;

class PestsDiseaseWeed extends Model implements \Spatie\Searchable\Searchable
{
    /**
     * Implementation for Spatie Laravel Search
     * @return SearchResult
     */
    public function getSearchResult(): SearchResult
    {
        $url = "";

        return new SearchResult(
            $this,
            "Pest Disease Weed",
            $url
        );
    }

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'pests_disease_weed';


    /**
     * Implementation for individual table indexing in Algolia
     */
//    use Searchable;

    /**
     * Get the index name for the model.
     *
     * @return string
     */
//    public function searchableAs()
//    {
//        return 'pests_disease_weed_index';
//    }

    /**
     * Get the indexable data array for the model.
     *
     * @return array
     */
//    public function toSearchableArray()
//    {
////        return [
////            'name' => $this->name,
////            'type' => $this->type,
////            'scientific_name' => $this->scientific_name,
////            'crops_affected' => $this->crops_affected,
////            'description_pest' => $this->description_pest,
////            'description_impact' => $this->description_impact,
////            'references' => $this->references,
////            'model'=>$this->table,
////            'crops' => $this->crops,
////            'local_names' => $this->localNames,
////            'agrochem_products' => $this->agrochemProducts,
////            'gap' => $this->gap,
////            'homemade_organic' => $this->homemadeOrganic,
////            'commercial_organic' => $this->commercialOrganic,
////        ];
//
//
//
//        $array = $this->toArray();
//
//        // Applies Scout Extended default transformations:
//        $array = $this->transform($array);
//
//        // Add an extra attribute:
//        $array['model'] = $this->table;
//
//        return $array;
//    }
    /**
     * #Implementation for individual table indexing in Algolia
     */



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

    public function controlMethods(){
        return $this->belongsToMany('App\Models\ControlMethods', 'pests_disease_weed_control_methods', 'pest_disease_weed_id', 'control_methods_id');
    }
}
