@extends('layouts.dashboard')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header mb-2" style="    display: flex;justify-content: space-between;">
                    <span>Editar Cliente</span>
                    <a href="/users" class="btn btn-primary btn-sm">Volver a lista de usuarios...</a>
                </div>
                <div class="card-body">

                  <form method="POST" action="/users/update/{{$user->id}}" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf


                    <div class="form-group">
                      <label>Nombre</label>
                    <input type="text" name="name" placeholder="Nombre" value="{{$user->name}}" class="form-control mb-2" required="" {{ old('name') }}/>
                    </div>

                    <div class="form-group">
                      <label>Apellido</label>
                      <input type="text" name="lname" placeholder="Apellido" value="{{$user->lname}}" class="form-control mb-2" required="" {{ old('lname') }}/>
                    </div>

                    <div class="form-group">
                      <label>Teléfono</label>
                      <input type="number" name="phone" value="{{$user->phone}}" class="form-control mb-2" required="" {{ old('phone') }}/>
                    </div>

                    <div class="form-check" style="text-align: center;display: flex;justify-content: center;margin:1.2em auto;">
                        <input type="checkbox" class="form-check-input" id="new_password">
                        <label class="form-check-label" for="new_password">Cambiar contraseña</label>
                    </div>

                    <div class="new_pass">

                    </div>





                    <div class="form-group">
                      <label>Imágen de perfil</label>
                      <div class="form-group image_container" style="justify-content: center;text-align: center;align-items: center;display: flex;flex-direction: column;margin: auto;">
                              <img class="profile_image_show" style="width:100px;" src="{{ asset(($user->photo)?$user->photo:'images/profile-empty.png') }}">
                            <label for="imagen_profile" style="cursor:pointer;">Seleccionar imágen</label>
                            <input style="display: none;" type="file" name="photo" id="imagen_profile" accept="image/x-png,image/gif,image/jpeg">
                      </div>
                  </div>


                    <input type="hidden" name="user_type" value="{{$user->user_type}}">

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
