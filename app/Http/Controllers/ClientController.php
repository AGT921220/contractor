<?php

namespace App\Http\Controllers;

use App\Bussines\Client\Application\Create\ClientCreator;
use App\Bussines\Client\Application\Search\ClientSearcher;
use App\Http\Requests\Client\CreateClientRequest;
use App\Http\Requests\Client\IndexClientRequest;
use App\Http\Requests\Client\StoreClientRequest;

class ClientController extends Controller
{
    
    private $clientSearcher;
    private $clientCreator;

    public function __construct(ClientSearcher $searcher, 
    ClientCreator $creator)
    {
        $this->clientSearcher = $searcher;
        $this->clientCreator = $creator;
    }

    public function index()
    {
        app(IndexClientRequest::class);

        $clients = $this->clientSearcher->__invoke();
        return view('dashboard.contenido.clients.index', compact('clients'));
    }
    public function create()
    {
        app(CreateClientRequest::class);
        return view('dashboard.contenido.clients.create');
    }

    public function store(StoreClientRequest $request)
    {        
    $this->clientCreator->__invoke(
    $request->input('company'),
    $request->input('rfc'),
    $request->input('reg_patronal'),
    $request->input('rep_legal'),
    $request->input('address'),
    $request->input('email'),
    $request->input('phone'));
    return back()->with('success','Cliente Creado');

    }
}
