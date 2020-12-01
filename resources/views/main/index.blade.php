<!DOCTYPE html>
<html lang="zxx">

<!-- Mirrored from d29u17ylf1ylz9.cloudfront.net/ororus-v1/index-3.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 22 Sep 2018 08:27:55 GMT -->
<head>
    <meta charset="UTF-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>{{$title_page ?? "KTComputer"}}</title>
    <meta name="description" content="">
    <meta name="robots" content="noindex, follow" />
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- favicon
    ============================================ -->
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('images/logo-admin.png')}}">


    <!-- CSS files
    ============================================ -->

    <!-- Boostrap stylesheet -->
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">
    
    <!-- Icon Font CSS -->
    <link rel="stylesheet" href="{{asset('assets/css/ionicons.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/pe-icon-7-stroke.css')}}">
    
    <!-- Plugins stylesheet -->
    <link rel="stylesheet" href="{{asset('assets/css/plugins.css')}}">

    <!-- Master stylesheet -->
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
        
    <!-- Responsive stylesheet -->
    <link rel="stylesheet" href="{{asset('assets/css/responsive.css')}}">
    <!-- Toastr -->
    <link rel="stylesheet" href="{{asset('admin/plugins/toastr/toastr.min.css')}}">    
    <!-- modernizr JS
    ============================================ -->
    <script src="{{asset('assets/js/modernizr-2.8.3.min.js')}}"></script>

    <!-- jQuery JS -->
    <script src="{{asset('assets/js/jquery.1.12.4.min.js')}}""></script>

    @if(session('toastr'))
        <script>
            var TYPE_MESSAGE = "{{ session('toastr.type') }}";
            var MESSAGE = "{{ session('toastr.message') }}";
        </script>
    @endif
</head>

<body>

    <div id="whole" class="whole-site-wrapper color-scheme-three">

        <!-- Start of Newsletter Popup -->
        {{-- <div id="newsletter_popup" class="newsletter-popup">
            <div class="popup-container">
                <div class="popup-close">
                    <span class="p-close"><span>X</span></span>
                </div> <!-- end of popup-close -->

                <div class="popup-area text-center">
                    <h2>Subscribe to our Newsletter</h2>
                    <div class="popup-body">
                        <p>Subscribe to the Ororus mailing list to receive updates on new arrivals, special offers and other discount information.</p>
                        <div class="subscribe-form-group">
                            <form action="#">
                                <input type="text" name="message" id="message" class="form-control" placeholder="Enter your email address" required>
                                <button type="submit" class="btn btn-secondary">Subscribe</button>
                            </form>
                        </div>
                    </div> <!-- end of popup-body -->

                    <div class="popup-footer">
                        <div class="form-check">
                            <div class="custom-checkbox">
                                <input class="form-check-input" type="checkbox" id="cancel_popup">
                                <span class="checkmark"></span>
                                <label class="form-check-label" for="cancel_popup">Don't show this popup again</label>
                            </div>
                        </div>
                    </div> <!-- end of popup-footer -->
                </div> <!-- end of popup-area -->
            </div> <!-- end of popup-container -->
        </div> --}}
        <!-- End of Newsletter Popup -->
        @include('main.header')

        <div class="fixed-header-space"></div> <!-- empty placeholder div for Fixed Menu bar height-->

        @yield('content')
        
        @include('main.footer')
        <!-- Start of Scroll to Top -->
        <div id="to_top">
            <i class="ion ion-ios-arrow-forward"></i>
            <i class="ion ion-ios-arrow-forward"></i>
        </div>
        <!-- End of Scroll to Top -->
    </div>
    <!-- End of Whole Site Wrapper -->

    <!-- Initializing Photoswipe -->
    <div class="pswp" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="pswp__bg"></div>
        <div class="pswp__scroll-wrap">
            <div class="pswp__container">
                <div class="pswp__item"></div>
                <div class="pswp__item"></div>
                <div class="pswp__item"></div>
            </div>
            <div class="pswp__ui pswp__ui--hidden">
                <div class="pswp__top-bar">
                    <div class="pswp__counter"></div>
                    <button class="pswp__button pswp__button--close" title="Close (Esc)"></button>
                    <button class="pswp__button pswp__button--share" title="Share"></button>
                    <button class="pswp__button pswp__button--fs" title="Toggle fullscreen"></button>
                    <button class="pswp__button pswp__button--zoom" title="Zoom in/out"></button>
                    <div class="pswp__preloader">
                        <div class="pswp__preloader__icn">
                            <div class="pswp__preloader__cut">
                                <div class="pswp__preloader__donut"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap">
                    <div class="pswp__share-tooltip"></div>
                </div>
                <button class="pswp__button pswp__button--arrow--left" title="Previous (arrow left)">
                </button>
                <button class="pswp__button pswp__button--arrow--right" title="Next (arrow right)">
                </button>
                <div class="pswp__caption">
                    <div class="pswp__caption__center"></div>
                </div>
            </div>
        </div>
    </div>
    ============================================ -->
     <!-- Toastr -->
    <script src="{{asset('admin/plugins/toastr/toastr.min.js')}}"></script>   
    <!-- Popper JS -->
    <script src="{{asset('assets/js/popper.min.js')}}""></script>

    <!-- Bootstrap JS -->
    <script src="{{asset('assets/js/bootstrap.min.js')}}""></script>

    <!-- Plugins JS -->
    <script src="{{asset('assets/js/plugins.js')}}""></script>

    <!-- Main JS -->
    <script src="{{asset('assets/js/main.js')}}""></script>
    
    <script>
        if(typeof TYPE_MESSAGE != "undefined"){
            switch (TYPE_MESSAGE){
                case 'success':
                    toastr.success(MESSAGE)
                    break;
                case 'error':
                    toastr.error(MESSAGE)
                    break;
            }
        }
    </script>
</body>
</html>