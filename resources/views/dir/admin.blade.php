
                    <li>
                        <a href="{{ url('/home') }}"><i class="fa fa-television"></i><span class="sidebar-mini-hide">INICIO</span></a>
                    </li>
                    
                    <li class="nav-main-heading"><span class="sidebar-mini-visible">BD</span><span class="sidebar-mini-hidden">GESTIONAR PRODUCTOS</span></li>
                    <li><a  href="{{ url('cliente') }}"><i class="fa fa-street-view" aria-hidden="true"></i><span class="sidebar-mini-hide"> Clientes</span></a></li>
                    <li><a  href="{{ url('proveedor') }}"><i class="fa fa-truck" aria-hidden="true"></i><span class="sidebar-mini-hide"> Proveedores</span></a></li>
                    <li><a  href="{{ url('categoria') }}"><i class="fa fa-tags" aria-hidden="true"></i><span class="sidebar-mini-hide"> Categorias</span></a></li>
                    <li><a  href="{{ url('producto') }}"><i class="fa fa-shopping-bag" aria-hidden="true"></i></i><span class="sidebar-mini-hide"> Productos</span></a></li>
                    <li><a  href="{{ url('compra') }}"><i class="fa fa-shopping-cart" aria-hidden="true"></i><span class="sidebar-mini-hide"> Compras</span></a></li>
                    <li><a  href="{{ url('venta') }}"><i class="fa fa-credit-card" aria-hidden="true"></i><span class="sidebar-mini-hide"> Ventas</span></a></li>

                    <!--<li><a  href="{{ url('archivo') }}"><i class="fa fa-folder-open"></i><span class="sidebar-mini-hide">Archivos</span></a></li> -->
                    <li class="nav-main-heading"><span class="sidebar-mini-visible">BD</span><span class="sidebar-mini-hidden">REPORTES</span></li>
        
                    <li><a  href="{{ url('repcompras') }}"><i class="fa fa-credit-card" aria-hidden="true"></i><span class="sidebar-mini-hide">Compras</span></a></li>                    
        
                    <li><a  href="{{ url('repventas') }}"><i class="fa fa-clipboard"></i><span class="sidebar-mini-hide">Ventas</span></a></li>
                    <li class="nav-main-heading"><span class="sidebar-mini-visible">BD</span><span class="sidebar-mini-hidden">AUDITORÍA</span></li>
                    <li><a  href="{{ url('log') }}"><i class="fa fa-clipboard"></i><span class="sidebar-mini-hide">Gestión Acciones</span></a></li>                                        
                    <li class="nav-main-heading"><span class="sidebar-mini-visible">BD</span><span class="sidebar-mini-hidden">ADMINISTRACIÓN</span></li>
                    <li><a  href="{{ url('user') }}"><i class="fa fa-clipboard"></i><span class="sidebar-mini-hide">Gestión de Usuarios</span></a></li>                                        
                    <li><a  href="{{ url('rol') }}"><i class="fa fa-clipboard"></i><span class="sidebar-mini-hide">Gestión de Roles</span></a></li>                                                                                
