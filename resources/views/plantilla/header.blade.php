<nav class="app-header navbar navbar-expand bg-body">
        <!--begin::Container-->
        <div class="container-fluid">
          <!--begin::Start Navbar Links-->
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" data-lte-toggle="sidebar" href="#" role="button">
                <i class="bi bi-list"></i>
              </a>
            </li>
            <li class="nav-item d-none d-md-block"><a href="#" class="nav-link">Inicio</a></li>
            <li class="nav-item d-none d-md-block"><a href="#" class="nav-link">Contacto</a></li>
          </ul>
          <!--end::Start Navbar Links-->
          <!--begin::End Navbar Links-->
          <ul class="navbar-nav ms-auto">
            <!--begin::Fullscreen Toggle-->
            <li class="nav-item">
              <a class="nav-link" href="#" data-lte-toggle="fullscreen">
                <i data-lte-icon="maximize" class="bi bi-arrows-fullscreen"></i>
                <i data-lte-icon="minimize" class="bi bi-fullscreen-exit" style="display: none"></i>
              </a>
            </li>
            <!--end::Fullscreen Toggle-->
            <!--begin::User Menu Dropdown-->
            @if (Auth::check())
            
            
            <li class="nav-item dropdown user-menu">
              <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                
                <span class="d-none d-md-inline"> {{ Auth::user()->name }} </span>
              </a>
              <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-end">
                <!--begin::User Image-->
                <li class="user-header text-bg-primary">
                  
                  <p>

                    {{ Auth::user()->name }}
                    <small>Miembro desde   Mar. 1969</small>
                  </p>
                </li>
                <!--end::User Image-->
                <!--begin::Menu Body-->
                <li class="user-body">
                  <!--begin::Row-->
                  <div class="row">
                    <div class="col-4 text-center"><a href="#">Seguidores</a></div>
                    <div class="col-4 text-center"><a href="#">Ventas</a></div>
                    <div class="col-4 text-center"><a href="#">Amigos</a></div>
                  </div>
                  <!--end::Row-->
                </li>
                <!--end::Menu Body-->
                <!--begin::Menu Footer-->
                <li class="user-footer">
                  <a href="{{ route('perfil.edit') }}" class="btn btn-default btn-flat" >Perfil</a> 
                  <a href="#" onclick="document.getElementById('logout -form').submit();" class="btn btn-default btn-flat float-end"> Cerrar Sesión </a>
                </li>
                <!--end::Menu Footer-->
              </ul>
            </li>
            <form action="{{ route('logout') }}" id="logout -form" method="post" class="d-none">
                  @csrf
            </form>
            @endif
            <!--end::User Menu Dropdown-->
          </ul>
          <!--end::End Navbar Links-->
        </div>
        <!--end::Container-->
      </nav>