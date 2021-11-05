@extends('layouts.dashboard')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                    </div>

                    <div class="card-body">
                      
                        <input type="hidden" name="subcontractor_id" value="{{$subcontractor['id']}}" id="subcontractor_id" placeholder="Nombre" class="form-control mb-2" disabled=""/>

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

                    @if ($activeProyects)
                    <form action="/proyectos/" method="POST">
                        @csrf
                    <div class="card-body">                      
                        <div class="form-group">
                            <label >Proyecto</label>
                          <select class="form-control" id="proyect_id_select" name="proyect_id">
                              @foreach ($activeProyects as $item)
                                    <option value="{{$item['id']}}">{{$item['name']}}</option>
                              @endforeach
                          </select>


                        <div class="form-group">
                            <label >Concurso</label>
                            <select class="form-control" id="contest_id_select" name="proyect_id">
                            </select>
                        </div>
                    </div>  

                    <button type="submit" class="btn btn-primary">Agregar</button>
                </form>                      
                    @endif


                    <h2 class="text-center">Proyects</h2>

                    <div class="card-body" style="overflow-x:scroll">
                        <table class="table" id="datatable" style="overflow-x:scroll">
                            <thead>
                                <tr>
                                    <th>Proyecto</th>
                                    <th>Estatus</th>
                                    <th>Cocurso</th>
                                    <th>Estatus</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($userProyects as $item)
                                    <tr>
                                        <td>{{ $item['proyect'] }}</td>
                                        <td>{{ $item['proyect_status'] }}</td>
                                        <td>{{ $item['contest'] }}</td>
                                        <td>{{ $item['contest_status'] }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Proyecto</th>
                                    <th>Estatus</th>
                                    <th>Cocurso</th>
                                    <th>Estatus</th>

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
<script src="{{ asset('js/subcontractors/actions.js') }}" defer></script>
