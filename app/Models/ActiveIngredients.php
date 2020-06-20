<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;
use Spatie\Searchable\SearchResult;

class ActiveIngredients extends Model  implements \Spatie\Searchable\Searchable
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
            "Active Ingredient",
            $url
        );
    }

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'active_ingredients';


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
//        return 'active_ingredients_index';
//    }

    /**
     * Get the indexable data array for the model.
     *
     * @return array
     */
//    public function toSearchableArray()
//    {
////        return [
////            'name'=>$this->name,
////            'potential_harm'=>$this->potential_harm,
////            'fish'=>$this->fish,
////            'daphnia'=>$this->daphnia,
////            'bee'=>$this->bee,
////            'algae'=>$this->algae,
////            'dt50'=>$this->dt50,
////            'koc'=>$this->koc,
////            'gus'=>$this->gus,
////            'carcinogenicity'=>$this->carcinogenicity,
////            'mutagenicity'=>$this->mutagenicity,
////            'edc'=>$this->edc,
////            'reproduction'=>$this->reproduction,
////            'ache'=>$this->ache,
////            'neurotoxicant'=>$this->neurotoxicant,
////            'who_classification'=>$this->who_classification,
////            'tp_sum'=>$this->tp_sum,
////            'model'=>$this->table,
////        ];
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
//
//    }
    /**
     * #Implementation for individual table indexing in Algolia
     */



    const CREATED_AT = 'creation_date';
    const UPDATED_AT = 'last_update';

    protected $fillable = [
        'name',
        'potential_harm',
        'aquatic',
        'aquatic_desc',
        'bees',
        'bees_desc',
        'earthworm',
        'earthworm_desc',
        'birds',
        'birds_desc',
        'leachability',
        'leachability_desc',
        'carcinogenicity',
        'mutagenicity',
        'edc',
        'reproduction',
        'ache',
        'neurotoxicant',
        'who_classification',
        'eu_approved',
    ];

    protected  $hidden = [
        'creation_date',
        'last_update',
        'created_at',
        'updated_at',
        'pivot',
    ];




    public function agrochem(){
        return $this->belongsToMany('App\Models\Agrochem', 'agrochem_active_ingredients','active_ingredients_id','agrochem_id');
    }
    //
}
