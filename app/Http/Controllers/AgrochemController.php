<?php

namespace App\Http\Controllers;

use App\Http\Requests\AgrochemRequest;
use App\Http\Resources\AgrochemResource;
use App\Services\AgrochemService;
use Illuminate\Http\Request;

/**
 * @group Agrochem
 *
 * Agrochem resource requests
 */
// * Controller to handle Agrochem requests
// * Class AgrochemController
// * @package App\Http\Controllers
class AgrochemController extends Controller
{
    protected $agrochemService;


    protected $successStatus = 200;
    protected $createdStatus = 201;
    protected $noContentStatus = 204;
    protected $badRequestStatus = 400;
    protected $unauthorizedStatus = 401;
    protected $notFoundStatus = 404;
    protected $unprocessableStatus = 404;
    protected $notImplementedStatus = 501;



    public function __construct(AgrochemService $agrochemService)
    {
        $this->agrochemService = $agrochemService;
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
     * Get all agrochem products
     *
     * Get all agrochem products
     *
     * @queryParam order_column string
     * @queryParam order_direction string
     * @queryParam per_page
     *
     * @response status=200
     * {
     *    "data": [{
     *          "id": 1999,
     *          "product_name": "Morbi fringilla",
     *          "pcpb_number": "PCPB(CR)9999",
     *          "distributing_company": "Sed elementum",
     *          "toxic": 1,
     *          "who_class": "II",
     *          "composition": "200g/L as paraquat ion",
     *          "registrant": "Nam eu erat rhoncus",
     *          "type": null,
     *          "phi_days": null,
     *          "crops": [
     *              {
     *                  "id": 1,
     *                  "name": "Donec",
     *                  "image": "48898239dde0fa10c69a3a9673fd230c.jpg",
     *                  "pests_disease_weed": [
     *                      {
     *                          "id": 320,
     *                          "name": "Proin vulputate",
     *                          "type": "Disease",
     *                          "scientific_name": "Mauris elementum",
     *                          "description_pest": "Morbi eget odio tristique, venenatis metus eu, lobortis purus. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas",
     *                          "description_impact": "Donec fringilla enim ut convallis faucibus. Ut tempus turpis eget eros iaculis rhoncus. Cras aliquam nulla vitae felis ullamcorper ultrices.",
     *                          "image": "a53773d8c98ecedd1c2043eb1203c80a.jpg",
     *                          "references": "https://en.m.lorem.org/wiki"
     *                      },
     *                      .
     *                      .
     *                      .
     *                  ],
     *                  "agrochems": [
     *                      {
     *                          "id": 1123,
     *                          "product_name": "Ut maximus",
     *                          "pcpb_number": "PCPB(CR)9999",
     *                          "distributing_company": "Mauris a viv",
     *                          "who_class": "II",
     *                          "toxic": 1,
     *                          "composition": "200g/L as paraquat ion",
     *                          "registrant": "Ut maximus mauris quis nisl aliquam vulputate. Phasellus condimentum nulla",
     *                          "type": null,
     *                          "phi_days": null,
     *                          "image": "90c8cd35feef1fdbdfb6a3fff78567cf.jpg"
     *                      },
     *                      .
     *                      .
     *                      .
     *                  ]
     *              },
     *              .
     *              .
     *              .
     *          ],
     *          "pests_disease_weed": [
     *              {
     *                  "id": 484,
     *                  "name": "Mmaximus",
     *                  "type": "Weed",
     *                  "scientific_name": null,
     *                  "description_pest": "<p>Morbi fringilla fringilla odio vitae congue. Donec consectetur nulla ac congue congue. Fusce ac libero vel neque aliquet imperdiet a et nisi.</p>",
     *                  "description_impact": "<p><strong>Sed elementum</strong></p><p>Aliquam ut enim in eros blandit viverra maximus non sem. Sed tempor iaculis nunc, sed porta magna tempor ut.</p>",
     *                  "image": "d0b20da345ff656c7a0cf3b7f8980040.jpg",
     *                  "references": "<ol><li><a href=\"https://www.upsim.org/lonet\">"
     *              },
     *              .
     *              .
     *              .
     *          ],
     *          "image": "90c8539cfeef1f2345b6a3fff78567cf.jpg",
     *          "active_ingredients": [
     *              {
     *                  "id": 1,
     *                  "name": "Proin feugiat",
     *                  "potential_harm": null,
     *                  "aquatic": 1.2,
     *                  "aquatic_desc": "<p>Aenean ut eleifend lectus. Proin vulputate mauris vel est tempor, at finibus neque accumsan.</p>",
     *                  "bees": 72,
     *                  "bees_desc": "<p> Mauris a viverra tellus, sit amet mattis nisi. Sed quam turpis, semper a neque ut, ultricies aliquam</p>",
     *                  "earthworm": 999,
     *                  "earthworm_desc": null,
     *                  "birds": 35,
     *                  "birds_desc": "<p>Ut nec velit id ex viverra faucibus. Nulla ac convallis sem. Vivamus velit nibh, scelerisque et interdum nec, facilisis sit amet magna.</p>",
     *                  "leachability": -6.89,
     *                  "leachability_desc": "<p>Mauris elementum ac lectus </p>",
     *                  "carcinogenicity": "No",
     *                  "mutagenicity": "No Data",
     *                  "edc": "No",
     *                  "reproduction": "Possible",
     *                  "ache": "No",
     *                  "neurotoxicant": "No",
     *                  "who_classification": "II",
     *                  "eu_approved": "No",
     *                  "image": "ca211702a9941c4e0f2945750fb63c7e.png",
     *                  "agrochems": [
     *                      {
     *                          "id": 1,
     *                          "product_name": "Curabitun",
     *                          "pcpb_number": "PCPB(CR)9029",
     *                          "distributing_company": "Cras sed neque.",
     *                          "who_class": "II",
     *                          "toxic": 1,
     *                          "composition": "200g/L as paraquat ion",
     *                          "registrant": "Cras eget feugiat metus. Integer ultricies eu felis et laoreet..",
     *                          "type": null,
     *                          "phi_days": null,
     *                          "image": "90c8e234feef1fdbdfb6a3fff78567cf.jpg"
     *                      },
     *                      .
     *                      .
     *                      .
     *                  ]
     *              },
     *              .
     *              .
     *              .
     *          ]
     *      },
     *      .
     *      .
     *      .
     *    ],
     *    "links": {
     *          "first": "https://api.safeinputs.koan.co.ke/api/agrochem?page=1",
     *          "last": "https://api.safeinputs.koan.co.ke/api/agrochem?page=8",
     *          "prev": null,
     *          "next": "https://api.safeinputs.koan.co.ke/api/agrochem?page=2"
     *    },
     *    "meta": {
     *          "current_page": 1,
     *          "from": 1,
     *          "last_page": 8,
     *          "path": "https://api.safeinputs.koan.co.ke/api/agrochem",
     *          "per_page": "16",
     *          "to": 16,
     *          "total": 113
     *    }
     * }
     *
     * @response status=404 scenario="Items not found"
     * {
     *      "code": 404,
     *      "message": "Items not found",
     *      "success": false
     * }
     *
     */
//     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Resources\Json\AnonymousResourceCollection|\Illuminate\Http\Response
    public function all(Request $request){
        $items = $this->agrochemService->findAll($request);

        if($items->count()>0){
            return AgrochemResource::collection($items);
        }else{
            $status_code = $this->notFoundStatus;
            $message = "Items not found";
            $response = $this->failureMessage($status_code, $message);
            return response($response, $status_code);
        }
    }

    /**
     * Get agrochem names
     *
     * Retrieve all agrochem product names
     *
     * @response status=200
     * {
     *    "code": 200,
     *    "message": "113 Items found",
     *    "success": true,
     *    "data": [
     *          {
     *              "id": 109,
     *              "product_name": "Curabitur"
     *          },
     *          {
     *              "id": 96,
     *              "product_name": "Vivamus"
     *          },
     *          .
     *          .
     *          .
     *     ]
     * }
     *
     *
     * @response status=404 scenario="Items not found"
     * {
     *      "code": 404,
     *      "message": "Items not found",
     *      "success": false
     * }
     */
//     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
    public function getAgrochemNames(){
        $items = $this->agrochemService->getAgrochemNames();

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
     * Find agrochem based on ID
     *
     * Find agrochem product based on given ID.
     *
     * @response status=200
     * {
     *    "data": {
     *          "id": 1999,
     *          "product_name": "Morbi fringilla",
     *          "pcpb_number": "PCPB(CR)9999",
     *          "distributing_company": "Sed elementum",
     *          "toxic": 1,
     *          "who_class": "II",
     *          "composition": "200g/L as paraquat ion",
     *          "registrant": "Nam eu erat rhoncus",
     *          "type": null,
     *          "phi_days": null,
     *          "crops": [
     *              {
     *                  "id": 1,
     *                  "name": "Donec",
     *                  "image": "48898239dde0fa10c69a3a9673fd230c.jpg",
     *                  "pests_disease_weed": [
     *                      {
     *                          "id": 320,
     *                          "name": "Proin vulputate",
     *                          "type": "Disease",
     *                          "scientific_name": "Mauris elementum",
     *                          "description_pest": "Morbi eget odio tristique, venenatis metus eu, lobortis purus. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas",
     *                          "description_impact": "Donec fringilla enim ut convallis faucibus. Ut tempus turpis eget eros iaculis rhoncus. Cras aliquam nulla vitae felis ullamcorper ultrices.",
     *                          "image": "a53773d8c98ecedd1c2043eb1203c80a.jpg",
     *                          "references": "https://en.m.lorem.org/wiki"
     *                      },
     *                      .
     *                      .
     *                      .
     *                  ],
     *                  "agrochems": [
     *                      {
     *                          "id": 1123,
     *                          "product_name": "Ut maximus",
     *                          "pcpb_number": "PCPB(CR)9999",
     *                          "distributing_company": "Mauris a viv",
     *                          "who_class": "II",
     *                          "toxic": 1,
     *                          "composition": "200g/L as paraquat ion",
     *                          "registrant": "Ut maximus mauris quis nisl aliquam vulputate. Phasellus condimentum nulla",
     *                          "type": null,
     *                          "phi_days": null,
     *                          "image": "90c8cd35feef1fdbdfb6a3fff78567cf.jpg"
     *                      },
     *                      .
     *                      .
     *                      .
     *                  ]
     *              },
     *              .
     *              .
     *              .
     *          ],
     *          "pests_disease_weed": [
     *              {
     *                  "id": 484,
     *                  "name": "Mmaximus",
     *                  "type": "Weed",
     *                  "scientific_name": null,
     *                  "description_pest": "<p>Morbi fringilla fringilla odio vitae congue. Donec consectetur nulla ac congue congue. Fusce ac libero vel neque aliquet imperdiet a et nisi.</p>",
     *                  "description_impact": "<p><strong>Sed elementum</strong></p><p>Aliquam ut enim in eros blandit viverra maximus non sem. Sed tempor iaculis nunc, sed porta magna tempor ut.</p>",
     *                  "image": "d0b20da345ff656c7a0cf3b7f8980040.jpg",
     *                  "references": "<ol><li><a href=\"https://www.upsim.org/lonet\">"
     *              },
     *              .
     *              .
     *              .
     *          ],
     *          "image": "90c8539cfeef1f2345b6a3fff78567cf.jpg",
     *          "active_ingredients": [
     *              {
     *                  "id": 1,
     *                  "name": "Proin feugiat",
     *                  "potential_harm": null,
     *                  "aquatic": 1.2,
     *                  "aquatic_desc": "<p>Aenean ut eleifend lectus. Proin vulputate mauris vel est tempor, at finibus neque accumsan.</p>",
     *                  "bees": 72,
     *                  "bees_desc": "<p> Mauris a viverra tellus, sit amet mattis nisi. Sed quam turpis, semper a neque ut, ultricies aliquam</p>",
     *                  "earthworm": 999,
     *                  "earthworm_desc": null,
     *                  "birds": 35,
     *                  "birds_desc": "<p>Ut nec velit id ex viverra faucibus. Nulla ac convallis sem. Vivamus velit nibh, scelerisque et interdum nec, facilisis sit amet magna.</p>",
     *                  "leachability": -6.89,
     *                  "leachability_desc": "<p>Mauris elementum ac lectus </p>",
     *                  "carcinogenicity": "No",
     *                  "mutagenicity": "No Data",
     *                  "edc": "No",
     *                  "reproduction": "Possible",
     *                  "ache": "No",
     *                  "neurotoxicant": "No",
     *                  "who_classification": "II",
     *                  "eu_approved": "No",
     *                  "image": "ca211702a9941c4e0f2945750fb63c7e.png",
     *                  "agrochems": [
     *                      {
     *                          "id": 1,
     *                          "product_name": "Curabitun",
     *                          "pcpb_number": "PCPB(CR)9029",
     *                          "distributing_company": "Cras sed neque.",
     *                          "who_class": "II",
     *                          "toxic": 1,
     *                          "composition": "200g/L as paraquat ion",
     *                          "registrant": "Cras eget feugiat metus. Integer ultricies eu felis et laoreet..",
     *                          "type": null,
     *                          "phi_days": null,
     *                          "image": "90c8e234feef1fdbdfb6a3fff78567cf.jpg"
     *                      },
     *                      .
     *                      .
     *                      .
     *                  ]
     *              },
     *              .
     *              .
     *              .
     *          ]
     *    }
     * }
     *
     * @response status=404 scenario="Agrochem not found"
     * {
     *    "code": 404,
     *    "message": "Item not found",
     *    "success": false
     * }
     */
//     * @param $id
//     * @return AgrochemResource|\Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
    public function find($id){
        $item = $this->agrochemService->find($id);
        if($item){
            return new agrochemResource($item);
        }else{
            $status_code = $this->notFoundStatus;
            $message = "Item not found";
            $response = $this->failureMessage($status_code, $message);
            return response($response, $status_code);
        }
    }

    /**
     * Find agrochem crops
     *
     * Find crops associated with the agrochem product based on its id
     *
     * @response status=200
     * {
     *    "data": {
     *          "id": 1999,
     *          "product_name": "Morbi fringilla",
     *          "pcpb_number": "PCPB(CR)9999",
     *          "distributing_company": "Sed elementum",
     *          "toxic": 1,
     *          "who_class": "II",
     *          "composition": "200g/L as paraquat ion",
     *          "registrant": "Nam eu erat rhoncus",
     *          "type": null,
     *          "phi_days": null,
     *          "crops": [
     *              {
     *                  "id": 1,
     *                  "name": "Donec",
     *                  "image": "48898239dde0fa10c69a3a9673fd230c.jpg",
     *              },
     *              .
     *              .
     *              .
     *          ]
     *    }
     * }
     *
     * @response status=404 scenario="No Crops Found"
     * {
     *    "code": 404,
     *    "message": "Item not found",
     *    "success": false
     * }
     *
     */
//     * @param $id
//     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\JsonResponse|\Illuminate\Http\Response
    public function findCrops(Request $request){
        $item = $this->agrochemService->findCrops($request);
        if($item && sizeof($item->crops) > 0){
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
     * Find agrochem commercial organic alternatives
     *
     * Find commercial organic alternative products to handle specific pests based on the agrochem product id
     *
     * @response status=200
     * {
     *    "total": 4,
     *    "data": [
     *          {
     *              "id": 9,
     *              "name": "Morbi",
     *              "type": "Pest",
     *              "scientific_name": "Ut maximus mauris quis nisl aliquam vulputate. Phasellus condimentum nulla fringilla egestas feugiat. Cras sed neque elementum, facilisis",
     *              "description_pest": "Proin interdum, ligula nec ultricies suscipit, ipsum ipsum pretium justo, vel blandit lorem tortor ac est",
     *              "description_impact": "Morbi fringilla fringilla odio vitae congue. Donec consectetur nulla ac congue .",
     *              "image": "ba2e5bf4660c05b43d2123c4c73ab25c8.jpeg",
     *              "references": "https://www.donec-erat.org/",
     *              "commercial_organic": [
     *                  {
     *                      "id": 4,
     *                      "name": "Phasellus",
     *                      "pcpb_number": "PCPB(CR)9999",
     *                      "manufacturer": "Nulla ex",
     *                      "distributor": "Nulla ex",
     *                      "category": "Biocontrol",
     *                      "contact_details": "Nulla ac convallis sem. Vivamus velit nibh, scelerisque et interdum nec, facilisis sit amet magna. Suspendisse at tellus lorem.",
     *                      "external_links": [
     *                          "<p>www.justo-etiam.com</p>",
     *                      ],
     *                      "application_details": [
     *                          "Nulla ac convallis sem. Vivamus velit nibh, scelerisque et interdum nec,"
     *                      ],
     *                      "image": "1a240c031237a16a16291e9643f3ed8.jpg"
     *                  },
     *                  .
     *                  .
     *                  .
     *              ]
     *          },
     *          .
     *          .
     *          .
     *    ]
     * }
     *
     * @response status=404 scenario="No Commercial Organic Found"
     * {
     *    "code": 404,
     *    "message": "Item not found",
     *    "success": false
     * }
     *
     */
//     * @param $id
//     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\JsonResponse|\Illuminate\Http\Response
    public function findCommercialOrganic(Request $request){
        $item = $this->agrochemService->findCommercialOrganic($request);
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
     * Find agrochem homemade organic alternatives
     *
     * Find homemade organic alternatives to handle specific pests based on the agrochem product id
     *
     * @response status=200
     * {
     *    "total": 2,
     *    "data": [
     *          {
     *              "id": 9,
     *              "name": "Morbi",
     *              "type": "Pest",
     *              "scientific_name": "Ut maximus mauris quis nisl aliquam vulputate. Phasellus condimentum nulla fringilla egestas feugiat. Cras sed neque elementum, facilisis",
     *              "description_pest": "Proin interdum, ligula nec ultricies suscipit, ipsum ipsum pretium justo, vel blandit lorem tortor ac est",
     *              "description_impact": "Morbi fringilla fringilla odio vitae congue. Donec consectetur nulla ac congue .",
     *              "image": "ba2e5bf4660c05b43d2123c4c73ab25c8.jpeg",
     *              "references": "https://www.donec-erat.org/",
     *              "homemade_organic": [
     *                  {
     *                      "id": 322,
     *                      "name": "Proin feugiat massa quam",
     *                      "practices": [
     *                          "<p>Nam eu erat rhoncus, sollicitudin arcu eu, consequat neque. Nulla ex velit, ullamcorper quis ante vel, maximus tincidunt eros. Vestibulum auctor ante sit amet nisi pulvinar ultricies.</p>",
     *                          .
     *                          .
     *                          .
     *                      ],
     *                      "external_links": [
     *                          "<p>1.Duis convallis, elit eget posuere vulputate, nunc dui</p>",
     *                          "<p>2. https://www.ultrices-velit.org/</p>",
     *                          .
     *                          .
     *                          .
     *                      ],
     *                      "references": [
     *                          "https://www.ultrices-velit.org",
     *                          .
     *                          .
     *                          .
     *                      ],
     *                      "image": "55a34637157a757f60003f86179221a1.jpg"
     *                  },
     *                  .
     *                  .
     *                  .
     *              ]
     *          },
     *          .
     *          .
     *          .
     *    ]
     * }
     *
     *
     * @response status=404 scenario="No Homemade Organic"
     * {
     *    "code": 404,
     *    "message": "Item not found",
     *    "success": false
     * }
     *
     */
//     * @param $id
//     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\JsonResponse|\Illuminate\Http\Response
    public function findHomemadeOrganic(Request $request){
        $item = $this->agrochemService->findHomemadeOrganic($request);
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
     * Find agrochem GAP alternatives
     *
     * Find alternative good agricultural practices (GAP) to handle specific pests based on the agrochem product id
     *
     * @response status=200
     * {
     *      "total": 2,
     *      "data": [
     *          {
     *              "id": 9,
     *              "name": "Morbi",
     *              "type": "Pest",
     *              "scientific_name": "Ut maximus mauris quis nisl aliquam vulputate. Phasellus condimentum nulla fringilla egestas feugiat. Cras sed neque elementum, facilisis",
     *              "description_pest": "Proin interdum, ligula nec ultricies suscipit, ipsum ipsum pretium justo, vel blandit lorem tortor ac est",
     *              "description_impact": "Morbi fringilla fringilla odio vitae congue. Donec consectetur nulla ac congue .",
     *              "image": "ba2e5bf4660c05b43d2123c4c73ab25c8.jpeg",
     *              "references": "https://www.donec-erat.org/",
     *              "gap": [
     *                  {
     *                      "id": 23,
     *                      "name": "Mauris a viverra",
     *                      "category": [
     *                          "Cultural",
     *                          "Physical",
     *                          "Prevention"
     *                      ],
     *                      "practices": [
     *                          "<h4><strong>Donec fringilla</strong></h4><ol><li>Nam eu erat rhoncus, sollicitudin arcu eu, consequat neque. Nulla ex velit, ullamcorper qu</li></ol>",
     *                      ],
     *                      "references": [
     *                          "<ol><li><a href=\"https://www.nisi-convallis.org/\">https://www.nisi-convallis.org/</a></li></ol>"
     *                      ],
     *                      "image": "23456803e306dd09538a811ed4ee067d.jpg"
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
     * @response status=404 scenario="No Homemade Organic"
     * {
     *    "code": 404,
     *    "message": "Item not found",
     *    "success": false
     * }
     *
     */
//     * @param $id
//     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\JsonResponse|\Illuminate\Http\Response
    public function findGap(Request $request){
        $item = $this->agrochemService->findGap($request);
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
     * Find agrochem active ingredients
     *
     * Find the agrochem product's active ingredients based on the id
     *
     *
     * @response status=200
     * {
     *    "data": {
     *          "id": 913,
     *          "product_name": "Vivamus",
     *          "pcpb_number": "PCPB(CR)9970",
     *          "distributing_company": "Nunc rhoncus blandit mi sed dapibus",
     *          "who_class": "II",
     *          "toxic": 1,
     *          "composition": "Mauris vel magna",
     *          "registrant": "<p>Aenean sit amet sapien nulla. Nullam efficitur auctor mi blandit malesuada.</p>",
     *          "type": null,
     *          "phi_days": 14,
     *          "image": "7b77642dc98e2122194b26a21dd2c614.jpeg",
     *          "active_ingredients": [
     *              {
     *                  "id": 1215,
     *                  "name": "Proin feugiat",
     *                  "potential_harm": null,
     *                  "aquatic": 1.2,
     *                  "aquatic_desc": "<p>Aenean ut eleifend lectus. Proin vulputate mauris vel est tempor, at finibus neque accumsan.</p>",
     *                  "bees": 72,
     *                  "bees_desc": "<p> Mauris a viverra tellus, sit amet mattis nisi. Sed quam turpis, semper a neque ut, ultricies aliquam</p>",
     *                  "earthworm": 999,
     *                  "earthworm_desc": null,
     *                  "birds": 35,
     *                  "birds_desc": "<p>Ut nec velit id ex viverra faucibus. Nulla ac convallis sem. Vivamus velit nibh, scelerisque et interdum nec, facilisis sit amet magna.</p>",
     *                  "leachability": -6.89,
     *                  "leachability_desc": "<p>Mauris elementum ac lectus </p>",
     *                  "carcinogenicity": "No",
     *                  "mutagenicity": "No Data",
     *                  "edc": "No",
     *                  "reproduction": "Possible",
     *                  "ache": "No",
     *                  "neurotoxicant": "No",
     *                  "who_classification": "II",    "eu_approved": "No",
     *                  "image "ca211702a9941c4e0f2945750fb63c7e.png",
     *              },
     *              .
     *              .
     *              .
     *          ]
     *    }
     * }
     *
     *
     * @response status=404 scenario="No Active Ingredients"
     * {
     *    "code": 404,
     *    "message": "Item not found",
     *    "success": false
     * }
     *
     *
     */
//     * @param $id
//     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\JsonResponse|\Illuminate\Http\Response
    public function findActiveIngredients(Request $request){
        $item = $this->agrochemService->findActiveIngredients($request);
        if($item && sizeof($item->activeIngredients)>0){
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
     * Find agrochem pests, diseases, weeds
     *
     * Find pests, diseases, weeds controlled by the  agrochem product based on the agrochem product's id
     *
     *
     * @response status=200
     * {
     *    "data": {
     *          "id": 913,
     *          "product_name": "Vivamus",
     *          "pcpb_number": "PCPB(CR)9970",
     *          "distributing_company": "Nunc rhoncus blandit mi sed dapibus",
     *          "who_class": "II",
     *          "toxic": 1,
     *          "composition": "Mauris vel magna",
     *          "registrant": "<p>Aenean sit amet sapien nulla. Nullam efficitur auctor mi blandit malesuada.</p>",
     *          "type": null,
     *          "phi_days": 14,
     *          "image": "7b77642dc98e2122194b26a21dd2c614.jpeg",
     *          "pests_disease_weed": [
     *              {
     *                  "id": 484,
     *                  "name": "Mmaximus",
     *                  "type": "Weed",
     *                  "scientific_name": null,
     *                  "description_pest": "<p>Morbi fringilla fringilla odio vitae congue. Donec consectetur nulla ac congue congue. Fusce ac libero vel neque aliquet imperdiet a et nisi.</p>",
     *                  "description_impact": "<p><strong>Sed elementum</strong></p><p>Aliquam ut enim in eros blandit viverra maximus non sem. Sed tempor iaculis nunc, sed porta magna tempor ut.</p>",
     *                  "image": "d0b20da345ff656c7a0cf3b7f8980040.jpg",
     *                  "references": "<ol><li><a href=\"https://www.upsim.org/lonet\">"
     *              },
     *              .
     *              .
     *              .
     *          ],
     *    }
     * }
     *
     *
     * @response status=404 scenario="No Pests, Diseases, Weeds Found"
     * {
     *    "code": 404,
     *    "message": "Item not found",
     *    "success": false
     * }
     *
     */
//     * @param $id
//     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\JsonResponse|\Illuminate\Http\Response
    public function findPestsDiseasesWeeds(Request $request){
        $item = $this->agrochemService->findPestDiseaseWeeds($request);
        if($item && sizeof($item->pestsDiseaseWeed)>0){
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
     * Add agrochem
     *
     * Adds a new agrochem product item to database
     * @authenticated
     *
     * @response status=201
     * {
     *    "code": 201,
     *    "message": "Saved",
     *    "success": true,
     *    "data": {
     *    "id": 1214,
     *    "product_name": "Vestibulum",
     *    "pcpb_number": "PCPB(CR)9999",
     *    "distributing_company": "Curabitur ac quam",
     *    "who_class": "II",
     *    "toxic": 1,
     *    "composition": "Meth",
     *    "registrant": "Vivamus vitae ligula",
     *    "type": null,
     *    "phi_days": 234,
     *    "image": null
     *    }
     * }
     *
     * @response status=501 scenario="Agrochem not created"
     * {
     *      "code": 501,
     *      "message": "Not Created",
     *      "success": false
     * }
     */
//     * @param AgrochemRequest $request
//     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
    public function new(AgrochemRequest $request){
        $saved = $this->agrochemService->create($request);

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
     * Update agrochem
     *
     * Updates the agrochem product based on the ID
     * @authenticated
     *
     * @response status=201
     * {
     *    "code": 201,
     *    "message": "Updated",
     *    "success": true,
     *    "data": {
     *    "id": 1214,
     *    "product_name": "Vestibulum Update",
     *    "pcpb_number": "PCPB(CR)9999",
     *    "distributing_company": "Curabitur ac quam nullo",
     *    "who_class": "II",
     *    "toxic": 1,
     *    "composition": "Meth",
     *    "registrant": "Vivamus vitae ligula",
     *    "type": null,
     *    "phi_days": 234,
     *    "image": null
     *    }
     * }
     *
     * @response status=501 scenario="Update failed"
     * {
     *      "code": 501,
     *      "message": "Update Unsuccessful",
     *      "success": false
     * }
     *
     */
//     * @param AgrochemRequest $request
//     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
    public function update(AgrochemRequest $request){
        $saved = $this->agrochemService->update($request, $request->id);

        if($saved){
            $status_code = $this->createdStatus;
            $message = "Updated";
            $response = $this->successMessage($status_code, $message, new AgrochemResource($saved));

            return response($response, $status_code);
        }else{
            $status_code = $this->notImplementedStatus;
            $message = "Update Unsuccessful";
            $response = $this->failureMessage($status_code, $message);
            return response($response, $status_code);
        }
    }

    /**
     * Delete agrochem
     *
     * Deletes an agrochem product based on the id value
     *
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
        $deleted = $this->agrochemService->delete($request->id);
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
     * Search Agrochem Products
     *
     * Performs search on agrochem product records based on query parameter values
     * Query parameter keys are the columns
     *
     * @queryParam product_name string
     * @queryParam pcpb_number string
     * @queryParam distributing_company string
     * @queryParam composition string
     * @queryParam registrant string
     * @queryParam toxic string true | false
     * @queryParam who_class string IA | IB | II | III | U
     *
     *
     *
     * @response status=200
     * {
     *     "data": [
     *          {
     *              "id": 1999,
     *              "product_name": "Morbi fringilla",
     *              "pcpb_number": "PCPB(CR)9999",
     *              "distributing_company": "Sed elementum",
     *              "toxic": 1,
     *              "who_class": "II",
     *              "composition": "200g/L as paraquat ion",
     *              "registrant": "Nam eu erat rhoncus",
     *              "type": null,
     *              "phi_days": null,
     *              "crops": [
     *                  {
     *                      "id": 1,
     *                      "name": "Donec",
     *                      "image": "48898239dde0fa10c69a3a9673fd230c.jpg",
     *                      "pests_disease_weed": [
     *                          {
     *                              "id": 320,
     *                              "name": "Proin vulputate",
     *                              "type": "Disease",
     *                              "scientific_name": "Mauris elementum",
     *                              "description_pest": "Morbi eget odio tristique, venenatis metus eu, lobortis purus. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas",
     *                              "description_impact": "Donec fringilla enim ut convallis faucibus. Ut tempus turpis eget eros iaculis rhoncus. Cras aliquam nulla vitae felis ullamcorper ultrices.",
     *                              "image": "a53773d8c98ecedd1c2043eb1203c80a.jpg",
     *                              "references": "https://en.m.lorem.org/wiki"
     *                          },
     *                          .
     *                          .
     *                          .
     *                      ],
     *                      "agrochems": [
     *                          {
     *                              "id": 1123,
     *                              "product_name": "Ut maximus",
     *                              "pcpb_number": "PCPB(CR)9999",
     *                              "distributing_company": "Mauris a viv",
     *                              "who_class": "II",
     *                              "toxic": 1,
     *                              "composition": "200g/L as paraquat ion",
     *                              "registrant": "Ut maximus mauris quis nisl aliquam vulputate. Phasellus condimentum nulla",
     *                              "type": null,
     *                              "phi_days": null,
     *                              "image": "90c8cd35feef1fdbdfb6a3fff78567cf.jpg"
     *                          },
     *                          .
     *                          .
     *                          .
     *                      ]
     *                  },
     *                  .
     *                  .
     *                  .
     *              ],
     *              "pests_disease_weed": [
     *                  {
     *                      "id": 484,
     *                      "name": "Mmaximus",
     *                      "type": "Weed",
     *                      "scientific_name": null,
     *                      "description_pest": "<p>Morbi fringilla fringilla odio vitae congue. Donec consectetur nulla ac congue congue. Fusce ac libero vel neque aliquet imperdiet a et nisi.</p>",
     *                      "description_impact": "<p><strong>Sed elementum</strong></p><p>Aliquam ut enim in eros blandit viverra maximus non sem. Sed tempor iaculis nunc, sed porta magna tempor ut.</p>",
     *                      "image": "d0b20da345ff656c7a0cf3b7f8980040.jpg",
     *                      "references": "<ol><li><a href=\"https://www.upsim.org/lonet\">"
     *                  },
     *                  .
     *                  .
     *                  .
     *              ],
     *              "image": "90c8539cfeef1f2345b6a3fff78567cf.jpg",
     *              "active_ingredients": [
     *                  {
     *                      "id": 1,
     *                      "name": "Proin feugiat",
     *                      "potential_harm": null,
     *                      "aquatic": 1.2,
     *                      "aquatic_desc": "<p>Aenean ut eleifend lectus. Proin vulputate mauris vel est tempor, at finibus neque accumsan.</p>",
     *                      "bees": 72,
     *                      "bees_desc": "<p> Mauris a viverra tellus, sit amet mattis nisi. Sed quam turpis, semper a neque ut, ultricies aliquam</p>",
     *                      "earthworm": 999,
     *                      "earthworm_desc": null,
     *                      "birds": 35,
     *                      "birds_desc": "<p>Ut nec velit id ex viverra faucibus. Nulla ac convallis sem. Vivamus velit nibh, scelerisque et interdum nec, facilisis sit amet magna.</p>",
     *                      "leachability": -6.89,
     *                      "leachability_desc": "<p>Mauris elementum ac lectus </p>",
     *                      "carcinogenicity": "No",
     *                      "mutagenicity": "No Data",
     *                      "edc": "No",
     *                      "reproduction": "Possible",
     *                      "ache": "No",
     *                      "neurotoxicant": "No",
     *                      "who_classification": "II",
     *                      "eu_approved": "No",
     *                      "image": "ca211702a9941c4e0f2945750fb63c7e.png",
     *                      "agrochems": [
     *                          {
     *                              "id": 1,
     *                              "product_name": "Curabitun",
     *                              "pcpb_number": "PCPB(CR)9029",
     *                              "distributing_company": "Cras sed neque.",
     *                              "who_class": "II",
     *                              "toxic": 1,
     *                              "composition": "200g/L as paraquat ion",
     *                              "registrant": "Cras eget feugiat metus. Integer ultricies eu felis et laoreet..",
     *                              "type": null,
     *                              "phi_days": null,
     *                              "image": "90c8e234feef1fdbdfb6a3fff78567cf.jpg"
     *                          },
     *                          .
     *                          .
     *                          .
     *                      ]
     *                  },
     *                  .
     *                  .
     *                  .
     *              ]
     *          },
     *      ],
     *      "links": {
     *          "first": "https://api.safeinputs.koan.co.ke/api/agrochem/filter?page=1",
     *          "last": "https://api.safeinputs.koan.co.ke/api/agrochem/filter?page=8",
     *          "prev": null,
     *          "next": "https://api.safeinputs.koan.co.ke/api/agrochem/filter?page=2"
     *      },
     *      "meta": {
     *          "current_page": 1,
     *          "from": 1,
     *          "last_page": 8,
     *          "path": "https://api.safeinputs.koan.co.ke/api/agrochem/filter",
     *          "per_page": "16",
     *          "to": 16,
     *          "total": 114
     *      }
     *  }
     *
     *
     * @response status=404 scenario="Items not found"
     * {
     *      "code": 404,
     *      "message": "Items not found",
     *      "success": false
     * }
     */
//     * @param Request $request
    public function filter(Request $request){
        $items = $this->agrochemService->filter($request);

        if($items->count()>0){
            return AgrochemResource::collection($items);
        }else{
            $status_code = $this->notFoundStatus;
            $message = "Items not found";
            $response = $this->failureMessage($status_code, $message);
            return response($response, $status_code);
        }
    }
    public function filterByActiveIngredients(Request $request){
        $items = $this->agrochemService->filterByActiveIngredients($request);

        if($items->count()>0){
            return AgrochemResource::collection($items);
        }else{
            $status_code = $this->notFoundStatus;
            $message = "Items not found";
            $response = $this->failureMessage($status_code, $message);
            return response($response, $status_code);
        }
    }
    public function filterByCrops(Request $request){
        $items = $this->agrochemService->filterByCrops($request);

        if($items->count()>0){
            return AgrochemResource::collection($items);
        }else{
            $status_code = $this->notFoundStatus;
            $message = "Items not found";
            $response = $this->failureMessage($status_code, $message);
            return response($response, $status_code);
        }
    }
    public function filterByPestsDiseaseWeed(Request $request){
        $items = $this->agrochemService->filterByPestsDiseaseWeed($request);

        if($items->count()>0){
            return AgrochemResource::collection($items);
        }else{
            $status_code = $this->notFoundStatus;
            $message = "Items not found";
            $response = $this->failureMessage($status_code, $message);
            return response($response, $status_code);
        }
    }

    /**
     * Performs aggregations on agrochem records based on query parameter values
     * Returns total
     * Query parameter keys are the columns
     * @param Request $request
     */
    public function summaryCountActiveIngredients(Request $request){
        $count = $this->agrochemService->summaryCountActiveIngredients($request);;
        $status_code = $this->successStatus;
        $response =  [
            "total" => $count
        ];
        return response($response, $status_code);
    }

    /**
     * Performs aggregations on agrochem records based on query parameter values
     * Returns total
     * Query parameter keys are the columns
     * @param Request $request
     */
    public function summaryCountPestsDiseaseWeed(Request $request){
        $count = $this->agrochemService->summaryCountCrops($request);;
        $status_code = $this->successStatus;
        $response =  [
            "total" => $count
        ];
        return response($response, $status_code);
    }

    /**
     * Performs aggregations on agrochem records based on query parameter values
     * Returns total
     * Query parameter keys are the columns
     * @param Request $request
     */
    public function summaryCountCrops(Request $request){
        $count = $this->agrochemService->summaryCountCrops($request);;
        $status_code = $this->successStatus;
        $response =  [
            "total" => $count
        ];
        return response($response, $status_code);
    }

    /**
     * Get totals of agrochem products
     *
     * Performs aggregations on agrochem records based on query parameter values </br>
     * Returns total
     *
     * @queryParam product_name string
     * @queryParam pcpb_number string
     * @queryParam distributing_company string
     * @queryParam composition string
     * @queryParam registrant string
     * @queryParam toxic string true | false
     * @queryParam who_class string IA | IB | II | III | U
     *
     * @response status=200
     * {
     *      "total": 99
     * }
     */
//     * Query parameter keys are the columns
//     * @param Request $request
    public function summaryCount(Request $request){
        $count = $this->agrochemService->summaryCount($request);;
        $status_code = $this->successStatus;
        $response =  [
            "total" => $count
        ];
        return response($response, $status_code);
    }


    /**
     * Get agrochem names - with image
     *
     * Performs search on agrochem product records based on query parameter values</br>
     * Returns only name, id and image
     *
     * @queryParam per_page number Example: 1
     * @queryParam order_direction string asc | desc Example: desc
     * @queryParam order_column string *use query parameter names below* Example: id*
     *
     * @queryParam product_name string
     * @queryParam pcpb_number string
     * @queryParam distributing_company string
     * @queryParam composition string
     * @queryParam registrant string
     * @queryParam toxic string true | false
     * @queryParam who_class string IA | IB | II | III | U
     *
     * @response status=200
     * {
     *      "current_page": 1,
     *      "data": [
     *          {
     *              "id": 115,
     *              "product_name": "Dummy",
     *              "image": "1a7f07ce0c95d1aa64e3b0522ec69a21.jpg"
     *          },
     *          .
     *          .
     *          .
     *      ],
     *      "first_page_url": "https://api.saferinputs.com/api/agrochem/summary/names?page=1",
     *      "from": 1,
     *      "last_page": 8,
     *      "last_page_url": "https://api.saferinputs.com/api/agrochem/summary/names?page=8",
     *      "next_page_url": "https://api.saferinputs.com/api/agrochem/summary/names?page=2",
     *      "path": "https://api.saferinputs.com/api/agrochem/summary/names",
     *      "per_page": "16",
     *      "prev_page_url": null,
     *      "to": 16,
     *      "total": 114
     * }
     *
     * @response status=404 scenario="Items not found"
     * {
     *      "code": 404,
     *      "message": "Items not found",
     *      "success": false
     * }
     *
     */
//     * Query parameter keys are the columns
//     * @param Request $request
    public function summaryNames(Request $request){
        $items = $this->agrochemService->summaryNames($request);
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
    public function summaryNamesByActiveIngredients(Request $request){
        $items = $this->agrochemService->summaryNamesByActiveIngredients($request);
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
    public function summaryNamesByCrops(Request $request){
        $items = $this->agrochemService->summaryNamesByCrops($request);
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
    public function summaryNamesByPestsDiseaseWeed(Request $request){
        $items = $this->agrochemService->summaryNamesByPestsDiseaseWeed($request);
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
     * Implementation for Datatables API to populate table with agrochem records
     *
     * @response status=200
     * {
     *      "current_page": 1,
     *      "data": [
     *          {
     *              "id": 1999,
     *              "product_name": "Morbi fringilla",
     *              "pcpb_number": "PCPB(CR)9999",
     *              "distributing_company": "Sed elementum",
     *              "toxic": 1,
     *              "who_class": "II",
     *              "composition": "200g/L as paraquat ion",
     *              "registrant": "Nam eu erat rhoncus",
     *              "type": "tocix",
     *              "phi_days": 234,
     *              "image": "7b77642dc9863c22194b26a21da24614.jpg"
     *          },
     *          .
     *          .
     *          .
     *      ],
     *      "first_page_url": "https://api.safeinputs.koan.co.ke/api/agrochem/datatable?page=1",
     *      "from": 1,
     *      "last_page": 8,
     *      "last_page_url": "https://api.safeinputs.koan.co.ke/api/agrochem/datatable?page=8",
     *      "next_page_url": "https://api.safeinputs.koan.co.ke/api/agrochem/datatable?page=2",
     *      "path": "https://api.safeinputs.koan.co.ke/api/agrochem/datatable",
     *      "per_page": "16",
     *      "prev_page_url": null,
     *      "to": 16,
     *      "total": 114
     * }
     */
//     * @param Request $request
//     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
    public function dataTable(Request $request){
        $items = $this->agrochemService->filter($request);
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
