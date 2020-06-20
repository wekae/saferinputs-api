<?php


namespace App\Services;


use App\Models\ActiveIngredients;
use App\Models\Agrochem;
use App\Models\CommercialOrganic;
use App\models\ControlMethods;
use App\Models\Crops;
use App\Models\Gap;
use App\Models\HomeMadeOrganic;
use App\Models\LocalNames;
use App\Models\PestsDiseaseWeed;
use App\Search\GlobalSearch;
use Illuminate\Http\Request;
use Spatie\Searchable\Search;

class SearchService
{


    public function __construct()
    {}

    public function searchAgroChem(Request $request){
        return Agrochem::search($request->value)->get();
    }
    public function searchActiveIngredients(Request $request){
        return ActiveIngredients::search($request->value)->get();
    }
    public function searchCommercialOrganic(Request $request){
        return CommercialOrganic::search($request->value)->get();
    }
    public function searchControlMethods(Request $request){
        return ControlMethods::search($request->value)->get();
    }
    public function searchCrops(Request $request){
        return Crops::search($request->value)->get();
    }
    public function searchGap(Request $request){
        return Gap::search($request->value)->get();
    }
    public function searchHomemadeOrganic(Request $request){
        return HomeMadeOrganic::search($request->value)->get();
    }
    public function searchLocalNames(Request $request){
        return LocalNames::search($request->value)->get();
    }
    public function searchPestDiseaseWeed(Request $request){
        return PestsDiseaseWeed::search($request->value)->get();
    }

    public function search(Request $request){

        $limit = $request->limit? $request->limit: 15;
        $page = $request->limit? $request->page: 0;
        $searchResults = GlobalSearch::search($request->get('query'))->paginateRaw(
            $limit,
            'page',
            $page
        );



        $results = array(
            'items' =>  $searchResults,
            'total' => $searchResults->total()
        );

        return $results;
    }

    public function searchAlt(Request $request){
        if($request->value == null){
            $value = '';
        }else{
            $value = $request->value;
        }
        $searchResults = (new Search())
            ->registerModel(PestsDiseaseWeed::class,
                [
                    'name',
                    'type',
                    'scientific_name',
                    'description_pest',
                    'description_impact',
                    'references',
                ])
            ->registerModel(Crops::class,
                [
                    'name',
                ])
            ->registerModel(Agrochem::class,
                [
                    'product_name',
                    'pcpb_number',
                    'distributing_company',
                    'toxic',
                    'who_class',
                    'composition',
                    'registrant',
                    'type',
                    'phi_days',
                ])
            ->registerModel(CommercialOrganic::class,
                [
                    'name',
                    'pcpb_number',
                    'manufacturer',
                    'distributor',
                    'category',
                    'contact_details',
                    'external_links',
                    'application_details',
                ])
            ->registerModel(Gap::class,
                [
                    'name',
                    'category',
                    'practices',
                    'references'
                ])
            ->registerModel(HomeMadeOrganic::class,
                [
                    'name',
                    'practices',
                    'external_links',
                    'references',
                ])
            ->registerModel(ControlMethods::class,
                [
                    'name',
                    'options',
                    'category',
                    'external_links',
                ])
            ->registerModel(ActiveIngredients::class,
                [
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
                ])
            ->search($value);



        if(sizeof($searchResults)>0){
            $per_page =   $request->per_page? $request->per_page: 20;
            $page =   $request->page? $request->page: 1;

            $pagedSearchResults = $this->paginate($searchResults, $value, $per_page, $page);
        }else{
            $pagedSearchResults = [];
        }

        $results = array(
            'items' =>  $pagedSearchResults,
            'total' => sizeof($searchResults)
        );

        return $results;
    }

    public function paginate($data, $searchValue,  $perPage = 15, $page = 1, $routeName = '/api/search_alt/')
    {
        $results = collect($data)->slice(($page - 1) * $perPage, $perPage);

        $paginator = new PDWLengthAwarePaginator($results, count($data), $perPage, $page);


        $paginator->setPath($routeName.$searchValue);

        return $paginator->toArray();
    }
}
