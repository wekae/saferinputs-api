<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;
use Spatie\Searchable\SearchResult;

class ControlMethods extends Model implements \Spatie\Searchable\Searchable
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
            "Control Method",
            $url
        );
    }

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'control_methods';


    /**
     * Implementation for individual table indexing in Algolia
     */
//    use Searchable;

    /**
     * Get the index name for the model.
     *
     * @return string
     */
    public function searchableAs()
    {
        return 'control_methods_index';
    }

    /**
     * Get the indexable data array for the model.
     *
     * @return array
     */
//    public function toSearchableArray()
//    {
////        return [
////            'name' => $this->name,
////            'category' => $this->category,
////            'options' => $this->options,
////            'external_links' => $this->external_links,
////            'model'=>$this->table,
////            'pests_diseases_weeds' => $this->pestsDiseaseWeeds,
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

    protected $casts = [
        'options' => 'array',
        'external_links' => 'array',
    ];

    protected $fillable = [
        'name',
        'options',
        'category',
        'external_links',
        'image',
    ];

    protected  $hidden = [
        'creation_date',
        'last_update',
        'created_at',
        'updated_at',
        'pivot',
    ];




    public function pestsDiseaseWeeds(){
        return $this->belongsToMany('App\Models\PestsDiseaseWeed', 'pests_disease_weed_control_methods', 'control_methods_id', 'pest_disease_weed_id');
    }

    public function commercialOrganic(){
        return $this->belongsToMany('App\Models\CommercialOrganic', 'control_methods_commercial_organic', 'control_methods_id', 'commercial_organic_id');
    }

}
