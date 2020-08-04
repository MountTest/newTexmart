<!doctype html>
<html prefix="og: //ogp.me/ns#" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="icon" type="image/png" href="{{ asset('img/favi.png') }}" />
    <link rel="apple-touch-icon" href="{{ asset('img/favi.png') }}"/>
    @yield('seo_content')
    @yield('og_content')
@if(env('APP_ENV') == 'production')
    <!-- Yandex.Metrika counter -->
        <script type="text/javascript" defer>
            document.addEventListener("DOMContentLoaded", function() {
                (function (m, e, t, r, i, k, a) {
                    m[i] = m[i] || function () {
                        (m[i].a = m[i].a || []).push(arguments)
                    };
                    m[i].l = 1 * new Date();
                    k = e.createElement(t), a = e.getElementsByTagName(t)[0], k.async = 1, k.src = r, a.parentNode.insertBefore(k, a)
                })
                (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

                ym(55482520, "init", {
                    clickmap: true,
                    trackLinks: true,
                    accurateTrackBounce: true,
                    webvisor: true,
                    trackHash: true
                });
            });
        </script>
        <noscript><div><img src="https://mc.yandex.ru/watch/55482520" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
        <!-- /Yandex.Metrika counter -->
        <!-- Google Tag Manager -->
        <script defer>
            document.addEventListener("DOMContentLoaded", function() {
                (function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
                        new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
                    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
                    'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
                })(window,document,'script','dataLayer','GTM-WN292N4');
            });
        </script>
        <!-- End Google Tag Manager -->
        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-148741731-1"></script>
        <script defer>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());

            gtag('config', 'UA-148741731-1');
        </script>
        <meta name="google-site-verification" content="gQhpGRoPuGE72Ov_f3SoLPgO5gYjVJPAb6JvcvpJJh8" />

    @endif
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/main.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/new.css') }}">
    <link rel="stylesheet" href="{{asset('css/slick.min.css')}}"/>
    <link rel="stylesheet" href="{{ asset('css/bootstrap-material-datetimepicker.css') }}" />
    <link  rel="stylesheet"  href = "{{asset("css/intlTelInput.min.css")}}">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
    <link rel="stylesheet" href="{{asset('css/slick.min.css')}}?v={{ filemtime(public_path('css/slick.min.css')) }}"/>
    <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}?v={{ filemtime(public_path('css/owl.carousel.min.css')) }}">
    <link rel="stylesheet" href="{{ asset('css/jquery.rateyo.min.css') }}?v={{ filemtime(public_path('css/jquery.rateyo.min.css')) }}">

    @stack('styles')
</head>
<body class="puff-in-center" style="overflow-x:hidden;">
    @include('design.partials.header')
<div id="backdrop" style="display: none;"></div>
    @yield('content')
    @include('design.includes.menu')
    <script src="https://kit.fontawesome.com/db4d90930c.js" crossorigin="anonymous"></script>

    <script src="{{ asset('js/app.js') }}"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            let lazyImages = [].slice.call(document.querySelectorAll("img.lazy"));
            let active = false;

            const lazyLoad = function() {
                if (active === false) {
                    active = true;

                    setTimeout(function() {
                        lazyImages.forEach(function(lazyImage) {
                            if ((lazyImage.getBoundingClientRect().top <= window.innerHeight && lazyImage.getBoundingClientRect().bottom >= 0) && getComputedStyle(lazyImage).display !== "none") {
                                lazyImage.src = lazyImage.dataset.src;
                                // lazyImage.srcset = lazyImage.dataset.srcset;
                                lazyImage.classList.remove("lazy");

                                lazyImages = lazyImages.filter(function(image) {
                                    return image !== lazyImage;
                                });

                                if (lazyImages.length === 0) {
                                    document.removeEventListener("scroll", lazyLoad);
                                    window.removeEventListener("resize", lazyLoad);
                                    window.removeEventListener("orientationchange", lazyLoad);
                                }
                            }
                        });

                        active = false;
                    }, 200);
                }
            };

            document.addEventListener("scroll", lazyLoad);
            window.addEventListener("resize", lazyLoad);
            window.addEventListener("orientationchange", lazyLoad);
        });
    </script>
    <script type="text/javascript" src="{{ asset('js/jquery.lazy.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/jquery.lazy.plugins.min.js') }}"></script>
    <script src="https://api-maps.yandex.ru/2.1/?apikey=1dc5f6a0-7f44-4dcf-8a38-15f7166f37dc&lang=ru_RU" type="text/javascript"></script>
    <script src="{{asset('js/slick.min.js')}}?v={{ filemtime(public_path('css/main.min.css')) }}"></script>
    <script src="{{ asset('js/owl.carousel.min.js') }}?v={{ filemtime(public_path('css/main.min.css')) }}"></script>
    {{--connect rateyo.js--}}
    <script type="text/javascript" src="https://momentjs.com/downloads/moment-with-locales.min.js"></script>
    <script type="text/javascript" src="{{ asset('js/bootstrap-material-datetimepicker.js') }}"></script>
    <script src="{{ asset('js/intlTelInput-jquery.min.js') }}"></script>
    <script src="{{ asset('js/jquery.rateyo.js') }}?v={{ filemtime(public_path('css/main.min.css')) }}"></script>
{{--<script src="{{ asset('js/intlTelInput-jquery.min.js') }}"></script>--}}
    <script>
        $('.div-lazy').lazy();
    </script>
    <script>
        $(document).ready(function() {
            $('.date').bootstrapMaterialDatePicker
            ({
                time: false,
                clearButton: true
            });
        });
    </script>
    {{--@if (Auth::check())--}}
        {{--<script>--}}
            {{--var timeout = ({{config('session.lifetime')}} * 60000) -10 ;--}}
            {{--console.log(timeout);--}}
            {{--setTimeout(function(){--}}
                {{--window.location.href = "/login";--}}
            {{--},  timeout);--}}
        {{--</script>--}}
    {{--@endif--}}
