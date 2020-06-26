@extends('design.layouts.app')


@section('content')
{{--@dd(\Illuminate\Support\Facades\Auth::user()->like_announces)--}}
    <section class="main-section"
             style="background-image: url('{{ asset('design/back.jpg') }}'); background-attachment: fixed; background-repeat: no-repeat; background-size: cover;">

        <div class="container text-white mb-lg-5 py-5">
            <div class="row justify-content-center align-items-center position-relative py-5 mt-lg-5 mt-0">
                <div class="col-lg-2 col-12 position-lg-absolute position-relative d-flex d-lg-block justify-content-center pt-lg-0 pt-md-5"
                     style="left: 0;">
                    <ul class="nav flex-lg-column">
                        <li class="nav-item my-2 mx-2 mx-lg-0">
                            <a href="#" class="text-white"><i class="fab fa-whatsapp fa-2x"></i></a>
                        </li>
                        <li class="nav-item my-2 mx-2 mx-lg-0">
                            <a href="#" class="text-white"><i class="fab fa-telegram-plane fa-2x"></i></a>
                        </li>
                        <li class="nav-item my-2 mx-2 mx-lg-0">
                            <a href="#" class="text-white"><i class="fab fa-facebook-square fa-2x"></i></a>
                        </li>
                        <li class="nav-item my-2 mx-2 mx-lg-0">
                            <a href="#" class="text-white"><i class="fab fa-instagram fa-2x"></i></a>
                        </li>
                        <li class="nav-item my-2 mx-2 mx-lg-0">
                            <a href="#" class="text-white"><i class="fab fa-vk fa-2x"></i></a>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-8 col-12 text-center">
                    <h1 class="font-weight-normal display-4 d-none d-lg-block" style="">Швейный рынок <br>Кыргызстана
                        онлайн</h1>
                    <h1 class="font-weight-bold d-block d-lg-none" style="">Швейный рынок <br>Кыргызстана онлайн</h1>
                    <p class="px-3 font-size-16">
                        портал по поиску и размещению заказов на производство <br> одежды в швейных фабриках и оптовых
                        покупок
                    </p>
                    <a href="{{ route('about') }}" class="btn texmart-bg-primary rounded transition shadow-none px-5 fade-link" style="text-transform: none;">Подробнее</a>
                </div>
                <div class="col-12 text-center pt-5">
                    <div class="row justify-content-center">
                        <div class="col-sm-8 col-12 col-lg-4">
                            <form action="#" method="get" class="position-relative">
                                <input type="text" placeholder="Я ищу..." class="form-control pr-5 rounded-10">
                                <i class="fas fa-search text-white position-absolute shadow texmart-bg-primary rounded-10"
                                   style="right: 0;top: 50%;transform: translateY(-50%);border: 1px solid #3e3e3e20;padding: 11px;"></i>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="container mt-4 pt-5">
                    <div class="row justify-content-center">
                        <div class="col-8 text-center" id="pick">
                            <a href="#content-info">
                            <img class="arrow-down" src="{{ asset('design/Arrow.svg') }}" alt="">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{--        <div class="container">--}}
        {{--            <div class="row justify-content-center py-5">--}}

        {{--            </div>--}}
        {{--        </div>--}}






    </section>


    <section id="content-info">
        <div class="container py-5">
                    <div class="row row-cols-1 row-cols-md-2 justify-content-around">
                        <div class="col-lg-6 col-md-12">
                            <div class="card h-100 rounded">
                                <div class="card-header py-4 rounded-bottom texmart-bg-primary text-center text-white rounded">
                                    <h2 class="font-weight-normal">Производителям</h2>
                                </div>
                                <div class="card-body row justify-content-center" style="padding:20px 50px;">
                                    <div class="card-shake col-12 px-4">
                                        <a href="{{ route('announces.list') }}"
                                           class="texmart-bg-secondary row align-items-center rounded text-center text-dark d-flex align-items-center py-3 px-2 my-3">
                                            <div class="col-12 py-3">
                                                <img src="{{ asset('images/2order.svg') }}" alt="">
                                                {{--<i class="fas fa-stream texmart-text-primary fa-2x"></i>--}}
                                                <h3 class="h4 font-weight-medium mt-1">Заказы</h3>
                                                <p class="small m-0 line-height-120">База заявок от заказчиков</p>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="card-shake col-12 px-4">
                                        <a href="#"
                                           class="texmart-bg-secondary row align-items-center rounded text-center text-dark d-flex align-items-center py-3 px-2 my-3">
                                            <div class="col-12 py-3">
                                                <img src="{{ asset('images/2order.svg') }}" alt="">
                                                {{--<i class="far fa-building texmart-text-primary fa-2x"></i>--}}
                                                <h3 class="h4 font-weight-medium mt-1">Добавить компанию</h3>
                                                <p class="small m-0 line-height-120"> Пополните каталог производителей и
                                                    получайте <br> заказы</p>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12">
                            <div class="card h-100 rounded">
                                <div class="card-header texmart-bg-primary py-4 rounded-bottom text-center text-white rounded">
                                    <h2 class="font-weight-normal">Заказчикам</h2>
                                </div>
                                <div class="card-body row no-gutters justify-content-around" style="padding:20px 24px;">
                                    <div class="card-shake col-12 col-md-12 col-lg-5">
                                        <a href="{{ isset(Auth::user()->id) ? route('profile.announce.create') : route('login') }}"
                                           class="fade-link texmart-bg-secondary rounded text-center d-flex align-items-center text-dark py-3 px-2 my-3">
                                            <div class="col-12 py-3">
                                                {{--<i class="fas fa-exclamation-circle texmart-text-primary fa-2x"></i>--}}
                                                <img src="{{ asset('images/2order2.svg') }}" alt="">
                                                <h3 class="h4 font-weight-medium mt-2">Создать тендер</h3>
                                                <p class="small m-0 line-height-120">Заполните форму и <br> находите
                                                    подходящих <br> исполнителей</p>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="card-shake col-12 col-md-12 col-lg-5">
                                        <a href="{{ route('new-design/catalog',['type' => 'productions']) }}"
                                           class="texmart-bg-secondary rounded text-center d-flex align-items-center text-dark py-4 px-2 my-3">
                                            <div class="col-12 py-3">
                                                {{--<i class="fas fa-user-friends texmart-text-primary fa-2x"></i>--}}
                                                <img src="{{ asset('images/2delivery.svg') }}" alt="">
                                                <h3 class="h4 font-weight-medium mt-2">Поставщики</h3>
                                                <p class="small m-0 line-height-120">База наших актуальных
                                                    поставщиков</p>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="card-shake col-12 col-md-12 col-lg-5">
                                        <a href="{{ route('new-design/catalog',['type' => 'product']) }}"
                                           class="texmart-bg-secondary rounded text-center d-flex align-items-center text-dark py-3 px-2 my-3">
                                            <div class="col-12 py-3">
                                                <img src="{{ asset('images/2product.svg') }}" alt="">
                                                {{--<i class="fas fa-envelope-open-text texmart-text-primary fa-2x"></i>--}}
                                                <h3 class="h4 font-weight-medium mt-2">Товары</h3>
                                                <p class="small m-0 line-height-120">База товаров наших <br>
                                                    производителей</p>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="card-shake col-12 col-md-12 col-lg-5">
                                        <a href="{{ route('new-design/catalog',['type' => 'service']) }}"
                                           class="texmart-bg-secondary rounded text-center d-flex align-items-center text-dark py-3 px-2 my-3">
                                            <div class="col-12 py-3">
                                                {{--<i class="fas fa-suitcase texmart-text-primary fa-2x"></i>--}}
                                                <img src="{{ asset('images/2service.svg') }}" alt="">
                                                <h3 class="h4 font-weight-medium mt-2">Услуги</h3>
                                                <p class="small m-0 line-height-120">Услуги предоставляемые <br>
                                                    порталом Texmart</p>
                                            </div>
                                        </a>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
    </section>


    @include('design.includes.our_advantages')

    <section>
        <div class="container py-5">
            <div class="row justify-content-center">
                <div class="col-12 col-sm-6 mb-sm-3 mb-md-0 col-md-3 col-lg-3 text-center numbers">
                    <p class="display-2 mb-0 line-height-90 font-weight-bold texmart-text-primary value">25</p>
                    <p class="font-weight-medium">какие-то данные</p>
                </div>
                <div class="col-12 col-sm-6 mb-sm-3 mb-md-0 col-md-3 col-lg-3 text-center numbers">
                    <p class="display-2 mb-0 line-height-90 font-weight-bold texmart-text-primary value">25</p>
                    <p class="font-weight-medium">какие-то данные</p>
                </div>
                <div class="col-12 col-sm-6 mb-sm-3 mb-md-0 col-md-3 col-lg-3 text-center numbers">
                    <p class="display-2 mb-0 line-height-90 font-weight-bold texmart-text-primary value">25</p>
                    <p class="font-weight-medium">какие-то данные</p>
                </div>
            </div>
        </div>
    </section>

    <section>
        @include('design.applications')
    </section>

    {{--<section>--}}
        {{--@include('design.partials.our_services')--}}
    {{--</section>--}}

    <section>
        @include('design.partials.reviews')
    </section>

    <section>
        <div class="container py-5">
            <div class="row">
                <div class="col-12 mb-4">
                    <h2 class="text-center texmart-text-primary h1">Новости</h2>
                </div>
            </div>
            @foreach(\App\NewsSite::all()->take(3) as $new)
                @if($loop->index == 0)
            <div class="row">
                <div class="col-12 div-lazy">
                    <div class="card shadow-sm mb-3 card-scale">
                        <div class="row no-gutters">
                            <div class="col-md-4 col-12 overflow-hidden">
                                <img src="{{ asset('storage/'.$new->preview) }}" class="card-img rounded-0 h-100" style="object-fit: cover;" alt="">
                            </div>
                            <div class="col-md-8 col-12 texmart-bg-primary px-0 px-md-5 text-white">
                                <div class="card-body text-white position-relative h-100">
                                    <p class="card-text font-size-14 text-white">
                                            {{ \Carbon\Carbon::parse($new->created_at)->format('d.m.Y') }}
                                    </p>
                                    <h3 class="card-title pb-5 mb-3 d-block d-lg-none font-weight-normal"
                                        style="display: -webkit-box;-webkit-line-clamp: 3;-webkit-box-orient: vertical;overflow: hidden;text-overflow: ellipsis;">
                                        {{$new->title}}</h3>
                                    <h3 class="card-title display-4 d-none d-lg-block font-weight-normal"
                                        style="display: -webkit-box;-webkit-line-clamp: 3;-webkit-box-orient: vertical;overflow: hidden;text-overflow: ellipsis;">
                                        {{$new->title}}</h3>
                                    <a href="/news.show/{{$new->id}}">
                                    <p class="card-text w-100 position-absolute text-white font-size-18" style="bottom: 30px;">Читать больше >></p>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row row-cols-1 row-cols-md-2 mt-3">
                @elseif($loop->index == 1)
                <div class="col-lg-6 col-12 mb-4">
                    <div class="card h-100 shadow-lg">
                        <div class="card-body p-3 p-md-5">
                            <h3 class="card-title line-height-140 texmart-text-primary font-weight-bold">{{ $new->title }}</h3>
                            <div style="overflow:hidden; text-overflow: ellipsis; display: -webkit-box; -webkit-line-clamp: 3; /* number of lines to show */-webkit-box-orient: vertical;">
                                <p class="card-text text-black">{!! $new->description !!}</p>
                            </div>
                            <a href="/news.show/{{$new->id}}">
                                <p class="card-text mt-5 text-black">Читать больше >></p>
                            </a>
                        </div>
                    </div>
                </div>
                @elseif($loop->index == 2)
                <div class="col-lg-6 col-12 mb-4">
                    <div class="card h-100 shadow-lg">
                        <div class="card-body p-3 p-md-5">
                            <h3 class="card-title line-height-140 texmart-text-primary font-weight-bold">Keys to writing copy that actually
                                converts and sells users</h3>
                            <p class="card-text text-black">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                                tempor incididunt ut labore et dolore...</p>
                            <a href="#">
                                <p class="card-text mt-5 text-black">Читать больше >></p>
                            </a>
                        </div>
                    </div>
                </div>
                @endif
            </div>
            @endforeach

            <div class="text-center">
                <a href="{{ route('news.list') }}" class="btn texmart-bg-primary rounded transition shadow-none text-white px-5 fade-link" style="text-transform: none;">Больше новостей</a>
            </div>
        </div>
    </section>

    {{--<section>--}}
        {{--<div class="container py-5">--}}
            {{--<div class="row mb-4">--}}
                {{--<h2 class="text-center col-12 h1 texmart-text-primary">Полезные статьи</h2>--}}
            {{--</div>--}}
                    {{--@include('design.posts.list', ['count' => 3, 'rowCols' => 3])--}}
            {{--<div class="text-center">--}}
                {{--<a href="#" class="btn texmart-bg-primary rounded transition shadow-none text-white px-5" style="text-transform: none;">Больше статей</a>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</section>--}}


    <section>
        <div class="container mt-5">
            <div class="row">
                <div class="col-12">
                    <h2 class="text-center texmart-text-primary h1">Партнеры</h2>
                </div>
            </div>
            <div class="row justify-content-center py-5 align-items-center">
                <div class="col-12 col-sm-6 mb-5 mb-sm-0 text-center col-md-4">
                    <img src="{{ asset('design/ak-ilbirs.png') }}" class="img-fluid" alt="">
                </div>
                <div class="col-1 d-none d-md-block"></div>
                <div class="col-12 col-sm-6 mb-5 mb-sm-0 text-center col-md-4">
                    <img src="{{ asset('design/expresss.png') }}" class="img-fluid" alt="">
                </div>
            </div>
        </div>
    </section>

    @include('design.partials.footer')
        <div class="blob orange" data-toggle="modal" data-target="#modalContactForm">
            <div class="rounded-circle texmart-bg-primary border position-relative call-ico"
                 style="width: 70px; height: 70px; right: 0px; display:flex; align-items: center; justify-content: center;"><img src="{{asset('images/call.png')}}" alt="">
                <div class="btn texmart-bg-primary rounded-pill d-none d-lg-block py-2 px-3 pr-5 text-white position-absolute call-ico-content">свяжитесь с нами</div>
            </div>
            {{--<a href="#" class="text-white d-flex">--}}
                {{--<div class="btn texmart-bg-primary rounded-pill d-none d-lg-block py-2 px-3 pr-5">свяжитесь с нами</div>--}}
                {{--<div class="rounded-circle texmart-bg-primary border position-absolute"--}}
                     {{--style="width: 50px; height: 50px; right: 0px;"><i class="fas fa-phone-volume position-absolute"--}}
                                                                       {{--style="left: 50%; top: 50%; transform: translate(-50%, -50%);"></i>--}}
                {{--</div>--}}
            {{--</a>--}}
        </div>
