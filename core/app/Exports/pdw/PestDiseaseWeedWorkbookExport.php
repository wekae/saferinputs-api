<?php

namespace App\Exports\pdw;

use App\Exports\pdw\AgrochemWorksheet;
use App\Exports\pdw\CommercialOrganicWorksheet;
use App\Exports\pdw\ControlMethodsWorksheet;
use App\Exports\pdw\CropsWorksheet;
use App\Exports\pdw\GapWorksheet;
use App\Exports\pdw\HomemadeOrganicWorksheet;
use App\Exports\pdw\PestDiseaseWeedWorksheet;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class PestDiseaseWeedWorkbookExport implements WithMultipleSheets
{
    use Exportable;

//    protected $year;
//
//    public function __construct(int $year)
//    {
//        $this->year = $year;
//    }

    /**
     * @return array
     */
    public function sheets(): array
    {
        $sheets = [];
        array_push($sheets, new PestDiseaseWeedWorksheet());
        array_push($sheets, new GapWorksheet());
        array_push($sheets, new HomemadeOrganicWorksheet());
        array_push($sheets, new ControlMethodsWorksheet());
        array_push($sheets, new CommercialOrganicWorksheet());
        array_push($sheets, new AgrochemWorksheet());
        array_push($sheets, new CropsWorksheet());
        return $sheets;
    }
}
