<?php

namespace App\Http\Controllers;

use App\Exports\ActiveIngredientsExport;
use App\Exports\AgrochemExport;
use App\Exports\CommercialOrganicExport;
use App\Exports\ControlMethodsExport;
use App\Exports\CropsExport;
use App\Exports\GapExport;
use App\Exports\HomemadeOrganicExport;
use App\Exports\pdw\PestDiseaseWeedWorkbookExport;
use App\Exports\PestsDiseaseWeedExport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class DownloadsController extends Controller
{



    protected $successStatus = 200;
    protected $createdStatus = 201;
    protected $noContentStatus = 204;
    protected $badRequestStatus = 400;
    protected $unauthorizedStatus = 401;
    protected $notFoundStatus = 404;
    protected $unprocessableStatus = 404;
    protected $notImplementedStatus = 501;


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

    public function allPestsDiseaseWeeds(Request $request){
//        return Excel::download(new PestsDiseaseWeedExport(), 'pdw.xlsx');
//        return Excel::download(new GapExport(), 'pdw.xlsx');
//        return Excel::download(new HomemadeOrganicExport(), 'pdw.xlsx');
//        return Excel::download(new ControlMethodsExport(), 'pdw.xlsx');
//        return Excel::download(new CommercialOrganicExport(), 'pdw.xlsx');
//        return Excel::download(new ActiveIngredientsExport(), 'pdw.xlsx');
//        return Excel::download(new AgrochemExport(), 'pdw.xlsx');
//        return Excel::download(new CropsExport(), 'pdw.xlsx');
        return Excel::download(new PestDiseaseWeedWorkbookExport(), 'pdw.xlsx');
    }
}
