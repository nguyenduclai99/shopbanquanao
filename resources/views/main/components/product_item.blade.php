<div class="swiper-slide product-layout product-grid">
    <div class="product-thumb">
        <div class="product-inner">
            <div class="product-image">
                {{-- <div class="label-product label-sale">Sale</div> --}}
                <a href="{{route('get.product.detail',$data->pro_slug.'-'.$data->id)}}">
                <img src="{{pare_url_file($data->pro_avatar)}}" alt="Proin Lectus Ipsum" title="Proin Lectus Ipsum" height="300">
                </a>
                <div class="action-links">
                    <a class="action-btn btn-cart" href="{{ route('get.shopping.add', $data->id) }}" title="Add to Cart"><i class="pe-7s-cart"></i></a>
                    <a class="action-btn btn-wishlist" href="#" title="Add to Wishlist"><i class="pe-7s-like"></i></a>
                    <a class="action-btn btn-compare" href="#" title="Add to Compare"><i class="pe-7s-refresh-2"></i></a>
                    <a class="action-btn btn-quickview" href="{{route('get.product.detail','san-pham-'.$data->id)}}" title="Quick View"><i class="pe-7s-search"></i></a>
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
            </div>
        </div>
    </div>
</div> 