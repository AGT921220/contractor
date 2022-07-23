@extends('layouts.dashboard')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header mb-2" style="    display: flex;justify-content: space-between;">
                    <span>Agregar Clientes</span>
                    <a href="/clientes" class="btn btn-primary btn-sm">Volver a lista de clientes...</a>
                </div>
                <div class="card-body">

                  <form method="POST" action="/clientes/guardar" enctype="multipart/form-data">
                    @csrf



                    <div class="form-group">
                      <label>Nombre de Empresa</label>
                      <input type="text" name="company" placeholder="Empresa" class="form-control mb-2" required="" {{ old('company') }}/>
                      @error('company')
                      <div class="text-danger">Ingrese un Nombre correcto</div>
                      @enderror
                    </div>




                    <div class="form-group">
                      <label>RFC</label>
                      <input type="text" name="rfc" placeholder="RFD" class="form-control mb-2" required="" {{ old('rfc') }}/>
                      @error('rfc')
                      <div class="text-danger">Ingrese un Nombre correcto</div>
                      @enderror
                    </div>




                    <div class="form-group">
                      <label>Registro Patronal</label>
                      <input type="text" name="reg_patronal" placeholder="Registro Patronal" class="form-control mb-2" required="" {{ old('reg_patronal') }}/>
                      @error('reg_patronal')
                      <div class="text-danger">Ingrese un Nombre correcto</div>
                      @enderror
                    </div>




                    <div class="form-group">
                      <label>Representante Legal</label>
                      <input type="text" name="rep_legal" placeholder="Representante Legal" class="form-control mb-2" required="" {{ old('rep_legal') }}/>
                      @error('rep_legal')
                      <div class="text-danger">Ingrese un Nombre correcto</div>
                      @enderror
                    </div>




                    <div class="form-group">
                      <label>Dirección Fiscal</label>
                      <input type="text" name="address" placeholder="Dirección Fiscal" class="form-control mb-2" required="" {{ old('address') }}/>
                      @error('address')
                      <div class="text-danger">Ingrese un Nombre correcto</div>
                      @enderror
                    </div>




                    <div class="form-group">
                      <label>Correo</label>
                      <input type="email" name="email" placeholder="Correo" class="form-control mb-2" required="" {{ old('email') }}/>
                      @error('email')
                      <div class="text-danger">Ingrese un Nombre correcto</div>
                      @enderror
                    </div>




                    <div class="form-group">
                      <label>Telefono</label>
                      <input type="number" name="phone" placeholder="Telefono" class="form-control mb-2" required="" {{ old('phone') }}/>
                      @error('phone')
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


