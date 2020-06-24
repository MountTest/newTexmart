@extends('design.layouts.app')
@push('styles')
    <link rel="stylesheet" href="{{ asset('css/new.css') }}">
@endpush
@section('title')
    @if($production->type == 'productions')
        Производство одежды в Киргизии по низким ценам - {{ $production->title }} | texmart.kg
    @elseif($production->type == 'product')
        Одежда оптом в Киргизии по низким ценам - {{ $production->title }} | texmart.kg
    @elseif($production->type == 'service')
        Услуга в Киргизии по низким ценам - {{ $production->title }} | texmart.kg
    @else
        Производство одежды в Киргизии по низким ценам - {{ $production->title }} | texmart.kg
    @endif
@endsection
@section('seo_content')

    @if($production->type == 'productions')
        <meta name="description" content="{{ strip_tags($production->description) }}. Заказать производство одежды оптом в Киргизии по низким ценам от Тексмарт">
    @elseif($production->type == 'product')
        <meta name="description" content="{{ strip_tags($production->description) }}. Купить одежду оптом в Киргизии по низким ценам от Тексмарт">
    @elseif($production->type == 'service')
        <meta name="description" content="{{ strip_tags($production->description) }}. Заказать услугу в Киргизии по низким ценам от Тексмарт">
    @else
        <meta name="description" content="{{ strip_tags($production->description) }}. Заказать производство одежды оптом в Киргизии по низким ценам от Тексмарт">
    @endif
    <meta name="keywords" content="texmart, техмарт, оптом, одежда, оптовая, бишкек, киргизия, кыргызстан, детская, мужская, женская, батальные, размеры, купить, купить одежду, оптовики, оптовая одежда, купить оптом, одежда оптом, {{ $production->title }}">
@endsection
@section('og_content')
    @if($production->type == 'productions')
        <meta property="og:title" content="Производство одежды в Киргизии по низким ценам - {{ $production->title }} | texmart.kg">
    @elseif($production->type == 'product')
        <meta property="og:title" content="Одежда оптом в Киргизии по низким ценам - {{ $production->title }} | texmart.kg">
    @elseif($production->type == 'service')
        <meta property="og:title" content="Услуга в Киргизии по низким ценам - {{ $production->title }} | texmart.kg">
    @else
        <meta property="og:title" content="Производство одежды в Киргизии по низким ценам - {{ $production->title }} | texmart.kg">
    @endif
    <meta property="og:type" content="website" />
    <meta property="og:url" content="{{ request()->url() }}" />
    <meta property="og:image" content="{{ asset('storage/'. $production->logo) }}" />
    @if($production->type == 'productions')
        <meta property="og:description" content="{{ strip_tags($production->description) }}. Заказать производство одежды оптом в Киргизии по низким ценам от Тексмарт">
    @elseif($production->type == 'product')
        <meta property="og:description" content="{{ strip_tags($production->description) }}. Купить одежду оптом в Киргизии по низким ценам от Тексмарт">
    @elseif($production->type == 'service')
        <meta property="og:description" content="{{ strip_tags($production->description) }}. Заказать услугу в Киргизии по низким ценам от Тексмарт">
    @else
        <meta property="og:description" content="{{ strip_tags($production->description) }}. Заказать производство одежды оптом в Киргизии по низким ценам от Тексмарт">
    @endif
