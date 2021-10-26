<li class="{{ ( Route::is('ver_catalogogral','agregar_catalogogral')) ? 'active' : '' }}  treeview">
    <a href="#">
      <i class="fa fa-clone"></i>
      <span>General</span>
      <span class="pull-right-container">
        <i class="fa fa-angle-left pull-right"></i>
      </span>
    </a>
    <ul class="treeview-menu">
      <li class="{{ ( Route::is('ver_catalogogral')) ? 'active' : '' }}"><a href="{{ route('ver_catalogogral') }}"><i class="fa fa-list"></i>Ver Catalogo General</a></li>
      <li class="{{ ( Route::is('agregar_catalogogral')) ? 'active' : '' }}"><a href="{{ route('agregar_catalogogral') }}"><i class="fa fa-plus"></i>Agregar Catalogo</a></li>
    </ul>
</li>
