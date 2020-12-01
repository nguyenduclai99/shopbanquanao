<aside id="secondary" class="widget-area">
    {{-- <div class="sidebar-widget search-widget">
        <h2 class="widgettitle">Search</h2>
        <div class="search-content">
            <form action="#" class="input-group">
                <input class="form-control" type="search" name="s" title="search" placeholder="Search...">
                <input type="submit" class="btn btn-secondary" value="search">
            </form>
        </div>
    </div>  --}}

    <div class="sidebar-widget recent-posts">
        <h2 class="widgettitle">Recent Posts</h2>
        <div class="recent-posts-widget-container">
            <div class="posts-single media">
                <div class="post-thumbnail mr-4 mr-lg-3 mr-xl-4">
                    <a href="#">
                        <img src="assets/images/blog/blog-thumb-1.jpg" alt="Blog Image">
                        <div class="overlay"></div>
                    </a>
                </div>
                <div class="post-content media-body">
                    <div class="post-title">
                        <h5><a href="#">Aypi non habent claritatem insitam</a></h5>
                    </div>
                    <div class="post-date">09 Aug</div>
                </div>
            </div> <!-- end of posts-single -->
        </div> <!-- end of recent-posts-widget -->
    </div> <!-- end of sidebar-widget -->
    <div class="sidebar-widget list-product-mostview">
        <h2 class="widgettitle">Top Mua nhiều</h2>
        <div class="product-carousel-wrapper pos-r">
            <div class="product-carousel" data-visible-slide="1" data-visible-lg-slide="1" data-visible-md-slide="1" data-loop="true" data-speed="1000" data-space-between="20">
                
                <div class="swiper-wrapper">
                    <div class="swiper-slide product-layout product-list">
                        @foreach (array_slice($productsPay,0,3) as $data)
                            @include('main.components.product_item_other')
                        @endforeach
                    </div> 
                    <div class="swiper-slide product-layout product-list">
                        @foreach (array_slice($productsPay,3,6) as $data)
                            @include('main.components.product_item_other')
                        @endforeach
                    </div>
                </div> 

                <!-- Navigation -->
                <div class="swiper-arrow top-nav next"><i class="fa fa-angle-right"></i></div>
                <div class="swiper-arrow top-nav prev"><i class="fa fa-angle-left"></i></div>
            </div> <!-- end of product-carousel -->
        </div> <!-- end of product-carousel-wrapper -->
    </div>
    <div class="sidebar-widget list-widget">
        <h2 class="widgettitle">Categories</h2>
        <div class="categories-widget">
            <ul class="categorie-list">
                <li><a href="#">creative<span>(20)</span></a></li>
                <li><a href="#">corporate<span>(40)</span></a></li>
                <li><a href="#">business<span>(22)</span></a></li>
                <li><a href="#">consultancy<span>(15)</span></a></li>
                <li><a href="#">technology<span>(18)</span></a></li>
                <li><a href="#">general<span>(12)</span></a></li>
            </ul>
        </div> <!-- end of categories-widget -->
    </div> <!-- end of sidebar-widget -->

    <div class="sidebar-widget tag-cloud">
        <h2 class="widgettitle">Tag Cloud</h2>
        <div class="tags-widget">
            <ul>
                <li><a href="#">Ecommerce</a></li>
                <li><a href="#">Creative</a></li>
                <li><a href="#">Store</a></li>
                <li><a href="#">Ideas</a></li>
                <li><a href="#">Business</a></li>
                <li><a href="#">Corporate</a></li>
                <li><a href="#">Smart</a></li>
            </ul>
        </div>
    </div> <!-- end of sidebar-widget -->

    <div class="sidebar-widget instagram-widget">
        <h2 class="widgettitle">Latest Instagram</h2>
        <div class="instagram-area">
            <div id="instagram_feed" class="image-popup"></div>
            <p>Follow Us <a href="https://www.instagram.com/creative.devitems/" target="_blank">@Instagram</a>.</p>
        </div>
    </div> <!-- end of sidebar-widget -->
</aside>