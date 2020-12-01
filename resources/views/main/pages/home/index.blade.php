@extends('main.index')

@section('content')

<!-- Start of Support Section -->
<section class="support-section mb0 mt-half">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-12 col-md-4 col-lg-4">
                <div class="feature-box media align-items-center">
                    <div class="feature-icon mr-4 mr-md-3 mr-lg-4"><i class="pe-7s-alarm"></i></div>
                    <div class="feature-content media-body">
                        <h2>Thứ 2 - Thứ 6 / 8:00 - 18:00</h2>
                        <p>Giờ mở cửa!</p>
                    </div>
                </div> <!-- end of feaure-box -->
            </div>
            <div class="col-12 col-md-4 col-lg-4">
                <div class="feature-box media align-items-center">
                    <div class="feature-icon mr-4 mr-md-3 mr-lg-4"><i class="pe-7s-car"></i></div>
                    <div class="feature-content media-body">
                        <h2>Hoàn Trả</h2>
                        <p>30 ngày hoàn trả!</p>
                    </div>
                </div> <!-- end of feaure-box -->
            </div>
            <div class="col-12 col-md-4 col-lg-4">
                <div class="feature-box media align-items-center">
                    <div class="feature-icon mr-4 mr-md-3 mr-lg-4"><i class="pe-7s-mail-open-file"></i></div>
                    <div class="feature-content media-body">
                        <h2>vuquanngam51@gmail.com</h2>
                        <p>Tư Vấn!</p>
                    </div>
                </div> <!-- end of feaure-box -->
            </div>
        </div>
    </div>
</section>
<!-- End of Support Section -->

