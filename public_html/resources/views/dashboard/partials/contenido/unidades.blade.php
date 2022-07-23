<li class="{{ ( Route::is('ver_unidades','agregar_unidad')) ? 'active' : '' }} treeview">
    <a href="#">
      <i class="fas fa-ruler-vertical"></i>
      <span>Unidades</span>
      <span class="pull-right-container">
        <i class="fa fa-angle-left pull-right"></i>
      </span>
    </a>
    <ul class="treeview-menu">
      <li class="{{ ( Route::is('ver_unidades')) ? 'active' : '' }}"><a href="{{ route('ver_unidades') }}"><i class="fa fa-list"></i>Ver Unidades</a></li>
      <li class="{{ ( Route::is('agregar_unidad')) ? 'active' : '' }}"><a href="{{ route('agregar_unidad') }}"><i class="fa fa-plus"></i>Agregar Unidad</a></li>
    </ul>
</li>
