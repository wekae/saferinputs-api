<?php

namespace App\Http\Controllers;

use App\Http\Requests\ActiveIngredientsRequest;
use App\Http\Resources\ActiveIngredientsResource;
use App\Services\ActiveIngredientsService;
use Illuminate\Http\Request;

/**
 * @group Active Ingredients
 *
 * Active Ingredient resource requests
 */
// * Class ActiveIngredientsController
// * @package App\Http\Controllers
class ActiveIngredientsController extends Controller
{
    protected $activeIngredientsService;


    protected $successStatus = 200;
    protected $createdStatus = 201;
    protected $noContentStatus = 204;
    protected $badRequestStatus = 400;
    protected $unauthorizedStatus = 401;
    protected $notFoundStatus = 404;
    protected $unprocessableStatus = 404;
    protected $notImplementedStatus = 501;



    public function __construct(ActiveIngredientsService $activeIngredientsService)
    {
        $this->activeIngredientsService = $activeIngredientsService;
    }

    /**
     * Wrapper for the JSON response for failure during execution
     *
     * @param $code
     * @param $message
     * @return array
     */
    private function failureMessage($code, $message)
    {

        return [
            'code' => $code,
            'message' => $message,
            'success' => false,
        ];

    }

    /**
     * Wrapper for the JSON response for success during execution
     *
     * @param $code
     * @param $message
     * @param $payload
     * @return array
     */
    private function successMessage($code, $message, $payload)
    {

        return [
            'code' => $code,
            'message' => $message,
            'success' => true,
            'data' => $payload,
        ];

    }

    /**
     * Get all active ingredients
     *
     * Retrieve all active ingredients
     *
     * @queryParam order_column string
     * @queryParam order_direction string
     * @queryParam per_page
     *
     *
     * @response status=200
     * {
     *   "data": [
     *      {
     *          "id": 1,
     *          "name": "At vero eos",
     *          "potential_harm": "<p>Etiam efficitur porta quam, eget blandit lorem<\/p>",
     *          "aquatic": 1.5,
     *          "aquatic_desc": "<p>Etiam efficitur porta quam, eget blandit lorem<\/p>",
     *          "bees": 72,
     *          "bees_desc": "<p>Etiam efficitur porta quam, eget blandit lorem<\/p>",
     *          "earthworm": 999,
     *          "earthworm_desc": "<p>Etiam efficitur porta quam, eget blandit lorem<\/p>",
     *          "birds": 315,
     *          "birds_desc": "<p>Etiam efficitur porta quam, eget blandit lorem<\/p>",
     *          "leachability": -19.89,
     *          "leachability_desc": "<p>Etiam efficitur porta quam, eget blandit lorem<\/p>",
     *          "carcinogenicity": "No",
     *          "mutagenicity": "No Data",
     *          "edc": "No",
     *          "reproduction": "Possible",
     *          "ache": "No",
     *          "neurotoxicant": "No",
     *          "who_classification": "II",
     *          "eu_approved": "No",
     *          "image": "fa2234702a9941hi1w0f2726750fb63c7e.png",
     *          "agrochems": [
     *              {
     *                  "id": 99,
     *                  "product_name": "Curabitur",
     *                  "pcpb_number": "PCPB(CR)9999",
     *                  "distributing_company": "Donec sit amet. Ltd.",
     *                  "who_class": "II",
     *                  "toxic": 1,
     *                  "composition": "999g\/L as dui vitae ultricies",
     *                  "registrant": "Aenean facilisis ultrices dui tempus lacinia",
     *                  "type": null,
     *                  "phi_days": 99,
     *                  "image": "90c8539cfeef1fdbdfb6a3fff78567cf.jpg"
     *              },
     *              .
     *              .
     *              .
     *
     *          ]
     *      },
     *      .
     *      .
     *      .
     *   ],
     *   "links": {
     *      "first": "https://api.safeinputs.koan.co.ke/api/active_ingredients?page=1",
     *      "last": "https://api.safeinputs.koan.co.ke/api/active_ingredients?page=4",
     *      "prev": null,
     *      "next": "https://api.safeinputs.koan.co.ke/api/active_ingredients?page=2"
     *   },
     *   "meta": {
     *      "current_page": 1,
     *      "from": 1,
     *      "last_page": 4,
     *      "path": "https://api.safeinputs.koan.co.ke/api/active_ingredients",
     *      "per_page": "16",
     *      "to": 16,
     *      "total": 60
     *   }
     * }
     *
     * @response status=404 scenario="Items not found"
     * {
     *      "code": 404,
     *      "message": "Items not found",
     *      "success": false
     * }
     */
//     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Resources\Json\AnonymousResourceCollection|\Illuminate\Http\Response
    public function all(Request $request){
        $items = $this->activeIngredientsService->findAll($request);

        if($items->count()>0){
            return ActiveIngredientsResource::collection($items);
        }else{
            $status_code = $this->notFoundStatus;
            $message = "Items not found";
            $response = $this->failureMessage($status_code, $message);
            return response($response, $status_code);
        }
    }

