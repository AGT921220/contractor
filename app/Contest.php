<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contest extends Model
{
    public function generalCatalogs()
    {
        return $this->hasMany(ContestGeneralCatalog::class);
    }


}
