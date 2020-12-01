@extends('main.index')

@section('content')

@include('main.components.breadcrum')

<!-- Start of Main Content Wrapper -->
<div id="content" class="main-content-wrapper">
    
    <!-- Start of Shop Products Wrapper -->
    <div class="shop-products-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-12 col-md-12 col-lg-9 order-1 order-md-1 order-lg-2">
                    <main id="primary" class="site-main">
                        <div class="shop-wrapper">
                           <div class="row">
                                <div class="col-12 col-sm-12 col-md-12">
                                    <div class="shop-toolbar">
                                        <div class="toolbar-inner">
                                            <div class="product-view-mode">
                                                <ul role="tablist" class="nav shop-item-filter-list">
                                                    <li role="presentation" class="active"><a href="#grid" aria-controls="grid" role="tab" data-toggle="tab" class="active show" aria-selected="true"><i class="ion-md-grid"></i></a></li>
                                                    <li role="presentation"><a href="#list" aria-controls="list" role="tab" data-toggle="tab"><i class="ion-md-list"></i></a></li>
                                                    @if (isset($url))
                                                        <li role="presentation"><a href="{{$url}}"><i class="ion-ios-refresh"></i></a></li>
                                                    @endif
                                                </ul>
                                            </div>
                                            <div class="toolbar-amount">
                                                <span>Tổng số {{$products->total()}} sản phẩm </span>
                                            </div>

                                        </div>
                                        <div class="product-select-box">
                                            <div class="product-sort">
                                                <p>Sắp xếp theo:</p>
                                                <select class="nice-select sort-product" onchange="location = this.value;" name="sortby">
                                                    <option value="">Default</option>
                                                    <option {{ Request::get('sortby') == "newest" ? "selected='selected'" : "" }} value="{{ request()->fullUrlWithQuery(['sortby'=>'newest']) }}">Mới nhất</option>
                                                    <option {{ Request::get('sortby') == "asc" ? "selected='selected'" : "" }} value="{{ request()->fullUrlWithQuery(['sortby'=>'asc']) }}">Tên (A - Z)</option>
                                                    <option {{ Request::get('sortby') == "desc" ? "selected='selected'" : "" }} value="{{ request()->fullUrlWithQuery(['sortby'=>'desc']) }}">Tên (Z - A)</option>
                                                    <option {{ Request::get('sortby') == "price_max" ? "selected='selected'" : "" }} value="{{ request()->fullUrlWithQuery(['sortby'=>'price_max']) }}">Giá tăng dần</option>
                                                    <option {{ Request::get('sortby') == "price_min" ? "selected='selected'" : "" }} value="{{ request()->fullUrlWithQuery(['sortby'=>'price_min']) }}">Giá giảm dần</option>
                                                    <option {{ Request::get('sortby') == "view" ? "selected='selected'" : "" }} value="{{ request()->fullUrlWithQuery(['sortby'=>'view']) }}">Lượt xem</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> <!-- end of row -->

                            <div class="row">
                                <div class="col-12 col-sm-12 col-md-12">
                                    <div class="shop-products-wrapper">
                                        <div class="tab-content">
                                            <div id="grid" class="tab-pane fade active show" role="tabpanel">
                                                <div class="row">
                                                    @if ($products->items() == [])
                                                        <div style="height:100px" class="error-wrapper text-center">
                                                            <div class="error-text">
                                                                <p>Không tồn tại sản phẩm.</p>
                                                            </div>
                                                        </div>

                                                    @else

                                                        @foreach ($products as $pro_duct)
                                                        <div class="product-layout product-grid col-6 col-sm-6 col-md-4 col-lg-4">
                                                            <div class="product-thumb">
                                                                <div class="product-inner">
                                                                    <div class="product-image">
                                                                        <a href="{{route('get.product.detail','san-pham-'.$pro_duct->id)}}">
                                                                            <img src="{{pare_url_file($pro_duct->pro_avatar)}}" alt="Proin Lectus Ipsum" title="{{$pro_duct->pro_avatar}}">
                                                                        </a>
                                                                        <div class="action-links">
                                                                            <a class="action-btn btn-cart" href="{{ route('get.shopping.add', $pro_duct->id) }}" title="Add to Cart"><i class="pe-7s-cart"></i></a>
                                                                            <a class="action-btn btn-wishlist" href="#" title="Add to Wishlist"><i class="pe-7s-like"></i></a>
                                                                            <a class="action-btn btn-compare" href="#" title="Add to Compare"><i class="pe-7s-refresh-2"></i></a>
                                                                            <a class="action-btn btn-quickview" data-toggle="modal" data-target="#product_quick_view" href="#" title="Quick View"><i class="pe-7s-search"></i></a>
                                                                        </div>
                                                                    </div> <!-- end of product-image -->

                                                                    <div class="product-caption">
                                                                        <div class="product-ratings">
                                                                            <div class="rating-box">
                                                                                <ul class="rating d-flex">
                                                                                    <li><i class="fa fa-star"></i></li>
                                                                                    <li><i class="fa fa-star"></i></li>
                                                                                    <li><i class="fa fa-star"></i></li>
                                                                                    <li><i class="fa fa-star"></i></li>
                                                                                    <li><i class="fa fa-star"></i></li>
                                                                                </ul>
                                                                            </div>
                                                                        </div>
                                                                        <h4 class="product-name"><a href="{{route('get.product.detail','san-pham-'.$pro_duct->id)}}">{{$pro_duct->pro_name}}</a></h4>
                                                                        <p class="product-price">
                                                                            @if ($pro_duct->pro_sale == 0)
                                                                                <span class="price-new">{{number_format($pro_duct->pro_price,0,',','.')}} VNĐ</span>
                                                                                @elseif($pro_duct->pro_sale)
                                                                                @php
                                                                                    $price = $pro_duct->pro_price - ((($pro_duct->pro_price) * $pro_duct->pro_sale) / 100);
                                                                                @endphp
                                                                                <span class="price-old">{{number_format($pro_duct->pro_price,0,',','.')}} VNĐ</span>
                                                                                <br>
                                                                                <span class="price-new">{{number_format($price,0,',','.')}} VNĐ</span>
                                                                            @endif
                                                                        </p>
                                                                    </div><!-- end of product-caption -->
                                                                </div><!-- end of product-inner -->
                                                            </div><!-- end of product-thumb -->
                                                        </div>
                                                        @endforeach
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div> <!-- end of shop-products-wrapper -->

                                    <div class="pagination-area">
                                        <div class="row align-items-center">
                                            <div class="col-lg-6 col-md-6">
                                                <ul class="pagination">
                                                    {{ $products->appends($query ?? [])->links() }}
                                                </ul>
                                            </div>
                                            <div class="col-lg-6 col-md-6">
                                                <div class="page-amount d-flex">
                                                    <p></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div> <!-- end of pagination-area -->
                                </div>
                            </div> <!-- end of row -->
                        </div> <!-- end of shop-wrapper -->
                    </main> <!-- end of #primary -->
                </div>
                <div class="col-12 col-sm-12 col-md-12 col-lg-3 order-2 order-md-2 order-lg-1">
                    
                    @include('main.pages.product_sidebar.index')

                </div>
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </div>
    <!-- End of Shop Products Wrapper -->

    <!-- Start of Newsletter Section -->
    {{-- <section class="newsletter-section vpadding bgc-offset">
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
    </section> --}}
    <!-- End of Newsletter Section -->
</div>
<!-- End of Main Content Wrapper -->

<script>
    $(function(){
        $('.sort-product').change(function(){
            $('#product-sort').submit();
        })
    })
</script>

@endsection