    /**
     * Get all active ingredient names
     *
     * Retrieve all active ingredient names.
     *
     *
     * @response status=200
     * {
     *      "code": 200,
     *      "message": "60 Items found",
     *      "success": true,
     *      "data": [
     *          {
     *              "id": 15,
     *              "name": "Acephate"
     *          },
     *          {
     *              "id": 23,
     *              "name": "Acrinathrin"
     *          },
     *          .
     *          .
     *          .
     *      ]
     * }
     *
     * @response status=404 scenario="Items not found"
     * {
     *      "code": 404,
     *      "message": "Items not found",
     *      "success": false
     * }
     */
//     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
    public function getActiveIngredientNames(){
        $items = $this->activeIngredientsService->getActiveIngredientNames();

        if($items->count()>0){
//            return response()->json(['data'=>$items], $this->successStatus);
            $status_code = $this->successStatus;
            $message = $items->count()." Items found";
            $response = $this->successMessage($status_code, $message, $items);
            return response($response, $this->successStatus);
        }else{
            $status_code = $this->notFoundStatus;
            $message = "Items not found";
            $response = $this->failureMessage($status_code, $message);
            return response($response, $status_code);
        }
    }

    /**
     * Find active ingredient based on ID
     *
     *
     * @response status=200
     * {
     *   "data": {
     *      "id": 1,
     *      "name": "At vero eos",
     *      "potential_harm": "<p>Etiam efficitur porta quam, eget blandit lorem<\/p>",
     *      "aquatic": 1.5,
     *      "aquatic_desc": "<p>Etiam efficitur porta quam, eget blandit lorem<\/p>",
     *      "bees": 72,
     *      "bees_desc": "<p>Etiam efficitur porta quam, eget blandit lorem<\/p>",
     *      "earthworm": 999,
     *      "earthworm_desc": "<p>Etiam efficitur porta quam, eget blandit lorem<\/p>",
     *      "birds": 315,
     *      "birds_desc": "<p>Etiam efficitur porta quam, eget blandit lorem<\/p>",
     *      "leachability": -19.89,
     *      "leachability_desc": "<p>Etiam efficitur porta quam, eget blandit lorem<\/p>",
     *      "carcinogenicity": "No",
     *      "mutagenicity": "No Data",
     *      "edc": "No",
     *      "reproduction": "Possible",
     *      "ache": "No",
     *      "neurotoxicant": "No",
     *      "who_classification": "II",
     *      "eu_approved": "No",
     *      "image": "fa2234702a9941hi1w0f2726750fb63c7e.png",
     *      "agrochems": [
     *          {
     *              "id": 99,
     *              "product_name": "Curabitur",
     *              "pcpb_number": "PCPB(CR)9999",
     *              "distributing_company": "Donec sit amet. Ltd.",
     *              "who_class": "II",
     *              "toxic": 1,
     *              "composition": "999g\/L as dui vitae ultricies",
     *              "registrant": "Aenean facilisis ultrices dui tempus lacinia",
     *              "type": null,
     *              "phi_days": 99,
     *              "image": "90c8539cfeef1fdbdfb6a3fff78567cf.jpg"
     *          },
     *          .
     *          .
     *          .
     *
     *      ]
     *   }
     * }
     *
     * @response status=404 scenario="Item not found"
     * {
     *      "code": 404,
     *      "message": "Item not found",
     *      "success": false
     * }
     *
     */
//     * @param $id
//     * @return ActiveIngredientsResource|\Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
    public function find($id){
        $item = $this->activeIngredientsService->find($id);
        if($item){
            return new ActiveIngredientsResource($item);
        }else{
            $status_code = $this->notFoundStatus;
            $message = "Item not found";
            $response = $this->failureMessage($status_code, $message);
            return response($response, $status_code);
        }
    }

