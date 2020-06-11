<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>


    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/main.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/new.css') }}">
    <link rel="stylesheet" href="{{asset('css/slick.min.css')}}"/>



    @stack('styles')
</head>
<body class="puff-in-center" style="overflow-x:hidden;">
@include('design.partials.header')
<div id="backdrop" style="display: none;"></div>
    @yield('content')
    @include('design.includes.menu')
<script src="{{ asset('js/app.js') }}"></script>
    <script src="{{asset('js/slick.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('js/jquery.lazy.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/jquery.lazy.plugins.min.js') }}"></script>
    <script src="https://api-maps.yandex.ru/2.1/?apikey=1dc5f6a0-7f44-4dcf-8a38-15f7166f37dc&lang=ru_RU" type="text/javascript"></script>

    <script>
        $('.div-lazy').lazy();
    </script>
<script>
        $(document).ready(function() {
            $(window).scroll(function() {
                var scrollTop = $(window).scrollTop();
                if (scrollTop >= 50 && window.location.href.indexOf("http://texmart/new-design/") < 0) {
                    $('.menuse').removeClass('shadow-none');
                    $('.menuse').addClass('solid-nav');
                    $('.menuse').addClass('py-0');
                    $('.menuse').removeClass('pt-3');

                } else if (window.location.href.indexOf("http://texmart/new-design/") < 0) {
                    $('.menuse').removeClass('solid-nav');
                    $('.menuse').addClass('shadow-none');
                    $('.menuse').removeClass('py-0');
                    $('.menuse').addClass('pt-3');
                }

            });
        });
    </script>
    <script>
        $(document).on('click', '.navbar-toggler', function (e) {
            var btn = $(e.currentTarget);
            var scrollTop = $(window).scrollTop();
            if (scrollTop < 50 && btn.hasClass('collapsed') == false) {
                $('.menuse').removeClass('shadow-none');
                $('.menuse').addClass('solid-nav');
                $('.menuse').addClass('py-0');

            } else if (scrollTop < 50 && btn.hasClass('collapsed') == true) {
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
            $("a.fade-link").click(function(event){
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
