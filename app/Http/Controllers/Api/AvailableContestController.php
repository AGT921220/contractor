<?php

namespace App\Http\Controllers\Api;

use App\Bussines\Contest\Application\Search\AvailableContestSearcher;
use App\Http\Controllers\Controller;

class AvailableContestController extends Controller
{
    
    private $searcher;

    public function __construct(AvailableContestSearcher $searcher)
    {
        $this->searcher = $searcher;
    }

    public function index(int $idProyect, int $scId)
    {
        $contests = $this->searcher->__invoke($idProyect, $scId);
        return response()->json(['success' => $contests->toArray()]);
    }
}