    /**
     * Find active ingredient's agrochem products
     *
     * Find agrochem products associated with the active ingredient based on id and column values provided by query params
     *
     * @queryParam product_name string
     * @queryParam pcpb_number string
     * @queryParam distributing_company string
     * @queryParam who_class string
     * @queryParam toxic string true | false
     * @queryParam registrant string
     *
     * @response status=200
     * {
     *      "data": {
     *          "id": 290,
     *          "name": "Aenean",
     *          "potential_harm": null,
     *          "aquatic": 0.035,
     *          "aquatic_desc": "<p>Etiam efficitur porta quam, eget blandit lorem.</p>",
     *          "bees": 50,
     *          "bees_desc": "<p>Etiam efficitur porta quam, eget blandit lorem.</p>",
     *          "earthworm": 79,
     *          "earthworm_desc": "<p>Etiam efficitur porta quam, eget blandit lorem.</p>",
     *          "birds": 4237,
     *          "birds_desc": "<p>Etiam efficitur porta quam, eget blandit lorem.</p>",
     *          "leachability": 2.57,
     *          "leachability_desc": "<p>Etiam efficitur porta quam, eget blandit lorem.</p>",
     *          "carcinogenicity": "No",
     *          "mutagenicity": "No Data",
     *          "edc": "Possible",
     *          "reproduction": "Possible",
     *          "ache": "No Data",
     *          "neurotoxicant": "Yes",
     *          "who_classification": "III",
     *          "eu_approved": "No",
     *          "image": "c96a9aec04ac2bba21fd8ed858sdf3bf.png",
     *          "agrochem": [
     *              {
     *                  "id": 322,
     *                  "product_name": "Curabitur",
     *                  "pcpb_number": "PCPB(CR)9999",
     *                  "distributing_company": "Duis feugiat magna",
     *                  "who_class": "III",
     *                  "toxic": 1,
     *                  "composition": "380 g/L",
     *                  "registrant": "Duis feugiat magna Co. Ltd",
     *                  "type": null,
     *                  "phi_days": 45,
     *                  "image": "436c77f117d073ea8ea2f4317abcf105.jpg"
     *              },
     *              .
     *              .
     *              .
     *          ]
     *      }
     * }
     *
     * @response status=404 scenario="No agrochems found" {
     *      "code": 404,
     *      "message": "Item not found",
     *      "success": false
     * }
     */
//     * @param Request $request
//     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\JsonResponse|\Illuminate\Http\Response
    public function findAgrochems(Request $request){
        $item = $this->activeIngredientsService->findAgrochems($request);
        if($item){
//            return $item;
            return response()->json(['data'=>$item], $this->successStatus);
        }else{
            $status_code = $this->notFoundStatus;
            $message = "Item not found";
            $response = $this->failureMessage($status_code, $message);
            return response($response, $status_code);
        }
    }

    /**
     * Find active ingredient's commercial organic alternative products
     *
     * Find commercial organic alternatives for the agrochem product used for specific pests, diseases and weeds that contain the active ingredient based on its id and column values provided by query params associated with the commercial organic product
     *
     * @queryParam name string
     * @queryParam pcpb_number string
     * @queryParam manufacturer string
     * @queryParam distributor string
     * @queryParam category string
     * @queryParam contact_details string
     * @queryParam external_links string
     * @queryParam application_details string
     *
     * @response status=200
     * "data": {
     *      "total": 2,
     *      "items": [
     *          {
     *              "id": 213,
     *              "name": " Quisque",
     *              "type": "Pest",
     *              "scientific_name": "meyricki caffeina",
     *              "description_pest": "Etiam efficitur porta quam, eget blandit lorem.",
     *              "description_impact": "Etiam efficitur porta quam, eget blandit lorem.<",
     *              "image": "6a83920453f7369c9ca64a9552ef938d.jpg",
     *              "references": "",
     *              "commercial_organic": [
     *                  {
     *                      "id": 184,
     *                      "name": "Curabitur vestibulum",
     *                      "pcpb_number": "PCPB(CR)9999",
     *                      "manufacturer": "Mauris luctus maximus",
     *                      "distributor": "Sed accumsan ultric",
     *                      "category": "Biopesticide",
     *                      "contact_details": "Phasellus et dolor",
     *                      "external_links": "https://lorem.ipsum.com",
     *                      "application_details": "ed venenatis rhoncus urna, eu vehicula enim dictum in. Proin eget nisl ex. Aliquam finibus bibendum tortor volutpat ultricies. Nunc porta nisl id ultricies aliquam.",
     *                      "image": "de75345d3ba2eb753d06993a949a8702.png"
     *                  },
     *                  .
     *                  .
     *                  .
     *              ]
     *          },
     *          .
     *          .
     *          .
     *      ]
     * }
     *
     * @response status=404 scenario="No commercial organic found" {
     *      "code": 404,
     *      "message": "Item not found",
     *      "success": false
     * }
     *
     */
//     * @param Request $request
//     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\JsonResponse|\Illuminate\Http\Response
    public function findCommercialOrganic(Request $request){
        $item = $this->activeIngredientsService->findCommercialOrganic($request);
        if($item){
//            return $item;
            return response()->json(['data'=>$item], $this->successStatus);
        }else{
            $status_code = $this->notFoundStatus;
            $message = "Item not found";
            $response = $this->failureMessage($status_code, $message);
            return response($response, $status_code);
        }
    }

