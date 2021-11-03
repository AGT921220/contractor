<?php

namespace App\Http\Controllers;

use App\Bussines\Contest\Application\Search\ContestSearcher;
use App\Bussines\GeneralCatalog\Application\Search\GeneralCatalogSearcher;
use App\Http\Requests\Contest\IndexContestRequest;

class ContestController extends Controller
{

    private $contestSearcher;
    private $gcSearcher;



    public function __construct(ContestSearcher $searcher,
    GeneralCatalogSearcher $gcSearcher
    )
    {
        $this->contestSearcher = $searcher;
        $this->gcSearcher = $gcSearcher;
        $this->middleware('auth');
    }

    public function index(int $proyectId)
    {
        app(IndexContestRequest::class);

        $contests = $this->contestSearcher->__invoke($proyectId);


        // return $generalCatalogs->map(function ($generalCatalog) {
        //     $generalCatalog->actions = $this->determineAction($generalCatalog->proyect_id, $generalCatalog->id);
        //     return $generalCatalog;
        // });
        return view('dashboard.contenido.contest.index',compact('contests','proyectId'));

        return 'index';
    }
}
