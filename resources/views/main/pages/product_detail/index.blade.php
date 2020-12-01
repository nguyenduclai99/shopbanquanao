@extends('main.index')

@section('content')
<div class="breadcrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-12">
                <nav class="breadcrumb">
                    <a class="breadcrumb-item" href="{{route('get.home')}}">Home</a>
                    <a class="breadcrumb-item" href="{{route('get.product.list')}}">Shop</a>
                    <span class="breadcrumb-item active">{{$product->pro_name}}</span>
                </nav>
            </div>
        </div> <!-- end of row -->
    </div> <!-- end of container -->
</div>
<!-- End of Breadcrumbs -->

<!-- Start of Main Content Wrapper -->
<div id="content" class="main-content-wrapper">
    
    <!-- Start of Main Product Wrapper -->
    <div class="main-product-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                    <main id="primary" class="site-main">
                        @if(isset($product))
                            <div class="single-product-wrapper">
                                <div class="row">
                                    <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                                        <div class="product-gallery">
                                            <div class="gallery-with-thumbs">
                                                <div class="product-full-image main-slider image-popup">
                                                    <div class="swiper-wrapper">
                                                        <figure class="swiper-slide">
                                                            <a href="{{pare_url_file($product->pro_avatar)}}" data-size="800x800">
                                                                <img src="{{pare_url_file($product->pro_avatar)}}" alt="Product Image">
                                                                <div class="image-overlay"><i class="pe-7s-expand1"></i></div>
                                                            </a>
                                                            <figcaption class="visually-hidden">
                                                                <span>{{$product->pro_name}}</span>
                                                            </figcaption>
                                                    </div>
                                                </div> 
                                            </div> <!-- end of gallery-with-thumbs -->
                                        </div> <!-- end of product-gallery -->
                                    </div>
                                    <div class="col-12 col-md-6 col-lg-6">
                                        <div class="product-details">
                                            <h3 class="product-name">{{$product->pro_name}}</h3>
                                            <div class="product-ratings d-flex">
                                                <ul class="rating d-flex mr-4">
                                                    <li><i class="fa fa-star"></i></li>
                                                    <li><i class="fa fa-star"></i></li>
                                                    <li><i class="fa fa-star-o"></i></li>
                                                    <li><i class="fa fa-star-o"></i></li>
                                                    <li><i class="fa fa-star-o"></i></li>
                                                </ul>
                                                <ul class="comments-advices list-inline d-flex">
                                                    <li class="list-inline-item mr-3">
                                                        <a href="#">{{$product->pro_view}} Lượt xem</a>
                                                    </li>
                                                    <li class="list-inline-item">
                                                        <a href="#">Bình Luận</a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="product-price">
                                                <p class="d-flex align-items-center">
                                                    @if ($product->pro_sale == 0)
                                                        <span class="price-new">{{number_format($product->pro_price,0,',','.')}} VNĐ</span>
                                                    @elseif($product->pro_sale)
                                                        @php
                                                            $price = $product->pro_price - ((($product->pro_price) * $product->pro_sale) / 100);
                                                        @endphp
                                                        <span class="price-old">{{number_format($product->pro_price,0,',','.')}} VNĐ</span>
                                                        <span class="price-new">{{number_format($price ,0,',','.')}} VNĐ</span>
                                                        <span class="price-discount">-{{$product->pro_sale}}%</span>
                                                    @endif
                                                </p>
                                            </div>
                                            <div class="product-meta">
                                                <ul class="list-unstyled">
                                                    @if (isset($product->category->c_name))
                                                        <li>Danh Mục <a href="{{ route('get.category.list', $product->category->c_slug) .'-'. $product->pro_category_id }}"><span>{{$product->category->c_name}}</span></a></li>
                                                    @endif
                                                    <li>Số Lượng: <span>{{$product->pro_quantity}}</span></li>
                                                </ul>
                                            </div>
                                            <div class="product-description">
                                                <p>{{$product->pro_description}}</p>
                                            </div>
                                            <div class="widget-container mt-4">
                                                @if (isset($product->keywords))
                                                    <div class="widget-content">
                                                        <div class="tags-widget">
                                                            @foreach ($product->keywords as $keyword)
                                                                <ul>
                                                                    <li><a href="#">{{ $keyword->k_name}}</a></li>
                                                                </ul>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                @endif
                                            </div>
                                            <div class="product-actions">
                                                <div class="product-stock">
                                                {{-- <label>Số Lượng</label> --}}
                                                    <ul class="d-flex flex-wrap align-items-center">
                                                        {{-- <li class="box-quantity">
                                                            <form action="#">
                                                                <input class="quantity" type="number" min="1" value="1">
                                                            </form>
                                                        </li> --}}
                                                        <li>
                                                            <a href="{{ route('get.shopping.add', $product->id) }}" type="button" class="default-btn">Thêm vào giỏ</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div> <!-- end of product-details -->
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-12 col-sm-12 col-md-12">
                                        <div class="product-info mt-full">
                                            <ul class="nav nav-pills justify-content-center" id="pills-tab" role="tablist">
                                                <li class="nav-item mr-4">
                                                    <a class="nav-link active" id="nav_desctiption" data-toggle="pill" href="#tab_description" role="tab" aria-controls="tab_description" aria-selected="true">Mô Tả</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" id="nav_review" data-toggle="pill" href="#tab_review" role="tab" aria-controls="tab_review" aria-selected="false">Bình Luận </a>
                                                </li>
                                            </ul>
                                            <div class="tab-content">
                                                <div class="tab-pane fade show active" id="tab_description" role="tabpanel" aria-labelledby="nav_desctiption">
                                                    <p>{!! $product->pro_content !!}</p>
                                                </div>
                                                <div class="tab-pane fade" id="tab_review" role="tabpanel" aria-labelledby="nav_review">
                                                    <div class="product-review">
                                                        <div class="customer-review">
                                                            <table class="table table-striped table-bordered">
                                                                <tbody>
                                                                    <tr>
                                                                        <td><strong>No name</strong></td>
                                                                        <td>09/04/2019</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td colspan="2">
                                                                            <p>Nunc facilisis sagittis ullamcorper. Proin lectus ipsum, gravida et mattis vulputate, tristique ut lectus. Sed et lorem nunc. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae</p>
                                                                            <div class="product-ratings d-flex justify-content-center">
                                                                                <ul class="rating d-flex mr-4">
                                                                                    <li><i class="fa fa-star"></i></li>
                                                                                    <li><i class="fa fa-star"></i></li>
                                                                                    <li><i class="fa fa-star-o"></i></li>
                                                                                    <li><i class="fa fa-star-o"></i></li>
                                                                                    <li><i class="fa fa-star-o"></i></li>
                                                                                </ul>
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                            <table class="table table-striped table-bordered">
                                                                <tbody>
                                                                    <tr>
                                                                        <td><strong>John Doe</strong></td>
                                                                        <td>23/04/2019</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td colspan="2">
                                                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rerum iusto reiciendis, vitae porro, unde hic debitis, velit facere culpa et nisi adipisci quis in aliquam dolore iure. Iure, dolore praesentium!</p>
                                                                            <div class="product-ratings d-flex justify-content-center">
                                                                                <ul class="rating d-flex mr-4">
                                                                                    <li><i class="fa fa-star"></i></li>
                                                                                    <li><i class="fa fa-star"></i></li>
                                                                                    <li><i class="fa fa-star"></i></li>
                                                                                    <li><i class="fa fa-star"></i></li>
                                                                                    <li><i class="fa fa-star-o"></i></li>
                                                                                </ul>
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div> <!-- end of customer-review -->
                                                        <form action="#" class="review-form">
                                                            <h2>Bình Luận</h2>
                                                            <div class="form-group row">
                                                                <div class="col">
                                                                    <label class="col-form-label"><span class="text-danger">*</span> Tên</label>
                                                                    <input type="text" class="form-control" required>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <div class="col">
                                                                    <label class="col-form-label"><span class="text-danger">*</span> Nội Dung </label>
                                                                    <textarea class="form-control" required></textarea>
                                                                    <div class="help-block"><span class="text-danger">Note:</span></div>
                                                                </div>
                                                            </div>
                                                            <div class="buttons d-flex justify-content-end">
                                                                <button class="default-btn" type="submit">Xác Nhận</button>
                                                            </div>
                                                        </form> <!-- end of review-form -->
                                                    </div> <!-- end of product-review -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> 
                        @endif
                    </main> 
                </div>
            </div> 
        </div> 
    </div>
    <!-- End of Main Product Wrapper -->

    <!-- Start of Related Products -->
    <section class="related-products">
        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-12 col-md-12">
                    <div class="section-title left-aligned with-border">
                        <h2>Sản Phẩm Liên Quan</h2>
                    </div>
                    <div class="latest-product-wrapper pos-r">
                        <div class="product-carousel" data-visible-slide="4" data-visible-lg-slide="4" data-visible-md-slide="3" data-visible-sm-slide="2" data-loop="true" data-speed="1000">

                            <!-- Slides -->
                            <div class="swiper-wrapper">
                                @if (isset($productSuggests))
                                    @foreach ($productSuggests as $data)
                                    
                                    @include('main.components.product_item')

                                    @endforeach
                                @endif
                            </div> <!-- end of swiper-wrapper -->

                            <!-- Navigation -->
                            <div class="swiper-arrow next"><i class="fa fa-angle-right"></i></div>
                            <div class="swiper-arrow prev"><i class="fa fa-angle-left"></i></div>
                        </div> <!-- end of product-carousel -->
                    </div> <!-- end of latest-product-wrapper -->
                </div>
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </section>
    <!-- End of Related Products -->

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
<script src="{{asset('assets/js/product-details.js')}}"></script>
@endsection