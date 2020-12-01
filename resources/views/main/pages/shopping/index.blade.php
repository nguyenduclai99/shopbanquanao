@extends('main.index')

@section('content')

@include('main.components.breadcrum')

<div id="content" class="main-content-wrapper">
            
    <!-- Start of Shopping Cart Wrapper -->
    <div class="shopping-cart-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                    <main id="primary" class="site-main">
                        <div class="shopping-cart">
                            <div class="row">
                                <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                                    @if (\Cart::content()->isEmpty())
                                        <div class="cart-accordion-wrapper">
                                            <h2>Chưa có sản phẩm nào trong giỏ hàng?</h2>
                                            <p>Nhấn vào nút dưới đây để mua thêm sản phẩm khác.</p>
                                        </div>
                                        <div class="cart-button-wrapper d-flex justify-content-between mt-4">
                                            <a href="{{route('get.product.list')}}" class="btn btn-secondary">Mua ngay</a>
                                        </div>
                                    @else
                                        <div class="section-title left-aligned with-border">
                                            <h2>Giỏ Hàng</h2>
                                        </div>
                                        <div class="table-responsive">
                                            <table class="table table-bordered">
                                                <thead>
                                                    <tr>
                                                        <td>STT</td>
                                                        <td>Hình Ảnh</td>
                                                        <td style="width:35%;">Tên Sản Phẩm</td>
                                                        <td style="width:15%;">Số Lượng</td>
                                                        <td>Giá sản phẩm</td>
                                                        <td>Giảm Giá</td>
                                                        <td>Đơn Giá</td>
                                                        <td>Tổng</td>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @php
                                                        $i = 1;
                                                    @endphp
                                                    @foreach ($shopping as $key => $data)
                                                    <tr>
                                                        <td>{{$i++}}</td>
                                                        <td>
                                                        <a href="{{route('get.product.detail', $data->options->slug.'-'.$data->id)}}"><img src="{{pare_url_file($data->options->image)}}" alt="Cart Product Image" title="Cas Meque Metus" class="img-thumbnail"></a>
                                                        </td>
                                                        <td>
                                                            <a href="{{route('get.product.detail',$data->options->slug.'-'.$data->id)}}">{{$data->name}}</a>
                                                            {{-- <span>Delivery Date: 2018-04-22</span>
                                                            <span>Color: Blue</span>
                                                            <span>Reward Points: 300</span> --}}
                                                        </td>
                                                        <td>
                                                            <div class="input-group btn-block">
                                                                <input id="number" type="number" name="qty" value="{{$data->qty}}" min="0" size="1" class="form-control">
                                                                <a href="{{ route('ajax_get.shopping.update',$key)}}" type="button" data-id-product="{{$data->id}}" class="btn btn-primary js-update-item" data-original-title="Update"><i class="fa fa-refresh"></i></a>
                                                                <a href="{{ route('get.shopping.delete',$key)}}" type="button" class="btn btn-danger pull-right" data-original-title="Remove"><i class="fa fa-times-circle"></i></a>
                                                            </div>
                                                        </td>
                                                        <td>{{number_format($data->options->price_old,0,',','.')}} VNĐ</td>
                                                        <td>{{$data->options->sale}}%</td>
                                                        <td>{{$data->price}} VNĐ</td>
                                                        <td>{{number_format($data->price * $data->qty ,0,',','.')}} VNĐ</td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>    
                                        </div>
                                        <form role="form" action="{{route('post.shopping.pay')}}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <div class="cart-accordion-wrapper mt-full">
                                                <h2>Thông Tin Đặt Hàng</h2>
                                                <p>Vui lòng điền đầy đủ thông tin đặt hàng trước khi thanh toán</p>
                                                <div id="cart_accordion" class="mt-4" role="tablist">
                                                    <div class="card">
                                                        <div class="card-header" role="tab" id="headingInfo">
                                                            <h4 class="mb-0">
                                                                <a data-toggle="collapse" href="#collapseInfo" aria-expanded="false" aria-controls="collapseInfo">Thông Tin<i class="ion ion-ios-arrow-down"></i></a>
                                                            </h4>
                                                        </div>
                                                        <div id="collapseInfo" class="collapse show" role="tabpanel" aria-labelledby="headingInfo" data-parent="#cart_accordion">
                                                            <div class="card-body">
                                                                <div class="input-group form-group">
                                                                    <label class="col-12 col-sm-12 col-md-3" for="input-name"><span class="text-danger">*</span>Họ và tên</label>
                                                                    <div class="col-12 col-sm-12 col-md-9">
                                                                        <div class="input-group">
                                                                            <input type="text" name="tst_name" required value="{{get_data_user('web','name')}}" placeholder="Nhập họ và tên" id="input-name" class="form-control">
                                                                            <br>
                                                                            @if ($errors->first('tst_name'))
                                                                                <span class="text-danger w-100">{{ $errors->first('tst_name') }}</span> 
                                                                            @endif                                                            
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="input-group form-group">
                                                                    <label class="col-12 col-sm-12 col-md-3" for="input-phone"><span class="text-danger">*</span>Điện Thoại</label>
                                                                    <div class="col-12 col-sm-12 col-md-9">
                                                                        <div class="input-group">
                                                                            <input type="number" name="tst_phone" required value="{{get_data_user('web','phone')}}" placeholder="Nhập số điện thoại" id="input-phone" class="form-control">
                                                                            @if ($errors->first('tst_phone'))
                                                                                <span class="text-danger w-100">{{ $errors->first('tst_phone') }}</span> 
                                                                            @endif                                                            
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="input-group form-group">
                                                                    <label class="col-12 col-sm-12 col-md-3" for="input-address"><span class="text-danger">*</span>Địa Chỉ</label>
                                                                    <div class="col-12 col-sm-12 col-md-9">
                                                                        <div class="input-group">
                                                                            <input type="text" name="tst_address" required value="{{get_data_user('web','address')}}"  placeholder="Nhập địa chỉ" id="input-address" class="form-control">
                                                                            @if ($errors->first('tst_address'))
                                                                                <span class="text-danger w-100">{{ $errors->first('tst_address') }}</span> 
                                                                            @endif                                                            
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="input-group form-group">
                                                                    <label class="col-12 col-sm-12 col-md-3" for="input-email"><span class="text-danger">*</span>Email</label>
                                                                    <div class="col-12 col-sm-12 col-md-9">
                                                                        <div class="input-group">
                                                                            <input type="email" name="tst_email" required value="{{get_data_user('web','email')}}"  autocomplete="email" placeholder="Nhập địa chỉ email" id="input-email" class="form-control">
                                                                            @if ($errors->first('tst_email'))
                                                                                <span class="text-danger w-100">{{ $errors->first('tst_email') }}</span> 
                                                                            @endif                                                            
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="input-group form-group">
                                                                    <label class="col-12 col-sm-12 col-md-3" for="input-email">Ghi chú</label>
                                                                    <div class="col-12 col-sm-12 col-md-9">
                                                                        <div class="input-group">
                                                                            <textarea type="text" name="tst_note" value="" placeholder="Nhập ghi chú" id="input-note" class="form-control"></textarea>
                                                                            @if ($errors->first('tst_note'))
                                                                                <span class="text-danger w-100">{{ $errors->first('tst_note') }}</span> 
                                                                            @endif                                                            
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="cart-amount-wrapper">
                                                <div class="row">
                                                    <div class="col-12 col-sm-12 col-md-4 offset-md-8">
                                                        <table class="table table-bordered">
                                                            <tbody>
                                                                <tr>
                                                                    <td><strong>Tổng Tiền:</strong></td>
                                                                    <td><span class="primary-color">{{ \Cart::subtotal(0)}}</span></td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="cart-button-wrapper d-flex justify-content-between mt-4">
                                                <a href="{{route('get.home')}}" class="btn btn-secondary">Tiếp Tục Mua Hàng</a>
                                                
                                                <button type="submit" class="btn btn-secondary align-self-end">Đặt Hàng</button>
                                            </div>
                                        </form>
                                    @endif
                                </div>
                            </div>
                        </div> <!-- end of shopping-cart -->
                    </main> <!-- end of #primary -->
                </div>
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </div>    
</div>

<script>
    $(function(){
        $(".js-update-item").click(function(event){
            event.preventDefault();
            let $this = $(this);
            let url = $this.attr('href');
            let qty = $this.prev().val();
            let idProduct = $this.attr('data-id-product');
            
            if(url) {
                $.ajax({
                    url: url,
                    data: {
                        qty:qty,
                        idProduct:idProduct
                    }
                })
                .done(function(results){
                    alert(results.messages);
                    window.location.reload();
                })
            }
        })
    })

    var number = document.getElementById('number');

    // Listen for input event on numInput.
    number.onkeydown = function(e) {
        if(!((e.keyCode > 95 && e.keyCode < 106)
        || (e.keyCode > 47 && e.keyCode < 58) 
        || e.keyCode == 8)) {
            return false;
        }
    }
</script>

@endsection