<li class="{{ ( Route::is('ver_proyectos','agregar_proyecto')) ? 'active' : '' }}  treeview">
    <a href="#">
      <i class="fas fa-briefcase"></i>
      <span>Proyectos</span>
      <span class="pull-right-container">
        <i class="fa fa-angle-left pull-right"></i>
      </span>
    </a>
    <ul class="treeview-menu">
      <li class="{{ ( Route::is('ver_proyectos')) ? 'active' : '' }}"><a href="{{ route('ver_proyectos') }}"><i class="fa fa-list"></i>Ver Proyectos</a></li>
      <li class="{{ ( Route::is('agregar_proyecto')) ? 'active' : '' }}"><a href="{{ route('agregar_proyecto') }}"><i class="fa fa-plus"></i>Agregar Proyecto</a></li>
    </ul>
</li>