    /**
     * Find active ingredient's homemade organic alternatives
     *
     * Find homemade organic items based on the active ingredient id and column values provided by query params
     *
     * @queryParam name string
     * @queryParam practices string
     * @queryParam external_links string
     * @queryParam references string
     *
     * @response status=200
     * "data": {
     *      "total": 7,
     *      "items": [
     *          {
     *              "id": 213,
     *              "name": " Quisque",
     *              "type": "Pest",
     *              "scientific_name": "meyricki caffeina",
     *              "description_pest": "Etiam efficitur porta quam, eget blandit lorem.",
     *              "description_impact": "Etiam efficitur porta quam, eget blandit lorem.<",
     *              "image": "6a83920453f7369c9ca64a9552ef938d.jpg",
     *              "references": "",
     *              "homemade_organic": [
     *                  {
     *                      "id": 238,
     *                      "name": "Vestibulum ante ipsum",
     *                      "practices": [
     *                          "<p><strong>Phasellus:</strong> Mauris a feugiat lectus. Proin nisl urna, condimentum id tortor nec, vulputate blandit nulla. Nullam consequat velit vel purus lacinia auctor..</p>"
     *                      ],
     *                      "external_links": [
     *                          "https://lorem.ipsum.com"
     *                      ],
     *                      "references": [
     *                          "<ol><li>Maecenas quis</li><li>Praesent feugiat, risus vel volutpat fermentum, diam quam viverra tortor, et convallis felis ex eget tellus</li></ol>"
     *                      ],
     *                      "image": "de7dab8868ac792dea542d662c27a43f.jpg"
     *                  },
     *                  .
     *                  .
     *                  .
     *              ]
     *          },
     *          .
     *          .
     *          .
     *      ]
     * }
     *
     *
     * @response status=404 scenario="No homemade organic found" {
     *      "code": 404,
     *      "message": "Item not found",
     *      "success": false
     * }
     */
//     * @param Request $request
//     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\JsonResponse|\Illuminate\Http\Response
    public function findHomemadeOrganic(Request $request){
        $item = $this->activeIngredientsService->findHomemadeOrganic($request);
        if($item){
//            return $item;
            return response()->json(
                [
                    'total'=>$item["total"],
                    'data'=>$item["items"]
                ], $this->successStatus);
        }else{
            $status_code = $this->notFoundStatus;
            $message = "Item not found";
            $response = $this->failureMessage($status_code, $message);
            return response($response, $status_code);
        }
    }

