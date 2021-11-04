<?php

namespace App\Http\Controllers;

use App\Bussines\Client\Application\Search\ClientSearcher;
use App\Bussines\Proyect\Application\Create\ProyectCreator;
use App\Bussines\Proyect\Application\Search\ProyectSearcher;
use App\Http\Requests\Proyect\CreateProyectRequest;
use App\Http\Requests\Proyect\IndexProyectRequest;
use App\Http\Requests\Proyect\StoreProyectRequest;

class ProyectController extends Controller
{
    private $proyectSearcher;
    private $clientSearcher;
    private $proyectCreator;

    public function __construct(ProyectSearcher $proyectSearcher,
    ProyectCreator $creator,
    ClientSearcher $clientSearcher
    )
    {
        $this->proyectSearcher = $proyectSearcher;
        $this->clientSearcher = $clientSearcher;
        $this->proyectCreator = $creator;
        $this->middleware('auth');
    }
    public function index()
    {
        app(IndexProyectRequest::class);

        $proyects = $this->proyectSearcher->__invoke();

        return view('dashboard.contenido.proyects.index', compact('proyects'));
    }

    public function create()
    {       
        app(CreateProyectRequest::class);

        $clients = $this->clientSearcher->__invoke();
        if(count($clients)<=0)
        {
            return back()->with('error', 'Cargue al menos un Cliente');
        }
        return view('dashboard.contenido.proyects.create', compact('clients'));
    }

    public function store(StoreProyectRequest $request)
    {

        $this->proyectCreator->__invoke(
            $request->input('client_id'),
            $request->input('name'),
            $request->input('address'),
            $request->input('general_budget'),
            $request->input('meters'),
            $request->input('employees'),
            $request->input('employees_ft'));
            return back()->with('success','Proyecto Creado');
    }
}
