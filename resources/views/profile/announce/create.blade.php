@extends('profile.dashboard')

@section('profile_content')
    <section class="p-lg-5 p-2">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2 class="h3">
                        Создание объявления
                    </h2>
                </div>
                <div class="col-12">
                    <form action="{{ route('profile.announce.store', ['type' => 'profile']) }}" enctype="multipart/form-data" method="post">
                        @csrf
                        <div class="form-group">
                            <label>Описание</label>
                            <textarea name="bid" id="bid" cols="30" rows="5" class="form-control"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="images">Выберите изображения</label>
                            <input type="file" name="images[]" class="form-control" id="images" multiple>
                        </div>
                        <div class="row">
                        <div class="form-group col-lg-6 col-12">
                            <label for="country">Выберите страну</label>
                            <select name="country" class="form-control" id="country" required>
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
                            <div class="form-group col-lg-6 col-12">
                                <label for="category">Выберите категорию</label>
                                <select name="category" class="form-control" id="category">
                                    @foreach(\App\Category::where('parent_id',null)->get() as $category)
                                        <option value="{{$category->id}}">{{$category->title}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="row">
                        <div class="form-group col-lg-6 col-12">
                            <label for="price">Заполните цену</label>
                            <div class="input-group">
                            <input type="text" name="price" id="price" class="form-control" placeholder="Цена от ..." required>
                            <select class="" name="currency" id="inputGroupSelect01">
                                @foreach(['$', 'сом', 'руб'] as $currency)
                                    <option value="{{ $currency }}" {{ $currency == old('currency') ? 'selected' : '' }}>{{ $currency }}</option>
                                @endforeach
                            </select>
                            </div>
                        </div>

                        <div class="form-group col-lg-6 col-12">
                            <label for="date">Выберите срок объявления, до...</label>
                            <div class="input-group">
                                <input type="date" name="date" id="date" class="form-control" placeholder="Выберите дату..." required>
                            </div>
                        </div>
                        </div>

                        <div class="row">
                            <div class="col-12 d-flex">
                                <button type="submit" class="btn btn-texmart-orange text-white w-100">Оставить заказ</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
<link rel="stylesheet" href="{{ asset('css/select2.min.css') }}">
<style>
    .select2-container {
        width: 100%!important;
    }
</style>
@push('scripts')
    <script src="{{ asset('js/select2.min.js') }}"></script>
    <script>
        $('#country').select2({
            width: 'resolve'
        });
        $('#category').select2({
            width: 'resolve'
        });

    </script>
@endpush