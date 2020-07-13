<div class="container py-5">
    <div class="row justify-content-center align-items-center">
        <div class="col-12 col-md-9 col-lg-4 pb-lg-0 pb-md-5">
            <h2 class="mb-5 h1 texmart-text-primary font-weight-medium" style="width: 120%;">Заявки от заказчиков </h2>
            <div class="slider">
                @foreach($announces as $announce)
                    <div class="item_slider">
                        <div class="application_for" style="border-color: rgba(205, 136, 45, 0.52);">
                            <div class="app_content">
                                <div class="app_top">
                                    {{--@dd($announce)--}}
                                    <a class="text-dark" href="{{ route('announce.show', $announce) }}">
                                        <p class="m-0" title="{{ $announce->content }}">
                                            {{ \Illuminate\Support\Str::limit($announce->content, 150) }}
                                        </p>
                                    </a>
                                </div>
                                <div class="app_bottom">
                                    <div>
                                        @if(isset($announce->category->title))
                                        <div class="d-flex align-items-center"
                                             style="border:0.7px solid #000000; border-radius:5px; padding:4px 25px;">
                                            {{ isset($announce->category->title) ? $announce->category->title : '' }}
                                        </div>
                                        @endif
                                    </div>
                                    @if(isset($announce->locate))
                                        <div class="d-flex align-items-center justify-content-start ml-4">
                                            <div class="iti__flag iti__{{$announce->locate}}">
                                            </div>
                                        </div>
                                    @endif
                                </div>

                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="form-group text-center mt-5">
                <a href="{{ route('announces.list') }}" class="btn text-white px-5 py-2 texmart-border-radius texmart-bg-primary fade-link">Все заявки</a>
            </div>
        </div>
        <div class="col-1 d-none d-lg-block"></div>
        <div class="col-12 col-md-9 texmart-shadow texmart-border-radius col-lg-5 px-5 mt-5 pt-5 mt-lg-0 pt-lg-0">
            <form action="{{ route('profile.announce.store') }}" class="py-4" id="announce-store" enctype="multipart/form-data" method="post">
                @csrf
                <h2 class="text-center texmart-text-primary mb-4">Создайте заявку</h2>
                <div class="steps" id="step-1">
                <div class="form-group">
                    <label for="comment" class="texmart-text-grey">Составьте подробное описание продукции, <br> которую вы ищете <span class="text-danger">*</span></label>
                    <textarea name="announce_description" class="form-control step1-comment" id="comment" cols="30" rows="5"></textarea>
                    <p class="mb-0 text-danger font-size-12 py-1" style="display: none;">Заполните поле</p>
                </div>
                <div class="form-group">
                    <label for="name" class="texmart-text-grey">Введите ФИО <span class="text-danger">*</span></label>
                    <input name="user_name" class="form-control step1-name" id="name"/>
                    <p class="mb-0 text-danger font-size-12 py-1" style="display: none;">Заполните поле</p>
                    <div class="mb-0 text-danger font-size-12 py-1" id="email_check" style="display: none;">Такой Email занят</div>
                </div>
                    <div class="form-group">
                        <label for="phone-number" class="d-block texmart-text-grey"> {{ __('Ваш телефонный номер:') }} <span class="text-danger">*</span>
                        </label>
                        <input type="hidden" name="code" id="step-code">
                        <input type="text"
                               class="form-control @error('phone') is-invalid @enderror step1-phone"
                               name="user_phone" required autocomplete="phone"
                               id="phone-number">
                        @error('phone')
                        <span class="invalid-feedback d-block first-uppercase" role="alert">
                                        <strong class="">{{ $message }}</strong>
                                    </span>
                        @enderror
                        <p class="mb-0 text-danger font-size-12 py-1" style="display: none;">Заполните поле</p>
                        <div class="mb-0 text-danger font-size-12 py-1" id="phone_check" style="display: none;">Номер некорректный, либо занят</div>
                    </div>
                <div class="form-group text-center">
                    <div class="btn text-white px-5 py-2 texmart-border-radius texmart-bg-primary" id="slide-step-1">Далее</div>
                </div>
                <div class="text-center">
                    <p class="text-center font-weight-normal font-size-18">шаг <span class="text-orange">1/2</span></p>
                </div>
                </div>
                <div class="steps" id="step-2" style="display:none;">
                    <div class="form-group">
                        <label for="country texmart-text-grey">Выберите страну <span class="text-danger">*</span></label>
                        <select name="country" class="form-control w-100" id="country" required>
                            <option value="kg">Кыргызстан</option>
                            <option value="ru">Россия</option>
                            <option value="kz">Казахстан</option>
                            <option value="uz">Узбекистан</option>
                            <option value="af">Афганистан</option>
                            <option value="ax">Аландские острова</option>
                            <option value="al">Албания</option>
                            <option value="dz">Алжир</option>
                            <option value="as">Американское Самоа</option>
                            <option value="ad">Андорра</option>
                            <option value="ao">Ангола</option>
                            <option value="ai">Ангилья</option>
                            <option value="ag">Антигуа и Барбуда</option>
                            <option value="ar">Аргентина</option>
                            <option value="am">Армения</option>
                            <option value="aw">Аруба</option>
                            <option value="au">Австралия</option>
                            <option value="at">Австрия</option>
                            <option value="az">Азербайджан</option>
                            <option value="bs">Багамы</option>
                            <option value="bh">Бахрейн</option>
                            <option value="bd">Бангладеш</option>
                            <option value="bb">Барбадос</option>
                            <option value="by">Беларусия</option>
                            <option value="be">Бельгия</option>
                            <option value="bz">Белиз</option>
                            <option value="bj">Бенин</option>
                            <option value="bm">Бермуды</option>
                            <option value="bt">Бутан</option>
                            <option value="bo">Боливия</option>
                            <option value="ba">Босния и Герцеговина</option>
                            <option value="bw">Ботсвана</option>
                            <option value="br">Бразилия</option>
                            <option value="io">Британская территория в Индийском океане</option>
                            <option value="bn">Бруней</option>
                            <option value="bg">Болгария</option>
                            <option value="bf">Буркина Фасо</option>
                            <option value="bi">Бурунди</option>
                            <option value="kh">Камбоджа</option>
                            <option value="cm">Камерун</option>
                            <option value="ca">Канада</option>
                            <option value="cv">Кабо-Верде</option>
                            <option value="ky">Кайманские острова</option>
                            <option value="cf">Центральноафриканская Республика</option>
                            <option value="td">Чад</option>
                            <option value="cl">Чили</option>
                            <option value="cn">Китай</option>
                            <option value="cx">Остров Рождества</option>
                            <option value="cc">Кокосовые острова (Килинг)</option>
                            <option value="co">Колумбия</option>
                            <option value="km">Коморы</option>
                            <option value="cg">Конго</option>
                            <option value="cd">ДР Конго</option>
                            <option value="ck">Острова Кука</option>
                            <option value="cr">Коста-Рика</option>
                            <option value="ci">Кот Д'Ивуар</option>
                            <option value="hr">Хорватия</option>
                            <option value="cu">Куба</option>
                            <option value="cw">Кюрасао</option>
                            <option value="cy">Кипр</option>
                            <option value="cz">Чехия</option>
                            <option value="dk">Дания</option>
                            <option value="dj">Джибути</option>
                            <option value="dm">Доминика</option>
                            <option value="do">Доминиканская республика</option>
                            <option value="ec">Эквадор</option>
                            <option value="eg">Египет</option>
                            <option value="sv">Сальвадор</option>
                            <option value="gq">Экваториальная Гвинея</option>
                            <option value="er">Эритрея</option>
                            <option value="ee">Эстония</option>
                            <option value="et">Эфиопия</option>
                            <option value="fk">Фолклендские острова</option>
                            <option value="fo">Фарерские острова</option>
                            <option value="fj">Фиджи</option>
                            <option value="fi">Финляндия</option>
                            <option value="fr">Франция</option>
                            <option value="gf">Французская Гвиана</option>
                            <option value="pf">Французская Полинезия</option>
                            <option value="ga">Габон</option>
                            <option value="gm">Гамбия</option>
                            <option value="ge">Грузия</option>
                            <option value="de">Германия</option>
                            <option value="gh">Гана</option>
                            <option value="gi">Гибралтар</option>
                            <option value="gr">Греция</option>
                            <option value="gl">Гренландия</option>
                            <option value="gd">Гренада</option>
                            <option value="gp">Гваделупа</option>
                            <option value="gu">Гуам</option>
                            <option value="gt">Гватемала</option>
                            <option value="gg">Гернси</option>
                            <option value="gn">Гвинея</option>
                            <option value="gw">Гвинеи-Бисау</option>
                            <option value="gy">Гайана</option>
                            <option value="ht">Гаити</option>
                            <option value="hn">Гондурас</option>
                            <option value="hk">Гонг Конг</option>
                            <option value="hu">Венгрия</option>
                            <option value="is">Исландия</option>
                            <option value="in">Индия</option>
                            <option value="id">Индонезия</option>
                            <option value="ir">Иран</option>
                            <option value="iq">Ирак</option>
                            <option value="ie">Ирландия</option>
                            <option value="im">Остров Мэн</option>
                            <option value="il">Израиль</option>
                            <option value="it">Италия</option>
                            <option value="jm">Ямайка</option>
                            <option value="jp">Япония</option>
                            <option value="je">Джерси</option>
                            <option value="jo">Иордания</option>
                            <option value="ke">Кения</option>
                            <option value="ki">Кирибати</option>
                            <option value="kw">Кувейт</option>
                            <option value="la">Лаос</option>
                            <option value="lv">Латвия</option>
                            <option value="lb">Латвия</option>
                            <option value="ls">Лесото</option>
                            <option value="lr">Либерия</option>
                            <option value="ly">Ливия</option>
                            <option value="li">Лихтенштейн</option>
                            <option value="lt">Литва</option>
                            <option value="lu">Люксембург</option>
                            <option value="mo">Макао</option>
                            <option value="mk">Македония</option>
                            <option value="mg">Мадагаскар</option>
                            <option value="mw">Малави</option>
                            <option value="my">Малайзия</option>
                            <option value="mv">Мальдивы</option>
                            <option value="ml">Мали</option>
                            <option value="mt">Мальта</option>
                            <option value="mh">Маршалловы острова</option>
                            <option value="mq">Мартиника</option>
                            <option value="mr">Мавритания</option>
                            <option value="mu">О. Маврикий</option>
                            <option value="yt">Майотта</option>
                            <option value="mx">Мексика</option>
                            <option value="fm">Федеральные Штаты Микронезии</option>
                            <option value="md">Молдова</option>
                            <option value="mc">Монако</option>
                            <option value="mn">Монголия</option>
                            <option value="me">Черногория</option>
                            <option value="ms">Монтсеррат</option>
                            <option value="ma">Марокко</option>
                            <option value="mz">Мозамбик</option>
                            <option value="mm">Мьянма</option>
                            <option value="na">Намибия</option>
                            <option value="nr">Науру</option>
                            <option value="np">Непал</option>
                            <option value="nl">Нидерланды</option>
                            <option value="nc">Новая Каледония</option>
                            <option value="nz">Новая Зеландия</option>
                            <option value="ni">Никарагуа</option>
                            <option value="ne">Нигер</option>
                            <option value="ng">Нигерия</option>
                            <option value="nu">Нигерия</option>
                            <option value="nf">Остров Норфолк</option>
                            <option value="kp">Северная Корея</option>
                            <option value="mp">Северные Марианские о-ва</option>
                            <option value="no">Норвегия</option>
                            <option value="om">Оман</option>
                            <option value="pk">Пакистан</option>
                            <option value="pw">Палау</option>
                            <option value="ps">Палестина</option>
                            <option value="pa">Панама</option>
                            <option value="pg">Папуа Новая Гвинея</option>
                            <option value="py">Парагвай</option>
                            <option value="pe">Перу</option>
                            <option value="ph">Филиппины</option>
                            <option value="pn">о-ва Питкэрн</option>
                            <option value="pl">Польша</option>
                            <option value="pt">Португалия</option>
                            <option value="pr">Пуэрто-Рико</option>
                            <option value="qa">Катар</option>
                            <option value="re">Реюньон</option>
                            <option value="ro">Румыния</option>
                            <option value="rw">Руанда</option>
                            <option value="bl">Сен-Бартелеми</option>
                            <option value="sh">о-в, Св. Елены</option>
                            <option value="kn">Сент-Китс и Невис</option>
                            <option value="lc">Сент-Люсия</option>
                            <option value="mf">Сент-Мартен</option>
                            <option value="pm">Сен-Пьер</option>
                            <option value="vc">Сент-Винсент и Гренадины</option>
                            <option value="ws">Самоа</option>
                            <option value="sm">Сан Марино</option>
                            <option value="st">Сан-Томе и Принсипи</option>
                            <option value="sa">Саудовская Аравия</option>
                            <option value="sn">Сенегал</option>
                            <option value="rs">Сербия</option>
                            <option value="sc">Сейшелы</option>
                            <option value="sl">Сьерре Леоне</option>
                            <option value="sg">Сингапур</option>
                            <option value="sx">Синт-Мартен</option>
                            <option value="sk">Словакия</option>
                            <option value="si">Словения</option>
                            <option value="sb">Соломоновы острова</option>
                            <option value="so">Сомали</option>
                            <option value="za">Южно-Африканская Республика</option>
                            <option value="gs">Южная Георгия и Южные Сандвичевы острова</option>
                            <option value="kr">Южная Корея</option>
                            <option value="ss">Южный Судан</option>
                            <option value="es">Испания</option>
                            <option value="lk">Шри Ланка</option>
                            <option value="sd">Судан</option>
                            <option value="sr">Суринам</option>
                            <option value="sj">Шпицберг</option>
                            <option value="sz">Свазиленд</option>
                            <option value="se">Швеция</option>
                            <option value="ch">Швейцария</option>
                            <option value="sy">Сирия</option>
                            <option value="tw">Тайвань</option>
                            <option value="tj">Таджикистан</option>
                            <option value="tz">Танзания</option>
                            <option value="th">Тайланд</option>
                            <option value="tl">Восточный Тимор</option>
                            <option value="tg">Того</option>
                            <option value="tk">Токелау</option>
                            <option value="to">Тонга</option>
                            <option value="tt">Тринидад и Тобаго</option>
                            <option value="tn">Тунис</option>
                            <option value="tr">Турция</option>
                            <option value="tm">Туркменистан</option>
                            <option value="tc">Острова Теркс и Кайкос</option>
                            <option value="tv">Тувалу</option>
                            <option value="ug">Уганда</option>
                            <option value="ua">Украина</option>
                            <option value="ae">ОАЭ</option>
                            <option value="gb">Великобритания</option>
                            <option value="us">США</option>
                            <option value="um">Внешние малые о-ва (США)</option>
                            <option value="uy">Уругвай</option>
                            <option value="vu">Вануату</option>
                            <option value="ve">Венесуэла</option>
                            <option value="vn">Вьетнам</option>
                            <option value="wf">о-ва Уоллис и Футуна</option>
                            <option value="eh">Западная Сахара</option>
                            <option value="ye">Йемен</option>
                            <option value="zm">Замбия</option>
                            <option value="zw">Зимбабве</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="category">Выберите категорию <span class="text-danger">*</span></label>
                        <select name="category" class="form-control" id="category">
                            @foreach(\App\Category::where('parent_id',null)->get() as $category)
                                <option value="{{$category->id}}">{{$category->title}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="price">Заполните цену <span class="text-danger">*</span></label>
                        <div class="input-group">
                            <input type="text" name="price" id="price" class="form-control step2-price" placeholder="Цена от ..." required>
                            <select class="" name="currency" id="inputGroupSelect01">
                                @foreach(['$', 'сом', 'руб'] as $currency)
                                    <option value="{{ $currency }}" {{ $currency == old('currency') ? 'selected' : '' }}>{{ $currency }}</option>
                                @endforeach
                            </select>
                        </div>
                        <p class="mb-0 text-danger font-size-12 py-1" style="display: none;">Заполните поле</p>
                    </div>
                    <div class="form-group">
                        <label for="date">Выберите срок объявления, до... <span class="text-danger">*</span></label>
                        <div class="input-group">
                            <input type="text" name="date" id="date" class="form-control date step2-date" placeholder="Выберите дату..." required>
                        </div>
                        <p class="mb-0 text-danger font-size-12 py-1" style="display: none;">Заполните поле</p>
                    </div>
                    <div class="form-group text-center d-flex justify-content-center">
                        <div class="btn text-white px-5 py-2 texmart-border-radius texmart-bg-primary" id="back-step-2">Назад</div>
                        <div class="btn text-white px-5 py-2 texmart-border-radius texmart-bg-primary" id="submit-step-2">Создать</div>
                    </div>
                    <div class="text-center">
                        <p class="text-center font-weight-normal font-size-18">шаг <span class="text-orange">2/2</span></p>
                    </div>
                </div>
                {{--<div class="steps" id="step-3">--}}
                    {{--<div class="form-group">--}}
                        {{--<label for="name" class="texmart-text-grey">Введите ФИО</label>--}}
                        {{--<input name="user_name" class="form-control border-dark" id="name"/>--}}
                    {{--</div>--}}

                    {{--<div class="form-group text-center">--}}
                        {{--<div class="btn text-white px-5 py-2 texmart-border-radius texmart-bg-primary" id="slide-step-1">Далее</div>--}}
                    {{--</div>--}}
                    {{--<div class="text-center">--}}
                        {{--<p class="text-center font-weight-normal font-size-18">шаг <span class="text-orange">1/3</span></p>--}}
                    {{--</div>--}}
                {{--</div>--}}
            </form>
        </div>
    </div>
</div>
@push('styles')
    <link rel="stylesheet" href="{{ asset('css/select2.min.css') }}">
    <link  rel="stylesheet"  href = "{{asset("css/intlTelInput.min.css")}}">
    <style>
        .iti--separate-dial-code .iti__selected-flag {
            background-color: rgba(0,0,0,0);
        }
        .iti
        {
            width:100%;
        }
    </style>
@endpush
@push('scripts')
    <script>
        $('#slide-step-1').click(function () {
            // document.getElementById('step-1').style.left = "-400px";
            if($('.step1-comment').val() != '' && $('.step1-name').val() != '' && $('.step1-phone').val() != '' && $('.step1-phone').hasClass('valid') == true)
            {
                $('#step-1').hide(500);
                $('#step-2').show(500);
            }
            else 
            {
                // console.log($('.step1-name').val());
                // console.log($('.step1-phone').val());
                if ($('.step1-comment').val() == '')
                {
                    $('.step1-comment').addClass('border-red');
                    $('.step1-comment').parent().find('p').show();

                    setTimeout(function () {
                      $('.step1-comment').removeClass('border-red');
                      $('.step1-comment').parent().find('p').hide();
                    },5000);
                }

                if($('.step1-name').val() == '')
                {
                    $('.step1-name').addClass('border-red');
                    $('.step1-name').parent().find('p').show();

                    setTimeout(function () {
                        $('.step1-name').removeClass('border-red');
                        $('.step1-name').parent().find('p').hide();
                    },5000);
                }

                if($('.step1-phone').val() == '')
                {
                    $('.step1-phone').addClass('border-red');
                    $('.step1-phone').parents().eq(1).find('p').show();
                    // console.log($('.step1-phone').parents().eq(2).find('p').show());

                    setTimeout(function () {
                        $('.step1-phone').removeClass('border-red');
                        $('.step1-phone').parents().eq(1).find('p').hide();
                    },5000);
                }
            }
        });

        $('#back-step-2').click(function () {
            $('#step-2').hide(500);
            $('#step-1').show(500);
        });

        $('#submit-step-2').click(function () {
            if($('.step2-price').val() != '' && $('.step2-date').val() != '')
            {
                $('#announce-store').submit();
            }
            else
            {
                if ($('.step2-price').val() == '')
                {
                    $('.step2-price').addClass('border-red');
                    $('.step2-price').parents().eq(1).find('p').show();

                    setTimeout(function () {
                        $('.step2-price').removeClass('border-red');
                        $('.step2-price').parents().eq(1).find('p').hide();
                    },5000);
                }

                if($('.step2-date').val() == '')
                {
                    $('.step2-date').addClass('border-red');
                    $('.step2-date').parents().eq(1).find('p').show();

                    setTimeout(function () {
                        $('.step2-date').removeClass('border-red');
                        $('.step2-date').parents().eq(1).find('p').hide();
                    },5000);
                }
            }
        });


        $('.step1-phone').focusout( function (e) {
            var phone = $(e.currentTarget).val();
            var code = $('#step-code').val();

            $.ajax({
                method: "POST",
                url: '{{ route('phone_check') }}',
                data: {
                    '_token': "{{ csrf_token() }}",
                    'phone': phone,
                    'code': code,
                },
                success: data => {
                    if (data.check == true)
                    {
                        $('.step1-phone').addClass('border-red');
                        $('#phone_check').show();
                        $('.step1-phone').removeClass('valid');

                    }
                    else
                    {
                        $('.step1-phone').removeClass('border-red');
                        $('#phone_check').hide();
                        $('.step1-phone').addClass('valid');
                    }
                },
                error: () => {
                }
            })
        })

    </script>
    <script>
        $(document).ready(function () {
            // slick carousel
            $('.slider').slick({
                vertical: true,
                autoplay: true,
                autoplaySpeed: 3000,
                slidesToShow: 4,
                slidesToScroll: 1,
                touchmove: false,
                swipeToSlide: false,
                touchThreshold: false,
                draggable: false,
                verticalSwiping: false,
            });

        });
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.js"></script>
    <script src="{{ asset('js/intlTelInput-jquery.min.js') }}"></script>
    <script>
        /* INITIALIZE BOTH INPUTS WITH THE intlTelInput FEATURE*/

        $("#phone-number").intlTelInput({
            initialCountry: "kg",
            preferredCountries: ["ru", "kg", "kz", "uz", "by"],
            separateDialCode: true,
            excludeCountries: ["xk"],
            geoIpLookup: function (callback) {
                $.get('https://ipinfo.io', function () {
                }, "jsonp").always(function (resp) {
                    var countryCode = (resp && resp.country) ? resp.country : "";
                    console.log(countryCode);
                    callback(countryCode);
                });
            },
            utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/11.0.14/js/utils.js"
        });
        $('#phone-number').on('focus', function(e) {
            let input = $(e.currentTarget);
            let code = input.siblings('.iti__flag-container').find('.iti__selected-dial-code').html();
            input.parent().siblings('input[name="code"]').val(code);
            var $this = $(this),
                // Get active country's phone number format from input placeholder attribute
                activePlaceholder = $this.attr('placeholder'),
                // Convert placeholder as exploitable mask by replacing all 1-9 numbers with 0s
                newMask = activePlaceholder.replace(/[1-9]/g, "0");
            // console.log(activePlaceholder + ' => ' + newMask);

            // Init new mask for focused input
            $this.mask(newMask);
        });

        $('#phone-number').on('countrychange', (e, c) => {
            let $this = $(e.currentTarget);
            $this.removeAttr('maxlength');
        });
    </script>

    <script src="{{ asset('js/select2.min.js') }}"></script>
    <script>
        $('#country').select2({
            width: '100%'
        });
        $('#category').select2({
            width: '100%'
        });

    </script>
@endpush
