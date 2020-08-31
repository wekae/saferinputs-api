<?php

namespace App\Exports;

use App\Models\ActiveIngredients;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class ActiveIngredientsExport implements WithStyles, WithColumnWidths, ShouldAutoSize, WithEvents, FromView
{

    public function view(): View
    {
        return view('exports.active-ingredients', [
            'active_ingredients' => ActiveIngredients::all()
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
            'C'  => ['font' => ['size' => 10.0], 'alignment' => ['vertical' => 'top', 'wrapText' => true]], // Potentiaal Harm
            'D'  => ['font' => ['size' => 10.0], 'alignment' => ['vertical' => 'top', 'wrapText' => true]], // Aquatic
            'E'  => ['font' => ['size' => 10.0], 'alignment' => ['vertical' => 'top', 'wrapText' => true]], // Bees
            'F'  => ['font' => ['size' => 10.0], 'alignment' => ['vertical' => 'top', 'wrapText' => true]], // Earthworm
            'G'  => ['font' => ['size' => 10.0], 'alignment' => ['vertical' => 'top', 'wrapText' => true]], // Birds
            'H'  => ['font' => ['size' => 10.0], 'alignment' => ['vertical' => 'top', 'wrapText' => true]], // Leachability
            'I'  => ['font' => ['size' => 10.0], 'alignment' => ['vertical' => 'top', 'wrapText' => true]], // Carcinogenicity
            'J'  => ['font' => ['size' => 10.0], 'alignment' => ['vertical' => 'top', 'wrapText' => true]], // Mutagenicity
            'K'  => ['font' => ['size' => 10.0], 'alignment' => ['vertical' => 'top', 'wrapText' => true]], // EDC
            'L'  => ['font' => ['size' => 10.0], 'alignment' => ['vertical' => 'top', 'wrapText' => true]], // Reproduction
            'M'  => ['font' => ['size' => 10.0], 'alignment' => ['vertical' => 'top', 'wrapText' => true]], // Ache
            'N'  => ['font' => ['size' => 10.0], 'alignment' => ['vertical' => 'top', 'wrapText' => true]], // Neutotoxicant
            'O'  => ['font' => ['size' => 10.0], 'alignment' => ['vertical' => 'top', 'wrapText' => true]], // WHO Classification
            'P'  => ['font' => ['size' => 10.0], 'alignment' => ['vertical' => 'top', 'wrapText' => true]], // EU Approved
            'Q'  => ['font' => ['size' => 10.0], 'alignment' => ['vertical' => 'top', 'wrapText' => true]], // Agrochem Products

            1    => ['font' => ['bold' => true, 'size' => 11.0], 'alignment' => ['vertical' => 'top', 'wrapText' => true]], // Header
        ];
    }

    public function columnWidths(): array
    {
        return [
            'A' => 5,
            'B' => 30,
            'C' => 40,
            'D' => 40,
            'E' => 40,
            'F' => 40,
            'G' => 40,
            'H' => 40,
            'I' => 10,
            'J' => 10,
            'K' => 10,
            'L' => 10,
            'M' => 10,
            'N' => 10,
            'O' => 5,
            'P' => 5,
            'Q' => 35,
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
//                $range = 'A:Q';
//
//                $event->sheet->getDelegate()->getStyle($range)->getFont()->setSize(10);
//                $event->sheet->getDelegate()->getStyle($range)->getAlignment()->setWrapText(true)->setVertical('top');
//                ;
            },
        ];
    }
}
