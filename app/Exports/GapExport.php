<?php

namespace App\Exports;

use App\Models\Gap;
use App\Models\PestsDiseaseWeed;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class GapExport implements WithStyles, WithColumnWidths, ShouldAutoSize, WithEvents, FromView
{

    public function view(): View
    {
        return view('exports.gap', [
            'gap' => Gap::all()
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
            'B'  => ['font' => ['size' => 10.0], 'alignment' => ['vertical' => 'top', 'wrapText' => true]], // Name
            'C'  => ['font' => ['size' => 10.0], 'alignment' => ['vertical' => 'top', 'wrapText' => true]], // Category
            'D'  => ['font' => ['size' => 10.0], 'alignment' => ['vertical' => 'top', 'wrapText' => true]], // Practices
            'E'  => ['font' => ['size' => 10.0], 'alignment' => ['vertical' => 'top', 'wrapText' => true]], // Pests, Diseases, Weeds
            'F'  => ['font' => ['size' => 10.0], 'alignment' => ['vertical' => 'top', 'wrapText' => true]], // References

            1    => ['font' => ['bold' => true, 'size' => 11.0], 'alignment' => ['vertical' => 'top', 'wrapText' => true]], // Header
        ];
    }

    public function columnWidths(): array
    {
        return [
            'A' => 5,
            'B' => 30,
            'C' => 30,
            'D' => 40,
            'E' => 40,
            'F' => 45,
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
//                $range = 'A:F';
//
//                $event->sheet->getDelegate()->getStyle($range)->getFont()->setSize(10);
//                $event->sheet->getDelegate()->getStyle($range)->getAlignment()->setWrapText(true)->setVertical('top');
//                ;
            },
        ];
    }
}
