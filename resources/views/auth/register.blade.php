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
                                            <h2>Đăng kí tài khoản</h2>
                                        </div>
                                    </div>
                                </div> <!-- end of row -->

                                <div class="row">
                                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-8 offset-xl-2">
                                        <div class="registration-form login-form mt-half">
                                            <form role="form" method="POST" action="">
                                                @csrf
                                                <div class="login-info mb-half">
                                                    <p>Đã có tài khoản? <a href="{{route('get.login')}}">Đăng nhập tại đây!</a></p>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="name" class="col-12 col-sm-12 col-md-4 col-form-label">Tên</label>
                                                    <div class="col-12 col-sm-12 col-md-8 col-lg-8">
                                                        <input type="text" class="form-control" id="name" name="name" required="" value="{{ old('name')}}">
                                                        @if ($errors->first('name'))
                                                            <span class="text-danger">{{ $errors->first('name') }}</span> 
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="email" class="col-12 col-sm-12 col-md-4 col-form-label">Email</label>
                                                    <div class="col-12 col-sm-12 col-md-8 col-lg-8">
                                                        <input type="email" class="form-control" id="email" autocomplete="email" name="email" required="" value="{{ old('email')}}">
                                                        @if ($errors->first('email'))
                                                            <span class="text-danger">{{ $errors->first('email') }}</span> 
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="phone" class="col-12 col-sm-12 col-md-4 col-form-label">Số điện thoại</label>
                                                    <div class="col-12 col-sm-12 col-md-8 col-lg-8">
                                                        <input type="number" class="form-control" id="phone" name="phone" required="" value="{{ old('phone')}}">
                                                        @if ($errors->first('phone'))
                                                            <span class="text-danger">{{ $errors->first('phone') }}</span> 
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="password" class="col-12 col-sm-12 col-md-4 col-form-label">Mật khẩu</label>
                                                    <div class="col-12 col-sm-12 col-md-8 col-lg-8">
                                                        <input type="password" class="form-control" id="password" name="password" required="">
                                                        {{-- <button class="pass-show-btn" type="button">Show</button> --}}
                                                        @if ($errors->first('password'))
                                                            <span class="text-danger">{{ $errors->first('password') }}</span> 
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="c-password" class="col-12 col-sm-12 col-md-4 col-form-label">Nhập lại mật khẩu</label>
                                                    <div class="col-12 col-sm-12 col-md-8 col-lg-8">
                                                        <input type="password" class="form-control" id="c-password" name="c-password" required="">
                                                        {{-- <button class="pass-show-btn" type="button">Show</button> --}}
                                                        @if ($errors->first('c-password'))
                                                            <span class="text-danger">{{ $errors->first('c-password') }}</span> 
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="register-box d-flex justify-content-center mt-half">
                                                    <button type="submit" class="default-btn tiny-btn">Đăng kí</button>
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

        <!-- Start of Newsletter Section -->
        <section class="newsletter-section vpadding bgc-offset">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-12 col-sm-12 col-md-12 col-lg-7">
                        <div class="newsletter-title d-lg-flex justify-content-lg-start">
                            <h6>Subscribe to our Newsletter</h6>
                            <h3>Subscribe to our newsletter and know first about all the promotions and discounts. Be always trendy.</h3>
                        </div>
                    </div>
                    <div class="col-12 col-sm-12 col-md-12 col-lg-5">
                        <div class="newsletter-form-wrapper">
                            <form action="http://d29u17ylf1ylz9.cloudfront.net/ororus-v1/index.html" method="post">
                                <input type="email" name="email" placeholder="Enter you email address here..." value="" required> 
                                <input type="submit" class="default-btn" name="contact" value="Subscribe">
                            </form>
                        </div>
                    </div>
                </div> <!-- end of row -->
            </div> <!-- end of container -->
        </section>
        <!-- End of Newsletter Section -->
    </div>
    <!-- End of Login Wrapper -->

</div>
@endsection
