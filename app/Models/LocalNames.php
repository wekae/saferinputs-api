<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;
use Spatie\Searchable\SearchResult;

class LocalNames extends Model implements \Spatie\Searchable\Searchable
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
            "Local Name",
            $url
        );
    }

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'local_names';


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
//        return 'local_names_index';
//    }

    /**
     * Get the indexable data array for the model.
     *
     * @return array
     */
//    public function toSearchableArray()
//    {
////        return [
////            'language_ethnic_group' => $this->language_ethnic_group,
////            'english_name' => $this->english_name,
////            'local_name' => $this->local_name,
////            'category' => $this->category,
////            'region' => $this->region,
////            'model'=>$this->table,
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
        'language_ethnic_group',
        'english_name',
        'local_name',
        'category',
        'region',
    ];

    protected  $hidden = [
        'creation_date',
        'last_update',
        'created_at',
        'updated_at',
        'pivot',
    ];




    public function pestsDiseaseWeed(){
        return $this->belongsToMany('App\Models\PestsDiseaseWeed', 'pests_disease_weed_local_names',  'local_names_id','pest_disease_weed_id');
    }
}
