@extends('layouts.dashboard')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header mb-2" style="    display: flex;justify-content: space-between;">
                    <span>Agregar Proyecto</span>
                    <a href="/proyectos" class="btn btn-primary btn-sm">Volver a lista de proyectos...</a>
                </div>
                <div class="card-body">

                  <form method="POST" action="/proyectos/guardar" enctype="multipart/form-data">
                    @csrf



                    <div class="form-group">
                      <label>Cliente</label>

                        <select name="client_id" id="" class="form-control">
                          @foreach ($clients as $item)
                            <option value="{{$item->id}}">{{$item->company}}</option>
                          @endforeach
                        </select>

                      @error('client_id')
                      <div class="text-danger">Ingrese un Nombre correcto</div>
                      @enderror
                    </div>



                    <div class="form-group">
                      <label>Nombre</label>
                      <input type="text" name="name" placeholder="Nombre" class="form-control mb-2" required="" {{ old('name') }}/>
                      @error('name')
                      <div class="text-danger">Ingrese un Nombre correcto</div>
                      @enderror
                    </div>



                    <div class="form-group">
                      <label>Dirección</label>
                      <input type="text" name="address" placeholder="Dirección" class="form-control mb-2" required="" {{ old('address') }}/>
                      @error('address')
                      <div class="text-danger">Ingrese un Nombre correcto</div>
                      @enderror
                    </div>



                    <div class="form-group">
                      <label>Presupuesto General ($)</label>
                      <input type="number" step="any" name="general_budget" placeholder="Presupuesto General ($)" class="form-control mb-2" required="" {{ old('general_budget') }}/>
                      @error('general_budget')
                      <div class="text-danger">Ingrese un Nombre correcto</div>
                      @enderror
                    </div>



                    <div class="form-group">
                      <label>Metros cuadrados</label>
                      <input type="number" step="any" name="meters" placeholder="Metros cuadrados" class="form-control mb-2" required="" {{ old('meters') }}/>
                      @error('meters')
                      <div class="text-danger">Ingrese un Nombre correcto</div>
                      @enderror
                    </div>



                    <div class="form-group">
                      <label>Empleados</label>
                      <input type="text" name="employees" placeholder="Empleados" class="form-control mb-2" required="" {{ old('employees') }}/>
                      @error('employees')
                      <div class="text-danger">Ingrese un Nombre correcto</div>
                      @enderror
                    </div>



                    <div class="form-group">
                      <label>Empleados Indirectos</label>
                      <input type="text" name="employees_ft" placeholder="Empleados Indirectos" class="form-control mb-2" required="" {{ old('employees_ft') }}/>
                      @error('employees_ft')
                      <div class="text-danger">Ingrese un Nombre correcto</div>
                      @enderror
                    </div>





                    <button class="btn btn-primary btn-block" type="submit">Agregar</button>
                  </form>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection
<script src="{{ asset('js/usuarios/nuevo.js') }}" defer></script>
<script src="{{ asset('js/registro.js') }}" defer></script>


