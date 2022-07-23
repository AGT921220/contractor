<li class="{{ ( Route::is('horarios_configuracion')) ? 'active' : '' }}  treeview">
    <a href="#">
      <i class="fa fa-clock-o"></i>
      <span>Horarios</span>
      <span class="pull-right-container">
        <i class="fa fa-angle-left pull-right"></i>
      </span>
    </a>
    <ul class="treeview-menu">
      <li class="{{ ( Route::is('horarios_configuracion')) ? 'active' : '' }}"><a href="{{ route('horarios_configuracion') }}"><i class="fa fa-plus"></i>Configurar Horarios</a></li>
    </ul>
</li>