    /**
     * Find active ingredient's gap items
     *
     * Find gap alternatives for the agrochem product containing the active ingredient based on the active ingredient id and column values associated with the gap item provided by query params
     *
     * @queryParam name string
     * @queryParam category string
     * @queryParam practices string
     * @queryParam references string
     *
     * @response status=200
     * {
     *    "total": 4,
     *    "data": [
     *      {
     *         "id": 299,
     *         "name": "Donec",
     *         "type": "Pest",
     *         "scientific_name": "Duis sodales",
     *         "description_pest": "Phasellus eget ante dui. Mauris risus lectus, blandit ut nunc et, egestas pharetra ante. Donec eu arcu vulputate, pulvinar felis eu, aliquet tellus. ",
     *         "description_impact": "Quisque velit mi, molestie ac sem sit amet, molestie porta leo.",
     *         "image": "ba2p43f4660c05b43fefec4c73ab25c8.jpeg",
     *         "references": "https://www.ipsum-lorem.org.",
     *         "gap": [
     *              {
     *                  "id": 11,
     *                  "name": "Mauris risus lectus, blandit ut nunc ",
     *                  "category": [
     *                      "Prevention",
     *                      "Cultural",
     *                      "Physical"
     *                  ],
     *                  "practices": [
     *                      "<h4><strong>Praesent feugiat</strong></h4><ul><li></li>Nam quis mauris leo. Nunc nec tincidunt nulla, vel facilisis mauris. <li>Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.</li></ul>",ate in day during dry periods.</li></ul><p>To monitor aphid populations, examine the undersides of the leaves and the bud areas for groups or colonies of aphids. Presence of ants may indicate presence of aphids. Early detection of aphids is important as they can multiply rapidly. Yellow traps are useful for monitoring the arrival of winged aphids to the crop.</p><ul><li>Look for yellowing leaves, stunted growth and honeydew on infested crops. Sooty mould may grown on the honeydew.</li><li>Look for curled, wrinkled or cupped leaves and mosaic patterns on the leaves (alternating dark and light patches) - these are symptoms of viruses that can be transmitted by the aphid</li></ul><p>Donec eu arcu vulputate, pulvinar felis eu, aliquet tellus. Donec vehicula felis turpis, sed sagittis metus ornare a.</p>"
     *                  ],
     *                  "references": [
     *                      "<ol><li>Maecenas quis elementum odio. Pellentesque iaculis tellus sem, ut sodales enim lobortis luctus.</li><li>Curabitur nec vulputate dolor.</li><li>Donec vehicula felis turpis, sed sagittis metus ornare a</li></ol>"
     *                  ],
     *                  "image": "61d682a9c39bc7b1ce58856c0c324d3d.jpg"
     *              },
     *              .
     *              .
     *              .
     *         ]
     *      },
     *      .
     *      .
     *      .
     *    ]
     * }
     *
     * @response status=404 scenario="No gap found" {
     *      "code": 404,
     *      "message": "Item not found",
     *      "success": false
     * }
     *
     */
//     * @param Request $request
//     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\JsonResponse|\Illuminate\Http\Response
    public function findGap(Request $request){
        $item = $this->activeIngredientsService->findGap($request);
        if($item){
//            return $item;
            return response()->json(
                [
                    'total'=>$item["total"],
                    'data'=>$item["items"]
                ], $this->successStatus);
        }else{
            $status_code = $this->notFoundStatus;
            $message = "Item not found";
            $response = $this->failureMessage($status_code, $message);
            return response($response, $status_code);
        }
    }

    /**
     * Add active ingredient
     *
     * Adds a new active ingredient item to database
     * @authenticated
     *
     * @response status=201 {
     *   "code": 201,
     *   "message": "Saved",
     *   "success": true,
     *   "data": {
     *      "id": 76,
     *      "name": "Loremus Chloridus",
     *      "potential_harm": null,
     *      "aquatic": null,
     *      "aquatic_desc": null,
     *      "bees": null,
     *      "bees_desc": null,
     *      "earthworm": null,
     *      "earthworm_desc": null,
     *      "birds": null,
     *      "birds_desc": null,
     *      "leachability": null,
     *      "leachability_desc": null,
     *      "carcinogenicity": null,
     *      "mutagenicity": null,
     *      "edc": null,
     *      "reproduction": null,
     *      "ache": null,
     *      "neurotoxicant": null,
     *      "who_classification": null,
     *      "eu_approved": null,
     *      "image": null
     *   }
     * }
     *
     * @response status=501 scenario="Active ingredient not created" {
     *      "code": 501,
     *      "message": "Not Created",
     *      "success": false
     *  }
     */
//     * @param ActiveIngredientsRequest $request
//     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
    public function new(ActiveIngredientsRequest $request){
        $saved = $this->activeIngredientsService->create($request);

        if($saved){
            $status_code = $this->createdStatus;
            $message = "Saved";
            $response = $this->successMessage($status_code, $message, $saved);

            return response($response, $status_code);
        }else{
            $status_code = $this->notImplementedStatus;
            $message = "Not Created";
            $response = $this->failureMessage($status_code, $message);
            return response($response, $status_code);
        }
    }

