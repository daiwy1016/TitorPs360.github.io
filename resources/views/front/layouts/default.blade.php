<!doctype html>
<!--[if lt IE 8 ]><html lang="{{ App::getLocale() }}" class="ie7"> <![endif]-->
<!--[if IE 8 ]><html lang="{{ App::getLocale() }}" class="ie8"> <![endif]-->
<!--[if IE 9 ]><html lang="{{ App::getLocale() }}" class="ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--><html lang="{{ App::getLocale() }}"> <!--<![endif]-->
    <head>
        <meta charset="utf-8"/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
        <title>@yield('title')</title>
        <meta name="description" content="@yield('description')"/>
        <meta name="keywords" content="@yield('keywords')"/>
        <meta name="viewport" content="width=device-width, initial-scale=1"/>

        @if(!is_null($settings['seo.google.webmaster']) || "" !== $settings['seo.google.webmaster'])
        <meta name="google-site-verification" content="{{$settings['seo.google.webmaster']}}" />
        @endif

        @if(!is_null($settings['site.theme.options']) || "" !== $settings['site.theme.options'])
        @php $themeOpts=json_decode($settings['site.theme.options']) @endphp
        @if(!is_null($themeOpts->icon))
        <link rel="shortcut icon" href="{{$themeOpts->icon}}">
        @endif
        @endif

        <link rel="canonical" href="{{route('front.index')}}"/>

        <link rel="stylesheet" href="{{ asset('css/bootswatch/'.$variation.'/bootstrap.min.css') }}"/>
        <link rel="stylesheet" href="{{ asset('css/style.css') }}"/>
        <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}"/>

        <script src="{{ asset('js/vendor/modernizr-2.6.2-respond-1.1.0.min.js') }}"></script>
        <script src="{{ asset('js/vendor/jquery-1.11.0.min.js') }}"></script>
        <script src="{{ asset('js/vendor/bootstrap.min.js') }}"></script>
        <script src="{{ asset('js/vendor/jquery.autocomplete.min.js') }}"></script>
        <!-- 轮播幻灯 -->
        <script src="{{ asset('js/vendor/owl.carousel.js') }}"></script>
        <link rel="stylesheet" href="{{ asset('css/owlcarousel/owl.carousel.css') }}"/>
        <link rel="stylesheet" href="{{ asset('css/owlcarousel/owl.theme.default.css') }}"/>

        <script src="{{ asset('js/main.js') }}"></script>


        @if(config('settings.orientation') === 'rtl')
        <link rel="stylesheet" href="{{ asset('css/bootstrap-rtl.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/rtl.css') }}">
        @endif

        @yield('header')

        <!--[if lt IE 9]>
        <script src="{{asset('js/vendor/html5shiv.js')}}"></script>
        <script src="{{asset('js/vendor/respond.min.js')}}"></script>
        <![endif]-->
        <script>if (window != top)
    top.location.href = location.href</script>
    </head>
    <body class="@if(isset($themeOpts->boxed) && $themeOpts->boxed == 1) layout-boxed @endif">
        <!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

        @if(!is_null($settings['seo.google.analytics']) || "" !== $settings['seo.google.analytics'])
        @include('front.analyticstracking')
        @endif
        <header>
            <div class="container-fluid">
                <div class="row">
                    <!-- Website Menu -->
                    @yield('menu')
                    <!--/ Website Menu -->
                </div>
            </div>
        </header>

        <div class="wrapper">
         @yield('manga-moblie-menu')

            <div class="@if(isset($themeOpts->boxed) && $themeOpts->boxed == 1) container @else container-fluid @endif">

                 @yield('manga-slides-ads')
                 @yield('mangaupdatesslides')


                <!-- row -->
                <div class="row">
                    <div class="col-xs-12 col-md-8">
                            @yield('allpage')
                    </div>
                    <div class="col-xs-12 col-md-4">
                        @yield('show-sidebar')
                    </div>
                </div>
               <!--/ row -->
                <div class="row">
                    <div class="col-sm-4 col-sm-push-8">
                            <div class="default-sidebar">
                           @yield('sidebar')
                           </div>
                    </div>
                    <div class="col-sm-8 col-sm-pull-4 hotmanga-page">
                        @yield('hotmanga')

                        <div class="col-xs-12">
                            @yield('content')
                        </div>
                    </div>
                </div>
                <!--/ row -->
            </div>
        </div>
        <footer>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12 manga-footer">
                        <div class="container">
                        <div class="row">
                            <!-- menu -->
                            <div class="">
                                <div class="col-lg-6">
                                    <div class="footer-copyright">
                                        &copy;&nbsp;<?php echo date("Y") ?>&nbsp;
                                        <a href="{{route('front.index')}}">{{$settings['site.name']}}</a>
                                        &nbsp;
                                        <a href="{{route('front.manga.contactUs')}}" title="{{Lang::get('messages.front.home.contact-us')}}"><i class="fa fa-envelope-square"></i></a>
                                        &nbsp;
                                        <a href="{{route('front.feed')}}" title="{{Lang::get('messages.front.home.rss-feed')}}" style="color: #FF9900"><i class="fa fa-rss-square"></i></a>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                     <ul class="@if(config('settings.orientation') === 'rtl') pull-left @else pull-right @endif footer-menu">
                                    @if(!is_null($themeOpts) && !is_null($themeOpts->footer_menu))
                                    {!! HelperController::renderMenu($themeOpts->footer_menu) !!}
                                    @endif
                                </ul>
                                </div>
                            </div>
                        </div>
                        </div>
                        <!-- 底部中间返回顶部 -->
                        <div class="footer-back-top back-top show"><i class="fa fa-chevron-up"></i>top</div>
                    </div>
                </div>

                @stack('js')

                @yield('js')

                <script>
                    $(document).ready(function () {
                        var url = window.location.href;
                        var element = $('ul.nav a').filter(function () {
                            if (url.charAt(url.length - 1) == '/') {
                                url = url.substring(0, url.length - 1);
                            }

                            return this.href == url;
                        }).parent();
                        if (element.is('li')) {
                            element.addClass('active');
                        }
                        /*返回顶部js功能*/
                        if ($(".back-top").length) {
                        var N = 50,
                        _ = function() {
                            var t = $(window).scrollTop();
                            t > N ? $(".back-top").addClass("show") : $(".back-top").removeClass("show")
                        };
                        _(),
                        $(window).on("scroll", function() {
                            _()
                        }),
                        $(".back-top").on("click", function(t) {
                            t.preventDefault(),
                            $("html,body").animate({
                                scrollTop: 0
                            }, 700)
                        })
                        }
                    });
                </script>
            </div>
        </footer>
        <!-- 返回顶部 -->
        <div class="back-to-top back-top show" title="Back to top"><i class="fa fa-chevron-up"></i></div>
</body>
</html>
