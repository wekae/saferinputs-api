<?php

namespace App\Models\Cms;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Contracts\Auditable;
use Spatie\Searchable\SearchResult;

class Posts extends Model implements \Spatie\Searchable\Searchable, Auditable
{
    use \OwenIt\Auditing\Auditable;

    use SoftDeletes;

    /**
     * Implementation for Spatie Laravel Search
     * @return SearchResult
     */
    public function getSearchResult(): SearchResult
    {
        $url = "";

        return new SearchResult(
            $this,
            "Post",
            $url
        );
    }


    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'cms_posts';


    protected $fillable = [
        'entity_id',
        'name',
        'content',
        'summary',
        'standalone',
        'tags',
        'status',
        'image_token',
    ];

    protected $casts = [
        'tags' => 'array',
    ];


    protected  $hidden = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];


    public function entity(){
        return $this->belongsTo('App\Models\Cms\Entity', 'entity_id');
    }

    public function comments(){
        return $this->hasMany('App\Models\Cms\Comments', 'post_id');
    }
}
