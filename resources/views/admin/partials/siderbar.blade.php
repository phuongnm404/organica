<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="{{asset('adminlte/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo"
            class="brand-image img-circle elevation-3" style="opacity: .8"> Admin LTE-3

    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{asset('adminlte/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2"
                    alt="User Image">
            </div>
            <div class="info">
                {{-- <a href="#" class="d-block">{{ auth()->user()->name }}</a> --}}
            </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-item menu-open">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Sản phẩm
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview" style="margin-left: 20px">
                        <li class="nav-item">
                            <a href="{{route('admin.category.index')}}" class="nav-link">
                                <i class="nav-icon fas fa-th"></i>

                                <p>Danh mục sản phẩm
                                    <span class="right badge badge-danger">New</span>
                                </p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{route('admin.product.index')}}" class="nav-link">
                                <i class="nav-icon fas fa-book"></i>

                                <p>List sản phẩm
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('admin.brand.index')}}" class="nav-link">
                                <i class="nav-icon fas fa-dolly"></i>

                                <p>Thương hiệu
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('admin.tag.index')}}" class="nav-link">
                                <i class="nav-icon fas fa-tag"></i>

                                <p>Tags
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('admin.menu.index')}}" class="nav-link">
                                <i class="nav-icon fas fa-compass"></i>
                                <p>Menu</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{route('admin.slider.index')}}" class="nav-link">
                                <i class="nav-icon fas fa-sliders-h"></i>

                                <p>Slide </p>
                            </a>
                        </li>

                    </ul>
                </li>


                <li class="nav-item menu-open">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Người dùng
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview" style="margin-left: 20px">
                        <li class="nav-item">
                            <a href="{{route('admin.user.index')}}" class="nav-link">
                                <i class="nav-icon fas fa-user"></i>

                                <p>Danh sách người dùng
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('admin.order.index')}}" class="nav-link">
                                <i class="nav-icon fas fa-user"></i>

                                <p>Đơn hàng
                                </p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{route('admin.static.index')}}" class="nav-link">
                                <i class="nav-icon fas fa-tag"></i>

                                <p>Quản lý đặc trưng tĩnh
                                </p>
                            </a>
                        </li>

                    </ul>
                </li>
                <li class="nav-item menu-open">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Phân quyền
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview" style="margin-left: 20px">
                        <li class="nav-item">
                            <a href="{{route('admin.setting.index')}}" class="nav-link">
                                <i class="nav-icon fas fa-cog"></i>

                                <p>Settings
                                </p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{route('admin.role.index')}}" class="nav-link">
                                <i class="nav-icon fas fa-user-tag"></i>

                                <p>Danh sách vai trò
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('admin.permissions.create')}}" class="nav-link">
                                <i class="nav-icon fas fa-database"></i>

                                <p>Tạo dữ liệu bảng role
                                </p>
                            </a>
                        </li>

                    </ul>
                </li>
                <li class="nav-item menu-open">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Quản lý layout
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview" style="margin-left: 20px">
                        <li class="nav-item">
                            <a href="{{route('admin.setting.index')}}" class="nav-link">
                                <i class="nav-icon fas fa-cog"></i>

                                <p>Home
                                </p>
                            </a>
                        </li>

                    </ul>
                </li>

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>