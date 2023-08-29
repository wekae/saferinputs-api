<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommercialOrganicRequest;
use App\Http\Resources\CommercialOrganicResource;
use App\Services\CommercialOrganicService;
use Illuminate\Http\Request;

/**
 * @group Commercial Organic
 *
 * Commercial organic requests
 */
// * Controller to handle CommercialOrganic requests
// *
// * Class CommercialOrganicController
// * @package App\Http\Controllers
class CommercialOrganicController extends Controller
{
    protected $commercialOrganicService;


    protected $successStatus = 200;
    protected $createdStatus = 201;
    protected $noContentStatus = 204;
    protected $badRequestStatus = 400;
    protected $unauthorizedStatus = 401;
    protected $notFoundStatus = 404;
    protected $unprocessableStatus = 404;
    protected $notImplementedStatus = 501;



    public function __construct(CommercialOrganicService $commercialOrganicService)
    {
        $this->commercialOrganicService = $commercialOrganicService;
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
     * Get all commercial organic items
     *
     * Retrieve all commercial organic items
     *
     * @queryParam order_column string
     * @queryParam order_direction string
     * @queryParam per_page
     *
     * @response status=200
     * {
     *      "data": [
     *          {
     *              "id": 422,
     *              "name": "Vivamus",
     *              "pcpb_number": "PCPB(CR)3999",
     *              "manufacturer": "Donec suscipit",
     *              "distributor": "Donec suscipit",
     *              "category": "Biocontrol",
     *              "contact_details": "<p>P.O.Box 23423423</p><p>Nairobi 2234234 Kenya</p><p>Cell: +254 234 564 122</p>",
     *              "external_links": [
     *                  "<p>www.suscipit.com</p>",
     *                  "<p>https://www.suscipit.com/shop/Vivamus/</p>"
     *              ],
     *              "application_details": [],
     *              "image": "1a240c03cc1b7a16a16291da123133ed8.jpg",
     *              "pests_diseases_weed": [
     *                  {
     *                      "id": 9,
     *                      "name": "Cras",
     *                      "type": "Pest",
     *                      "scientific_name": "Nullam feugiat",
     *                      "description_pest": "Cras quis nunc scelerisque velit porttitor porttitor non eget ipsum. Nam non tincidunt ligula. Suspendisse potenti. Ut ut maximus elit. Phasellus tempor quis eros a vulputate. Proin euismod ligula augue, tempor viverra libero commodo a. Suspendisse placerat massa id facilisis dapibus.",
     *                      "description_impact": "Cras quis nunc scelerisque velit porttitor porttitor non eget ipsum. Nam non tincidunt ligula. Suspendisse potenti. Ut ut maximus elit. Phasellus tempor quis eros a vulputate. Proin euismod ligula augue, tempor viverra libero commodo a. Suspendisse placerat massa id facilisis dapibus.",
     *                      "image": "ba2e5bf4660c05b43fef23453ab25c8.jpeg",
     *                      "references": "https://www.gravida.org/cras."
     *                  },
     *                  .
     *                  .
     *                  .
     *              ],
     *              "control_methods": [
     *                  {
     *                      "id": 2,
     *                      "name": "Biopesticide Control Method for Cras",
     *                      "category": "Biopesticide",
     *                      "options": [
     *                          "Nullam feugiat arcu dolor, eget vulputate nibh",
     *                          "Duis eget gravida lorem, a auctor mi.",
     *                      ],
     *                      "external_links": [],
     *                      "image": "c5007a207c511232324c96a993a700c.jpg"
     *                  },
     *                  .
     *                  .
     *                  .
     *              ]
     *          },
     *          .
     *          .
     *          .
     *      ],
     *      "links": {
     *          "first": "https://api.safeinputs.koan.co.ke/api/commercial_organic?page=1",
     *          "last": "https://api.safeinputs.koan.co.ke/api/commercial_organic?page=6",
     *          "prev": null,
     *          "next": "https://api.safeinputs.koan.co.ke/api/commercial_organic?page=2"
     *      },
     *      "meta": {
     *          "current_page": 1,
     *          "from": 1,
     *          "last_page": 6,
     *          "path": "https://api.safeinputs.koan.co.ke/api/commercial_organic",
     *          "per_page": "16",
     *          "to": 16,
     *          "total": 83
     *      }
     * }
     *
     * @response status=404 scenario="Items not found"
     * {
     *      "code": 404,
     *      "message": "Items not found",
     *      "success": false
     * }
     */
//     * Returns response as JSON
//     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Resources\Json\AnonymousResourceCollection|\Illuminate\Http\Response
    public function all(Request $request){
        $items = $this->commercialOrganicService->findAll($request);

        if($items->count()>0){
            return CommercialOrganicResource::collection($items);
        }else{
            $status_code = $this->notFoundStatus;
            $message = sizeof($items)." Items not found";
            $response = $this->failureMessage($status_code, $message);
            return response($response, $status_code);
        }
    }


    /**
     * Find commercial organic item based on given ID.
     *
     * @response status=200
     * {
     *      "data": {
     *          "id": 911,
     *          "name": "Sed viverra",
     *          "pcpb_number": "PCPB(CR)9999",
     *          "manufacturer": "Vivamus diam ligula",
     *          "distributor": "Vivamus diam ligula",
     *          "category": "Biocontrol",
     *          "contact_details": "<h3>Vivamus diam ligulah3><p>House , 5th Floor</p></p>",
     *          "external_links": [
     *              "<p><a href=\"http://www.vivamusdiamligula.com/sed_viverra/\">http://www.vivamusdiamligula.com/sed_viverra/</a></p>"
     *          ],
     *          "application_details": [
     *              "<p>Quisque eu nunc volutpat, sodales arcu quis, varius metus. Nulla vitae laoreet felis. Duis finibus faucibus eros, at gravida enim porta ut</p>"
     *          ],
     *          "image": "d4bb5367896cc5ce4d39d20e2a1859e4a.jpg",
     *          "pests_diseases_weed": [
     *              {
     *                  "id": 282,
     *                  "name": "Duis eget",
     *                  "type": "Pest",
     *                  "scientific_name": "Vestibulum luctus",
     *                  "description_pest": "Vivamus diam ligula, finibus id risus vel, vestibulum bibendum enim",
     *                  "description_impact": "Nullam sit amet magna massa. Quisque cursus tempor nunc",
     *                  "image": "ee24145d7ba03b23458bf8cab608b447.png",
     *                  "references": "https://www.accumsan.org/duiseget"
     *              }
     *          ],
     *          "control_methods": [
     *              {
     *                  "id": 5,
     *                  "name": "Biopesticide Control Methods for Duis eget",
     *                  "category": "Biopesticide",
     *                  "options": [
     *                      "Etiam gravida dapibus felis.",
     *                      "Etiam gravida dapibus felis."
     *                  ],
     *                  "external_links": [
     *                      "Vestibulum luctus rutrum elit. Fusce fringilla"
     *                  ],
     *                  "image": "87dd00a40e9b9d95b00212382dec361a.jpg"
     *              }
     *          ]
     *      }
     * }
     *
     * @response status=404 scenario="Item not found"
     * {
     *      "code": 404,
     *      "message": "Item not found",
     *      "success": false
     * }
     *
     * @param $id
     * @return CommercialOrganicResource|\Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function find($id){
        $item = $this->commercialOrganicService->find($id);
        if($item){
            return new commercialOrganicResource($item);
        }else{
            $status_code = $this->notFoundStatus;
            $message = "Item not found";
            $response = $this->failureMessage($status_code, $message);
            return response($response, $status_code);
        }
    }
    public function findPestsDiseaseWeed(Request $request){
        $item = $this->commercialOrganicService->findPestsDiseaseWeed($request);
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
    public function findControlMethods(Request $request){
        $item = $this->commercialOrganicService->findControlMethods($request);
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
    public function findAgrochemProducts(Request $request){
        $item = $this->commercialOrganicService->findAgrochemProducts($request);
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
    public function findGap(Request $request){
        $item = $this->commercialOrganicService->findGap($request);
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
    public function findHomemadeOrganic(Request $request){
        $item = $this->commercialOrganicService->findHomemadeOrganic($request);
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

    public function getCommercialOrganicNames(){
        $items = $this->commercialOrganicService->getCommercialOrganicNames();

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
     * Add commercial organic
     *
     * Adds a new commercial organic item to database
     * @authenticated
     *
     * @response status = 201
     * {
     *      "code": 201,
     *      "message": "Saved",
     *      "success": true,
     *      "data": {
     *          "id": 95,
     *          "name": "Lorem ipsum",
     *          "pcpb_number": null,
     *          "manufacturer": null,
     *          "distributor": null,
     *          "category": null,
     *          "contact_details": null,
     *          "external_links": null,
     *          "application_details": null,
     *          "image": null
     *      }
     * }
     *
     * @response status=501 scenario="Active ingredient not created" {
     *      "code": 501,
     *      "message": "Not Created",
     *      "success": false
     * }
     */
//     * @param CommercialOrganicRequest $request
//     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
    public function new(CommercialOrganicRequest $request){
        $saved = $this->commercialOrganicService->create($request);

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
     * Update commercial organic
     *
     * Updates the commercial organic item based on the ID
     * @authenticated
     *
     * @response status=201
     * {
     *      "code": 201,
     *      "message": "Updated",
     *      "success": true,
     *      "data": {
     *          "id": 95,
     *          "name": "Lorem Ipsum",
     *          "pcpb_number": "PCPB(CR)3999",
     *          "manufacturer": "Aenean facilisis",
     *          "distributor": null,
     *          "category": null,
     *          "contact_details": null,
     *          "external_links": null,
     *          "application_details": null,
     *          "image": null,
     *          "pests_diseases_weed": [],
     *          "control_methods": []
     *      }
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
//     * @param CommercialOrganicRequest $request
//     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
    public function update(CommercialOrganicRequest $request){
        $saved = $this->commercialOrganicService->update($request, $request->id);

        if($saved){
            $status_code = $this->createdStatus;
            $message = "Updated";
            $response = $this->successMessage($status_code, $message, new CommercialOrganicResource($saved));

            return response($response, $status_code);
        }else{
            $status_code = $this->notImplementedStatus;
            $message = "Update Unsuccessful";
            $response = $this->failureMessage($status_code, $message);
            return response($response, $status_code);
        }
    }

    /**
     * Delete commercial organic
     *
     * Deletes a commercial organic item based on the id value
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
     *
     */
//     * @param Request $request
//     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
    public function delete(Request $request){
        $deleted = $this->commercialOrganicService->delete($request->id);
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
     * Search commercial organic
     *
     * Performs search on commercial organic records based on query parameter values<br>
     * Query parameter keys are the columns
     *
     * @queryParam per_page number Example: 1
     * @queryParam order_direction string asc | desc Example: desc
     * @queryParam order_column string *use query parameter names below* Example: id
     *
     * @queryParam pcpb_number
     * @queryParam manufacturer
     * @queryParam distributor
     * @queryParam category
     * @queryParam contact_details
     * @queryParam external_links
     * @queryParam application_details
     *
     * @response status=200
     * {
     *      "data": [
     *          {
     *              "id": 911,
     *              "name": "Sed viverra",
     *              "pcpb_number": "PCPB(CR)9999",
     *              "manufacturer": "Vivamus diam ligula",
     *              "distributor": "Vivamus diam ligula",
     *              "category": "Biocontrol",
     *              "contact_details": "<h3>Vivamus diam ligulah3><p>House , 5th Floor</p></p>",
     *              "external_links": [
     *                  "<p><a href=\"http://www.vivamusdiamligula.com/sed_viverra/\">http://www.vivamusdiamligula.com/sed_viverra/</a></p>"
     *              ],
     *              "application_details": [
     *                  "<p>Quisque eu nunc volutpat, sodales arcu quis, varius metus. Nulla vitae laoreet felis. Duis finibus faucibus eros, at gravida enim porta ut</p>"
     *              ],
     *              "image": "d4bb5367896cc5ce4d39d20e2a1859e4a.jpg",
     *              "pests_diseases_weed": [
     *                  {
     *                      "id": 282,
     *                      "name": "Duis eget",
     *                      "type": "Pest",
     *                      "scientific_name": "Vestibulum luctus",
     *                      "description_pest": "Vivamus diam ligula, finibus id risus vel, vestibulum bibendum enim",
     *                      "description_impact": "Nullam sit amet magna massa. Quisque cursus tempor nunc",
     *                      "image": "ee24145d7ba03b23458bf8cab608b447.png",
     *                      "references": "https://www.accumsan.org/duiseget"
     *                  }
     *              ],
     *              "control_methods": [
     *                  {
     *                      "id": 5,
     *                      "name": "Biopesticide Control Methods for Duis eget",
     *                      "category": "Biopesticide",
     *                      "options": [
     *                          "Etiam gravida dapibus felis.",
     *                          "Etiam gravida dapibus felis."
     *                      ],
     *                      "external_links": [
     *                          "Vestibulum luctus rutrum elit. Fusce fringilla"
     *                      ],
     *                      "image": "87dd00a40e9b9d95b00212382dec361a.jpg"
     *                  }
     *              ]
     *          },
     *      ],
     *      "links": {
     *          "first": "https://api.safeinputs.koan.co.ke/api/commercial_organic/filter/op?page=1",
     *          "last": "https://api.safeinputs.koan.co.ke/api/commercial_organic/filter/op?page=3",
     *          "prev": null,
     *          "next": "https://api.safeinputs.koan.co.ke/api/commercial_organic/filter/op?page=2"
     *      },
     *      "meta": {
     *          "current_page": 1,
     *          "from": 1,
     *          "last_page": 3,
     *          "path": "https://api.safeinputs.koan.co.ke/api/commercial_organic/filter/op",
     *          "per_page": "16",
     *          "to": 16,
     *          "total": 39
     *      }
     * }
     *
     * @response status=404 scenario="Items not found"
     * {
     *      "code": 404,
     *      "message": "Items not found",
     *      "success": false
     * }
     *
     * @param Request $request
     */
    public function filter(Request $request){
        $items = $this->commercialOrganicService->filter($request);

        if($items->count()>0){
            return CommercialOrganicResource::collection($items);
        }else{
            $status_code = $this->notFoundStatus;
            $message = "Items not found";
            $response = $this->failureMessage($status_code, $message);
            return response($response, $status_code);
        }
    }

    /**
     * Performs aggregations on commercial organic records based on query parameter values
     * Returns total
     * Query parameter keys are the columns
     * @param Request $request
     */
    public function summaryCount(Request $request){
        $count = $this->commercialOrganicService->summaryCount($request);;
        $status_code = $this->successStatus;
        $response =  [
            "total" => $count
        ];
        return response($response, $status_code);
    }
    public function summaryCountPestsDiseaseWeed(Request $request){
        $count = $this->commercialOrganicService->summaryCountPestsDiseaseWeed($request);;
        $status_code = $this->successStatus;
        $response =  [
            "total" => $count
        ];
        return response($response, $status_code);
    }
    public function summaryCountControlMethods(Request $request){
        $count = $this->commercialOrganicService->summaryCountControlMethods($request);;
        $status_code = $this->successStatus;
        $response =  [
            "total" => $count
        ];
        return response($response, $status_code);
    }

    /**
     * Performs search on commercial organic records based on query parameter values
     * Returns only name, id and image
     * Query parameter keys are the columns
     * @param Request $request
     */
    public function summaryNames(Request $request){
        $items = $this->commercialOrganicService->summaryNames($request);


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
     * Implementation for Datatables API to populate table with commercial organic records
     * @param Request $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function dataTable(Request $request){
        $items = $this->commercialOrganicService->filter($request);
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
