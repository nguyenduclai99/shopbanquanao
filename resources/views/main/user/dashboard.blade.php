@extends('main.index')

@section('content')

@include('main.components.breadcrum')

<div id="content" class="main-content-wrapper">
            
    <!-- Start of My Account Wrapper -->
    <div class="my-account-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                    <main id="primary" class="site-main">
                        <div class="user-dashboard">
                            <div class="user-info">
                                <div class="row align-items-center no-gutters">
                                   <div class="col-12 col-sm-12 col-md-6 col-lg-3 col-xl-3">
                                       <div class="single-info">
                                           <p class="user-name">Xin Chào <span>{{Auth::user()->name}}</span> <br>(Không phải {{Auth::user()->name}}? <a class="log-out" href="{{route('get.logout')}}">Đăng Xuất</a>)</p>
                                       </div>
                                   </div>
                                   <div class="col-12 col-sm-12 col-md-6 col-lg-4 col-xl-3">
                                       <div class="single-info">
                                           <p>Need Assistance? Customer service at <a href="mailto:vuquangnam51@gmail.com">vuquangnam51@gmail.com</a></p>
                                       </div>
                                   </div>
                                   <div class="col-12 col-sm-12 col-md-6 col-lg-3 col-xl-3">
                                       <div class="single-info">
                                           <p>E-mail them at <a href="mailto:vuquangnam51@gmail.com">vuquangnam51@gmail.com</a></p>
                                       </div>
                                   </div>
                                   <div class="col-12 col-sm-12 col-md-6 col-lg-2 col-xl-3">
                                       <div class="single-info text-lg-center">
                                           <a class="btn btn-secondary" href="{{ route('get.shopping.list') }}">Xem Giỏ Hàng</a>
                                       </div>
                                   </div>
                               </div> <!-- end of row -->
                            </div> <!-- end of user-info -->

                            <div class="main-dashboard">
                                <div class="row">
                                    <div class="col-12 col-sm-12 col-md-12 col-lg-2">
                                        <ul class="nav flex-column dashboard-list" role="tablist">
                                            <li><a class="nav-link active" data-toggle="tab" href="#dashboard">Hồ sơ</a></li>
                                            <li><a class="nav-link" data-toggle="tab" href="#orders">Đơn Hàng</a></li>
                                            <li><a class="nav-link" data-toggle="tab" href="#account-details">Cập nhật hồ sơ</a></li>
                                            <li><a class="nav-link" href="{{ route('get.logout') }}">Đăng Xuất</a></li>
                                        </ul> <!-- end of dashboard-list -->
                                    </div>

                                    <div class="col-12 col-sm-12 col-md-12 col-lg-10">
                                        <!-- Tab panes -->
                                        <div class="tab-content dashboard-content">
                                            <div id="dashboard" class="tab-pane fade show active">
                                                <h3>Thông tin hồ sơ</h3>
                                                <div class="form-group row">
                                                    <label class="col-12 col-sm-12 col-md-4 col-lg-3 col-form-label">Họ tên:</label>
                                                    <label class="col-12 col-sm-12 col-md-4 col-lg-3 col-form-label">{{$info->name}}</label>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="email" class="col-12 col-sm-12 col-md-4 col-lg-3 col-form-label">Email:</label>
                                                    <label class="col-12 col-sm-12 col-md-4 col-lg-3 col-form-label">{{$info->email}}</label>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="phone" class="col-12 col-sm-12 col-md-4 col-lg-3 col-form-label">Số Điện Thoại:</label>
                                                    <label class="col-12 col-sm-12 col-md-4 col-lg-3 col-form-label">{{$info->phone}}</label>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="phone" class="col-12 col-sm-12 col-md-4 col-lg-3 col-form-label">Địa Chỉ:</label>
                                                    <label class="col-12 col-sm-12 col-md-4 col-lg-3 col-form-label">{{$info->address}}</label>
                                                </div>
                                            </div> <!-- end of tab-pane -->

                                            <div id="orders" class="tab-pane fade">
                                                <h3>Đơn Hàng</h3>
                                                <div class="table-responsive">
                                                    <table class="table">
                                                        <thead>
                                                            <tr>
                                                                <th>#</th>
                                                                <th>Ngày</th>
                                                                <th>Trạng Thái</th>
                                                                <th>Tổng Tiền</th>
                                                                <th></th>                
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @php
                                                                $i =1;
                                                            @endphp
                                                            @foreach ($transaction as $data)
                                                            <tr>
                                                                <td>{{$i++}}</td>
                                                                <td>{{$data->created_at}}</td>
                                                                <td>
                                                                    <label class="btn {{ $data->getStatus($data->tst_status)['class'] }} btn-sm">{{ $data->getStatus($data->tst_status)['name'] }}</label>
                                                                </td>
                                                                <td>{{ number_format($data->tst_total_money,0,',','.') }} VNĐ</td>
                                                                <td><a class="btn btn-secondary" href="{{route('get.transaction',$data->id)}}">Xem</a></td>
                                                            </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div> <!-- end of tab-pane -->

                                            <div id="account-details" class="tab-pane fade">
                                                <h3>Thông Tin Cá Nhân </h3>
                                                <div class="login-form">
                                                    <form action="" method="POST">
                                                        @csrf
                                                        <div class="form-group row">
                                                            <label class="col-12 col-sm-12 col-md-4 col-lg-3 col-form-label">Họ tên:</label>
                                                            <div class="col-12 col-sm-12 col-md-8 col-lg-6">
                                                                <input type="text" class="form-control" name="name" required>
                                                                @if ($errors->first('name'))
                                                                    <span class="text-danger w-100">{{ $errors->first('name') }}</span> 
                                                                @endif
                                                            </div>
                                                            
                                                        </div>
                                                        <div class="form-group row">
                                                            <label for="email" class="col-12 col-sm-12 col-md-4 col-lg-3 col-form-label">Email:</label>
                                                            <div class="col-12 col-sm-12 col-md-8 col-lg-6">
                                                                <input type="email" class="form-control" name="email" id="email" required autocomplete="email">
                                                                @if ($errors->first('email'))
                                                                    <span class="text-danger w-100">{{ $errors->first('email') }}</span> 
                                                                @endif
                                                            </div>
                                                           
                                                        </div>
                                                        <div class="form-group row">
                                                            <label for="phone" class="col-12 col-sm-12 col-md-4 col-lg-3 col-form-label">Số Điện Thoại:</label>
                                                            <div class="col-12 col-sm-12 col-md-8 col-lg-6">
                                                                <input type="number" class="form-control" name="phone" id="phone" required>
                                                                @if ($errors->first('phone'))
                                                                    <span class="text-danger w-100">{{ $errors->first('phone') }}</span> 
                                                                @endif
                                                            </div>
                                                            
                                                        </div>
                                                        <div class="form-group row">
                                                            <label for="phone" class="col-12 col-sm-12 col-md-4 col-lg-3 col-form-label">Địa Chỉ:</label>
                                                            <div class="col-12 col-sm-12 col-md-8 col-lg-6">
                                                                <input type="text" class="form-control" name="address" id="address" required>
                                                                @if ($errors->first('address'))
                                                                    <span class="text-danger w-100">{{ $errors->first('address') }}</span> 
                                                                @endif
                                                            </div>
                                                        </div>

                                                        <div class="register-box d-flex justify-content-center mt-half">
                                                            <button type="submit" class="btn btn-secondary">Lưu thông tin</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div> <!-- end of tab-pane -->                                        
                                        </div>
                                    </div>
                                </div> <!-- end of row -->
                            </div> <!-- end of main-dashboard -->
                        </div> <!-- end of user-dashboard -->
                    </main> <!-- end of #primary -->
                </div>
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </div>
    <!-- End of My Account Wrapper -->

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

@endsection