    /**
     * Update active ingredient
     *
     * Updates the active ingredient based on the ID
     * @authenticated
     *
     * @response status=201 {
     *   "code": 201,
     *   "message": "Updated",
     *   "success": true,
     *   "data": {
     *      "id": 76,
     *      "name": "Loremus Chloridus",
     *      "potential_harm": null,
     *      "aquatic": 0.028,
     *      "aquatic_desc": "Aquaticus Descreepticus",
     *      "bees": null,
     *      "bees_desc": null,
     *      "earthworm": null,
     *      "earthworm_desc": null,
     *      "birds": null,
     *      "birds_desc": null,
     *      "leachability": null,
     *      "leachability_desc": null,
     *      "carcinogenicity": null,
     *      "mutagenicity": null,
     *      "edc": null,
     *      "reproduction": null,
     *      "ache": null,
     *      "neurotoxicant": null,
     *      "who_classification": null,
     *      "eu_approved": null,
     *      "image": null
     *   }
     * }
     *
     * @response status=501 scenario="Update failed" {
     *      "code": 501,
     *      "message": "Update Unsuccessful",
     *      "success": false
     *  }
     */
//     * @param ActiveIngredientsRequest $request
//     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
    public function update(ActiveIngredientsRequest $request){
        $saved = $this->activeIngredientsService->update($request, $request->id);

        if($saved){
            $status_code = $this->createdStatus;
            $message = "Updated";
            $response = $this->successMessage($status_code, $message, new ActiveIngredientsResource($saved));

            return response($response, $status_code);
        }else{
            $status_code = $this->notImplementedStatus;
            $message = "Update Unsuccessful";
            $response = $this->failureMessage($status_code, $message);
            return response($response, $status_code);
        }
    }

    /**
     * Delete active ingredient
     *
     * Deletes an active ingredient based on the id value
     * @authenticated
     *
     * @response status=200
     * {
     *   "code": 200,
     *   "message": "Deleted",
     *   "success": true,
     *   "data": null
     * }
     *
     * @response status=501 scenario="Delete failed"
     * {
     *      "code": 501,
     *      "message": "Item not found",
     *      "success": false
     * }
     */
//     * @param Request $request
//     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
    public function delete(Request $request){
        $deleted = $this->activeIngredientsService->delete($request->id);
        if($deleted){
            $status_code = $this->successStatus;
            $message = "Deleted";
            $response = $this->successMessage($status_code, $message, null);

            return response($response, $status_code);
        }else{
            $status_code = $this->notImplementedStatus;
            $message = "Item not found";
            $response = $this->failureMessage($status_code, $message);
            return response($response, $status_code);
        }

    }

    /**
     * Search active ingredients
     *
     * Performs search on active ingredient records based on query parameter values
     *
     * @queryParam per_page number Example: 1
     * @queryParam order_direction string asc | desc Example: desc
     * @queryParam order_column string *use query parameter names below* Example: id
     *
     * @queryParam potential_harm string
     * @queryParam aquatic_desc string
     * @queryParam bees_desc string
     * @queryParam earthworm_desc string
     * @queryParam birds_desc string
     * @queryParam leachability_desc string
     * @queryParam carcinogenicity string yes | no | possible | no data
     * @queryParam mutagenicity yes | no | possible | no data
     * @queryParam edc string yes | no | possible | no data
     * @queryParam reproduction string yes | no | possible | no data
     * @queryParam ache string yes | no | possible | no data
     * @queryParam neurotoxicant string yes | no | possible | no data
     * @queryParam who_classification string IA | IB | II | III | U
     * @queryParam eu_approved string yes | no
     *
     * @response status=200
     * {
     *   "data": [
     *      {
     *          "id": 1,
     *          "name": "At vero eos",
     *          "potential_harm": "<p>Etiam efficitur porta quam, eget blandit lorem<\/p>",
     *          "aquatic": 1.5,
     *          "aquatic_desc": "<p>Etiam efficitur porta quam, eget blandit lorem<\/p>",
     *          "bees": 72,
     *          "bees_desc": "<p>Etiam efficitur porta quam, eget blandit lorem<\/p>",
     *          "earthworm": 999,
     *          "earthworm_desc": "<p>Etiam efficitur porta quam, eget blandit lorem<\/p>",
     *          "birds": 315,
     *          "birds_desc": "<p>Etiam efficitur porta quam, eget blandit lorem<\/p>",
     *          "leachability": -19.89,
     *          "leachability_desc": "<p>Etiam efficitur porta quam, eget blandit lorem<\/p>",
     *          "carcinogenicity": "No",
     *          "mutagenicity": "No Data",
     *          "edc": "No",
     *          "reproduction": "Possible",
     *          "ache": "No",
     *          "neurotoxicant": "No",
     *          "who_classification": "II",
     *          "eu_approved": "No",
     *          "image": "fa2234702a9941hi1w0f2726750fb63c7e.png",
     *          "agrochems": [
     *              {
     *                  "id": 99,
     *                  "product_name": "Curabitur",
     *                  "pcpb_number": "PCPB(CR)9999",
     *                  "distributing_company": "Donec sit amet. Ltd.",
     *                  "who_class": "II",
     *                  "toxic": 1,
     *                  "composition": "999g\/L as dui vitae ultricies",
     *                  "registrant": "Aenean facilisis ultrices dui tempus lacinia",
     *                  "type": null,
     *                  "phi_days": 99,
     *                  "image": "90c8539cfeef1fdbdfb6a3fff78567cf.jpg"
     *              },
     *              .
     *              .
     *              .
     *
     *          ]
     *      },
     *      .
     *      .
     *      .
     *   ],
     *   "links": {
     *      "first": "https://api.safeinputs.koan.co.ke/api/active_ingredients?page=1",
     *      "last": "https://api.safeinputs.koan.co.ke/api/active_ingredients?page=4",
     *      "prev": null,
     *      "next": "https://api.safeinputs.koan.co.ke/api/active_ingredients?page=2"
     *   },
     *   "meta": {
     *      "current_page": 1,
     *      "from": 1,
     *      "last_page": 4,
     *      "path": "https://api.safeinputs.koan.co.ke/api/active_ingredients",
     *      "per_page": "16",
     *      "to": 16,
     *      "total": 60
     *   }
     * }
     *
     * @response status=404 scenario="Items not found"
     * {
     *      "code": 404,
     *      "message": "Items not found",
     *      "success": false
     * }
     */
//     * Query parameter keys are the columns
//     * @param Request $request
    public function filter(Request $request){
        $items = $this->activeIngredientsService->filter($request);

        if($items->count()>0){
            return ActiveIngredientsResource::collection($items);
        }else{
            $status_code = $this->notFoundStatus;
            $message = "Items not found";
            $response = $this->failureMessage($status_code, $message);
            return response($response, $status_code);
        }
    }

