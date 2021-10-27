@extends('layouts.dashboard')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <span>Lista de Catalogos Generales</span>
                </div>



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
                                <td>{{ number_format($item->unit_price,2) }}</td>
                                <td>{{ number_format($item->total,2)}}</td>
                   
                                
                                


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
    tbody tr td,thead tr th{
        text-align: center;
    }
    .actions_table{
        justify-content: space-evenly;
    }
    .actions_table form{
        display: contents;
        margin: 1em auto;
    }
    </style>
<script src="{{ asset('js/datatables.js') }}" defer></script>
<link rel="stylesheet" href="{{ asset('css/datatables.css') }}">