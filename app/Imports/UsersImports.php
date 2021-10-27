<?php

namespace App\Imports;

use App\GeneralCatalog;
use App\MeasurementUnits;
use App\User;
use Exception;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class UsersImports implements ToCollection
{

    public function  __construct($proyectId, $userId)
    {
        $this->proyectId = $proyectId;
        $this->userId = $userId;
    }
    /**
     * @param array $row
     *
     * @return User|null
     */
    public function collection(Collection $rows)
    {


        $measurements = [];

        foreach (MeasurementUnits::all() as $item) {
            $measurements[] = $item->abbreviation;
        }
        $valid = true;
        $errors = [];
        foreach ($rows as $key => $value) {
            if (!in_array(strtoupper($value[3]), $measurements)) {
                $valid = false;
                $reg = $key + 1;
                $errors[] = 'Registro:' . $reg . 'Concepto:' . trim($value[0]) . 'Descripción:' . trim($value[2]);
            }
        }

        if ($valid) {
            $this->saveGeneralCatalogs($rows);
            return;
        }
        throw new Exception(implode(',', $errors));
    }

    private function saveGeneralCatalogs(Collection $rows): void
    {
        foreach ($rows as $row) {

            $catalogCount = GeneralCatalog::where('user_id', $this->userId)
                ->where('proyect_id', $this->proyectId)
                ->where('area', $row[0])->count() + 1;

            $measurementUnits = MeasurementUnits::where('abbreviation', $row[3])->first();


            $clave = mb_substr(strtoupper($row[0]), 0, 2) 
//            . mb_substr(trim(strtoupper($row[2])), 0, 1) 
            . $catalogCount;
            $this->saveGeneralCatalog($row, $clave, $measurementUnits);
        }
    }

    private function saveGeneralCatalog($row, $clave, $measurementUnits): void
    {
        $model = new GeneralCatalog();
        $model->proyect_id = $this->proyectId;
        $model->user_id = $this->userId;
        $model->area = $row[0];
        $model->subarea = $row[1];
        $model->clave = $clave;
        $model->description = $row[2];
        $model->measurement_units_id = $measurementUnits->id;
        $model->quantity = $row[4];
        $model->unit_price = $row[5];
        $model->total = $row[4] * $row[5];
        $model->save();
    }
}
