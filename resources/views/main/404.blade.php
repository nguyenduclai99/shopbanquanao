@extends('main.index')

@section('content')

<div class="breadcrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-12">
                <nav class="breadcrumb">
                    <a class="breadcrumb-item" href="{{route('get.home')}}">Home</a>
                    <span class="breadcrumb-item active">404</span>
                </nav>
            </div>
        </div> 
    </div> 
</div>

<main id="content" class="main-content-wrapper">
            
    <!-- Start of Error 404 Section -->
    <section class="error-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="error-wrapper text-center">
                        <div class="error-text">
                            <h1>404</h1>
                            <h2>Oops! Something went wrong.</h2>
                            <p>Sorry, the page you are looking for does not exist, have been removed, name changed or is temporarity unavailable. </p>
                            {{-- <p>You can try searching with a keyword below:</p> --}}
                        </div>
                        {{-- <div class="search-error">
                            <form id="search-form" class="input-group" action="#">
                                <input type="search" class="form-control" placeholder="Search.....">
                                <button type="submit"><i class="fa fa-search"></i></button>
                            </form>
                        </div> --}}
                        <div class="error-button mt-half">
                            <a href="{{route('get.home')}}" class="btn btn-secondary">Back to home page</a>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- end of container -->
    </section>
    <!-- End of Error 404 Section -->
</main>
@endsection