@endsection
@section('content')
    {{--<section class="bg-texmart-sidebar fixed-top">--}}
        {{--<div class="container">--}}
            {{--@include('blocks.header')--}}
        {{--</div>--}}
    {{--</section>--}}
    <section class="mt-5 py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-lg-6">
                    <p class="h4 mb-3">
                        {{ $production->title }}
                        {{--                        @include('partials.btn.favorite', ['route' => \Illuminate\Support\Facades\Auth::check() ? '' : route('login'), 'data' => 'data-id='.$production->id.''])--}}
                    </p>
                    <div id="sync1" class="owl-carousel owl-theme">
                        <div class="item">
                            <a href="{{ asset('storage/'.$production->logo) }}" data-fancybox="gallery">
                                <img src="{{ $production->logo && file_exists('storage/'.$production->logo) ? asset('storage/'.$production->logo) : asset('img/2 lg.jpg') }}" alt="">
                            </a>
                        </div>
                        @foreach(json_decode($production->images) as $image)
                            <div class="item">
                                <a href="{{ asset('storage/'.$image) }}" data-fancybox="gallery">
                                    <img src="{{ $production->logo && file_exists('storage/'.$image) ? asset('storage/'.$image) : asset('img/2 lg.jpg') }}" alt="">
                                </a>
                            </div>
                        @endforeach
                    </div>
                    <div id="sync2" class="owl-carousel owl-theme">
                        <div class="item">
                            <a href="{{ asset('storage/'.$production->logo) }}" data-fancybox="gallery">
                                <img src="{{ $production->logo && file_exists('storage/'.$production->logo) ? asset('storage/'.$production->logo) : asset('img/2 lg.jpg') }}" alt="">
                            </a>
                        </div>
                        @foreach(json_decode($production->images) as $image)
                            <div class="item">
                                <a href="{{ asset('storage/'.$image) }}" data-fancybox="gallery">
                                    <img src="{{ $production->logo && file_exists('storage/'.$image) ? asset('storage/'.$image) : asset('img/2 lg.jpg') }}" alt="">
                                </a>
                            </div>
                        @endforeach
                    </div>

                </div>
                <div class="col-lg-6 col-12">
                    <div class="p-4 mt-5" style="box-shadow: 0px 4px 18px rgba(0, 0, 0, 0.13); border-radius: 5px;">
                        <div class="row mb-4">
                            <p class="font-size-14 font-weight-light col-lg-6 col-12">
                                Дата создания объявления: <br>
                                {{ \Carbon\Carbon::parse($production->created_at)->format("yy-m-d") }}
                            </p>
                            <div class="col-lg-6 col-12">


                                <div id="rateYo1"></div>
                                <span class="small">Проверено администрацией Texmart.kg</span>
                            </div>
                        </div>
                        @if($production->brand)
                            <div class="col-12 mb-4">
                                <p class="font-size-14 font-weight-light">
                                    Брэнд: {{ $production->brand }}
                                </p>
                            </div>
                        @endif
                        @if($production->price)
                            <div class="col-12 mb-4">
                                <p class="mb-2 font-size-14 font-weight-light">
                                    Цена в сомах: <span
                                            class="font-weight-bold">{!! round($production->priceKGS, 2) !!}</span>
                                    <span>сом</span>
                                </p>
                                <p class="mb-2 font-size-14 font-weight-light">
                                    Цена в рублях: <span
                                            class="font-weight-bold">{!! round($production->priceRUB, 2) !!}</span>
                                    <span>руб.</span>
                                </p>
                                <p class="mb-2 font-size-14 font-weight-light">
                                    Цена в долларах (США): <span
                                            class="font-weight-bold">${!! round($production->priceUSD, 2) !!}</span>
                                </p>
                            </div>
                        @endif
                        @if($production->address)
                            <div class="col-12 mb-4">
                                <p class="font-size-14 font-weight-light mb-0">
                                    Адрес:
                                </p>
                                <p class="font-size-14 font-weight-light">
                                    {{ $production->address }}
                                </p>
                            </div>
                        @endif
                        @if($production->email)
                            <div class="col-12 mb-4">
                                <p class="font-size-14 font-weight-light mb-0">
                                    Email:
                                </p>
                                <p class="font-size-14 font-weight-light">
                                    {{ $production->email }}
                                </p>
                            </div>
                        @endif
                        @if($production->phone1)
                            <div class="col-12 mb-4">
                                <p class="font-size-14 font-weight-light mb-0">
                                    Телефон № 1:
                                </p>
                                <p class="font-size-14 font-weight-light">
                                    {{ $production->phone1 }}
                                </p>
                            </div>
                        @endif
                        @if($production->phone2)
                            <div class="col-12 mb-4">
                                <p class="font-size-14 font-weight-light mb-0">
                                    Телефон № 2:
                                </p>
                                <p class="font-size-14 font-weight-light">
                                    {{ $production->phone2 }}
                                </p>
                            </div>
                        @endif
                        @if($production->site)
                            <div class="col-12 mb-4">
                                <p class="font-size-14 font-weight-light mb-0">
                                    Личный сайт:
                                </p>
                                <p class="font-size-14 font-weight-light">
                                    {{ $production->site }}
                                </p>
                            </div>
                        @endif
                        <div class="p-lg-4 p-1 row justify-content-md-end justify-content-start">
                            <div class="col-auto d-lg-flex align-items-center d-block">
                                <p class="mb-lg-0 mb-3 mr-2">Поделиться:</p>
                                                            <button class="social-icons ml-lg-2 ml-0 social-share-btn" data-url="{{ request()->url() }}" data-social="whatsapp"><i class="fab fa-whatsapp fa-lg"></i></button>
                                <button class="social-icons ml-2 social-share-btn" data-url="{{ request()->url() }}" data-social="telegram"><i class="fab fa-telegram-plane fa-lg"></i></button>
                                <button class="social-icons ml-2 social-share-btn" data-url="{{ request()->url() }}" data-social="facebook"><i class="fab fa-facebook-square fa-lg"></i></button>
                                {{--<button class="social-icons ml-2 social-share-btn" data-url="{{ request()->url() }}" data-social="instagram"><i class="fab fa-instagram fa-lg"></i></button>--}}
                                <button class="social-icons ml-2 social-share-btn" data-url="{{ request()->url() }}" data-social="vk"><i class="fab fa-vk fa-lg"></i></button>
                            </div>
                        </div>

                        {{--@if(false)--}}
                        {{--<a class="border border-texmart rounded-pill bg-texmart-sidebar text-white py-2 px-2 ">--}}
                        {{--Ветровки и толстовки--}}
                        {{--</a>--}}
                        {{--@endif--}}
                        {{--<ul class="list-inline">--}}
                        {{--<li class="list-inline-item">--}}
                        {{--<div class="my-3" id="rateYo"></div>--}}
                        {{--</li>--}}
                        {{--@if(count($production->feedbacks))--}}
                        {{--<li class="list-inline-item">--}}
                        {{--<a href="#reviews_show" class="text-dark text-dashed">--}}
                        {{--{{ count($production->feedbacks) }} отзывов--}}
                        {{--</a>--}}
                        {{--</li>--}}
                        {{--@endif--}}
                        {{--<li class="list-inline-item">--}}
                        {{--@include('partials.modals.comment')--}}

                        {{--</li>--}}
                        {{--</ul>--}}
                    </div>
                    @if($production->description)
                        <div class="row mt-3">
                            <div class="col-12">
                                <div class="p-2" style="box-shadow: 0px 4px 18px rgba(0, 0, 0, 0.13); border-radius: 5px;">
                                    <p class="font-size-14 font-weight-light border-bottom pb-2">
                                        Описание товара:
                                    </p>
                                    <div class="desc">
                                        {!! $production->description !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
                {{--<div class="col-auto align-self-start">--}}
                {{--<div class="share_customer">--}}
                {{--<span class="span_share font-weight-bold">Поделиться:</span>--}}
                {{--<div class="social_buttons" style="padding: 4px">--}}
                {{--<a href="javascript:void(0)" title="vk" class="social-share-btn" data-url="{{ request()->url() }}" data-social="vk" data-text="{{ $production->title }}" style="width: 30px;height: 30px;">--}}
                {{--<i class="fab fa-vk mr-3 fa-lg nav-scale"></i>--}}
                {{--</a>--}}
                {{--                            <a href="javascript:void(0)" title="instagram" class="social-share-btn" data-url="{{ request()->url() }}" data-social="instagram" data-text="{{ $production->title }}" style="width: 30px;height: 30px;">--}}
                {{--                                <i class="fab fa-instagram mr-3 fa-lg nav-scale"></i>--}}
                {{--                            </a>--}}
                {{--<a href="javascript:void(0)" title="facebook" class="social-share-btn" data-url="{{ request()->url() }}" data-social="facebook" data-text="{{ $production->title }}" style="width: 30px;height: 30px;">--}}
                {{--<i class="fab fa-facebook mr-3 fa-lg nav-scale"></i>--}}
                {{--</a>--}}
                {{--</div>--}}
                {{--</div>--}}
                {{--</div>--}}
            </div>



            @if($others)
                <div class="row mt-4">
                    <div class="col-12">
                        <h3 class="h4">Похожие товары</h3>
                    </div>
                    @foreach($others as $other)
                        <div class="col-lg-3 col-6">
                            <a href="{{ route('productions.show', $other->slug) }}">
                                <div>
                                    <div class="img" style="background-image:url({{$other->logo && file_exists('storage/'.str_replace('\\', '/', $other->logo)) ? asset('storage/'.str_replace('\\', '/', $other->logo)) : asset('img/2 lg.jpg')  }}); height:180px; background-size: cover; background-position: center;">

                                    </div>
                                    <div class="p-2">
                                        <p class="font-size-12 font-weight-bold text-orange">
                                            {{ $other->title }}
                                        </p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            @endif

            {{--@if(count($production->feedbacks))--}}
            {{--<div class="row mt-5" id="reviews_show">--}}
            {{--<div class="col-12">--}}
            {{--<h2>Отзывы</h2>--}}
            {{--</div>--}}
            {{--</div>--}}
            {{--@php($less = false)--}}
            {{--@foreach($production->feedbacks as $feedback)--}}
            {{--@if($loop->index > 2 && $less == false)--}}
            {{--<div id="show-more" class="" style="">--}}
            {{--<a href="#" class="show-more text-dark font-weight-bold">Показать больше</a>--}}
            {{--</div>--}}
            {{--@php($less = true)--}}
            {{--@endif--}}
            {{--<div class="row ty-compact-list">--}}
            {{--<div class="col-12 my-3">--}}
            {{--<div class="card shadow-sm">--}}
            {{--<div class="card-body">--}}
            {{--@if($feedback->user)--}}
            {{--@if($feedback->user->role_id == 1)--}}
            {{--<p class="small text-muted">--}}
            {{--<i class="fas fa-star text-warning"></i>--}}
            {{--&nbsp;Проверено администрацией Texmart.kg--}}
            {{--</p>--}}
            {{--@endif--}}
            {{--@endif--}}
            {{--<div class="d-flex align-items-center">--}}
            {{--<p class="m-0">{{ $feedback->feedback }}</p>--}}
            {{--<div class="ml-auto" id="rateYo-{{ $feedback->id }}"></div>--}}
            {{--</div>--}}
            {{--</div>--}}
            {{--</div>--}}
            {{--</div>--}}
            {{--</div>--}}
            {{--@endforeach--}}

            {{--@endif--}}

        </div>
    </section>

@endsection

@push('styles')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css">
    {{--style for owl carousel--}}
    <style>
        #sync1 .item {
            background: gold;
            padding: 1px 0px;
            margin: 5px;
            color: #FFF;
            border-radius: 3px;
            text-align: center;
        }

        #sync2 .item {
            background: red;
            padding: 5px 0px;
            margin: 5px;
            color: #FFF;
            border-radius: 3px;
            text-align: center;
            cursor: pointer;
        }

        #sync2 .item h1 {
            font-size: 18px;
        }

        #sync2 .current .item {
            background: gold;
        }

        .owl-theme .owl-nav [class*='owl-'] {
            transition: all 0.3s ease;
        }

        .owl-theme .owl-nav [class*='owl-'].disabled:hover {
            background-color: gold;
        }

        #sync1.owl-theme {
            position: relative;
        }

        #sync1.owl-theme .owl-next,
        #sync1.owl-theme .owl-prev {
            width: 22px;
            height: 40px;
            margin-top: -20px;
            position: absolute;
            top: 50%;
        }

        #sync1.owl-theme .owl-prev {
            left: 10px;
        }

        #sync1.owl-theme .owl-next {
            right: 10px;
        }

    </style>
