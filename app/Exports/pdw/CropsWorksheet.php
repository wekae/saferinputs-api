<?php

namespace App\Exports\pdw;

use App\Models\PestsDiseaseWeed;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class CropsWorksheet implements WithStyles, WithColumnWidths, ShouldAutoSize, WithEvents, FromView, WithTitle
{
//    private $month;
//    private $year;
//
//    public function __construct(int $year, int $month)
//    {
//        $this->month = $month;
//        $this->year  = $year;
//    }


    public function view(): View
    {
        return view('exports.workbooks.pdw.crops-sheet', [
            'pdw' => PestsDiseaseWeed::all()
        ]);
    }

    public function styles(Worksheet $sheet)
    {
        return [
            // Style the first row as bold text.

            // Styling a specific cell by coordinate.
//            'F' => ['font' => ['bold' => false]],

            // Styling an entire column.
            'A'  => ['font' => ['size' => 10.0], 'alignment' => ['vertical' => 'top', 'wrapText' => true]], // ID
            'B'  => ['font' => ['size' => 10.0], 'alignment' => ['vertical' => 'top', 'wrapText' => true]], // Pest, Disease, Weed ID
            'C'  => ['font' => ['size' => 10.0], 'alignment' => ['vertical' => 'top', 'wrapText' => true]], // Name
            'D'  => ['font' => ['size' => 10.0], 'alignment' => ['vertical' => 'top', 'wrapText' => true]], // Pests, Diseases, Weeds
            'E'  => ['font' => ['size' => 10.0], 'alignment' => ['vertical' => 'top', 'wrapText' => true]], // Agrochem Products

            1    => ['font' => ['bold' => true, 'size' => 11.0], 'alignment' => ['vertical' => 'top', 'wrapText' => true]], // Header
        ];
    }

    public function columnWidths(): array
    {
        return [
            'A' => 5,
            'B' => 5,
            'C' => 30,
            'D' => 45,
            'E' => 45,
        ];
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class    => function(AfterSheet $event) {
//                $styleArray = [
//                    'font' => ['size' => 10.0],
//                    'alignment' => ['vertical' => 'top', 'wrapText' => true]
//                ];
//                $range = 'A:D';
//
//                $event->sheet->getDelegate()->getStyle($range)->getFont()->setSize(10);
//                $event->sheet->getDelegate()->getStyle($range)->getAlignment()->setWrapText(true)->setVertical('top');
//                ;
            },
        ];
    }

    /**
     * @return string
     */
    public function title(): string
    {
        return 'Crops';
    }
}
