<div class="col-12 col-sm-12 col-md-6 col-lg-6">
    <article class="blog-post post-entry">
        <div class="blog-grid">
            <div class="content-wrapper">
                <div class="post-media">
                    <a href="{{route('get.blog.detail',$data->a_slug.'-'.$data->id)}}"><img src="{{ pare_url_file($data->a_avatar)}}" alt="Blog Image"></a>
                </div>
                <div class="post-content">
                    <ul class="post-category">
                        <li><a href="#">{{$data->menu->mn_name ?? "[N\A]"}}</a></li>
                    </ul>
                    <h3 class="post-title"><a href="{{route('get.blog.detail',$data->a_slug.'-'.$data->id)}}">{{$data->a_name}}</a></h3>
                    <p>{{$data->a_desciption}}</p>
                </div>
                <div class="post-footer">
                    <div class="post-meta">
                        <ul>
                            <li>{{$data->created_at->toDayDateTimeString()}} </li>
                            <li>{{$data->a_view}} lượt xem</li>
                        </ul>
                    </div>
                    <div class="post-more">
                        <a href="{{route('get.blog.detail',$data->a_slug.'-'.$data->id)}}">Xem Thêm <i class="fa fa-angle-double-right"></i></a>
                    </div>
                </div>
            </div>
        </div> 
    </article>
</div>