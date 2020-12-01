@extends('main.index')

@section('content')

<div class="breadcrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-12">
                <nav class="breadcrumb">
                    <a class="breadcrumb-item" href="{{route('get.home')}}">Home</a>
                    <a class="breadcrumb-item" href="{{route('get.blog.home')}}">Bài viết</a>
                    <span class="breadcrumb-item active">{{$article->a_name}}</span>
                </nav>
            </div>
        </div> <!-- end of row -->
    </div> <!-- end of container -->
</div>

<div id="content" class="main-content-wrapper">
            
    <!-- Start of Blog Posts Section -->
    <div class="blog-posts-section">
        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-12 col-md-12 col-lg-8 col-xl-9">
                    <main id="primary" class="site-main">
                        <div class="single-post-wrapper">
                           <div class="row">
                                <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                                    <article class="blog-post post-entry">
                                        <div class="single-post">
                                            <div class="content-wrapper">
                                                <div class="post-media image-popup">
                                                    <figure>
                                                        <a href="{{ pare_url_file($article->a_avatar)}}" data-size="1920x930">
                                                            <img src="{{ pare_url_file($article->a_avatar)}}" alt="Blog Details">
                                                            <div class="image-overlay"><i class="ion ion-ios-add"></i></div>
                                                        </a>
                                                        <figcaption class="visually-hidden">
                                                            <span>Blog Details</span>
                                                        </figcaption>
                                                    </figure>
                                                </div>
                                                <div class="post-content">
                                                    <h3 class="post-title">{{$article->a_name}}</h3>
                                                    <div class="post-meta">
                                                        <p>
                                                            <span>By 
                                                                <span class="single-meta">
                                                                    <a href="#">{{$article->admin->name}}</a>
                                                                </span>
                                                            </span> 
                                                            <span class="post-categories">In 
                                                                <span class="single-meta">
                                                                    <a href="#">{{$article->menu->mn_name}}</a>
                                                                </span>
                                                            </span> 
                                                            <span>Posted on 
                                                                <span class="single-meta">
                                                                    <a href="#">{{$article->created_at}}</a>
                                                                </span>
                                                            </span>
                                                        </p>
                                                    </div>
                                                    <div class="post-description">
                                                        <div class="post-details">   
                                                            {!! $article->a_contents !!}
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="post-footer">
                                                    <div class="d-md-flex justify-content-sm-between">
                                                        <div class="tags">
                                                            <p>Tags:</p>
                                                            <ul class="list-inline">
                                                                <li class="list-inline-item"><a href="#">{{$article->menu->mn_name}}</a></li>
                                                            </ul>
                                                        </div>
                                                        <div class="post-share">
                                                            <p>Share:</p>
                                                            <ul class="list-inline">
                                                                <li class="list-inline-item"><a href="#" class="bg-facebook"><i class="fa fa-facebook"></i></a></li>
                                                                <li class="list-inline-item"><a href="#" class="bg-twitter"><i class="fa fa-twitter"></i></a></li>
                                                                <li class="list-inline-item"><a href="#" class="bg-gplus"><i class="fa fa-google-plus"></i></a></li>
                                                                <li class="list-inline-item"><a href="#" class="bg-pinterest"><i class="fa fa-pinterest"></i></a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div> <!-- end of blog-grid -->
                                    </article> <!-- end of blog-post -->

                                    <div class="author-box">
                                        <div class="media">
                                            <div class="author-image mb-4 mb-sm-4 mb-md-0 mr-md-4">
                                                <img src="{{ pare_url_file($article->admin->a_avatar)}}" alt="blog-comment">
                                            </div>
                                            <div class="author-description media-body">
                                                <h6>Tác giả: <a href="#">{{$article->admin->name}}</a></h6>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Temporibus harum, est fuga veritatis esse dignissimos optio sunt obcaecati sit quos. Maiores tempora harum fugit voluptates?</p>
                                            </div>
                                        </div>
                                    </div> <!-- end of author-box -->

                                    {{-- <div class="post-pagination">
                                        <ul class="pagination">
                                            <li><a href="#"><i class="fa fa-long-arrow-left"></i>Previous</a></li>
                                            <li class="ml-auto"><a href="#">Next<i class="fa fa-long-arrow-right"></i></a></li>
                                        </ul>
                                    </div>  --}}
                                    
                                    <div id="comments" class="comments-area">
                                        <h3>This post has 4 Comments</h3>
                                        <ol class="comment-list list-unstyled">
                                            <li class="comment-single media">
                                                <div class="comment-author-thumb mr-3 mr-sm-4">
                                                    <img src="assets/images/testimonial/testimonial-1.jpg" alt="Comment Author">
                                                </div>
                                                <div class="comment-content media-body">
                                                    <div class="comment-meta d-flex justify-content-between align-items-top">
                                                        <div class="comment-title">
                                                            <h6>Alva Ano</h6>
                                                            <span><span class="comment-date">July 14, 2018</span> at <span class="comment-time">11:27 am</span></span>
                                                        </div>
                                                        <div class="comment-reply">
                                                            <a href="#"><span>Reply</span></a>
                                                        </div>
                                                    </div>
                                                    <p>Efficiently drive robust niche markets and premium technologies. Distinctively maintain client-centric outsourcing.</p>
                                                </div>
                                            </li>

                                            {{-- <li class="comment-single media flex-wrap">
                                                <div class="comment-author-thumb mr-3 mr-sm-4">
                                                    <img src="assets/images/testimonial/testimonial-3.jpg" alt="Comment Author">
                                                </div>
                                                <div class="comment-content media-body">
                                                    <div class="comment-meta d-flex justify-content-between align-items-top">
                                                        <div class="comment-title">
                                                            <h6>Amber Laha</h6>
                                                            <span><span class="comment-date">Jun 27, 2018</span> at <span class="comment-time">06:07 pm</span></span>
                                                        </div>
                                                        <div class="comment-reply">
                                                            <a href="#"><span>Reply</span></a>
                                                        </div>
                                                    </div>
                                                    <p>Credibly enhance cross-platform results through fully tested architectures. Dynamically recaptiualize unique models.</p>
                                                </div>

                                                <ol class="comment-list nested">
                                                    <li class="comment-single media">
                                                        <div class="comment-author-thumb mr-3 mr-sm-4">
                                                            <img src="assets/images/testimonial/testimonial-4.jpg" alt="Comment Author">
                                                        </div>
                                                        <div class="comment-content media-body">
                                                            <div class="comment-meta d-flex justify-content-between align-items-top">
                                                                <div class="comment-title">
                                                                    <h6>Dewey Tetzlaff</h6>
                                                                    <span><span class="comment-date">Jun 29, 2018</span> at <span class="comment-time">05:56 pm</span></span>
                                                                </div>
                                                                <div class="comment-reply">
                                                                    <a href="#"><span>Reply</span></a>
                                                                </div>
                                                            </div>
                                                            <p>Synergistically promote business leadership skills without optimal value. Holisticly incentivize technically sound.</p>
                                                        </div>
                                                    </li>
                                                </ol>
                                            </li> --}}
                                        </ol> <!-- end of comment-list -->

                                        <div class="comment-form">
                                            <h3>Leave a comment</h3>
                                            <form action="#" method="post" id="comment_form">
                                                <div class="row mb-3">
                                                    <div class="form-group col-12 col-sm-12 col-md-12">
                                                        <textarea id="comment" placeholder="Your Comment *" name="comment" class="form-control" required></textarea>
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <div class="form-group col-12 col-sm-12 col-md-4">
                                                        <input type="text" class="form-control" id="com-name" placeholder="Name *" required>
                                                    </div>
                                                    <div class="form-group col-12 col-sm-12 col-md-4">
                                                        <input type="email" class="form-control" id="com-email" placeholder="Email *" required>
                                                    </div>
                                                    <div class="form-group col-12 col-sm-12 col-md-4">
                                                        <input type="email" class="form-control" id="com-website" placeholder="Website" required>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="form-group col-12 col-sm-12 col-md-12 mb0">
                                                        <input name="submit" type="submit" id="submit_my_comment" class="btn btn-secondary" value="Submit Comment">
                                                    </div>
                                                </div>
                                            </form>
                                            <!-- end of form -->
                                        </div> <!-- end of comment form -->
                                    </div> <!-- end of comment-area -->
                                </div>
                            </div> <!-- end of row -->
                        </div> <!-- end of single-post-wrapper -->
                    </main> <!-- end of #primary -->
                </div>
                <div class="col-12 col-sm-12 col-md-12 col-lg-4 col-xl-3">
                    @include('main.pages.article.inclue._inc_blog_sidebar')
                </div>
            </div> 
        </div> 
    </div>
</div>
@endsection