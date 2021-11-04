<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proyect extends Model
{

    public function generalCatalogs()
    {
        return $this->hasMany(GeneralCatalog::class);
    }

    public function contests()
    {
        return $this->hasMany(Contest::class);
    }

    public function scopeWithGeneralCatalogs($query)
    {
        $query->with(['generalCatalogs'=>
        function($q){
            $q->select('*');
        }]);
    }
}
