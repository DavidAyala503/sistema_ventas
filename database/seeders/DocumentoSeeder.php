<?php

namespace Database\Seeders;

use App\Models\Documento;
use Illuminate\Database\Seeder;

class DocumentoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Documento::insert([
            [
                'tipo_documento' => 'DUI',
            ],
            [
                'tipo_documento' => 'NIT',
            ],
            [
                'tipo_documento' => 'Licencia',
            ],
            [
                'tipo_documento' => 'Pasaporte',
            ],
            [
                'tipo_documento' => 'Carnet Menoridad',
            ],
        ]);
    }
}
