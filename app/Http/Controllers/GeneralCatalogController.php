<?php

namespace App\Http\Controllers;

use App\Bussines\GeneralCatalog\Application\Create\GeneralCatalogCreator;
use App\Bussines\GeneralCatalog\Application\Importer\GeneralCatalogImporter;
use App\Bussines\GeneralCatalog\Application\Search\GeneralCatalogSearcher;
use App\Http\Requests\GeneralCatalog\CreateGeneralCatalogRequest;
use App\Http\Requests\GeneralCatalog\IndexGeneralCatalogRequest;
use App\Http\Requests\GeneralCatalog\StoreGeneralCatalogRequest;

class GeneralCatalogController extends Controller
{

    private $gcSearcher;
    private $gcImporter;
    private $gcCreator;

    public function __construct(
        GeneralCatalogSearcher $gcSearcher,
        GeneralCatalogImporter $gcImporter,
        GeneralCatalogCreator $gcCreator
    ) {
        $this->gcSearcher = $gcSearcher;
        $this->gcImporter = $gcImporter;
        $this->gcCreator = $gcCreator;
        $this->middleware('auth');
    }
    public function index($proyectId)
    {
        app(IndexGeneralCatalogRequest::class);

        $generalCatalogs = $this->gcSearcher->__invoke($proyectId);

        return view('dashboard.contenido.generalCatalog.index', compact('generalCatalogs'));
    }
    public function create($proyectId)
    {
        app(CreateGeneralCatalogRequest::class);

        $proyectId = $proyectId;
        return view('dashboard.contenido.generalCatalog.create', compact('proyectId'));

        return $proyectId;
    }

    public function store(StoreGeneralCatalogRequest $request, int $proyectId)
    {

        try {

            $this->gcImporter->__invoke($request, $proyectId);
        } catch (\Exception $th) {
            $errors = explode(',', $th->getMessage());
            $showErrors = [];
            foreach ($errors as $error) {
                $showErrors[] = $error . '<br>';
            }

            return back()->with('errorExcel', 'No se pudo cargar su Excel debido a que los siguientes registros son erroneos: <br><br>' . implode(',', $showErrors));
        }

        return redirect()->route('index_proyects')->with('success', 'Catalogos Cargados Correctamente');
    }
}
