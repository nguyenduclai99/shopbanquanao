@extends('main.index')

@section('content')
<div class="breadcrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-12">
                <nav class="breadcrumb">
                    <a class="breadcrumb-item" href="{{route('get.home')}}">Home</a>
                    
                </nav>
            </div>
        </div> <!-- end of row -->
    </div> <!-- end of container -->
</div>
<div id="content" class="main-content-wrapper">
            
    <!-- Start of Login Wrapper -->
    <div class="login-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                    <main id="primary" class="site-main">
                        <div class="user-login">
                            <div class="row">
                                <div class="col-12 col-sm-12 col-md-12">
                                    <div class="section-title left-aligned with-border">
                                        <h2>Đăng Nhập</h2>
                                    </div>
                                </div>
                            </div> <!-- end of row -->

                            <div class="row">
                                <div class="col-12 col-sm-12 col-md-12 col-lg-8 col-xl-6 offset-lg-2 offset-xl-3">
                                    <div class="login-form mt-half">
                                        <form role="form" method="POST" action="">
                                            @csrf
                                            <div class="form-group row align-items-center mb-4">
                                                <label for="email" class="col-12 col-sm-12 col-md-4 col-form-label">Email:</label>
                                                <div class="col-12 col-sm-12 col-md-8">
                                                    <input type="text" class="form-control" id="email" name="email" placeholder="Nhập địa chỉ Email" required>
                                                    @if ($errors->first('email'))
                                                        <span class="text-danger">{{ $errors->first('email') }}</span> 
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group row align-items-center mb-4">
                                                <label for="password" class="col-12 col-sm-12 col-md-4 col-form-label">Mật khẩu</label>
                                                <div class="col-12 col-sm-12 col-md-8">
                                                    <input type="password" class="form-control" id="password"  name="password" placeholder="Password" required>
                                                    @if ($errors->first('password'))
                                                        <span class="text-danger">{{ $errors->first('password') }}</span> 
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="login-box mt-5 text-center">
                                                {{-- <p><a href="#">Forgot your password?</a></p> --}}
                                                <button type="submit" class="default-btn tiny-btn mt-4">Đăng Nhập</button>
                                            </div>
                                            <div class="text-center mt-half pt-half top-bordered">
                                                <p>Không có tài khoản? <a href="{{route('get.register')}}">Đăng kí ngay</a>.</p>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div> <!-- end of user-login -->
                    </main> <!-- end of #primary -->
                </div>
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </div>
    <!-- End of Login Wrapper -->

</div>
@endsection
