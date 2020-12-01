<div class="product-list-single">
    <div class="product-thumb">
        <div class="product-inner media align-items-center">
            <div class="product-image mr-3 mr-sm-3 mr-md-2 mr-xl-3">
                <a href="{{route('get.product.detail',$data['pro_slug'].'-'.$data['id'])}}">
                    {{-- <img src="assets/images/products/featured/products-1-2.jpg" alt="Proin Lectus Ipsum" class="hover-image"> --}}
                    <img src="{{pare_url_file($data['pro_avatar'])}}" alt="Proin Lectus Ipsum" title="">
                </a>
            </div> 

            <div class="product-caption media-body">
                <div class="product-category">
                    <ul class="d-flex justify-content-start">
                        <li>
                            <a href="{{route('get.category.list',$data['category']['c_slug'].'-'.$data['id'])}}">{{$data['category']['c_name']}}</a>
                        </li>
                    </ul>
                </div>
                <h4 class="product-name"><a href="{{route('get.product.detail',$data['pro_slug'].'-'.$data['id'])}}">{{$data['pro_name']}}</a></h4>
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
            </div>
        </div>
    </div>
</div> 