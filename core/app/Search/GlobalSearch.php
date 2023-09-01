<?php

namespace App\Search;

use Algolia\ScoutExtended\Searchable\Aggregator;
use App\Models\ActiveIngredients;
use App\Models\Agrochem;
use App\Models\CommercialOrganic;
use App\models\ControlMethods;
use App\Models\Crops;
use App\Models\Gap;
use App\Models\HomeMadeOrganic;
use App\Models\LocalNames;
use App\Models\PestsDiseaseWeed;

class GlobalSearch extends Aggregator
{
    /**
     * The names of the models that should be aggregated.
     *
     * @var string[]
     */
    protected $models = [
        ActiveIngredients::class,
        Agrochem::class,
        CommercialOrganic::class,
        ControlMethods::class,
        Crops::class,
        Gap::class,
        HomeMadeOrganic::class,
        LocalNames::class,
        PestsDiseaseWeed::class
    ];
}
