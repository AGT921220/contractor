<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\CreateUserRequest;
use App\Http\Requests\User\DestroyUserRequest;
use App\Http\Requests\User\IndexUserRequest;
use App\Http\Requests\User\StoreUserRequest;
use App\Services\User\UserService;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    private $userService;

    public function __construct(UserService $userService
    )
    {
        $this->userService = $userService;
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        app(IndexUserRequest::class);
        $users = $this->userService->search();
        return view('dashboard.contenido.usuarios.index',compact('users'));  
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        app(CreateUserRequest::class);
        return view('dashboard.contenido.usuarios.create');  
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserRequest $request)
    {
        if($this->userService->store($request)){
            return back()->with('success','Usuario Creado');
        }
        return back()->with('error','Ha ocurrido un error');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(int $userId)
    {
        $user = $this->userService->find($userId);

        return view('dashboard.contenido.usuarios.edit',compact('user'));  

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(int $userId)
    {
        $user = $this->userService->find($userId);

        return view('dashboard.contenido.usuarios.edit',compact('user'));  

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $userId)
    {
        if($this->userService->update($request, $userId)){
            return back()->with('success','Usuario Editado');
        }
        return back()->with('error','Ha ocurrido un error');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $userId)
    {
        app(DestroyUserRequest::class);
        if($this->userService->destroy($userId)){
            return back()->with('success','Usuario Eliminado');
        }
        return back()->with('error','Ha ocurrido un error');

        //
    }
}
