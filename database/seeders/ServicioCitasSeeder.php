<?php

namespace Database\Seeders;

use App\Models\ServicioCita;
use Illuminate\Database\Seeder;

class ServicioCitasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $servicios_cita = [
            [
              'nombre' => 'Consulta'
            ],
            [
              'nombre' => 'Examen'
            ],
            [
              'nombre' => 'Cirugía'
            ]
        ];
        foreach ($servicios_cita as $key => $servicio) {
            ServicioCita::create($servicio);
        }
    }
}
