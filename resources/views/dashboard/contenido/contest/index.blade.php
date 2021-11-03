@extends('layouts.dashboard')


@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">

                        <h4 class="text-center"> <strong> Lista de Concursos </strong></h4>
                        
                        <div class="row">


                            <form hidden="" class="col-md-10" method="POST" action="/proyectos/{{ $proyectId }}/catalogo-general/store"
                                enctype="multipart/form-data">
                                @csrf
                                    
                                <div class="form-group col-md-4">
                                    <label>Unidad</label>
                                    <select name="measurement_unit_id" id="" class="form-control">
                                        <option value=""></option>
                                    </select>
                                </div>

        
                                <button class="btn btn-primary btn-block" type="submit">Agregar</button>
                            </form>
                        </div>
    
                    </div>

                    <hr>



                    <div class="card-body" style="overflow-x:scroll">
                        <table class="table" id="datatable" style="overflow-x:scroll">
                            <thead>
                                <tr>
                                    <th>Nombre</th>
                                    <th>Conceptos</th>
                                    <th>Acciones</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($contests as $item)
                                    <tr>
                                        <td>{{ $item->getname() }}</td>
                                        <td>
                                            {{-- {{ count($item->getGeneralCatalogs())  
                                        }} --}}
                                    <button class="btn btn-primary switchShowBtn" >Ver Conceptos</button>
                                    <ul style="list-style: none;" class="switchShow">
                                        @foreach ($item->getGeneralCatalogs() as $item)
                                         <li>{{$item->first()->description}}</li>   
                                        @endforeach
                                    </ul>
                                    </td>
                                        <td></td>





                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Nombre</th>
                                    <th>Conceptos</th>

                                    <th>Acciones</th>

                                </tr>
                            </tfoot>

                        </table>

                        {{-- fin card body --}}
                    </div>

                    {{-- <a href="{{ route('agregar_usuario') }}"class="btn btn-primary btn-sm">Nuevo Usuario</a> --}}
                </div>
            </div>
        </div>
    </div>







    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap4.min.css">

@endsection
<style>
    .switchShow{
        display: none;
    }
    tbody tr td,
    thead tr th {
        text-align: center;
    }

    .actions_table {
        justify-content: space-evenly;
    }

    .actions_table form {
        display: contents;
        margin: 1em auto;
    }

</style>


<script src="{{ asset('js/contest/actions.js') }}" defer></script>
<script src="{{ asset('js/datatables.js') }}" defer></script>
<link rel="stylesheet" href="{{ asset('css/datatables.css') }}">

