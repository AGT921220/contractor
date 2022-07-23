@extends('layouts.dashboard')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header mb-2" style="    display: flex;justify-content: space-between;">
                    <span>Editar Partida</span>
                    {{-- <a href="/users" class="btn btn-primary btn-sm">Volver a lista de usuarios...</a> --}}
                </div>
                <div class="card-body">

                  <form method="POST" action="/proyectos/{{$proyectId}}/catalogo-general/{{$generalCatalogId}}/guardar" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf


                    <div class="form-group col-md-4">
                      <label>Clave</label>
                      <input type="text" name="clave" value="{{$generalCatalog->getClave()}}"  class="form-control " required=""/>
                  </div>


                    <div class="form-group col-md-4">
                      <label>Area</label>
                      <input type="text" name="area" value="{{$generalCatalog->getArea()}}"  class="form-control " required=""/>
                  </div>

                  <div class="form-group col-md-4">
                    <label>Subarea</label>
                    <input type="text" name="subarea"  value="{{$generalCatalog->getSubarea()}}" class="form-control " required=""/>
                </div>


                <div class="form-group col-md-12">
                  <label>Descripción</label>
                  <textarea name="description"value="{{$generalCatalog->getDescription()}}" class="form-control"  id="" cols="30" rows="10">{{ltrim($generalCatalog->getDescription())}}</textarea>
              </div>


              <div class="form-group col-md-6">
                <label>Unitario</label>
                <input type="text" name="unit_price"  value="{{$generalCatalog->getUnitPrice()}}" class="form-control " required=""/>
            </div>


            <div class="form-group col-md-6">
              <label>Cantidad</label>
              <input type="text" name="quantity"  value="{{$generalCatalog->getQuantity()}}" class="form-control " required=""/>
          </div>

                   

                    <button class="btn btn-primary btn-block" type="submit">Guardar</button>
                  </form>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection

<script src="{{ asset('js/usuarios/edit.js') }}" defer></script>
<script src="{{ asset('js/registro.js') }}" defer></script>
