<?php

use App\SpecialField;
use Illuminate\Database\Seeder;

class SpecialFieldSeeder extends Seeder
{
    /**
     * Run bthe database seeds.
     *
     * @return void
     */
    public function run()
    {
        $measurements = [
            ['name' => 'Gestorias'],
            ['name' => 'Dependencias'],
            ['name' => 'Laboratorios'],
            ['name' => 'Mecanica de suelos'],
            ['name' => 'Ingenierias'],
            ['name' => 'Planos'],
            ['name' => 'Terracerías'],
            ['name' => 'Albañilerías'],
            ['name' => 'Instalaciones Eléctricas'],
            ['name' => 'Instalaciones Hidrosanitarias'],
            ['name' => 'Instalaciones Hidráulicas'],
            ['name' => 'Acabados'],
            ['name' => 'Jardinería'],
            ['name' => 'Paisajismo'],
            ['name' => 'Pintura'],
            ['name' => 'Herrería'],
            ['name' => 'Pisos firmes de concreto'],
            ['name' => 'Pisos acabados'],
            ['name' => 'Administración de obra'],
            ['name' => 'Gerencia de proyectos'],
            ['name' => 'Topografía'],
            ['name' => 'Instalaciones especiales'],
            ['name' => 'Aire acondicionado'],
            ['name' => 'Sistema contra incendio'],
            ['name' => 'Proyecto ejecutivo'],
            ['name' => 'Suministro de materiales'],
            ['name' => 'Hidrólogo'],
            ['name' => 'DRO'],
            ['name' => 'Instaladores'],
            ['name' => 'Cancelería'],
            ['name' => 'Equipo de andenes'],
            ['name' => 'Estructura Metálica'],
            ['name' => 'Seguridad Industrial EHS'],
            ['name' => 'Servicio Médico'],
            ['name' => 'CCTV'],
            ['name' => 'Voz y datos'],
            ['name' => 'Renta de maquinaria'],
            ['name' => 'Concretera'],
            ['name' => 'Pavimentación'],
            ['name' => 'Plafón y tablaroca'],
            ['name' => 'Serviio de vigilancia'],
            ['name' => 'Instalaciones provicionales'],
            ['name' => 'Renta de baños portatiles'],
            ['name' => 'IMSS'],
            ['name' => 'Impuestos local']
        ];


        foreach ($measurements as $measurement) {
            $model = new MeasurementUnits();
            $model->abbreviation = $measurement['abv'];
            $model->description = $measurement['desc'];
            $model->save();
        }
    }
}