<!-- Start of Primary Slider Section -->
<section class="primary-slider-section mb0">
    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-12 col-lg-8">
                <div id="primary_slider" class="swiper-container slider-type-3">

                    <!-- Slides -->
                    <div class="swiper-wrapper">
                        <div class="swiper-slide bg-img-wrapper">
                            <div class="slide-inner image-placeholder">
                                <img src="assets/images/slider/home-3/slide3.jpg" class="visually-hidden" alt="Slider Image">                          
                                <div class="container">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="slide-content layer-animation-1">
                                                {{-- <h1>Kz-es3</h1>
                                                <h2>Wireless Bluetooth Headphone</h2>                                                        
                                                <p><span>At a price</span><span class="secondary-color">$199</span></p>
                                                <div class="slide-button">
                                                    <a class="default-btn transparent" href="#" title="Shop Now">Chi tiết</a>
                                                </div> --}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="swiper-slide bg-img-wrapper">
                            <div class="slide-inner image-placeholder">
                                <img src="assets/images/slider/home-3/slide1.jpg" class="visually-hidden" alt="Slider Image">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="slide-content layer-animation-2">
                                                {{-- <h1>Saturn</h1>
                                                <h2>CCtv camera</h2>
                                                <p><span>Industry-leading image quality and video stram in all conditions</span></p>                                                        
                                                <div class="slide-button">
                                                    <a class="default-btn transparent" href="#" title="Shop Now">Chi tiết</a>
                                                </div> --}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </div>

                    <!-- Slider Navigation -->
                    <div class="swiper-pagination"></div>
                </div>
            </div>

            <div class="col-12 col-sm-12 col-md-12 col-lg-4 top-promo-banners">
                <div class="row">
                    <div class="col-6 col-sm-6 col-md-6 col-lg-12">
                        <div class="promo-banner hover-effect-1 first">
                            <a href="#">
                                <img src="assets/images/banners/banner1.jpg" alt="Promo Banner">
                            </a>
                        </div>
                    </div>

                    <div class="col-6 col-sm-6 col-md-6 col-lg-12">
                        <div class="promo-banner hover-effect-1 mb0">
                            <a href="#">
                                <img src="assets/images/banners/banner2.jpg" alt="Promo Banner">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End of Primary Slider Section -->

<!-- Start of Main Content Wrapper -->
<main id="content" class="main-content-wrapper">

    <!-- Start of Best Selling Section -->
    <section class="best-selling-section mt-full">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-12">
                    <div class="section-title left-aligned with-border">
                        <h2>Quan Tâm</h2>
                    </div>
                </div>
            </div> <!-- end of row -->

            <div class="row">
                <div class="col-12 col-md-12">
                    <div class="best-selling-wrapper pos-r">

                        <!-- Nav Pills -->
                        <ul class="nav nav-pills top-nav-pills mb-4 justify-content-center" id="best_products" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="nav_productnew" data-toggle="pill" href="#product_new" role="tab" aria-controls="product_new" aria-selected="true">New</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="nav_producthot" data-toggle="pill" href="#product_hot" role="tab" aria-controls="product_hot" aria-selected="false">Hot</a>
                            </li>
                        </ul> <!-- end of nav -->
                        
                        <!-- Tab Contents -->
                        <div class="best_products_contents tab-content" id="best_products_contents">
                            <div class="tab-pane fade show active" id="product_new" role="tabpanel" aria-labelledby="nav_productnew">
                                <div class="product-carousel with-border" data-visible-slide="5" data-visible-lg-slide="3" data-space-between="10" data-loop="true" data-speed="1000">

                                    <div class="swiper-wrapper">
                                        @if (isset($productsNew))
                                            @foreach ($productsNew as $data)
                                            
                                            @include('main.components.product_item')

                                            @endforeach
                                        @endif
                                    </div> 
                                    <div class="swiper-arrow top-nav next"><i class="fa fa-angle-right"></i></div>
                                    <div class="swiper-arrow top-nav prev"><i class="fa fa-angle-left"></i></div>
                                </div> 
                            </div> 

                            <div class="tab-pane fade" id="product_hot" role="tabpanel" aria-labelledby="nav_producthot">
                                <div class="product-carousel with-border" data-visible-slide="5" data-visible-lg-slide="3" data-space-between="10" data-loop="true" data-speed="1000">

                                    <div class="swiper-wrapper">
                                        @if (isset($productsHot))
                                            @foreach ($productsHot as $data)
                                            
                                            @include('main.components.product_item')

                                            @endforeach
                                        @endif
                                    </div> 

                                    <!-- Navigation -->
                                    <div class="swiper-arrow top-nav next"><i class="fa fa-angle-right"></i></div>
                                    <div class="swiper-arrow top-nav prev"><i class="fa fa-angle-left"></i></div>
                                </div> <!-- end of product-carousel -->
                            </div> <!-- end of tab-pane -->
                        </div> <!-- end of tab-content -->
                    </div> <!-- end of best-selling-wrapper -->
                </div>
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </section>
    <!-- End of Best Selling Section -->

    <!-- Start of Daily Deals Section -->
    <section class="daily-deals bgc-offset vpadding">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-12 col-sm-12 col-md-3 col-lg-3">
                    <div class="section-title type-2 left-aligned with-right-padding">
                        <h2>Daily Deals</h2>
                        <p class="subtitle">Shop our deals of the week, exclusively at Ororus</p>
                    </div>
                </div>
                <div class="col-12 col-sm-12 col-md-9 col-lg-9">
                    <div class="product-carousel" data-visible-slide="3" data-visible-lg-slide="2" data-visible-md-slide="2" data-loop="false" data-speed="1000">

                        <div class="swiper-wrapper">
                            @foreach ($productsDaiLy as $data)
                                <div class="swiper-slide product-layout product-grid">
                                    <div class="product-thumb">
                                        <div class="product-inner with-bottom-padding">
                                            <div class="product-image">
                                                @if ($data->pro_sale != 0)
                                                    <div class="label-product label-sale">-{{$data->pro_sale}}%</div>
                                                @endif
                                                <a href="{{route('get.product.detail',$data->pro_slug.'-'.$data->id)}}">
                                                    <img src="{{pare_url_file($data->pro_avatar)}}" alt="Proin Lectus Ipsum" title="Proin Lectus Ipsum">
                                                </a>
                                                <div class="action-links">
                                                    <a class="action-btn btn-cart" href="{{ route('get.shopping.add', $data->id) }}" title="Add to Cart"><i class="pe-7s-cart"></i></a>
                                                    <a class="action-btn btn-wishlist" href="#" title="Add to Wishlist"><i class="pe-7s-like"></i></a>
                                                    <a class="action-btn btn-compare" href="#" title="Add to Compare"><i class="pe-7s-refresh-2"></i></a>                                                </div>
                                                <div class="countdown-wrapper">
                                                    <div class="countdown-timer" data-countdown-year="2020" data-countdown-month="5" data-countdown-day="10"></div>
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
                                                <h4 class="product-name"><a href="{{route('get.product.detail',$data->pro_slug.'-'.$data->id)}}">{{$data->pro_name}}</a></h4>
                                                <p class="product-price">
                                                    @if ($data->pro_sale == 0)
                                                    <span class="price-new">{{number_format($data->pro_price,0,',','.')}} VNĐ</span>
                                                    @elseif($data->pro_sale)
                                                        @php
                                                            $price = $data->pro_price - ((($data->pro_price) * $data->pro_sale) / 100);
                                                        @endphp
                                                        <span class="price-old">{{number_format($data->pro_price,0,',','.')}} VNĐ</span>
                                                        <br>
                                                        <span class="price-new">{{number_format($price,0,',','.')}} VNĐ</span>
                                                    @endif
                                                </p>
                                            </div><!-- end of product-caption -->
                                        </div><!-- end of product-inner -->
                                    </div><!-- end of product-thumb -->
                                </div> 
                            @endforeach
                        </div> 

                        <div class="swiper-arrow next"><i class="fa fa-angle-right"></i></div>
                        <div class="swiper-arrow prev"><i class="fa fa-angle-left"></i></div>
                    </div> <!-- end of product-carousel -->
                </div>
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </section>
    <!--End of Daily Deals Section -->

    <!-- Start of Product Showcase Section -->
    <section class="product-showcase mb-half">
        <div class="container">
            <div class="row">
                <div class="product-mostivew col-12 col-sm-12 col-md-12 col-lg-9">
                    <div class="row">
                        <div class="col-7 col-sm-7 col-md-7 col-lg-8">
                            <div class="section-title left-aligned with-border">
                                <h2>Sản Phẩm Bán Chạy</h2>
                            </div>
                            <div class="product-carousel-wrapper pos-r mb-half">
                                <div class="product-carousel with-border with-narrow-margin" data-visible-slide="2" data-visible-lg-slide="2" data-visible-md-slide="1" data-visible-sm-slide="1" data-loop="true" data-speed="1000" data-space-between="20">

                                    <!-- Slides -->
                                    <div class="swiper-wrapper">
                                        <div class="swiper-slide product-layout product-list">
                                            @foreach (array_slice($productsPay,0,3) as $data)
                                                @include('main.components.product_item_pay')
                                            @endforeach
                                        </div> 

                                        <div class="swiper-slide product-layout product-list">
                                            @foreach (array_slice($productsPay,3,6) as $data)
                                                @include('main.components.product_item_pay')
                                            @endforeach
                                        </div>
                                        
                                    </div> 

                                    <!-- Navigation -->
                                    <div class="swiper-arrow top-nav next"><i class="fa fa-angle-right"></i></div>
                                    <div class="swiper-arrow top-nav prev"><i class="fa fa-angle-left"></i></div>
                                </div> <!-- end of product-carousel -->
                            </div> <!-- end of product-carousel-wrapper -->
                        </div>
                        <div class="col-5 col-sm-5 col-md-5 col-lg-4">
                            <div class="promo-banner hover-effect-2 mb-half mb-sm-half">
                                <a href="#">
                                    <img src="assets/images/banners/banner-13.jpg" alt="Promo Banner">
                                </a>
                            </div>
                        </div>
                    </div><!-- end of row -->
                </div> <!-- end of col -->

                <div class="col-12 col-sm-12 col-md-12 col-lg-3">
                    <div class="section-title left-aligned with-border">
                        <h2>New Arrivals</h2>
                    </div>
                    <div class="latest-product-wrapper pos-r">
                        <div class="product-carousel" data-visible-slide="1" data-visible-lg-slide="1" data-visible-md-slide="3" data-visible-sm-slide="2" data-loop="false" data-speed="1000">

                            <div class="swiper-wrapper">
                                @if (isset($productsHot))
                                    @foreach ($productsHot as $data)
                                    
                                    @include('main.components.product_item')

                                    @endforeach
                                @endif
                            </div> <!-- end of swiper-wrapper -->

                            <!-- Navigation -->
                            <div class="swiper-arrow top-nav next"><i class="fa fa-angle-right"></i></div>
                            <div class="swiper-arrow top-nav prev"><i class="fa fa-angle-left"></i></div>
                        </div> <!-- end of product-carousel -->
                    </div> <!-- end of latest-product-wrapper -->
                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </section>
    <!-- End of Product Showcase Section -->

    <!-- Start of Testimonial Section -->
    <section class="testimonial-section">
        <div class="container">
            <div class="row no-gutters with-border">
                <div class="col-12 col-sm-12 col-md-12 col-lg-6">
                    <div class="testimonials pos-r with-right-padding">
                        <div class="testimonial-container">

                            <!-- Slides -->
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <div class="testimonial-media" data-swiper-parallax="-100">
                                        <img src="assets/images/testimonial/testimonial-1.jpg" alt="Alva Ono">
                                    </div>
                                    <div class="testimonial-content" data-swiper-parallax="-500">
                                        <p>All Perfect !! I have three sites with magento , this theme is the best !! Excellent support , advice theme installation package , sorry for English, are Italian but I had no problem !! Thank you!</p>
                                        <div class="client-meta" data-swiper-parallax="-300">
                                            <h3 class="client-name">Alva Ono</h3>
                                        </div>
                                    </div>
                                </div> <!-- end of swiper-slide -->

                                <div class="swiper-slide">
                                    <div class="testimonial-media" data-swiper-parallax="-100">
                                        <img src="assets/images/testimonial/testimonial-2.jpg" alt="Dewey Tetzlaff">
                                    </div>
                                    <div class="testimonial-content" data-swiper-parallax="-500">
                                        <p>All Perfect !! I have three sites with magento , this theme is the best !! Excellent support , advice theme installation package , sorry for English, are Italian but I had no problem !! Thank you!</p>
                                        <div class="client-meta" data-swiper-parallax="-300">
                                            <h3 class="client-name">Dewey Tetzlaff</h3>
                                        </div>
                                    </div>
                                </div> <!-- end of swiper-slide -->

                                <div class="swiper-slide">
                                    <div class="testimonial-media" data-swiper-parallax="-100">
                                        <img src="assets/images/testimonial/testimonial-3.jpg" alt="Amber Laha">
                                    </div>
                                    <div class="testimonial-content" data-swiper-parallax="-500">
                                        <p>All Perfect !! I have three sites with magento , this theme is the best !! Excellent support , advice theme installation package , sorry for English, are Italian but I had no problem !! Thank you!</p>
                                        <div class="client-meta" data-swiper-parallax="-300">
                                            <h3 class="client-name">Amber Laha</h3>
                                        </div>
                                    </div>
                                </div> <!-- end of swiper-slide -->
                            </div> <!-- end of swiper-wrapper -->

                            <!-- Pagination -->
                            <div class="swiper-pagination-testimonial"></div>
                        </div> <!-- end of testimonial-container -->
                    </div> <!-- end of testimonials -->
                </div>

                <div class="col-12 col-sm-12 col-md-12 col-lg-6">
                    <div class="promo-banner hover-effect-1 mb0">
                        <a href="#">
                            <img src="assets/images/banners/banner-14.jpg" alt="Promo Banner">
                        </a>
                    </div>
                </div>
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </section>
    <!-- End of Testimonial Section -->

    <!-- Start of Client Section -->
    <div class="client-section mb-full">
        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-12 col-md-12">
                    <div class="client-carousel">

                        <!-- Slides -->
                        <div class="swiper-wrapper">
                            <div class="item-brand swiper-slide">
                                <img src="assets/images/brand/1.png" alt="Client Logo">
                            </div>
                            <div class="item-brand swiper-slide">
                                <img src="assets/images/brand/2.png" alt="Client Logo">
                            </div>
                            <div class="item-brand swiper-slide">
                                <img src="assets/images/brand/3.png" alt="Client Logo">
                            </div>
                            <div class="item-brand swiper-slide">
                                <img src="assets/images/brand/4.png" alt="Client Logo">
                            </div>
                            <div class="item-brand swiper-slide">
                                <img src="assets/images/brand/5.png" alt="Client Logo">
                            </div>
                            <div class="item-brand swiper-slide">
                                <img src="assets/images/brand/6.png" alt="Client Logo">
                            </div>
                            <div class="item-brand swiper-slide">
                                <img src="assets/images/brand/7.png" alt="Client Logo">
                            </div>
                            <div class="item-brand swiper-slide">
                                <img src="assets/images/brand/8.jpg" alt="Client Logo">
                            </div>
                        </div>
                    </div> <!-- end of client-carousel -->
                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </div>
    <!-- End of Client Section -->

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
</main>
<!-- End of Main Content Wrapper -->
<script src="assets/js/home.js"></script>
@endsection