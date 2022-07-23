<li class="{{ (Request::path() == 'clientes' ||Request::path() == 'clientes/nuevo') ? 'active' : '' }}  treeview">
    <a href="#">
      <i class="fa fa-users"></i> 
      <span>Clientes</span>
      <span class="pull-right-container">
        <i class="fa fa-angle-left pull-right"></i>
      </span>
    </a>
    <ul class="treeview-menu">
      <li ><a href="/clientes"><i class="fa fa-list"></i>Ver Clientes</a></li>
      <li ><a href="/clientes/nuevo"><i class="fa fa-plus"></i>Agregar Cliente</a></li>
    </ul>
</li>
