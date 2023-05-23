<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;

class CitasExport implements
    FromArray,
    WithHeadings,
    WithMapping,
    ShouldAutoSize,
    WithStyles,
    WithTitle,
    WithColumnFormatting
{
    /**
     * Constructor.
     *
     * @param array $parametros
     * En el índice data, se recibe el array de la consulta realizada.
     * En el índice headings, se recibe los títulos de las columnas.
     * En el índice title, se recibe el título de la hoja.
     * @return void
     */
    public function __construct(array $parametros) {
        $this->data     = $parametros['data'];
        $this->headings = $parametros['headings'];
        $this->title    = $parametros['title'];
    }

    /**
     * Título de las columnas
     *
     * @return void
     */
    public function headings(): array {
        return $this->headings;
    }

    public function columnFormats(): array
    {
        return [

        ];
    }

    /** Estilos para las columnas
     *
     * @param Worksheet $sheet
     */
    public function styles(Worksheet $sheet) {
        return [
            1 => [
                'font' => [
                    'bold' => true, // Agrego negrilla
                ],
                'fill' => [
                    'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                    'startColor' => [
                        'rgb' => 'c9daf8', // Agrego color de fondo
                    ]
                ],
            ]
        ];
   }

    /**
     * Título de la Hoja
     *
     * @return string
     */
    public function title(): string {
        return $this->title;
    }

    /**
     * Mapea cada campo para setearlo de acuerdo al formato que se desea.
     *
     * @param array $data Registros de la consulta
     * @return array $dataValues Datos de la consulta
     */
    public function map($data): array {

        $dataValues = array();
        foreach($data as $key => $values) {
            $dataValues[] = $values;
        }

        return $dataValues;
    }

    /**
     * Array de la consulta enviada desde el controller.
     *
     * @return array $this->data
     */
    public function array(): array {
        return $this->data;
    }
}
