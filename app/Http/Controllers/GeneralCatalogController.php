<?php

namespace App\Http\Controllers;

use App\Bussines\GeneralCatalog\Application\Search\GeneralCatalogSearcher;
use App\Bussines\Proyect\Domain\Proyect as DomainProyect;
use Illuminate\Http\Request;
use App\Imports\UsersImports;
use App\Proyect;
use Maatwebsite\Excel\Facades\Excel;

class GeneralCatalogController extends Controller
{

    public $gcSearcher;

    public function __construct(GeneralCatalogSearcher $gcSearcher)
    {
        $this->gcSearcher = $gcSearcher;
        $this->middleware('auth');

    }
    public function index($proyectId)
    {
        $generalCatalogs = $this->gcSearcher->__invoke($proyectId);

        return view('dashboard.contenido.generalCatalog.index', compact('generalCatalogs'));
    }
    public function create($proyectId)
    {

        $proyectId = $proyectId;
        return view('dashboard.contenido.generalCatalog.create',compact('proyectId'));

        return $proyectId;
    }

    public function store(Request $request, int $proyectId)
    {

        try {
            Excel::import(new UsersImports($proyectId,auth()->user()->id),request()->file('generalCatalog'));
        } catch (\Exception $th) {
            $errors = explode(',', $th->getMessage());
            $showErrors = [];
            foreach($errors as $error)
            {
                $showErrors[] = $error.'<br>';
            }

            return back()->with('errorExcel', 'No se pudo cargar su Excel debido a que los siguientes registros son erroneos: <br><br>'.implode(',',$showErrors));
        }

        $model = Proyect::where('id', $proyectId)->first();
        $model->status = DomainProyect::STATUS_OPEN;
        $model->save();
        
        return redirect()->route('index_proyects')->with('success', 'Catalogos Cargados Correctamente');


    }
}
