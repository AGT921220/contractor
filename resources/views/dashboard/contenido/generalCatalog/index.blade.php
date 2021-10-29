@extends('layouts.dashboard')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">

                        <h4 class="text-center"> <strong> Lista de Catalogos Generales </strong></h4>
                        <hr>
                        <div class="row">
                            <form class="col-md-3 text-center" method="POST" action="/proyectos/{{ $proyectId }}/catalogo-general/bulk"
                                enctype="multipart/form-data" style="display: flex; flex-direction:column">
                                @csrf
    
                                <label class="center btn btn-warning" for="select_excel">Selectiona Un Excel</label>
                                <input type="file" required="" name="generalCatalog" id="select_excel" style="display: none"/>
                                    <br>
                                <button class="btn btn-primary btn-block" type="submit">Agregar Excel</button>
                            </form>



                            <form class="col-md-9" method="POST" action="/proyectos/{{ $proyectId }}/catalogo-general/store"
                                enctype="multipart/form-data">
                                @csrf
    
                                <div class="form-group col-md-6">
                                    <label>Area</label>
                                    <input type="text" name="area"  class="form-control " required=""/>
                                </div>

                                <div class="form-group col-md-6">
                                    <label>Subarea</label>
                                    <input type="text" name="area"  class="form-control " />
                                </div>
              
                                <div class="form-group col-md-12">
                                    <label>Descripción</label>
                                    <input type="text" name="description"  class="form-control " required=""/>
                                </div>
              
                                <div class="form-group col-md-6">
                                    <label>Cantidad</label>
                                    <input type="text" name="quantity"  class="form-control " required=""/>
                                </div>

                                <div class="form-group col-md-6">
                                    <label>Precio Unitario</label>
                                    <input type="text" name="unit_price"  class="form-control " />
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
                                    <th>Area</th>
                                    <th>Subarea</th>
                                    <th>Clave</th>
                                    <th>Descripción</th>
                                    <th>Unidades</th>
                                    <th>Cantidad</th>
                                    <th>Precio Unitario</th>
                                    <th>Total</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($generalCatalogs as $item)
                                    <tr>
                                        <td>{{ $item->area }}</td>
                                        <td>{{ $item->subarea }}</td>
                                        <td>{{ $item->clave }}</td>
                                        <td>{{ $item->description }}</td>
                                        <td>{{ $item->units }}</td>
                                        <td>{{ $item->quantity }}</td>
                                        <td>{{ number_format($item->unit_price, 2) }}</td>
                                        <td>{{ number_format($item->total, 2) }}</td>





                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Area</th>
                                    <th>Subarea</th>
                                    <th>Clave</th>
                                    <th>Descripción</th>
                                    <th>Unidades</th>
                                    <th>Cantidad</th>
                                    <th>Precio Unitario</th>
                                    <th>Total</th>

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
<script src="{{ asset('js/datatables.js') }}" defer></script>
<link rel="stylesheet" href="{{ asset('css/datatables.css') }}">
