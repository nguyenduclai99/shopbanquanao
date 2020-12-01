<aside id="secondary" class="widget-area">
    <div class="sidebar-widget price-filter-widget">
        <h2 class="widgettitle">Khoảng Giá</h2>
        <div class="sidebar-widget list-widget">
            <div class="list-widget-wrapper">
                <div class="list-group">
                    <a href="{{ request()->fullUrlWithQuery(['price'=>1]) }}" class="{{ Request::get('price') == 1 ? "autofocus" : "" }}">
                        Dưới 1 triệu
                    </a>
                    <a href="{{ request()->fullUrlWithQuery(['price'=>2]) }}" class="{{ Request::get('price') == 2 ? "autofocus" : "" }}">
                        1 triệu - 4 triệu 
                    </a> 
                    <a href="{{ request()->fullUrlWithQuery(['price'=>3]) }}" class="{{ Request::get('price') == 3 ? "autofocus" : "" }}">
                        4 triệu - 8 triệu 
                    </a> 
                    <a href="{{ request()->fullUrlWithQuery(['price'=>4]) }}" class="{{ Request::get('price') == 4 ? "autofocus" : "" }}">
                        8 triệu - 16 triệu 
                    </a> 
                    <a href="{{ request()->fullUrlWithQuery(['price'=>5]) }}" class="{{ Request::get('price') == 5 ? "autofocus" : "" }}">
                        16 triệu - 24 triệu 
                    </a> 
                    <a href="{{ request()->fullUrlWithQuery(['price'=>6]) }}" class="{{ Request::get('price') == 6 ? "autofocus" : "" }}">
                       Trên 24 triệu 
                    </a>      
                </div>
            </div>
        </div>
    </div> 
    
    @if (isset($attributes))
        @foreach ($attributes as $key => $attribute)
        <div class="sidebar-widget list-widget">
            <h2 class="widgettitle">{{$key}}</h2>
            <div class="list-widget-wrapper">
                <div class="list-group">
                    @foreach ($attribute as $data)
                        <a href="{{ request()->fullUrlWithQuery(['attr_'.$data['atb_type']=>$data['id']]) }}" class="{{ Request::get('attr_'.$data['atb_type']) == $data['id'] ? "autofocus" : "" }}">
                            {{$data['atb_name']}}
                        </a>
                    @endforeach                    
                </div>
            </div>
        </div>
        @endforeach
    @endif
    
    @if (isset($sidebar_category))
        @foreach ($sidebar_category as $data)
        <div class="sidebar-widget list-widget">
            @if (is_null(Request::get('key')))
                <a href="{{route('get.category.list',$data->c_slug.'-'.$data->id)}}"><h4 class="widgettitle">{{$data->c_name}}</h4></a>
            @else
                <a href="{{route('get.category.search.list',[$data->c_slug.'-'.$data->id, Request::get('key')] )}}"><h4 class="widgettitle">{{$data->c_name}}</h4></a>  
            @endif
            <div class="list-widget-wrapper">
            </div>
        </div>
        @endforeach
    @endif
     
</aside> 