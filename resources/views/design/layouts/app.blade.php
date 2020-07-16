<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>


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
            var original = window.location.origin;
            // console.log(original);
            var btn = $(e.currentTarget);
            var scrollTop = $(window).scrollTop();
            if (scrollTop < 50 && btn.hasClass('collapsed') == false && server_url == original) {
                console.log('success');
                $('.menuse').removeClass('shadow-none');
                $('.menuse').addClass('solid-nav');
                $('.menuse').addClass('py-0');

            } else if (scrollTop < 50 && btn.hasClass('collapsed') == true && server_url == original) {
                console.log('false');
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
