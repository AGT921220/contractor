<li class="{{ (Request::path() == 'subcontratistas' ||Request::path() == 'subcontratistas/create') ? 'active' : '' }}  treeview">
  <a href="#">
    <i class="fa fa-users"></i> 
    <span>Subcontratistas</span>
    <span class="pull-right-container">
      <i class="fa fa-angle-left pull-right"></i>
    </span>
  </a>
  <ul class="treeview-menu">
    <li ><a href="/subcontratistas"><i class="fa fa-list"></i>Ver subcontratistas</a></li>
    <li ><a href="/subcontratistas/nuevo"><i class="fa fa-plus"></i>Agregar Subcontratista</a></li>
  </ul>
</li>
