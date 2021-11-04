<?php

namespace App\Http\Controllers;

use App\Bussines\Proyect\Application\Activate\ProyectActivator;

class ProyectActivatorController extends Controller
{
    private $activator;

    public function __construct(
        ProyectActivator $activator
    ) {
        $this->activator = $activator;
        $this->middleware('auth');
    }


    public function store(int $productId)
    {

        if(!$this->activator->__invoke($productId))
        {
            return back()->with('error', 'No se pudo activar el Proyecto');
        }
        return back()->with('success', 'Activar Proyecto Correctamente');

    }
}
