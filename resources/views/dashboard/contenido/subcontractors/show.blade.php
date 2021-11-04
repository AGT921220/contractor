@extends('layouts.dashboard')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                    </div>

                    <div class="card-body">
                      

                    <div class="form-group">
                        <label>Nombre</label>
                        <input type="text" name="name" value="{{$subcontractor['name']}}" placeholder="Nombre" class="form-control mb-2" disabled=""/>
                   </div>
  
                      <div class="form-group">
                        <label>Apellido</label>
                        <input type="text" name="lname" value="{{$subcontractor['lname']}}" placeholder="Apellido" class="form-control mb-2" required="" disabled=""/>
                     </div>
  
                      <div class="form-group">
                        <label>Correo</label>
                        <input type="email" name="email" value="{{$subcontractor['email']}}" placeholder="Correo" class="form-control mb-2" required="" disabled=""/>
                    </div>
  
                      <div class="form-group">
                        <label>Teléfono</label>
                        <input type="number" name="phone" value="{{$subcontractor['phone']}}" class="form-control mb-2" required="" disabled=""/>
                     </div>
  
  
  
                     <div class="form-group">
                        <label>Imágen de perfil</label>
                        <div class="form-group image_container" style="justify-content: center;text-align: center;align-items: center;display: flex;flex-direction: column;margin: auto;">
                                <img class="profile_image_show" style="width:100px;" src="{{ asset($subcontractor['photo']) }}">
                              <label for="imagen_profile" style="cursor:pointer;">Seleccionar imágen</label>
                              <input style="display: none;" type="file" name="photo" id="imagen_profile" accept="image/x-png,image/gif,image/jpeg">
                        </div>
                    </div>
       

                    </div>


                    <h2 class="text-center">Asignar a Proyecto</h2>

                    <div class="card-body">                      
                        <div class="form-group">

                            <label >Tipo de usuario</label>
                          <select class="form-control" id="user_rol" name="user_type" {{ old('user_type') }}>
                            <option value="gerente">Gerente</option>
                            <option value="supervisor">Supervisor</option>
                          </select>
                        </div>
                    </div>


                    <h2 class="text-center">Proyects</h2>

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
                                        <td>{{ number_format($item->general_budget, 2) }}</td>
                                        <td>{{ $item->meters }}</td>
                                        <td>{{ $item->employees }}</td>
                                        <td>{{ $item->employees_ft }}</td>
                                        <td>{!! $item->actions !!}</td>

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
