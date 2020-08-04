@extends('design.layouts.app')
@section('title')
    Производство одежды в Киргизии по низким ценам | texmart.kg
@endsection
@section('content')
{{--@dd(auth())--}}
    <div class="container-fluid" style="margin-top: 61px;">
        @include('profile.partials.userbar')
        {{--<div class="row pt-5 align-items-center">--}}
            {{--<div class="col-2">--}}
                {{--<img class="img-fluid" src="{{ asset('storage/'. auth()->user()->avatar) }}" alt="">--}}
            {{--</div>--}}
            {{--<div class="col-auto">--}}
                {{--<p>{{ auth()->user()->name }}</p>--}}
            {{--</div>--}}
        {{--</div>--}}
        <div class="row">
            <div class="col-12 col-lg-3 d-none d-lg-block px-0">
                {{--@include('profile.partials.sidebar')--}}
                @include('profile.partials.newsidebar')
            </div>
            <div class="col pt-4 px-lg-2 px-0">
                <section class="blog-components">
                @yield('profile_content')
                </section>
            </div>
            @if(false)
                @if(request()->is('profile/dashboard*'))
                    <div class="col-12 col-lg-3">
                        @include('profile.partials.right-sidebar')
                    </div>
                @endif
            @endif
        </div>
    </div>
@endsection

@push('scripts')
    <script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
    <script>
        tinymce.init({
            selector:'textarea.description',
        });
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/intro.js/2.9.3/intro.min.js"></script>
    {{--<script src="https://api-maps.yandex.ru/2.1/?apikey={{ env('YANDEX_MAPS_API_KEY') }}&lang=ru_RU" type="text/javascript"></script>--}}
    <script>
        var ctx = document.getElementById('myChart').getContext('2d');
        var chart = new Chart(ctx, {
            // The type of chart we want to create
            type: 'line',

            // The data for our dataset
            data: {
                labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
                datasets: [{
                    label: 'My First dataset',
                    backgroundColor: 'rgb(255, 99, 132)',
                    borderColor: 'rgb(255, 99, 132)',
                    data: [0, 10, 5, 2, 20, 30, 45]
                }]
            },

            // Configuration options go here
            options: {}
        });
    </script>
    @push('styles')
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intro.js/2.9.3/introjs.min.css">
        <link rel="stylesheet" href="{{asset("css/intlTelInput.min.css")}}">
        <link rel="stylesheet" href="{{ asset('css/main.css')}}">
        <link rel="stylesheet" href="{{ asset('css/cropper.min.css') }}">
    @endpush
    @push('scripts')
        <script src="https://cdnjs.cloudflare.com/ajax/libs/intro.js/2.9.3/intro.min.js"></script>
        <script src="{{ asset('js/comboTreePlugin.js') }}"></script>
        <script src="{{ asset('js/icontains.js') }}"></script>
    @endpush
    @push('scripts')

        @if(false)
            <script>
                let intro = introJs();
                intro.setOptions({
                    prevLabel:"Назад",
                    nextLabel:"Вперед",
                    skipLabel:"Пропустить",
                    doneLabel:"Готово",
                    showProgress:true,
                    steps: [
                        {
                            element: '.col-12.col-lg-3.d-none.d-lg-block .step1',
                            intro: "Добро пожаловать в профиль, в раздел ленты "
                        },
                        {
                            element: '.blog-components',
                            intro: "Здесь вы можете просматривать топ 10 объявлений от закзачиков!",
                        },
                        {
                            element: '.step3',
                            intro: 'На этом графике вы можете просматривать статистику показов ваших объявлений',
                            position: "left"
                        },
                        {
                            element: '.col-12.col-lg-3.d-none.d-lg-block .step4',
                            intro: "Нажмите на кнопку подать объявления",
                            disableInteraction:false
                        },
                        {
                            element: '.col-12.col-lg-3.d-none.d-lg-block .step5',
                            intro: 'Три вида объявлений:'
                        },
                        {
                            element: '.col-12.col-lg-3.d-none.d-lg-block .step6',
                            intro: 'Здесь вы можете просмотреть и создать объявления по категории производственных цехов и фабрик'
                        },
                        {
                            element: '.col-12.col-lg-3.d-none.d-lg-block .step7',
                            intro: 'Здесь вы можете просмотреть и создать объявления по категории товаров'
                        },
                        {
                            element: '.col-12.col-lg-3.d-none.d-lg-block .step8',
                            intro: 'Здесь вы можете просмотреть и создать объявления по категории услуги'
                        },
                        {
                            element: '.col-12.col-lg-3.d-none.d-lg-block .step9',
                            intro: 'Здесь вы можете настроить свой аккаунт'
                        },
                        {
                            element: '.col-12.col-lg-3.d-none.d-lg-block .step10',
                            intro: 'Нажав на кнопку выход,вы можете выйти из своего профиля'
                        },
                    ]
                });
                intro.start();
                introJs().onexit(function() {
                    alert("exit of introduction");
                });

                $('.step4').one('click',function (e) {
                    intro.goToStep(4).start();
                });

                intro.onbeforechange(function(targetElement) {
                    if ($('.step5')[1] == $(targetElement)[0]) {
                        $('.col-12.col-lg-3.d-none.d-lg-block .step4').trigger("click")
                    }
                });
            </script>
        @endif
    @endpush
@endpush
