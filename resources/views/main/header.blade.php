<!-- Start of Header -->
<header class="header bgc-white">
    <div class="header-area">
        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-12 col-md-12 col-lg-3 align-self-center">
                    <div class="logo">
                        <a href="{{route('get.home')}}"><img src="{{asset('image/logo-kantan.png')}}" alt="Logo" class="img-fluid"></a>
                    </div>
                </div>
                <div class="col-12 col-sm-12 col-md-12 col-lg-9">
                    <div class="top-header">
                        <div class="row align-items-center">
                            <div class="col-12 col-sm-12 col-md-12 order-md-1 order-lg-2">
                                <ul class="list-inline">
                                    <li class="top-links list-inline-item">
                                        <div class="btn-group">
                                            @if (Auth::check())
                                            <button class="btn-link dropdown-toggle">{{Auth::user()->name}}<i class="fa fa-angle-down"></i></button>
                                                <div class="dropdown-menu">
                                                    <ul>
                                                        <li><a href="{{route('get.user.dashboard',Auth::user()->id)}}">Thông tin</a></li>
                                                        <li><a href="{{route('get.logout')}}">Đăng xuất</a></li>
                                                    </ul>
                                                </div>
                                            @else
                                                <button class="btn-link dropdown-toggle">Tài Khoản<i class="fa fa-angle-down"></i></button>
                                                <div class="dropdown-menu">
                                                    <ul>
                                                        <li><a href="{{route('get.register')}}">Đăng Ký</a></li>
                                                        <li><a href="{{route('get.login')}}">Đăng Nhập</a></li>
                                                    </ul>
                                                </div>
                                            @endif
                                            
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div> <!-- end of top-header -->

                    <div class="bottom-header">
                        <div class="row align-items-center">
                            <div class="col-12 col-sm-12 col-md-8 col-lg-8">
                                <div class="header-search-area">
                                    <div class="search-categories">
                                        <form action="{{route('get.product.list')}}" method="GET" enctype="multipart/form-data">
                                            <div class="search-form-input">
                                                <select id="select" name="c" class="nice-select">
                                                    <option value="">Tất cả danh mục</option>
                                                    @foreach ($categories as $data)
                                                        <option value="{{$data->c_slug.'-'.$data->id}}">{{$data->c_name}}</option>
                                                    @endforeach
                                                </select>
                                                <div class="search-wrapper">
                                                    <input type="text" name="key" value="{{ Request::get('key')}}" placeholder="Nhập từ khóa . . .">
                                                    <button class="header-search-btn" type="submit"><i class="ion ion-ios-search"></i></button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div> <!-- end of header-search-area -->
                            </div>
                            <div class="col-12 col-sm-12 col-md-4 col-lg-4">
                                <div class="header-cart-area">
                                    <div class="header-cart">
                                        <div class="btn-group">
                                            <button class="btn-link dropdown-toggle icon-cart">
                                                <i class="pe-7s-cart"></i>
                                                <span class="count-style">{{\Cart::count()}}</span>
                                            </button>
                                            <div class="dropdown-menu">
                                                <div class="shopping-cart-content">
                                                    @if (\Cart::content()->isEmpty())
                                                    <ul class="list-unstyled">
                                                        <h4>Chưa có sẳn phẩm nào trong giỏ hàng.</h4>
                                                    </ul>
                                                    @else
                                                    <ul class="list-unstyled">
                                                        @foreach(\Cart::content() as $key => $data) 
                                                        
                                                        <li class="single-cart-item media">
                                                            <div class="shopping-cart-img mr-4">
                                                                <a href="{{route('get.product.detail', $data->options->slug.'-'.$data->id)}}">
                                                                    <img class="img-fluid" alt="Cart Item" src="{{pare_url_file($data->options->image)}}">
                                                                    <span class="product-quantity">{{$data->qty}}</span>
                                                                </a>
                                                            </div>
                                                            <div class="shopping-cart-title media-body">
                                                                <h4><a href="{{route('get.product.detail',$data->options->slug.'-'.$data->id)}}">{{$data->name}}</a></h4>
                                                                <p class="cart-price">{{number_format($data->price,0,',','.')}} VNĐ</p>
                                                                <div class="product-attr">
                                                                    <span>Size: S</span>
                                                                    <span>Color: Black</span>
                                                                </div>
                                                            </div>
                                                            <div class="shopping-cart-delete">
                                                                <a href="{{ route('get.shopping.delete',$key)}}"><i class="ion ion-md-close"></i></a>
                                                            </div>
                                                        </li>
                                                        @endforeach
                                                    </ul>
                                                        
                                                    @endif
                                                        <div class="shopping-cart-total">
                                                            <h4>Tổng tiền : <span>{{ \Cart::subtotal(0)}} VNĐ</span></h4>
                                                        </div>

                                                    <div class="shopping-cart-btn">
                                                        <a class="default-btn" href="{{ route('get.shopping.list') }}">Xem giỏ hàng</a>
                                                        {{-- <a class="default-btn" href="checkout.html">checkout</a> --}}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="header-contact media">
                                        <div class="header-contact-icon mr-4">
                                            <i class="pe-7s-headphones"></i>
                                        </div>
                                        <div class="header-contact-content media-body">
                                            <p><span>LIÊN HỆ NGAY:</span> <br><a href="#">(+084) 3456789</a></p>
                                        </div>
                                    </div>
                                </div> <!-- end of header-cart-area -->
                            </div>
                        </div>
                    </div> <!-- end of bottom-header -->
                </div>
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </div> <!-- end of header-area -->

    <!-- Start of Main and Mobile Navigation -->
    <div class="main-nav-area">
        <div class="container">
            <nav id="main_nav" class="stellarnav">
                <ul class="text-left">
                    <li class="{{ Route::is('get.home') ? 'active' : '' }}">
                        <a href="{{route('get.home')}}"><span>Trang Chủ</span></a>
                    </li>
                    <li class="mega {{ Route::is('get.category.list') ? 'active' : '' }}" data-columns="3"><a href="javascript:void(0)"><span>Danh Mục</span></a>
                        <ul class="mega-container">
                            @if (isset($categories))

                                @foreach ($categories as $data)
                                <li>
                                    <a href="{{route('get.category.list',$data->c_slug.'-'.$data->id)}}" class="mega-menu-title"><h3>{{ $data->c_name}}</h3>
                                    </a>
                                </li>
                                @endforeach
                                
                            @endif
                        </ul>
                    </li>
                    <li class="{{ Route::is('get.product.list') ? 'active' : '' }}">
                        <a href="{{route('get.product.list')}}"><span>Sản Phẩm</span></a>     
                    </li>
                    <li class="{{ Route::is('get.blog.home') ? 'active' : '' }}">
                        <a href="{{route('get.blog.home')}}"><span>Tin Tức</span></a>
                    </li>
                    <li><a href="{{route('get.about')}}"><span>Giới Thiệu</span></a></li>
                    <li><a href="#"><span>Liên hệ</span></a></li>
                </ul>
            </nav>
        </div> <!-- end of container -->
    </div>
    <!-- End of Main and Mobile Navigation -->
</header>
<!-- End of Header -->