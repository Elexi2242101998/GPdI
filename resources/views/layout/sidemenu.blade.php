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
                
                <li class="nav-item">
                    <a href="{{url('/user')}}" class="nav-link">
                        <i class="nav-icon fas fa-book"></i>
                        <p> Data User</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{url('/home')}}" class="nav-link">
                        <i class="nav-icon fas fa-book"></i>
                        <p> Data Home</p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
