<section>
    <div class="container py-5">
        <div class="row align-items-center justify-content-center">
            <div class="col-lg-5 col-md-8 col-12 order-1 order-md-0 pr-5">
                <h2 class="mb-3 texmart-text-primary font-weight-bold">Что такое Texmart?</h2>
                <p class="pr-5 font-size-16">Новая платформа ориентированная
                    на поиск заказчиков и производителей
                    текстильной и швейной продукции</p>
                <div class="mt-5">
                    <p class="d-flex mt-4 pr-5">
                        <img src="{{ asset('design/like.svg') }}" alt="">
                        <span class="ml-2 line-height-130 font-size-16">
                                Технология отслеживания контроля качества продукций
                            </span>
                    </p>
                    <p class="d-flex mt-4 pr-5">
                        <img src="{{ asset('design/feed.svg') }}" alt="">
                        <span class="ml-2 line-height-130 font-size-16">
                                Реальные отзывы и рейтинги участников.
                            </span>
                    </p>
                </div>
            </div>
            <div class="col-lg-6 col-md-8 col-12 order-0 order-md-1 mb-4 mb-md-0 mt-lg-0 mt-md-4">
                <a class="fancybox-media" href="https://www.youtube.com/watch?time_continue=3&v=xTYkmWnwLvg">
                    <div class="position-relative ">
                        <img src="{{ asset('img/video.png') }}" data-src="{{ asset('img/video.png') }}" class="img-fluid div-lazy w-100 position-relative" alt="">
                        <img src="{{asset('img/youtube(2).png')}}" data-src="{{asset('img/youtube(2).png')}}" class="youtube div-lazy  position-absolute" style="left: 50%; top: 50%; transform: translate(-50%, -50%); " alt="">
                    </div>
                </a>
            </div>
        </div>
    </div>
</section>

@push('styles')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css">
@endpush
@push('scripts')
    <script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>
    <script src="{{asset('js/jquery.fancybox.min.js')}}"></script>
    <script>
        $('.fancybox-media').fancybox({
            openEffect: 'none',
            closeEffect: 'none',
            helpers: {
                media: {}
            }
        });
    </script>
@endpush