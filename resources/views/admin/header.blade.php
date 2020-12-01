<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="{{ route('get.admin.home')}}" class="nav-link">Home</a>
        </li>
    </ul>

    <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown user-menu">
            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                <img src="{{asset('image/logo-admin.png')}}" class="user-image img-circle elevation-2" alt="User Image">
                <span class="d-none d-md-inline">{{ get_data_user('admins','name')}}</span>
            </a>
            <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <!-- User image -->
                <li class="user-header bg-white">
                    <img src="{{asset('image/logo-admin.png')}}" class="img-circle elevation-2" alt="User Image">
                    <p>
                        Việc duy nhất không thay đổi là ngày mai sẽ thay đổi
                    </p>
                </li>
                <li class="user-footer">
                    <a href="" class="btn btn-default btn-flat">Profile</a>
                    <a href="{{ route('get.logout.admin')}}" class="btn btn-default btn-flat float-right">Sign out</a>
                    
                    <form id="logout-form" action="" method="POST" style="display: none;">
                        @csrf
                    </form>

                </li>
            </ul>
            </li>
    </ul>
</nav>
<!-- /.navbar -->