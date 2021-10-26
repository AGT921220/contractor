<li class="{{ (Request::path() == 'proyectos' ||Request::path() == 'proyectos/nuevo') ? 'active' : '' }}  treeview">
    <a href="#">
      <i class="fas fa-briefcase"></i>
      <span>Proyectos</span>
      <span class="pull-right-container">
        <i class="fa fa-angle-left pull-right"></i>
      </span>
    </a>
    <ul class="treeview-menu">
      <li ><a href="/proyectos"><i class="fa fa-list"></i>Ver Proyectos</a></li>
      <li ><a href="/proyectos/nuevo"><i class="fa fa-plus"></i>Agregar Proyecto</a></li>
    </ul>
</li>
