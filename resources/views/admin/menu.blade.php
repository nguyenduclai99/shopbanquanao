<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('get.admin.home')}}" class="brand-link elevation-4">
        <img src="{{asset('image/logo-admin.png')}}"
            class="brand-image img-circle elevation-3"
            style="opacity: .8">
        <span class="brand-text font-weight-light">ADMIN KANTAN</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
            <img src="{{asset('image/logo-admin.png')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
            <a href="#" class="d-block">{{ get_data_user('admins','name')}}</a>
        </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            
            <li class="nav-item">
                <a href="{{route('admin.category.index')}}" class="nav-link">
                    <i class="nav-icon fas fa-plus"></i>
                    <p>
                        Quản Lý Danh Mục
                   
                    </p>
                </a>
            </li>
            <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-plus"></i>
                    <p>
                        Phân Loại Nhà Phân Phối
                    <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview" style="margin-left: 10px">
                    <li class="nav-item">
                        <a href="{{route('admin.distributor.index')}}" class="nav-link">
                            <p>Nhà Phân Phối Hàng Mới</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('admin.distributorseconhand.index')}}" class="nav-link">
                            <p>Nhà Phân Phối Seconhand</p>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-plus"></i>
                    <p>
                        Phân Loại Sản Phẩm
                    <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview" style="margin-left: 10px">
                    <li class="nav-item">
                        <a href="{{route('admin.product.index')}}" class="nav-link">
                            <p>Sản phẩm mới</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('admin.seconhandproduct.index')}}" class="nav-link">
                            <p>Sản Phẩm Seconhand</p>
                        </a>
                    </li>
                     <li class="nav-item">
                        <a href="{{route('admin.consignmentproduct.index')}}" class="nav-link">
                            <p>Sản Phẩm Ký Gửi</p>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a href="{{route('admin.keyword.index')}}" class="nav-link">
                    <i class="nav-icon fas fa-plus"></i>
                    <p>
                    Keyword
                   
                    </p>
                </a>
            </li>
            <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-plus"></i>
                    <p>
                        Phân Loại Người Dùng
                    <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview" style="margin-left: 10px">
                    <li class="nav-item">
                        <a href="{{route('admin.employee.index')}}" class="nav-link">
                            <p>Quản Lý Nhân Viên</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('admin.user.index')}}" class="nav-link">
                            <p>Quản Lý Khách Hàng</p>
                        </a>
                    </li>
                     <li class="nav-item">
                        <a href="{{route('admin.sender.index')}}" class="nav-link">
                            <p>Quản Lý Người Ký Gửi</p>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item has-treeview">
                <a href="{{route('admin.transaction.index')}}" class="nav-link">
                    <i class="nav-icon fas fa-plus"></i>
                    <p>
                    Quản Lý Đơn Hàng
                    </p>
                </a>
            </li>
            {{-- <li class="nav-item has-treeview">
                <a href="{{route('admin.menu.index')}}" class="nav-link">
                    <i class="nav-icon fas fa-plus"></i>
                    <p>
                    Menu Tin Tức
                    </p>
                </a>
            </li>
            <li class="nav-item has-treeview">
                <a href="{{route('admin.article.index')}}" class="nav-link">
                    <i class="nav-icon fas fa-plus"></i>
                    <p>
                    Quản Lý Tin Tức
                    </p>
                </a>
            </li> --}}
        </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>