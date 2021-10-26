<li class="{{ (Request::path() == 'users' ||Request::path() == 'users/create') ? 'active' : '' }}  treeview">
    <a href="#">
      <i class="fa fa-users"></i> 
      <span>Usuarios</span>
      <span class="pull-right-container">
        <i class="fa fa-angle-left pull-right"></i>
      </span>
    </a>
    <ul class="treeview-menu">
      <li ><a href="/users"><i class="fa fa-list"></i>Ver Usuarios</a></li>
      <li ><a href="/users/create"><i class="fa fa-plus"></i>Agregar Usuario</a></li>
    </ul>
</li>
