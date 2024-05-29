<aside class="main-sidebar sidebar-dark-primary elevation-4" style="overflow-y: auto;">
    <!-- Brand Logo -->
    <a href="{{url('/dashboard')}}" class="brand-link">
        <img src="/assets/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
             style="opacity: .8">
        <span class="brand-text font-weight-light">GPdI</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
       

        <!-- SidebarSearch Form -->
        

        <!-- Sidebar Menu -->
        <nav class="mt-3 pt-3">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                        <li class="nav-item">
                            <a href="{{url('/dashboard')}}" class="nav-link">
                                <i class="nav-icon fas fa-list"></i>
                                <p>Dashboard</p>
                            </a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="nav-icon fas fa-book"></i>
                                <span>Data Pengguna</span>
                            </a>
                            <div class="dropdown-menu bg-light" aria-labelledby="navbarDropdownMenuLink">
                                <a class="dropdown-item text-muted" href="{{ url('/user') }}">Data User</a>
                            </div>
                        </li>                        
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="nav-icon fas fa-book"></i>
                        <span>Data Service & Home</span>
                    </a>
                    <div class="dropdown-menu bg-light" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item text-muted" href="{{ url('/home') }}">Data Home</a>
                        <a class="dropdown-item text-muted" href="{{ url('/services') }}">Data Service</a>
                        <a class="dropdown-item text-muted" href="{{ url('/about') }}">Foto About</a>
                    </div>                    
                </li>                
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="nav-icon fas fa-book"></i>
                        <span>Data Ibadah</span>
                    </a>
                    <div class="dropdown-menu bg-light" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item text-muted" href="{{ url('/sekolahminggu') }}">Data Sekolah Minggu</a>
                        <a class="dropdown-item text-muted" href="{{ url('/kaumbapa') }}">Data Ibadah Kaum Bapa</a>
                        <a class="dropdown-item text-muted" href="{{ url('/kaumwanita') }}">Ibadah Kaum Wanita</a>
                        <a class="dropdown-item text-muted" href="{{ url('/rayon') }}">Data Ibadah Rayon</a>
                        <a class="dropdown-item text-muted" href="{{ url('/youth') }}">Ibadah Youth</a>
                        <a class="dropdown-item text-muted" href="{{ url('/mingguraya') }}">Ibadah Minggu Raya</a>
                    </div>
                </li>                
                <li class="nav-item">
                    <a href="{{url('/offering')}}" class="nav-link">
                        <i class="nav-icon fas fa-book"></i>
                        <p> Offering</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{url('/jadwalpelayanan')}}" class="nav-link">
                        <i class="nav-icon fas fa-book"></i>
                        <p> Jadwal Pelayanan</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{url('/histori')}}" class="nav-link">
                        <i class="nav-icon fas fa-book"></i>
                        <p> Histori</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{url('/profilependeta')}}" class="nav-link">
                        <i class="nav-icon fas fa-book"></i>
                        <p> Profile Pendeta</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{url('/contact')}}" class="nav-link">
                        <i class="nav-icon fas fa-book"></i>
                        <p> Data Our Contact</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{url('/pojokjemaat')}}" class="nav-link">
                        <i class="nav-icon fas fa-book"></i>
                        <p> Data Pojok Jemaat</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{url('/schedule')}}" class="nav-link">
                        <i class="nav-icon fas fa-book"></i>
                        <p> Data Schedule</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{url('/jadwalpelayanan')}}" class="nav-link">
                        <i class="nav-icon fas fa-book"></i>
                        <p> Data Jadwal Pelayanan</p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
