<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="{{ asset('tema/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
        style="opacity: .8">
      <span class="brand-text font-weight-light">InvSoft</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('tema/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Usuario</a>
        </div>
      </div>


      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->

          <li class="nav-item">
            <a href="/" class="nav-link @if (request()->routeIs('inicio')) active @endif">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Inicio
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{route('inventario')}}" class="nav-link @if (request()->routeIs('inventario')) active @endif">
              <i class="nav-icon fa-solid fa-truck-ramp-box"></i>
              <p>
                Entradas/Salidas
              </p>
            </a>
          </li>

          <li class="nav-item menu-open">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Mantenimientos
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">

              <li class="nav-item ">
                <a href="{{route('categoria')}}" class="nav-link @if (request()->routeIs('categoria')) active @endif">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Categorias</p>
                </a>
              </li>

              <li class="nav-item ">
                <a href="{{route('unidad')}}" class="nav-link @if (request()->routeIs('unidad')) active @endif">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Unidades</p>
                </a>
              </li>

              <li class="nav-item ">
                <a href="{{route('producto')}}" class="nav-link @if (request()->routeIs('producto')) active @endif">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Productos</p>
                </a>
              </li>

              <li class="nav-item ">
                <a href="{{route('tipo-comprobante')}}" class="nav-link @if (request()->routeIs('tipo-comprobante')) active @endif">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Tipos de comprobantes</p>
                </a>
              </li>

              <li class="nav-item ">
                <a href="{{route('usuarios')}}" class="nav-link @if (request()->routeIs('usuarios')) active @endif">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Usuarios</p>
                </a>
              </li>

              <li class="nav-item ">
                <a href="{{route('rol')}}" class="nav-link @if (request()->routeIs('rol')) active @endif">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Roles</p>
                </a>
              </li>

              <li class="nav-item ">
                <a href="{{route('almacen')}}" class="nav-link @if (request()->routeIs('almacen')) active @endif">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Almacenes</p>
                </a>
              </li>

        
              
            </ul>
          </li>

          <li class="nav-item menu-open">
            <a href="#" class="nav-link  @if (request()->routeIs('stock')) menu-open @endif">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                Reportes
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('stock')}}" class="nav-link @if (request()->routeIs('stock')) active @endif">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Informe de stock</p>
                </a>
              </li>
              {{-- <li class="nav-item">
                <a href="pages/charts/flot.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Informe de Kardex</p>
                </a>
              </li> --}}

            </ul>
          </li>

        </ul>


      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>