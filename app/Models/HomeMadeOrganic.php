<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;
use Spatie\Searchable\SearchResult;

class HomeMadeOrganic extends Model  implements \Spatie\Searchable\Searchable
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
            "Homemade Organic",
            $url
        );
    }


    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'homemadeorganic';


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
//        return 'homemade_organic_index';
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
////            'practices' => $this->practices,
////            'external_links' => $this->external_links,
////            'references' => $this->references,
////            'model'=>$this->table,
////            'pests_diseases_weeds' => $this->pestsDiseaseWeed,
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
        'practices' => 'array',
        'external_links' => 'array',
        'references' => 'array',
    ];

    protected $fillable = [
        'name',
        'practices',
        'external_links',
        'references',
        'image',
    ];

    protected  $hidden = [
        'creation_date',
        'last_update',
        'created_at',
        'updated_at',
        'pivot',
    ];




    public function pestsDiseaseWeed(){
        return $this->belongsToMany('App\Models\PestsDiseaseWeed', 'pests_disease_weed_homemade_organic', 'homemade_organic_id', 'pest_disease_weed_id');
    }
}
