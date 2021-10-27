<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GeneralCatalogController extends Controller
{
    public function create($id)
    {

        return view('dashboard.contenido.generalCatalog.index');

        return $id;
    }
}