@endpush

@push('scripts')
    <script>
        if ($('.ty-compact-list').length > 3) {
            $('.ty-compact-list:gt(2)').hide();
            $('.show-more').show();
        }
        $('.show-more').on('click', function (e) {
            e.preventDefault();
            //toggle elements with class .ty-compact-list that their index is bigger than 2
            $('.ty-compact-list:gt(2)').toggle(300);
            //change text of show more element just for demonstration purposes to this demo
            $(this).text() === 'Показать больше' ? $(this).text('Показать меньше') : $(this).text('Показать больше');
        });
    </script>
    <script>
        $('.social-share-btn').click(e => {
            let btn = $(e.currentTarget);
            let social = btn.data('social');
            let url = btn.data('url');
            let text = btn.data('text');

            if (social == 'facebook') {
                url = 'https://facebook.com/sharer/sharer.php?u=' + url;
                window.open(url, "popupWindow", "width=600,height=600,scrollbars=yes");
            }
            if (social == 'vk') {
                url = 'https://vk.com/share.php?url=' + url;
                window.open(url, "popupWindow", "width=600,height=600,scrollbars=yes");
            }
            if (social == 'telegram') {
                url = 'https://t.me/share/url?url='+ url;
                window.open(url, "popupWindow", "width=600, height=600, scrollbars=yes");
            }
            if (social == 'whatsapp') {
                url = 'https://wa.me/?text='+encodeURIComponent(window.location.href);
                window.open(url, "popupWindow", "width=600, height=600, scrollbars=yes");
            }
            // if (social == 'instagram') {
            //     window.open($(this).attr("href", 'https://vk.com/share.php?url=' + url), "popupWindow", "width=600,height=600,scrollbars=yes");
            // }
        })
    </script>
    @includeWhen(auth()->check(), 'partials.scripts.favorite_click')
    <script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>
    <script src="https://api-maps.yandex.ru/2.1/?apikey={{ env('YANDEX_MAPS_API_KEY') }}&lang=ru_RU"
            type="text/javascript"></script>
    @if(count($production->getCoordinates()))
        <script src="https://api-maps.yandex.ru/2.1/?apikey={{ env('YANDEX_MAPS_API_KEY') }}&lang=ru_RU"
                type="text/javascript"></script>
        <script type="text/javascript">
            ymaps.ready(init);
            function init() {
                let production = new ymaps.Placemark(['{{ $production->getCoordinates()[0]["lng"] }}', '{{ $production->getCoordinates()[0]["lat"] }}'],
                    {}, {
                        preset: 'islands#icon',
                        color: '#0095b6'
                    });
                var myMap = new ymaps.Map("map", {
                    center: ['{{ $production->getCoordinates()[0]["lng"] }}', '{{ $production->getCoordinates()[0]["lat"] }}'],
                    zoom: 13
                });
                myMap.geoObjects.add(production);
            }
        </script>
    @endif
    {{--two owl carousels--}}}
    <script>
        $(document).ready(function () {

            var sync1 = $("#sync1");
            var sync2 = $("#sync2");
            var slidesPerPage = 4;
            var syncedSecondary = true;

            sync1.owlCarousel({
                items: 1,
                slideSpeed: 2000,
                nav: true,
                autoplay: true,
                dots: false,
                loop: true,
                responsiveRefreshRate: 200,
                navText: ['<svg width="100%" height="100%" viewBox="0 0 11 20"><path style="fill:none;stroke-width: 1px;stroke: #000;" d="M9.554,1.001l-8.607,8.607l8.607,8.606"/></svg>', '<svg width="100%" height="100%" viewBox="0 0 11 20" version="1.1"><path style="fill:none;stroke-width: 1px;stroke: #000;" d="M1.054,18.214l8.606,-8.606l-8.606,-8.607"/></svg>'],
            }).on('changed.owl.carousel', syncPosition);

            sync2
                .on('initialized.owl.carousel', function () {
                    sync2.find(".owl-item").eq(0).addClass("current");
                })
                .owlCarousel({
                    items: slidesPerPage,
                    dots: false,
                    nav: false,
                    smartSpeed: 200,
                    slideSpeed: 500,
                    slideBy: slidesPerPage,
                    responsiveRefreshRate: 100
                }).on('changed.owl.carousel', syncPosition2);

            function syncPosition(el) {

                var count = el.item.count - 1;
                var current = Math.round(el.item.index - (el.item.count / 2) - .5);

                if (current < 0) {
                    current = count;
                }
                if (current > count) {
                    current = 0;
                }

                //end block

                sync2
                    .find(".owl-item")
                    .removeClass("current")
                    .eq(current)
                    .addClass("current");
                var onscreen = sync2.find('.owl-item.active').length - 1;
                var start = sync2.find('.owl-item.active').first().index();
                var end = sync2.find('.owl-item.active').last().index();

                if (current > end) {
                    sync2.data('owl.carousel').to(current, 100, true);
                }
                if (current < start) {
                    sync2.data('owl.carousel').to(current - onscreen, 100, true);
                }
            }

            function syncPosition2(el) {
                if (syncedSecondary) {
                    var number = el.item.index;
                    sync1.data('owl.carousel').to(number, 100, true);
                }
            }

            sync2.on("click", ".owl-item", function (e) {
                e.preventDefault();
                var number = $(this).index();
                sync1.data('owl.carousel').to(number, 300, true);
            });

            $('.owl-next').click(function () {

                $('.owl-carousel').trigger('stop.owl.autoplay');

            });

        });


    </script>

    {{--rateyo.js--}}
    <script>
        $(function () {

            $("#rateYo").rateYo({
                rating: '{{ $production->rating ? $production->rating : '0' }}',
                halfStar: true,
                readOnly: true,
                starWidth: "20px"
            });

        });
    </script>
    <script>
        $(function () {

            $("#rateYo1").rateYo({
                rating: '{{ $production->expert ? $production->expert : '0' }}',
                halfStar: true,
                readOnly: true,
                starWidth: "20px"
            });
        });

    </script>
    <script>
        $(function () {
            @if(count($production->feedbacks))
            @foreach($production->feedbacks as $feedback)
            $("#rateYo-{{ $feedback->id }}").rateYo({
                rating: '{{ $feedback->rating ? $feedback->rating : '0' }}',
                halfStar: true,
                readOnly: true,
                starWidth: "20px"
            });
            @endforeach
            @endif
        })
    </script>
    <script>
        $(function () {
            $("#rateYo-comment").rateYo({
                rating: '0',
                fullStar: true,
                starWidth: "20px"
            }).on("rateyo.set", function (e, data) {
                let rating = data.rating;
                console.log(rating);
                $('#input_rating').val(rating);
            });
        })
    </script>
@endpush