@include('blocks.buttons.button_request')
    {{--<div class="position-fixed" style="bottom: 10%; right: 5%; z-index: 999">--}}
        {{----}}
    {{--</div>--}}
@endsection

@push('styles')
    <style>
        .new-box {
            box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.15);
            border-radius: 10px;
            background: #FFFFFF;
            height: 40px;
            width: 40px;
        }
    </style>
@endpush
@push('scripts')
    <script>
        $(document).ready(function() {
            $(window).scroll(function() {
                var scrollTop = $(window).scrollTop();
                if (scrollTop >= 50 && window.location.href.indexOf("http://newtexmart/new-design/") < 0 ) {
                    $('.menuse').removeClass('shadow-none');
                    $('.menuse').addClass('solid-nav');
                    $('.menuse').addClass('py-0');
                    $('.menuse').removeClass('pt-3');

                } else if (window.location.href.indexOf("http://newtexmart/new-design/") < 0) {
                    $('.menuse').removeClass('solid-nav');
                    $('.menuse').addClass('shadow-none');
                    $('.menuse').removeClass('py-0');
                    $('.menuse').addClass('pt-3');
                }
            });
            if (window.location.href.indexOf("http://newtexmart/new-design/") >= 0)
            {
                $('.menuse').removeClass('shadow-none');
                $('.menuse').addClass('solid-nav');
                $('.menuse').addClass('py-0');
                $('.menuse').removeClass('pt-3');
            }
        });
    </script>
    <script>
        $(document).ready(function () {
            // slick carousel
            $('#reviews-carousel').slick({
                autoplay: true,
                autoplaySpeed: 3000,
                slidesToShow: 1,
                slidesToScroll: 1,
                prevArrow: '<img src="{{ asset('design/arrow_left.svg') }}" class="slick-prev" style="" />',
                nextArrow: '<img src="{{ asset('design/arrow_right.svg') }}" class="slick-next" style="" />',
                fade: true,
                mobileFirst: true,
                speed: 600
            });

        });
    </script>
    <script>
        $(window).scroll(testScroll);
        var viewed = false;

        function isScrolledIntoView(elem) {
            var docViewTop = $(window).scrollTop();
            var docViewBottom = docViewTop + $(window).height();

            var elemTop = $(elem).offset().top;
            var elemBottom = elemTop + $(elem).height();

            return ((elemBottom <= docViewBottom) && (elemTop >= docViewTop));
        }

        function testScroll() {
            if (isScrolledIntoView($(".numbers")) && !viewed) {
                viewed = true;
                $('.value').each(function () {
                    $(this).prop('Counter', 0).animate({
                        Counter: $(this).text()
                    }, {
                        duration: 1000,
                        easing: 'swing',
                        step: function (now) {
                            $(this).text(Math.ceil(now));
                        }
                    });
                });
            }
        }
    </script>
    <script type="text/javascript">
        $(document).ready(function(){
            $("#pick").on("click","a", function (event) {
                event.preventDefault();
                var id  = $(this).attr('href'),
                    top = $(id).offset().top;
                $('body,html').animate({scrollTop: top}, 700);
            });
        });
    </script>

@endpush
