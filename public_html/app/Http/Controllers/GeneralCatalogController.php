<?php

namespace App\Http\Controllers;

use App\Bussines\GeneralCatalog\Application\Create\GeneralCatalogCreator;
use App\Bussines\GeneralCatalog\Application\Find\GeneralCatalogFinder;
use App\Bussines\GeneralCatalog\Application\Importer\GeneralCatalogImporter;
use App\Bussines\GeneralCatalog\Application\Search\GeneralCatalogSearcher;
use App\Bussines\GeneralCatalog\Application\Update\GeneralCatalogUpdater;
use App\Http\Requests\GeneralCatalog\BulkGeneralCatalogRequest;
use App\Http\Requests\GeneralCatalog\IndexGeneralCatalogRequest;
use App\Http\Requests\GeneralCatalog\StoreGeneralCatalogRequest;
use App\MeasurementUnits;

class GeneralCatalogController extends Controller
{

    private $gcSearcher;
    private $gcImporter;
    private $gcCreator;
    private $gcFinder;
    private $gcUpdater;

    public function __construct(
        GeneralCatalogSearcher $gcSearcher,
        GeneralCatalogImporter $gcImporter,
        GeneralCatalogCreator $gcCreator,
        GeneralCatalogFinder $gcFinder,
        GeneralCatalogUpdater $gcUpdater
    ) {
        $this->gcSearcher = $gcSearcher;
        $this->gcImporter = $gcImporter;
        $this->gcCreator = $gcCreator;
        $this->gcFinder = $gcFinder;
        $this->gcUpdater = $gcUpdater;

        $this->middleware('auth');
    }
    public function index($proyectId)
    {
        app(IndexGeneralCatalogRequest::class);

        $generalCatalogs = $this->gcSearcher->__invoke($proyectId);
        $measurementUnits = MeasurementUnits::get();

        return view(
            'dashboard.contenido.generalCatalog.index',
            compact(
                'generalCatalogs',
                'proyectId',
                'measurementUnits'
            )
        );
    }
    // public function create($proyectId)
    // {
    //     app(CreateGeneralCatalogRequest::class);

    //     $proyectId = $proyectId;
    //     return view('dashboard.contenido.generalCatalog.create', compact('proyectId'));

    //     return $proyectId;
    // }

    public function bulk(BulkGeneralCatalogRequest $request, int $proyectId)
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
        return back()->with('success', 'Catalogos Cargados Correctamente');
    }

    public function store(StoreGeneralCatalogRequest $request, int $proyectId)
    {
        $userId = auth()->user()->id;
  


            
        $this->gcCreator->__invoke(
            $proyectId,
            $userId,
            $request->input('area'),
            $request->input('subarea'),
            strtoupper($request->input('clave')),
            ltrim($request->input('description')),
            $request->input('measurement_unit_id'),
            $request->input('quantity'),
            $request->input('unit_price'),
            $request->input('quantity') * $request->input('unit_price')
        );

        return back()->with('success', 'Catalogo Cargado Correctamente');
    }

    public function edit(int $proyectId, int $generalCatalogId)
    {

        $generalCatalog = $this->gcFinder->__invoke($proyectId, $generalCatalogId);
        $measurementUnits = MeasurementUnits::get();

        return view(
            'dashboard.contenido.generalCatalog.edit',
            compact(
                'generalCatalog',
                'measurementUnits',
                'proyectId',
                'generalCatalogId'
            )
        );
    }

    public function update(StoreGeneralCatalogRequest $request, $proyectId, $generalCatalogId)
    {
        $this->gcUpdater->__invoke($request->input(), $proyectId, $generalCatalogId);

        return back()->with('success', 'Catalogo Actualizado Correctamente');
    }
}
