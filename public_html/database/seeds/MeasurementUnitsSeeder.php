<?php

use App\MeasurementUnits;
use Illuminate\Database\Seeder;

class MeasurementUnitsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $measurements = [
            ['abv' => 'BOLSA', 'desc' => 'BOLSA'],
            ['abv' => 'CAJA', 'desc' => 'CAJA'],
            ['abv' => 'CATORCENA', 'desc' => 'CATORCENA'],
            ['abv' => 'CBTA 20 L', 'desc' => 'CUBETA 20 LITROS'],
            ['abv' => 'CH', 'desc' => 'CHICO'],
            ['abv' => 'CM', 'desc' => 'CENTIMETRO'],
            ['abv' => 'CM2', 'desc' => 'CENTIMETRO CUADRADO'],
            ['abv' => 'DIA', 'desc' => 'DIA'],
            ['abv' => 'DIA HABIL', 'desc' => 'DIA HABIL'],
            ['abv' => 'GDE', 'desc' => 'GRANDE'],
            ['abv' => 'GL', 'desc' => 'GALON'],
            ['abv' => 'HR', 'desc' => 'HORA'],
            ['abv' => 'JOR', 'desc' => 'JORNADA'],
            ['abv' => 'KG', 'desc' => 'KILOGRAMO'],
            ['abv' => 'KM', 'desc' => 'KILOMETRO'],
            ['abv' => 'L', 'desc' => 'LITRO'],
            ['abv' => 'LIBRA', 'desc' => 'LIBRA'],
            ['abv' => 'LOTE', 'desc' => 'LOTE'],
            ['abv' => 'M', 'desc' => 'METRO'],
            ['abv' => 'MED', 'desc' => 'MEDIANO'],
            ['abv' => 'M2', 'desc' => 'METRO CUADRADO'],
            ['abv' => 'M3', 'desc' => 'METRO CUBICO'],
            ['abv' => 'MES', 'desc' => 'MENSUAL'],
            ['abv' => 'MILLA', 'desc' => 'MILLA'],
            ['abv' => 'MIN', 'desc' => 'MINUTO'],
            ['abv' => 'ML', 'desc' => 'METRO LINEAL'],
            ['abv' => 'MM', 'desc' => 'MILIMETRO'],
            ['abv' => 'MXN', 'desc' => 'PESO MEXICANO'],
            ['abv' => 'OZ', 'desc' => 'ONZA'],
            ['abv' => 'PAQ', 'desc' => 'PAQUETE'],
            ['abv' => 'PIE', 'desc' => 'PIE'],
            ['abv' => 'PULG', 'desc' => 'PULGADA'],
            ['abv' => 'PZ', 'desc' => 'PIEZA'],
            ['abv' => 'QUINCENA', 'desc' => 'QUINCENA'],
            ['abv' => 'ROLLO', 'desc' => 'ROLLO'],
            ['abv' => 'SEG', 'desc' => 'SEGUNDO'],
            ['abv' => 'SEM', 'desc' => 'SEMANA'],
            ['abv' => 'TAMBOR', 'desc' => 'TAMBOR 200 LITROS'],
            ['abv' => 'TARIMA', 'desc' => 'TARIMA'],
            ['abv' => 'TON', 'desc' => 'TONELADA'],
            ['abv' => 'TRAMO', 'desc' => 'TRAMO'],
            ['abv' => 'TURNO 12 HRS', 'desc' => 'TURNO 12 HRS'],
            ['abv' => 'TURNO 8 HRS', 'desc' => 'TURNO 8 HRS'],
            ['abv' => 'UDS', 'desc' => 'DÓLAR AMERICANO'],
            ['abv' => 'YARDA', 'desc' => 'YARDA']
        ];


        foreach ($measurements as $measurement) {
            $model = new MeasurementUnits();
            $model->abbreviation = $measurement['abv'];
            $model->description = $measurement['desc'];
            $model->save();
        }
    }
}
