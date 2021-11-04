@extends('layouts.dashboard')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <span>Lista de Proyectos</span>
                </div>



                <div class="card-body" style="overflow-x:scroll">
                    <table class="table" id="datatable" style="overflow-x:scroll">
                        <thead>
                            <tr>
                            <th>Cliente</th>
                            <th>Proyecto</th>
                            <th>Dirección</th>
                            <th>Presupuesto General</th>
                            <th>Metros cuadrados</th>
                            <th>Empleados</th>
                            <th>Empleados Indirectos</th>
                            <th>Acciones</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($proyects as $item)
                            <tr>
                                <td>{{ $item->client }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->address }}</td>
                                <td>{{ number_format($item->general_budget,2) }}</td>
                                <td>{{ $item->meters }}</td>
                                <td>{{ $item->employees }}</td>
                                <td>{{ $item->employees_ft }}</td>
                                <td>{!! $item->actions!!}
                                    @if ($item->contests()->count() && $item->status=='created')
                                    <form style="margin-top:5px;" method="POST" action="/proyectos/{{$item->id}}/activate" enctype="multipart/form-data">
                                        @csrf

                                        <button class="btn btn-primary btn-block" type="submit">Activar Proyecto</button>
                                    </form>
                                    @endif
                                </td>
                                                                           
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Cliente</th>
                                <th>Proyecto</th>
                                <th>Dirección</th>
                                <th>Presupuesto General</th>
                                <th>Metros cuadrados</th>
                                <th>Empleados</th>
                                <th>Empleados Indirectos</th>
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