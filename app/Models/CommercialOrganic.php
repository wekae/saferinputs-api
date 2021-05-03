<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;
use OwenIt\Auditing\Contracts\Auditable;
use Spatie\Searchable\SearchResult;

class CommercialOrganic extends Model  implements \Spatie\Searchable\Searchable, Auditable
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
            "Commercial Organic",
            $url
        );
    }

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'commercialorganic';


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
//        return 'commercial_organic_index';
//    }

    /**
     * Get the indexable data array for the model.
     *
     * @return array
     */
    public function toSearchableArray()
    {
//        return [
//            'name' => $this->name,
//            'pcpb_number' => $this->pcpb_number,
//            'manufacturer' => $this->manufacturer,
//            'distributor' => $this->distributor,
//            'category' => $this->distributor,
//            'contact_details' => $this->contact_details,
//            'external_links' => $this->external_links,
//            'application_details' => $this->application_details,
//            'image' => $this->image,
//            'model'=>$this->table,
//            'pests_diseases_weed' => $this->pestsDiseaseWeed,
//        ];



        $array = $this->toArray();

        // Applies Scout Extended default transformations:
        $array = $this->transform($array);

        // Add an extra attribute:
        $array['model'] = $this->table;

        return $array;
    }
    /**
     * #Implementation for individual table indexing in Algolia
     */



    const CREATED_AT = 'creation_date';
    const UPDATED_AT = 'last_update';

    protected $casts = [
        'external_links' => 'array',
        'application_details' => 'array',
    ];

    protected $fillable = [
        'name',
        'pcpb_number',
        'manufacturer',
        'distributor',
        'category',
        'contact_details',
        'external_links',
        'application_details',
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
        return $this->belongsToMany('App\Models\PestsDiseaseWeed', 'pests_disease_weed_commercial_organic', 'commercial_organic_id', 'pest_disease_weed_id');
    }

    public function controlMethods(){
        return $this->belongsToMany('App\Models\ControlMethods', 'control_methods_commercial_organic', 'commercial_organic_id', 'control_methods_id');
    }
}