<script>
        $(document).ready(function() {
            var server_url = window.location.href;
            var original = window.location.origin;
            $(window).scroll(function() {
                var scrollTop = $(window).scrollTop();
                if (scrollTop >= 50 && server_url == original) {
                    $('.menuse').removeClass('shadow-none');
                    $('.menuse').addClass('solid-nav');
                    $('.menuse').addClass('py-0');
                    $('.menuse').removeClass('pt-3');


                } else if (server_url == original) {
                    $('.menuse').removeClass('solid-nav');
                    $('.menuse').addClass('shadow-none');
                    $('.menuse').removeClass('py-0');
                    $('.menuse').addClass('pt-3');

                }
            });
            if (server_url != original)
            {
                $('.menuse').removeClass('shadow-none');
                $('.menuse').addClass('solid-nav');
                $('.menuse').addClass('py-0');
                $('.menuse').removeClass('pt-3');
            }
        });
    </script>
    <script>
        $(document).on('click', '.navbar-toggler', function (e) {

            var server_url = window.location.href;
            var original = window.location.origin + '/';
            var btn = $(e.currentTarget);
            var scrollTop = $(window).scrollTop();
            if (scrollTop < 50 && btn.hasClass('collapsed') == false && server_url == original) {
                $('.menuse').removeClass('shadow-none');
                $('.menuse').addClass('solid-nav');
                $('.menuse').addClass('py-0');

            } else if (scrollTop < 50 && btn.hasClass('collapsed') == true && server_url == original) {
                $('.menuse').removeClass('solid-nav');
                $('.menuse').addClass('shadow-none');
                $('.menuse').removeClass('py-0');
            }
        });
    </script>
    <script type="text/javascript">
        $(document).ready(function() {
            setTimeout(function () {
                $("body").removeClass('puff-in-center');
                menuShow();
            },1500);
            function menuShow()
            {
                $('.menuse').addClass('fade-in');
            }
            $(document).on('click', '.fade-link', function(event){
                event.preventDefault();
                linkLocation = this.href;
                $("body").fadeOut(1000, redirectPage);
            });

            function redirectPage() {
                window.location = linkLocation;
            }
        });
    </script>
<script>
    $(document).on('click', '.menu-sidenav', function(e){
        var btn = $(e.currentTarget);

            document.getElementById('mySidenav').style.right = '0px';
            btn.addClass('active');
        $('#backdrop').show();
        document.getElementById('backdrop').style.opacity = '1';
            disableScroll();
    });

    $(document).on('click', '.menu-close', function () {
        document.getElementById('mySidenav').style.right = '-350px';
        $('.menu-sidenav').removeClass('active');
        document.getElementById('backdrop').style.opacity = '0';
        setTimeout(function () {
            $('#backdrop').hide();
        },500);

        enableScroll();
    });

    function disableScroll() {
        document.body.style.overflow = 'hidden';
        document.querySelector('html').scrollTop = window.scrollY;
    }

    function enableScroll() {
        document.body.style.overflow = null;
    }

</script>
    @stack('scripts')
</body>
</html>
