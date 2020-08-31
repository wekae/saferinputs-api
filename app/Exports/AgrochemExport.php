<?php

namespace App\Exports;

use App\Models\Agrochem;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class AgrochemExport implements WithStyles, WithColumnWidths, ShouldAutoSize, WithEvents, FromView
{

    public function view(): View
    {
        return view('exports.agrochem', [
            'agrochems' => Agrochem::all()
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
            'B'  => ['font' => ['size' => 10.0], 'alignment' => ['vertical' => 'top', 'wrapText' => true]], // Product Name
            'C'  => ['font' => ['size' => 10.0], 'alignment' => ['vertical' => 'top', 'wrapText' => true]], // PCPB Number
            'D'  => ['font' => ['size' => 10.0], 'alignment' => ['vertical' => 'top', 'wrapText' => true]], // Distributing Company
            'E'  => ['font' => ['size' => 10.0], 'alignment' => ['vertical' => 'top', 'wrapText' => true]], // Toxic
            'F'  => ['font' => ['size' => 10.0], 'alignment' => ['vertical' => 'top', 'wrapText' => true]], // WHO Class
            'G'  => ['font' => ['size' => 10.0], 'alignment' => ['vertical' => 'top', 'wrapText' => true]], // Composition
            'H'  => ['font' => ['size' => 10.0], 'alignment' => ['vertical' => 'top', 'wrapText' => true]], // Registrant
            'I'  => ['font' => ['size' => 10.0], 'alignment' => ['vertical' => 'top', 'wrapText' => true]], // Type
            'J'  => ['font' => ['size' => 10.0], 'alignment' => ['vertical' => 'top', 'wrapText' => true]], // PHI
            'K'  => ['font' => ['size' => 10.0], 'alignment' => ['vertical' => 'top', 'wrapText' => true]], // Crops
            'L'  => ['font' => ['size' => 10.0], 'alignment' => ['vertical' => 'top', 'wrapText' => true]], // Pests, Diseases, Weeds
            'M'  => ['font' => ['size' => 10.0], 'alignment' => ['vertical' => 'top', 'wrapText' => true]], // Active Ingredients

            1    => ['font' => ['bold' => true, 'size' => 11.0], 'alignment' => ['vertical' => 'top', 'wrapText' => true]], // Header
        ];
    }

    public function columnWidths(): array
    {
        return [
            'A' => 5,
            'B' => 30,
            'C' => 30,
            'D' => 30,
            'E' => 10,
            'F' => 5,
            'G' => 40,
            'H' => 40,
            'I' => 25,
            'J' => 5,
            'K' => 45,
            'L' => 45,
            'M' => 45,
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
//                $range = 'A:M';
//
//                $event->sheet->getDelegate()->getStyle($range)->getFont()->setSize(10);
//                $event->sheet->getDelegate()->getStyle($range)->getAlignment()->setWrapText(true)->setVertical('top');
//                ;
            },
        ];
    }
}
