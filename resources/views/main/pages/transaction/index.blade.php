@extends('main.index')

@section('content')

@include('main.components.breadcrum')

<div id="content" class="main-content-wrapper">
            
    <!-- Start of Checkout Wrapper -->
    <div class="checkout-wrapper shopping-cart-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                    <main id="primary" class="site-main">
                        <div class="checkout-area">
                            <div class="row">
                                <div class="col-12 col-sm-12 col-md-12">
                                    <div class="checkout-form">
                                        <div class="section-title left-aligned with-border">
                                            <h2>Thông tin khách hàng</h2>
                                        </div>

                                        <div class="table-responsive">
                                            <table class="">
                                                <tbody>
                                                    <tr>
                                                        <td>Họ tên:</td>
                                                        <td>{{$info->tst_name}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Email:</td>
                                                        <td>{{$info->tst_email}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Điện thoại:</td>
                                                        <td>{{$info->tst_phone}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Địa chỉ:</td>
                                                        <td>{{$info->tst_address}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Ghi chú:</td>
                                                        <td>{{$info->tst_note}}</td>
                                                    </tr>
                                                </tbody>
                                            </table>    
                                        </div>
                                    </div> 
                                </div>
                                <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                                    <div class="section-title left-aligned with-border mt-4">
                                        <h2>Thông tin đặt hàng</h2>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <td>STT</td>
                                                    <td>Hình Ảnh</td>
                                                    <td style="width:35%;">Tên Sản Phẩm</td>
                                                    <td>Số Lượng</td>
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
                                                @foreach ($productOrder as $data)
                                                <tr>
                                                    <td>{{$i++}}</td>
                                                    <td>
                                                    <a href="{{route('get.product.detail', $data->product->pro_slug.'-'.$data->product->id)}}"><img src="{{pare_url_file($data->product->pro_avatar)}}" alt="Cart Product Image" title="Cas Meque Metus" class="img-thumbnail"></a>
                                                    </td>
                                                    <td>
                                                        <a href="{{route('get.product.detail', $data->product->pro_slug.'-'.$data->product->id)}}">{{$data->product->pro_name}}</a>
                                                    </td>
                                                    <td>{{$data->od_qty}}</td>
                                                    <td>{{number_format($data->product->pro_price,0,',','.')}} VNĐ</td>
                                                    <td>{{$data->product->pro_sale}}%</td>
                                                    @php
                                                        $price = number_price($data->product->pro_price, $data->product->pro_sale);
                                                        $total_price = $price * $data->od_qty;
                                                        $total_all = 0;
                                                        
                                                    @endphp
                                                    <td>{{$price}} VNĐ</td>
                                                    <td>{{number_format($total_price ,0,',','.')}} VNĐ</td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>    
                                    </div>
                                    <div class="cart-amount-wrapper">
                                        <div class="row">
                                            <div class="col-12 col-sm-12 col-md-4 offset-md-8">
                                                <table class="table table-bordered">
                                                    <tbody>
                                                        <tr>
                                                            <td><strong>Tổng:</strong></td>
                                                            <td><span class="primary-color">{{number_format($info->tst_total_money,0,',','.')}} VNĐ</span></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> <!-- end of row -->
                        </div> 
                    </main> 
                </div>
            </div> 
        </div> 
    </div>
</div>

@endsection