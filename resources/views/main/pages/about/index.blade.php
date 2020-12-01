@extends('main.index')

@section('content')

<div class="breadcrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-12">
                <nav class="breadcrumb">
                    <a class="breadcrumb-item" href="index.html">Home</a>
                    <span class="breadcrumb-item active">About Us</span>
                </nav>
            </div>
        </div> <!-- end of row -->
    </div> <!-- end of container -->
</div>
<!-- End of Breadcrumbs -->

<!-- Start of Main Content Wrapper -->
<main id="content" class="main-content-wrapper page-about">
    
    <!-- Start of About US Section -->
    <section class="about-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-12 col-sm-12 col-md-7 col-lg-6">
                    <div class="content-wrapper">
                        <div class="section-title left-aligned with-border">
                            <h2>Chào mừng đến với Kantan Shop!</h2>
                        </div>
                        <p class="lead">Công ty Cổ Phần Máy Tính Kantan là một trong những doanh nghiệp hàng đầu hoạt động trong lĩnh vực kinh doanh các sản phẩm CNTT. Thành lập từ năm 2020 đến nay, Công ty đã tạo được chỗ đứng vững chắc trên thị trường bán buôn, bán lẻ, trở thành thương hiệu quen thuộc và là đối tác tin cậy của nhiều bạn hàng trong nước và Quốc tế.</p>
                        <p>Luôn lấy yếu tố hài hòa về lợi ích làm nền tảng, lãnh đạo Công ty hiểu rằng, niềm tin của khách hàng về giá thành, chất lượng và dịch vụ là sự sống còn của Công ty. Do vậy, mọi hoạt động kinh doanh của Công ty luôn hướng tới mục tiêu tôn trọng và bảo đảm quyền lợi cho khách hàng, chinh phục khách hàng bằng chất lượng sản phẩm và dịch vụ tối ưu</p>
                        <a class="default-btn" href="{{route('get.home')}}">Mua hàng ngay!</a>
                    </div>
                </div>
                <div class="col-12 col-sm-12 col-md-5 col-lg-6">
                    <div class="overview-img text-center">
                        <a href="#">
                            <img src="assets/images/about/about.jpg" alt="About Us">
                        </a>
                    </div>
                </div>
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </section>
    <!-- End of About US Section -->

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
</main>

@endsection