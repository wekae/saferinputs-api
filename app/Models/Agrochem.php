<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;
use OwenIt\Auditing\Contracts\Auditable;
use Spatie\Searchable\SearchResult;

class Agrochem extends Model implements \Spatie\Searchable\Searchable, Auditable
{
    use \OwenIt\Auditing\Auditable;
    /**
     * Implementation for Spatie Laravel Search
     * @return SearchResult
     */
    public function getSearchResult(): SearchResult
    {
        $url = "";

        return new SearchResult(
            $this,
            "Agrochem",
            $url
        );
    }

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'agrochem';


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
//        return 'agrochems_index';
//    }

    /**
     * Get the indexable data array for the model.
     *
     * @return array
     */
//    public function toSearchableArray()
//    {
////        return [
////            'product_name' => $this->product_name,
////            'pcpb_number' => $this->pcpb_number,
////            'distributing_company' => $this->distributing_company,
////            'toxic' => $this->toxic,
////            'who_class' => $this->who_class,
////            'composition' => $this->composition,
////            'registrant' => $this->registrant,
////            'type' => $this->type,
////            'phi_days' => $this->phi_days,
////            'model'=>$this->table,
////            'pests_disease_weed' => $this->agrochem,
////            'crops' => $this->crops,
////            'pests_disease_weed' => $this->pestsDiseaseWeed,
////            'active_ingredients' => $this->activeIngredients,
////        ];
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
        'product_name',
        'pcpb_number',
        'distributing_company',
        'toxic',
        'who_class',
        'composition',
        'registrant',
        'type',
        'phi_days',
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