    /**
     * Get totals of active ingredients
     *
     * Performs aggregations on active ingredient records based on query parameter values
     * Returns total
     *
     * @queryParam name string
     * @queryParam potential_harm string
     * @queryParam aquatic_desc string
     * @queryParam bees_desc string
     * @queryParam earthworm_desc string
     * @queryParam birds_desc string
     * @queryParam leachability_desc string
     * @queryParam carcinogenicity string yes | no | possible | no data
     * @queryParam mutagenicity yes | no | possible | no data
     * @queryParam edc string yes | no | possible | no data
     * @queryParam reproduction string yes | no | possible | no data
     * @queryParam ache string yes | no | possible | no data
     * @queryParam neurotoxicant string yes | no | possible | no data
     * @queryParam who_classification string IA | IB | II | III | U
     * @queryParam eu_approved string yes | no
     *
     * @response status=200
     * {
     *      "total": 99
     * }
     */
//     * @param Request $request
    public function summaryCount(Request $request){
        $count = $this->activeIngredientsService->summaryCount($request);;
        $status_code = $this->successStatus;
        $response =  [
            "total" => $count
        ];
        return response($response, $status_code);
    }

    /**
     * Get total of active ingredient's agrochem products
     *
     * Returns total
     *
     * @queryParam product_name string
     * @queryParam pcpb_number string
     * @queryParam distributing_company string
     * @queryParam who_class string
     * @queryParam toxic string true | false
     * @queryParam registrant string
     *
     * @response status=200
     * {
     *      "total": 99
     * }
     */
//     * @param Request $request
//     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
    public function summaryCountAgrochem(Request $request){
        $count = $this->activeIngredientsService->summaryCountAgrochem($request);;
        $status_code = $this->successStatus;
        $response =  [
            "total" => $count
        ];
        return response($response, $status_code);
    }

