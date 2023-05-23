<?php

namespace Database\Seeders;

use App\Models\TipoDocumento;
use Illuminate\Database\Seeder;

class TipoDocumentosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tiposDocumento = [
            [
                'id_codigo'      => 'CC',
                'descripcion' => 'Cedula de ciudadanía',
            ],
            [
                'id_codigo'      => 'TI',
                'descripcion' => 'Tarjeta de identidad',
            ],
            [
                'id_codigo'      => 'RC',
                'descripcion' => 'Registro civil',
            ],
            [
                'id_codigo'      => 'CE',
                'descripcion' => 'Cedula de extranjería',
            ],
            [
                'id_codigo'      => 'PEP',
                'descripcion' => 'Permiso especial de permanencia',
            ],
            [
                'id_codigo'      => 'DNI',
                'descripcion' => 'Documento Nacional de identidad',
            ],
            [
                'id_codigo'      => 'SCR',
                'descripcion' => 'Salvoconducto',
            ],
            [
                'id_codigo'      => 'PA',
                'descripcion' => 'Pasaporte',
            ]
        ];

        foreach ($tiposDocumento as $key => $tipoDocumento) {
            TipoDocumento::create($tipoDocumento);
        }
    }
}
