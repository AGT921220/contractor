<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContestGeneralCatalog extends Model
{
    public function generalCatalogs()
    {
        return $this->hasMany(GeneralCatalog::class, 'id');
    }

}
