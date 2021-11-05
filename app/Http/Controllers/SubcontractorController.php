<?php

namespace App\Http\Controllers;

use App\Bussines\Proyect\Application\Search\ActiveProyectSearcher;
use App\Bussines\Proyect\Application\Search\ProyectSearcher;
use App\Bussines\Proyect\Application\SubcontractorSearch\SubcontractorProyectSearcher;
use App\Bussines\Subcontractor\Application\Create\SubcontractorCreator;
use App\Bussines\Subcontractor\Application\Find\SubcontractorFinder;
use App\Bussines\Subcontractor\Application\Search\SubcontractorSearcher;
use App\Http\Requests\Subcontractor\IndexSubcontractorRequest;
use App\Http\Requests\Subcontractor\StoreSubcontractorRequest;

class SubcontractorController extends Controller
{
    private $creator;
    private $searcher;
    private $finder;
    private $proyectSearcher;
    private $scProyectSearcher;

    public function __construct(
        SubcontractorCreator $creator,
        SubcontractorSearcher $searcher,
        SubcontractorFinder $finder,
        ActiveProyectSearcher $proyectSearcher,
        SubcontractorProyectSearcher $scProyectSearcher
    ) {
        $this->creator = $creator;
        $this->searcher = $searcher;
        $this->finder = $finder;
        $this->proyectSearcher = $proyectSearcher;
        $this->scProyectSearcher = $scProyectSearcher;
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
        $userProyects = $this->scProyectSearcher->__invoke($scId)->toArray();
        $activeProyects = $this->proyectSearcher->__invoke()->toArray();

        return view('dashboard.contenido.subcontractors.show', compact('subcontractor','userProyects' ,'activeProyects'));
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
