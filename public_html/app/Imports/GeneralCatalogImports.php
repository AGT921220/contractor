<?php

namespace App\Imports;

use App\Bussines\GeneralCatalog\Application\Create\GeneralCatalogCreator;
use App\GeneralCatalog;
use App\MeasurementUnits;
use App\User;
use Exception;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class GeneralCatalogImports implements ToCollection
{

    private $proyectId;
    private $userId;
    private $measurementUnits;
    private $gcCreator;

    public function  __construct($proyectId, $userId, $measurementUnits, GeneralCatalogCreator $gcCreator)
    {
        $this->proyectId = $proyectId;
        $this->userId = $userId;
        $this->measurementUnits = $measurementUnits;
        $this->gcCreator = $gcCreator;
    }
    /**
     * @param array $row
     *
     * @return User|null
     */
    public function collection(Collection $rows)
    {

        $measurements = [];

        foreach ($this->measurementUnits as $item) {
            $measurements[] = $item->abbreviation;
        }
        $valid = true;
        $errors = [];
        foreach ($rows as $key => $value) {
            if (!in_array(strtoupper($value[4]), $measurements)) {
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


            $measurementUnit = MeasurementUnits::where('abbreviation', $row[4])->first();
            $this->saveGeneralCatalog($row, $measurementUnit->id);
        }
    }

    private function saveGeneralCatalog($row, $measurementUnitId): void
    {
        $this->gcCreator->__invoke(
        $this->proyectId,
        $this->userId,
        $row[1],
        $row[2],
        $row[0],
        $row[3],
        $measurementUnitId,
        $row[5],
        $row[6]);
    }
}
