@extends('main.index')

@section('content')

<div class="breadcrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-12">
                <nav class="breadcrumb">
                    <a class="breadcrumb-item" href="{{route('get.home')}}">Home</a>
                    <span class="breadcrumb-item active">Tin Tức</span>
                </nav>
            </div>
        </div> <!-- end of row -->
    </div> <!-- end of container -->
</div>

<div id="content" class="main-content-wrapper">
    <div class="blog-posts-section">
        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-12 col-md-12 col-lg-8 col-xl-9">
                    <main id="primary" class="site-main">
                        <div class="blog-grid-area">
                            <div class="row">
                                @if (isset($articles))
                                @foreach ($articles as $data)
                                    @include('main.pages.article.inclue._inc_blog_item')
                                @endforeach
                                @endif
                            </div> 
                        </div> 

                        <div class="pagination-area">
                            <div class="row align-items-center">
                                <div class="col-lg-6 col-md-6">
                                    <ul class="pagination">
                                        {{ $articles->appends($query ?? [])->links() }}
                                    </ul>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="page-amount d-flex">
                                        <p>Tổng số bài viêt {{$articles->total()}}</p>
                                    </div>
                                </div>
                            </div>
                        </div> 
                    </main>
                </div>
                <div class="col-12 col-sm-12 col-md-12 col-lg-4 col-xl-3">
                    @include('main.pages.article.inclue._inc_blog_sidebar')
                </div>
            </div>
        </div>
    </div>
 
</div>


@endsection