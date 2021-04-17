<?php

namespace Database\Seeders;

use App\Models\Absence;
use Illuminate\Database\Seeder;

class AbsenceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $absences = Absence::create([
            'description' => 'Vacaciones',
        ]);

        $absences = Absence::create([
            'description' => 'Día flexible',
        ]);

        $absences = Absence::create([
            'description' => 'Día no laboral local',
        ]);

        $absences = Absence::create([
            'description' => 'Incapacidad médica',
        ]);

        $absences = Absence::create([
            'description' => 'Incapacidad médica enfermedades/embarazos',
        ]);

        $absences = Absence::create([
            'description' => 'Permiso nacimiento de beneficiarios',
        ]);

        $absences = Absence::create([
            'description' => 'Permiso fallecimiento familiares cercanos',
        ]);
    }
}
