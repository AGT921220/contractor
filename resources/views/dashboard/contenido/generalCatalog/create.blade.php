@extends('layouts.dashboard')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header mb-2" style="    display: flex;justify-content: space-between;">
                    <span>Agregar Catalogos</span>
                    {{-- <a href="/proyectos" class="btn btn-primary btn-sm">Volver a lista de proyectos...</a> --}}
                </div>
                <div class="card-body">

                  <form method="POST" action="/proyectos/{{$proyectId}}/catalogo-general/bulk" enctype="multipart/form-data">
                    @csrf

                    <label for="">Selectiona Tu Excel</label>
                    <input type="file"  name="generalCatalog" />

                    



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


