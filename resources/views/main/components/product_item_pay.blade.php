<div class="product-list-single">
    <div class="product-thumb">
        <div class="product-inner media align-items-center">
            <div class="product-image mr-3 mr-sm-3 mr-md-5 mr-lg-3 mr-xl-3">
                <a href="{{route('get.product.detail',$data['pro_slug'].'-'.$data['id'])}}">
                    <img src="{{pare_url_file($data['pro_avatar'])}}" height="300">
                </a>
            </div> <!-- end of product-image -->

            <div class="product-caption media-body">
                <div class="product-ratings">
                    <div class="rating-box">
                        <ul class="rating d-flex justify-content-start">
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star"></i></li>
                        </ul>
                    </div>
                </div>
                <h4 class="product-name"><a href="{{route('get.product.detail',$data['pro_slug'].'-'.$data['id'])}}"> {{$data['pro_name']}} </a></h4>
                <p class="product-price">
                    @if ($data['pro_sale'] == 0)
                        <span class="price-new">{{number_format($data['pro_price'],0,',','.')}} VNĐ</span>
                    @elseif($data['pro_sale'])
                        @php
                            $price = $data['pro_price'] - ((($data['pro_price']) * $data['pro_sale']) / 100);
                        @endphp
                        <span class="price-old">{{number_format($data['pro_price'],0,',','.')}} VNĐ</span>
                        <br>
                        <span class="price-new">{{number_format($price,0,',','.')}} VNĐ</span>
                    @endif
                </p>
                <div class="action-links">
                    <a class="action-btn btn-cart" href="{{ route('get.shopping.add', $data['id']) }}" title="Add to Cart"><i class="pe-7s-cart"></i></a>
                    <a class="action-btn btn-wishlist" href="#" title="Add to Wishlist"><i class="pe-7s-like"></i></a>
                    <a class="action-btn btn-compare" href="#" title="Add to Compare"><i class="pe-7s-refresh-2"></i></a>
                </div>
            </div><!-- end of product-caption -->
        </div><!-- end of product-inner -->
    </div><!-- end of product-thumb -->
</div> 