    /**
     * Get active ingredient names
     *
     * Returns only name, id and image.
     * Can be filtered based on query parameters
     *
     * @queryParam per_page number Example: 1
     * @queryParam order_direction string asc | desc Example: desc
     * @queryParam order_column string *use query parameter names below* Example: id
     *
     * @queryParam name string
     * @queryParam potential_harm string
     * @queryParam aquatic_desc string
     * @queryParam bees_desc string
     * @queryParam earthworm_desc string
     * @queryParam birds_desc string
     * @queryParam leachability_desc string
     * @queryParam carcinogenicity string yes | no | possible | no data
     * @queryParam mutagenicity yes | no | possible | no data
     * @queryParam edc string yes | no | possible | no data
     * @queryParam reproduction string yes | no | possible | no data
     * @queryParam ache string yes | no | possible | no data
     * @queryParam neurotoxicant string yes | no | possible | no data
     * @queryParam who_classification string IA | IB | II | III | U
     * @queryParam eu_approved string yes | no
     *
     * @response status=200
     * {
     *      "current_page": 1,
     *      "data": [
     *          {
     *              "id": 58,
     *              "name": "Esfenvalerate",
     *              "image": "b3e2c45c0551915175aeefdaf91d9c7a.png"
     *          },
     *          {
     *              "id": 57,
     *              "name": "Cypermethrin",
     *              "image": "f2341120f5a57a36e8a3813823ba1ae9.png"
     *          },
     *          .
     *          .
     *          .
     *      ],
     *      "first_page_url": "https://api.saferinputs.com/api/active_ingredients/summary/names?page=1",
     *      "from": 1,
     *      "last_page": 4,
     *      "last_page_url": "https://api.saferinputs.com/api/active_ingredients/summary/names?page=4",
     *      "next_page_url": "https://api.saferinputs.com/api/active_ingredients/summary/names?page=2",
     *      "path": "https://api.safeinputs.com/api/active_ingredients/summary/names",
     *      "per_page": "16",
     *      "prev_page_url": null,
     *      "to": 16,
     *      "total": 60
     * }
     *
     * @response status=404 scenario="Items not found"
     * {
     *      "code": 404,
     *      "message": "Items not found",
     *      "success": false
     * }
     */
//     * @param Request $request
    public function summaryNames(Request $request){
        $items = $this->activeIngredientsService->summaryNames($request);


        //Implementation without relationships
        if($items->count()>0){
            $message = $items->count()." Items found";
            $status_code = $this->successStatus;
            $response =  $items;
            return response($response, $status_code);
        }else{
            $status_code = $this->notFoundStatus;
            $message = "Items not found";
            $response = $this->failureMessage($status_code, $message);
            return response($response, $status_code);
        }
    }

    /**
     * Datatable
     *
     * Implementation for use with Datatables to populate table with active ingredients records.
     * Use the full request url in configuring the datatable.
     *
     * @response status = 200
     * {
     *      "current_page": 1,
     *      "data": [
     *          {
     *              "id": 1,
     *              "name": "At vero eos",
     *              "potential_harm": "<p>Etiam efficitur porta quam, eget blandit lorem<\/p>",
     *              "aquatic": 1.5,
     *              "aquatic_desc": "<p>Etiam efficitur porta quam, eget blandit lorem<\/p>",
     *              "bees": 72,
     *              "bees_desc": "<p>Etiam efficitur porta quam, eget blandit lorem<\/p>",
     *              "earthworm": 999,
     *              "earthworm_desc": "<p>Etiam efficitur porta quam, eget blandit lorem<\/p>",
     *              "birds": 315,
     *              "birds_desc": "<p>Etiam efficitur porta quam, eget blandit lorem<\/p>",
     *              "leachability": -19.89,
     *              "leachability_desc": "<p>Etiam efficitur porta quam, eget blandit lorem<\/p>",
     *              "carcinogenicity": "No",
     *              "mutagenicity": "No Data",
     *              "edc": "No",
     *              "reproduction": "Possible",
     *              "ache": "No",
     *              "neurotoxicant": "No",
     *              "who_classification": "II",
     *              "eu_approved": "No",
     *              "image": "fa2234702a9941hi1w0f2726750fb63c7e.png",
     *          },
     *          .
     *          .
     *          .
     *      ],
     *      "first_page_url": "https://api.safeinputs.koan.co.ke/api/active_ingredients/datatable?page=1",
     *      "from": 1,
     *      "last_page": 4,
     *      "last_page_url": "https://api.safeinputs.koan.co.ke/api/active_ingredients/datatable?page=4",
     *      "next_page_url": "https://api.safeinputs.koan.co.ke/api/active_ingredients/datatable?page=2",
     *      "path": "https://api.safeinputs.koan.co.ke/api/active_ingredients/datatable",
     *      "per_page": "16",
     *      "prev_page_url": null,
     *      "to": 16,
     *      "total": 60
     * }
     *
     */
//     * @param Request $request
//     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
    public function dataTable(Request $request){
        $items = $this->activeIngredientsService->filter($request);
        if($items){
            return $items;
        }else{
            $status_code = $this->notFoundStatus;
            $message = "Items not found";
            $response = $this->failureMessage($status_code, $message);
            return response($response, $status_code);
        }
    }
}
