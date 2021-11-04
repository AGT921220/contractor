<?php

namespace App\Http\Controllers;

use App\Bussines\Proyect\Application\Search\ProyectSearcher;
use App\Bussines\Subcontractor\Application\Create\SubcontractorCreator;
use App\Bussines\Subcontractor\Application\Find\SubcontractorFinder;
use App\Bussines\Subcontractor\Application\Search\SubcontractorSearcher;
use App\Http\Requests\Subcontractor\IndexSubcontractorRequest;
use App\Http\Requests\Subcontractor\StoreSubcontractorRequest;
use App\Proyect;

class SubcontractorController extends Controller
{
    private $creator;
    private $searcher;
    private $finder;
    private $proyectSearcher;

    public function __construct(
        SubcontractorCreator $creator,
        SubcontractorSearcher $searcher,
        SubcontractorFinder $finder,
        ProyectSearcher $proyectSearcher
    ) {
        $this->creator = $creator;
        $this->searcher = $searcher;
        $this->finder = $finder;
        $this->proyectSearcher = $proyectSearcher;
        $this->middleware('auth');
    }

    public function index()
    {
        app(IndexSubcontractorRequest::class);
        $subcontractors = $this->searcher->__invoke();

        return view('dashboard.contenido.subcontractors.index', compact('subcontractors'));
    }
    public function show(int $scId)
    {
        $subcontractor = $this->finder->__invoke($scId)->toArray();
        $userProyects = Proyect::join('user_proyects','user_proyects.proyect_id', 'proyects.id')
        ->where('user_proyects.user_id', $scId)
        ->get();

        $proyects = [];
        return view('dashboard.contenido.subcontractors.show', compact('subcontractor','proyects'));
    }
    public function create()
    {
        return view('dashboard.contenido.subcontractors.create');
    }

    public function store(StoreSubcontractorRequest $request)
    {
        $this->creator->__invoke(
            $request->input('name'),
            $request->input('lname'),
            $request->input('email'),
            $request->input('phone'),
            $request->input('pwd1'),
            $request->photo
        );
        return back()->with('success', 'Subcontratista Creado');


        dd($request->photo);
        dd($request->input());
    }
}
