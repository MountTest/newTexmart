@extends('design.layouts.app')
@section('content')

    <div class="container mt-5 pt-5">
        <div class="row">
            <div class="col-lg-3 col-12 position-relative">
                <div style="position: sticky; top:15%;">
                <button class="btn-accordion btn-link mb-1 text-left active" type="button" data-type="switch" data-id="all">
                    <span class="h6">Все категории</span>
                </button>
                @foreach($categories as $category)
                    <button class="btn-accordion btn-link mb-1 text-left" type="button" data-type="switch" data-id="{{ $category->id }}">
                        <span class="h6">{{ $category->title }}</span>
                    </button>
                @endforeach
                </div>
            </div>
            <div class="col-lg-9 col-12 mt-lg-0 mt-md-0 mt-4">
                <h2 class="texmart-text-primary h1 mb-3" data-parent="title">База заявок от заказчиков</h2>
                <div class="row mb-3">
                    <div class="col-lg-4 col-12">
                        <div class="country-filter position-relative">
                            <span class="country-title">Все страны</span><i class="fas fa-chevron-down ml-1 fa-sm"></i>
                            <input type="hidden" class="country-value">
                            <div class="position-absolute bg-white border p-2 country-list">
                                <div class="d-flex align-items-center country-item" data-value="none"><span class="country-point">Все страны</span></div>
                                <div class="d-flex align-items-center country-item" data-value="kg"><div class="iti__flag iti__kg"></div><span class="ml-2 country-point">Кыргызстан</span></div>
                                <div class="d-flex align-items-center country-item" data-value="ru"><div class="iti__flag iti__ru"></div><span class="ml-2 country-point">Россия</span></div>
                                <div class="d-flex align-items-center country-item" data-value="kz"><div class="iti__flag iti__kz"></div><span class="ml-2 country-point">Казахстан</span></div>
                                <div class="d-flex align-items-center country-item border-bottom" data-value="uz"><div class="iti__flag iti__uz"></div><span class="ml-2 country-point">Узбекистан</span></div>
                                <div class="d-flex align-items-center country-item" data-value="af"><div class="iti__flag iti__af"></div><span class="ml-2 country-point">Афганистан</span></div>
                                <div class="d-flex align-items-center country-item" data-value="ax"><div class="iti__flag iti__ax"></div><span class="ml-2 country-point">Аландские острова</span></div>
                                <div class="d-flex align-items-center country-item" data-value="al"><div class="iti__flag iti__al"></div><span class="ml-2 country-point">Албания</span></div>
                                <div class="d-flex align-items-center country-item" data-value="dz"><div class="iti__flag iti__dz"></div><span class="ml-2 country-point">Алжир</span></div>
                                <div class="d-flex align-items-center country-item" data-value="as"><div class="iti__flag iti__as"></div><span class="ml-2 country-point">Американское Самоа</span></div>
                                <div class="d-flex align-items-center country-item" data-value="ad"><div class="iti__flag iti__ad"></div><span class="ml-2 country-point">Андорра</span></div>
                                <div class="d-flex align-items-center country-item" data-value="ao"><div class="iti__flag iti__ao"></div><span class="ml-2 country-point">Ангола</span></div>
                                <div class="d-flex align-items-center country-item" data-value="ai"><div class="iti__flag iti__ai"></div><span class="ml-2 country-point">Ангилья</span></div>
                                <div class="d-flex align-items-center country-item" data-value="ag"><div class="iti__flag iti__ag"></div><span class="ml-2 country-point">Антигуа и Барбуда</span></div>
                                <div class="d-flex align-items-center country-item" data-value="ar"><div class="iti__flag iti__ar"></div><span class="ml-2 country-point">Аргентина</span></div>
                                <div class="d-flex align-items-center country-item" data-value="am"><div class="iti__flag iti__am"></div><span class="ml-2 country-point">Армения</span></div>
                                <div class="d-flex align-items-center country-item" data-value="aw"><div class="iti__flag iti__aw"></div><span class="ml-2 country-point">Аруба</span></div>
                                <div class="d-flex align-items-center country-item" data-value="au"><div class="iti__flag iti__au"></div><span class="ml-2 country-point">Австралия</span></div>
                                <div class="d-flex align-items-center country-item" data-value="at"><div class="iti__flag iti__at"></div><span class="ml-2 country-point">Австрия</span></div>
                                <div class="d-flex align-items-center country-item" data-value="az"><div class="iti__flag iti__az"></div><span class="ml-2 country-point">Азербайджан</span></div>
                                <div class="d-flex align-items-center country-item" data-value="bs"><div class="iti__flag iti__bs"></div><span class="ml-2 country-point">Багамы</span></div>
                                <div class="d-flex align-items-center country-item" data-value="bh"><div class="iti__flag iti__bh"></div><span class="ml-2 country-point">Бахрейн</span></div>
                                <div class="d-flex align-items-center country-item" data-value="bd"><div class="iti__flag iti__bd"></div><span class="ml-2 country-point">Бангладеш</span></div>
                                <div class="d-flex align-items-center country-item" data-value="bb"><div class="iti__flag iti__bb"></div><span class="ml-2 country-point">Барбадос</span></div>
                                <div class="d-flex align-items-center country-item" data-value="by"><div class="iti__flag iti__by"></div><span class="ml-2 country-point">Беларусия</span></div>
                                <div class="d-flex align-items-center country-item" data-value="be"><div class="iti__flag iti__be"></div><span class="ml-2 country-point">Бельгия</span></div>
                                <div class="d-flex align-items-center country-item" data-value="bz"><div class="iti__flag iti__bz"></div><span class="ml-2 country-point">Белиз</span></div>
                                <div class="d-flex align-items-center country-item" data-value="bj"><div class="iti__flag iti__bj"></div><span class="ml-2 country-point">Бенин</span></div>
                                <div class="d-flex align-items-center country-item" data-value="bm"><div class="iti__flag iti__bm"></div><span class="ml-2 country-point">Бермуды</span></div>
                                <div class="d-flex align-items-center country-item" data-value="bt"><div class="iti__flag iti__bt"></div><span class="ml-2 country-point">Бутан</span></div>
                                <div class="d-flex align-items-center country-item" data-value="bo"><div class="iti__flag iti__bo"></div><span class="ml-2 country-point">Боливия</span></div>
                                <div class="d-flex align-items-center country-item" data-value="ba"><div class="iti__flag iti__ba"></div><span class="ml-2 country-point">Босния и Герцеговина</span></div>
                                <div class="d-flex align-items-center country-item" data-value="bw"><div class="iti__flag iti__bw"></div><span class="ml-2 country-point">Ботсвана</span></div>
                                <div class="d-flex align-items-center country-item" data-value="br"><div class="iti__flag iti__br"></div><span class="ml-2 country-point">Бразилия</span></div>
                                <div class="d-flex align-items-center country-item" data-value="io"><div class="iti__flag iti__io"></div><span class="ml-2 country-point">Британская территория в Индийском океане</span></div>
                                <div class="d-flex align-items-center country-item" data-value="bn"><div class="iti__flag iti__bn"></div><span class="ml-2 country-point">Бруней</span></div>
                                <div class="d-flex align-items-center country-item" data-value="bg"><div class="iti__flag iti__bg"></div><span class="ml-2 country-point">Болгария</span></div>
                                <div class="d-flex align-items-center country-item" data-value="bf"><div class="iti__flag iti__bf"></div><span class="ml-2 country-point">Буркина Фасо</span></div>
                                <div class="d-flex align-items-center country-item" data-value="bi"><div class="iti__flag iti__bi"></div><span class="ml-2 country-point">Бурунди</span></div>
                                <div class="d-flex align-items-center country-item" data-value="kh"><div class="iti__flag iti__kh"></div><span class="ml-2 country-point">Камбоджа</span></div>
                                <div class="d-flex align-items-center country-item" data-value="cm"><div class="iti__flag iti__cm"></div><span class="ml-2 country-point">Камерун</span></div>
                                <div class="d-flex align-items-center country-item" data-value="ca"><div class="iti__flag iti__ca"></div><span class="ml-2 country-point">Канада</span></div>
                                <div class="d-flex align-items-center country-item" data-value="cv"><div class="iti__flag iti__cv"></div><span class="ml-2 country-point">Кабо-Верде</span></div>
                                <div class="d-flex align-items-center country-item" data-value="ky"><div class="iti__flag iti__ky"></div><span class="ml-2 country-point">Кайманские острова</span></div>
                                <div class="d-flex align-items-center country-item" data-value="cf"><div class="iti__flag iti__cf"></div><span class="ml-2 country-point">Центральноафриканская Республика</span></div>
                                <div class="d-flex align-items-center country-item" data-value="td"><div class="iti__flag iti__td"></div><span class="ml-2 country-point">Чад</span></div>
                                <div class="d-flex align-items-center country-item" data-value="cl"><div class="iti__flag iti__cl"></div><span class="ml-2 country-point">Чили</span></div>
                                <div class="d-flex align-items-center country-item" data-value="cn"><div class="iti__flag iti__cn"></div><span class="ml-2 country-point">Китай</span></div>
                                <div class="d-flex align-items-center country-item" data-value="cx"><div class="iti__flag iti__cx"></div><span class="ml-2 country-point">Остров Рождества</span></div>
                                <div class="d-flex align-items-center country-item" data-value="cc"><div class="iti__flag iti__cc"></div><span class="ml-2 country-point">Кокосовые острова (Килинг)</span></div>
                                <div class="d-flex align-items-center country-item" data-value="co"><div class="iti__flag iti__co"></div><span class="ml-2 country-point">Колумбия</span></div>
                                <div class="d-flex align-items-center country-item" data-value="km"><div class="iti__flag iti__km"></div><span class="ml-2 country-point">Коморы</span></div>
                                <div class="d-flex align-items-center country-item" data-value="cg"><div class="iti__flag iti__cg"></div><span class="ml-2 country-point">Конго</span></div>
                                <div class="d-flex align-items-center country-item" data-value="cd"><div class="iti__flag iti__cd"></div><span class="ml-2 country-point">ДР Конго</span></div>
                                <div class="d-flex align-items-center country-item" data-value="ck"><div class="iti__flag iti__ck"></div><span class="ml-2 country-point">Острова Кука</span></div>
                                <div class="d-flex align-items-center country-item" data-value="cr"><div class="iti__flag iti__cr"></div><span class="ml-2 country-point">Коста-Рика</span></div>
                                <div class="d-flex align-items-center country-item" data-value="ci"><div class="iti__flag iti__ci"></div><span class="ml-2 country-point">Кот Д'Ивуар</span></div>
                                <div class="d-flex align-items-center country-item" data-value="hr"><div class="iti__flag iti__hr"></div><span class="ml-2 country-point">Хорватия</span></div>
                                <div class="d-flex align-items-center country-item" data-value="cu"><div class="iti__flag iti__cu"></div><span class="ml-2 country-point">Куба</span></div>
                                <div class="d-flex align-items-center country-item" data-value="cw"><div class="iti__flag iti__cw"></div><span class="ml-2 country-point">Кюрасао</span></div>
                                <div class="d-flex align-items-center country-item" data-value="cy"><div class="iti__flag iti__cy"></div><span class="ml-2 country-point">Кипр</span></div>
                                <div class="d-flex align-items-center country-item" data-value="cz"><div class="iti__flag iti__cz"></div><span class="ml-2 country-point">Чехия</span></div>
                                <div class="d-flex align-items-center country-item" data-value="dk"><div class="iti__flag iti__dk"></div><span class="ml-2 country-point">Дания</span></div>
                                <div class="d-flex align-items-center country-item" data-value="dj"><div class="iti__flag iti__dj"></div><span class="ml-2 country-point">Джибути</span></div>
                                <div class="d-flex align-items-center country-item" data-value="dm"><div class="iti__flag iti__dm"></div><span class="ml-2 country-point">Доминика</span></div>
                                <div class="d-flex align-items-center country-item" data-value="do"><div class="iti__flag iti__do"></div><span class="ml-2 country-point">Доминиканская республика</span></div>
                                <div class="d-flex align-items-center country-item" data-value="ec"><div class="iti__flag iti__ec"></div><span class="ml-2 country-point">Эквадор</span></div>
                                <div class="d-flex align-items-center country-item" data-value="eg"><div class="iti__flag iti__eg"></div><span class="ml-2 country-point">Египет</span></div>
                                <div class="d-flex align-items-center country-item" data-value="sv"><div class="iti__flag iti__sv"></div><span class="ml-2 country-point">Сальвадор</span></div>
                                <div class="d-flex align-items-center country-item" data-value="gq"><div class="iti__flag iti__gq"></div><span class="ml-2 country-point">Экваториальная Гвинея</span></div>
                                <div class="d-flex align-items-center country-item" data-value="er"><div class="iti__flag iti__er"></div><span class="ml-2 country-point">Эритрея</span></div>
                                <div class="d-flex align-items-center country-item" data-value="ee"><div class="iti__flag iti__ee"></div><span class="ml-2 country-point">Эстония</span></div>
                                <div class="d-flex align-items-center country-item" data-value="et"><div class="iti__flag iti__et"></div><span class="ml-2 country-point">Эфиопия</span></div>
                                <div class="d-flex align-items-center country-item" data-value="fk"><div class="iti__flag iti__fk"></div><span class="ml-2 country-point">Фолклендские острова</span></div>
                                <div class="d-flex align-items-center country-item" data-value="fo"><div class="iti__flag iti__fo"></div><span class="ml-2 country-point">Фарерские острова</span></div>
                                <div class="d-flex align-items-center country-item" data-value="fj"><div class="iti__flag iti__fj"></div><span class="ml-2 country-point">Фиджи</span></div>
                                <div class="d-flex align-items-center country-item" data-value="fi"><div class="iti__flag iti__fi"></div><span class="ml-2 country-point">Финляндия</span></div>
                                <div class="d-flex align-items-center country-item" data-value="fr"><div class="iti__flag iti__fr"></div><span class="ml-2 country-point">Франция</span></div>
                                <div class="d-flex align-items-center country-item" data-value="gf"><div class="iti__flag iti__gf"></div><span class="ml-2 country-point">Французская Гвиана</span></div>
                                <div class="d-flex align-items-center country-item" data-value="pf"><div class="iti__flag iti__pf"></div><span class="ml-2 country-point">Французская Полинезия</span></div>
                                <div class="d-flex align-items-center country-item" data-value="ga"><div class="iti__flag iti__ga"></div><span class="ml-2 country-point">Габон</span></div>
                                <div class="d-flex align-items-center country-item" data-value="gm"><div class="iti__flag iti__gm"></div><span class="ml-2 country-point">Гамбия</span></div>
                                <div class="d-flex align-items-center country-item" data-value="ge"><div class="iti__flag iti__ge"></div><span class="ml-2 country-point">Грузия</span></div>
                                <div class="d-flex align-items-center country-item" data-value="de"><div class="iti__flag iti__de"></div><span class="ml-2 country-point">Германия</span></div>
                                <div class="d-flex align-items-center country-item" data-value="gh"><div class="iti__flag iti__gh"></div><span class="ml-2 country-point">Гана</span></div>
                                <div class="d-flex align-items-center country-item" data-value="gi"><div class="iti__flag iti__gi"></div><span class="ml-2 country-point">Гибралтар</span></div>
                                <div class="d-flex align-items-center country-item" data-value="gr"><div class="iti__flag iti__gr"></div><span class="ml-2 country-point">Греция</span></div>
                                <div class="d-flex align-items-center country-item" data-value="gl"><div class="iti__flag iti__gl"></div><span class="ml-2 country-point">Гренландия</span></div>
                                <div class="d-flex align-items-center country-item" data-value="gd"><div class="iti__flag iti__gd"></div><span class="ml-2 country-point">Гренада</span></div>
                                <div class="d-flex align-items-center country-item" data-value="gp"><div class="iti__flag iti__gp"></div><span class="ml-2 country-point">Гваделупа</span></div>
                                <div class="d-flex align-items-center country-item" data-value="gu"><div class="iti__flag iti__gu"></div><span class="ml-2 country-point">Гуам</span></div>
                                <div class="d-flex align-items-center country-item" data-value="gt"><div class="iti__flag iti__gt"></div><span class="ml-2 country-point">Гватемала</span></div>
                                <div class="d-flex align-items-center country-item" data-value="gg"><div class="iti__flag iti__gg"></div><span class="ml-2 country-point">Гернси</span></div>
                                <div class="d-flex align-items-center country-item" data-value="gn"><div class="iti__flag iti__gn"></div><span class="ml-2 country-point">Гвинея</span></div>
                                <div class="d-flex align-items-center country-item" data-value="gw"><div class="iti__flag iti__gw"></div><span class="ml-2 country-point">Гвинеи-Бисау</span></div>
                                <div class="d-flex align-items-center country-item" data-value="gy"><div class="iti__flag iti__gy"></div><span class="ml-2 country-point">Гайана</span></div>
                                <div class="d-flex align-items-center country-item" data-value="ht"><div class="iti__flag iti__ht"></div><span class="ml-2 country-point">Гаити</span></div>
                                <div class="d-flex align-items-center country-item" data-value="hn"><div class="iti__flag iti__hn"></div><span class="ml-2 country-point">Гондурас</span></div>
                                <div class="d-flex align-items-center country-item" data-value="hk"><div class="iti__flag iti__hk"></div><span class="ml-2 country-point">Гонг Конг</span></div>
                                <div class="d-flex align-items-center country-item" data-value="hu"><div class="iti__flag iti__hu"></div><span class="ml-2 country-point">Венгрия</span></div>
                                <div class="d-flex align-items-center country-item" data-value="is"><div class="iti__flag iti__is"></div><span class="ml-2 country-point">Исландия</span></div>
                                <div class="d-flex align-items-center country-item" data-value="in"><div class="iti__flag iti__in"></div><span class="ml-2 country-point">Индия</span></div>
                                <div class="d-flex align-items-center country-item" data-value="id"><div class="iti__flag iti__id"></div><span class="ml-2 country-point">Индонезия</span></div>
                                <div class="d-flex align-items-center country-item" data-value="ir"><div class="iti__flag iti__ir"></div><span class="ml-2 country-point">Иран</span></div>
                                <div class="d-flex align-items-center country-item" data-value="iq"><div class="iti__flag iti__iq"></div><span class="ml-2 country-point">Ирак</span></div>
                                <div class="d-flex align-items-center country-item" data-value="ie"><div class="iti__flag iti__ie"></div><span class="ml-2 country-point">Ирландия</span></div>
                                <div class="d-flex align-items-center country-item" data-value="im"><div class="iti__flag iti__im"></div><span class="ml-2 country-point">Остров Мэн</span></div>
                                <div class="d-flex align-items-center country-item" data-value="il"><div class="iti__flag iti__il"></div><span class="ml-2 country-point">Израиль</span></div>
                                <div class="d-flex align-items-center country-item" data-value="it"><div class="iti__flag iti__it"></div><span class="ml-2 country-point">Италия</span></div>
                                <div class="d-flex align-items-center country-item" data-value="jm"><div class="iti__flag iti__jm"></div><span class="ml-2 country-point">Ямайка</span></div>
                                <div class="d-flex align-items-center country-item" data-value="jp"><div class="iti__flag iti__jp"></div><span class="ml-2 country-point">Япония</span></div>
                                <div class="d-flex align-items-center country-item" data-value="je"><div class="iti__flag iti__je"></div><span class="ml-2 country-point">Джерси</span></div>
                                <div class="d-flex align-items-center country-item" data-value="jo"><div class="iti__flag iti__jo"></div><span class="ml-2 country-point">Иордания</span></div>
                                <div class="d-flex align-items-center country-item" data-value="ke"><div class="iti__flag iti__ke"></div><span class="ml-2 country-point">Кения</span></div>
                                <div class="d-flex align-items-center country-item" data-value="ki"><div class="iti__flag iti__ki"></div><span class="ml-2 country-point">Кирибати</span></div>
                                <div class="d-flex align-items-center country-item" data-value="kw"><div class="iti__flag iti__kw"></div><span class="ml-2 country-point">Кувейт</span></div>
                                <div class="d-flex align-items-center country-item" data-value="la"><div class="iti__flag iti__la"></div><span class="ml-2 country-point">Лаос</span></div>
                                <div class="d-flex align-items-center country-item" data-value="lv"><div class="iti__flag iti__lv"></div><span class="ml-2 country-point">Латвия</span></div>
                                <div class="d-flex align-items-center country-item" data-value="lb"><div class="iti__flag iti__lb"></div><span class="ml-2 country-point">Латвия</span></div>
                                <div class="d-flex align-items-center country-item" data-value="ls"><div class="iti__flag iti__ls"></div><span class="ml-2 country-point">Лесото</span></div>
                                <div class="d-flex align-items-center country-item" data-value="lr"><div class="iti__flag iti__lr"></div><span class="ml-2 country-point">Либерия</span></div>
                                <div class="d-flex align-items-center country-item" data-value="ly"><div class="iti__flag iti__ly"></div><span class="ml-2 country-point">Ливия</span></div>
                                <div class="d-flex align-items-center country-item" data-value="li"><div class="iti__flag iti__li"></div><span class="ml-2 country-point">Лихтенштейн</span></div>
                                <div class="d-flex align-items-center country-item" data-value="lt"><div class="iti__flag iti__lt"></div><span class="ml-2 country-point">Литва</span></div>
                                <div class="d-flex align-items-center country-item" data-value="lu"><div class="iti__flag iti__lu"></div><span class="ml-2 country-point">Люксембург</span></div>
                                <div class="d-flex align-items-center country-item" data-value="mo"><div class="iti__flag iti__mo"></div><span class="ml-2 country-point">Макао</span></div>
                                <div class="d-flex align-items-center country-item" data-value="mk"><div class="iti__flag iti__mk"></div><span class="ml-2 country-point">Македония</span></div>
                                <div class="d-flex align-items-center country-item" data-value="mg"><div class="iti__flag iti__mg"></div><span class="ml-2 country-point">Мадагаскар</span></div>
                                <div class="d-flex align-items-center country-item" data-value="mw"><div class="iti__flag iti__mw"></div><span class="ml-2 country-point">Малави</span></div>
                                <div class="d-flex align-items-center country-item" data-value="my"><div class="iti__flag iti__my"></div><span class="ml-2 country-point">Малайзия</span></div>
                                <div class="d-flex align-items-center country-item" data-value="mv"><div class="iti__flag iti__mv"></div><span class="ml-2 country-point">Мальдивы</span></div>
                                <div class="d-flex align-items-center country-item" data-value="ml"><div class="iti__flag iti__ml"></div><span class="ml-2 country-point">Мали</span></div>
                                <div class="d-flex align-items-center country-item" data-value="mt"><div class="iti__flag iti__mt"></div><span class="ml-2 country-point">Мальта</span></div>
                                <div class="d-flex align-items-center country-item" data-value="mh"><div class="iti__flag iti__mh"></div><span class="ml-2 country-point">Маршалловы острова</span></div>
                                <div class="d-flex align-items-center country-item" data-value="mq"><div class="iti__flag iti__mq"></div><span class="ml-2 country-point">Мартиника</span></div>
                                <div class="d-flex align-items-center country-item" data-value="mr"><div class="iti__flag iti__mr"></div><span class="ml-2 country-point">Мавритания</span></div>
                                <div class="d-flex align-items-center country-item" data-value="mu"><div class="iti__flag iti__mu"></div><span class="ml-2 country-point">О. Маврикий</span></div>
                                <div class="d-flex align-items-center country-item" data-value="yt"><div class="iti__flag iti__yt"></div><span class="ml-2 country-point">Майотта</span></div>
                                <div class="d-flex align-items-center country-item" data-value="mx"><div class="iti__flag iti__mx"></div><span class="ml-2 country-point">Мексика</span></div>
                                <div class="d-flex align-items-center country-item" data-value="fm"><div class="iti__flag iti__fm"></div><span class="ml-2 country-point">Федеральные Штаты Микронезии</span></div>
                                <div class="d-flex align-items-center country-item" data-value="md"><div class="iti__flag iti__md"></div><span class="ml-2 country-point">Молдова</span></div>
                                <div class="d-flex align-items-center country-item" data-value="mc"><div class="iti__flag iti__mc"></div><span class="ml-2 country-point">Монако</span></div>
                                <div class="d-flex align-items-center country-item" data-value="mn"><div class="iti__flag iti__mn"></div><span class="ml-2 country-point">Монголия</span></div>
                                <div class="d-flex align-items-center country-item" data-value="me"><div class="iti__flag iti__me"></div><span class="ml-2 country-point">Черногория</span></div>
                                <div class="d-flex align-items-center country-item" data-value="ms"><div class="iti__flag iti__ms"></div><span class="ml-2 country-point">Монтсеррат</span></div>
                                <div class="d-flex align-items-center country-item" data-value="ma"><div class="iti__flag iti__ma"></div><span class="ml-2 country-point">Марокко</span></div>
                                <div class="d-flex align-items-center country-item" data-value="mz"><div class="iti__flag iti__mz"></div><span class="ml-2 country-point">Мозамбик</span></div>
                                <div class="d-flex align-items-center country-item" data-value="mm"><div class="iti__flag iti__mm"></div><span class="ml-2 country-point">Мьянма</span></div>
                                <div class="d-flex align-items-center country-item" data-value="na"><div class="iti__flag iti__na"></div><span class="ml-2 country-point">Намибия</span></div>
                                <div class="d-flex align-items-center country-item" data-value="nr"><div class="iti__flag iti__nr"></div><span class="ml-2 country-point">Науру</span></div>
                                <div class="d-flex align-items-center country-item" data-value="np"><div class="iti__flag iti__np"></div><span class="ml-2 country-point">Непал</span></div>
                                <div class="d-flex align-items-center country-item" data-value="nl"><div class="iti__flag iti__nl"></div><span class="ml-2 country-point">Нидерланды</span></div>
                                <div class="d-flex align-items-center country-item" data-value="nc"><div class="iti__flag iti__nc"></div><span class="ml-2 country-point">Новая Каледония</span></div>
                                <div class="d-flex align-items-center country-item" data-value="nz"><div class="iti__flag iti__nz"></div><span class="ml-2 country-point">Новая Зеландия</span></div>
                                <div class="d-flex align-items-center country-item" data-value="ni"><div class="iti__flag iti__ni"></div><span class="ml-2 country-point">Никарагуа</span></div>
                                <div class="d-flex align-items-center country-item" data-value="ne"><div class="iti__flag iti__ne"></div><span class="ml-2 country-point">Нигер</span></div>
                                <div class="d-flex align-items-center country-item" data-value="ng"><div class="iti__flag iti__ng"></div><span class="ml-2 country-point">Нигерия</span></div>
                                <div class="d-flex align-items-center country-item" data-value="nu"><div class="iti__flag iti__nu"></div><span class="ml-2 country-point">Нигерия</span></div>
                                <div class="d-flex align-items-center country-item" data-value="nf"><div class="iti__flag iti__nf"></div><span class="ml-2 country-point">Остров Норфолк</span></div>
                                <div class="d-flex align-items-center country-item" data-value="kp"><div class="iti__flag iti__np"></div><span class="ml-2 country-point">Северная Корея</span></div>
                                <div class="d-flex align-items-center country-item" data-value="mp"><div class="iti__flag iti__np"></div><span class="ml-2 country-point">Северные Марианские о-ва</span></div>
                                <div class="d-flex align-items-center country-item" data-value="no"><div class="iti__flag iti__no"></div><span class="ml-2 country-point">Норвегия</span></div>
                                <div class="d-flex align-items-center country-item" data-value="om"><div class="iti__flag iti__om"></div><span class="ml-2 country-point">Оман</span></div>
                                <div class="d-flex align-items-center country-item" data-value="pk"><div class="iti__flag iti__pk"></div><span class="ml-2 country-point">Пакистан</span></div>
                                <div class="d-flex align-items-center country-item" data-value="pw"><div class="iti__flag iti__pw"></div><span class="ml-2 country-point">Палау</span></div>
                                <div class="d-flex align-items-center country-item" data-value="ps"><div class="iti__flag iti__ps"></div><span class="ml-2 country-point">Палестина</span></div>
                                <div class="d-flex align-items-center country-item" data-value="pa"><div class="iti__flag iti__pa"></div><span class="ml-2 country-point">Панама</span></div>
                                <div class="d-flex align-items-center country-item" data-value="pg"><div class="iti__flag iti__pg"></div><span class="ml-2 country-point">Папуа Новая Гвинея</span></div>
                                <div class="d-flex align-items-center country-item" data-value="py"><div class="iti__flag iti__py"></div><span class="ml-2 country-point">Парагвай</span></div>
                                <div class="d-flex align-items-center country-item" data-value="pe"><div class="iti__flag iti__pe"></div><span class="ml-2 country-point">Перу</span></div>
                                <div class="d-flex align-items-center country-item" data-value="ph"><div class="iti__flag iti__ph"></div><span class="ml-2 country-point">Филиппины</span></div>
                                <div class="d-flex align-items-center country-item" data-value="pn"><div class="iti__flag iti__pn"></div><span class="ml-2 country-point">о-ва Питкэрн</span></div>
                                <div class="d-flex align-items-center country-item" data-value="pl"><div class="iti__flag iti__pl"></div><span class="ml-2 country-point">Польша</span></div>
                                <div class="d-flex align-items-center country-item" data-value="pt"><div class="iti__flag iti__pt"></div><span class="ml-2 country-point">Португалия</span></div>
                                <div class="d-flex align-items-center country-item" data-value="pr"><div class="iti__flag iti__pr"></div><span class="ml-2 country-point">Пуэрто-Рико</span></div>
                                <div class="d-flex align-items-center country-item" data-value="qa"><div class="iti__flag iti__qa"></div><span class="ml-2 country-point">Катар</span></div>
                                <div class="d-flex align-items-center country-item" data-value="re"><div class="iti__flag iti__re"></div><span class="ml-2 country-point">Реюньон</span></div>
                                <div class="d-flex align-items-center country-item" data-value="ro"><div class="iti__flag iti__ro"></div><span class="ml-2 country-point">Румыния</span></div>
                                <div class="d-flex align-items-center country-item" data-value="rw"><div class="iti__flag iti__rw"></div><span class="ml-2 country-point">Руанда</span></div>
                                <div class="d-flex align-items-center country-item" data-value="bl"><div class="iti__flag iti__bl"></div><span class="ml-2 country-point">Сен-Бартелеми</span></div>
                                <div class="d-flex align-items-center country-item" data-value="sh"><div class="iti__flag iti__sh"></div><span class="ml-2 country-point">о-в, Св. Елены</span></div>
                                <div class="d-flex align-items-center country-item" data-value="kn"><div class="iti__flag iti__kn"></div><span class="ml-2 country-point">Сент-Китс и Невис</span></div>
                                <div class="d-flex align-items-center country-item" data-value="lc"><div class="iti__flag iti__lc"></div><span class="ml-2 country-point">Сент-Люсия</span></div>
                                <div class="d-flex align-items-center country-item" data-value="mf"><div class="iti__flag iti__mf"></div><span class="ml-2 country-point">Сент-Мартен</span></div>
                                <div class="d-flex align-items-center country-item" data-value="pm"><div class="iti__flag iti__pm"></div><span class="ml-2 country-point">Сен-Пьер</span></div>
                                <div class="d-flex align-items-center country-item" data-value="vc"><div class="iti__flag iti__vc"></div><span class="ml-2 country-point">Сент-Винсент и Гренадины</span></div>
                                <div class="d-flex align-items-center country-item" data-value="ws"><div class="iti__flag iti__ws"></div><span class="ml-2 country-point">Самоа</span></div>
                                <div class="d-flex align-items-center country-item" data-value="sm"><div class="iti__flag iti__sm"></div><span class="ml-2 country-point">Сан Марино</span></div>
                                <div class="d-flex align-items-center country-item" data-value="st"><div class="iti__flag iti__st"></div><span class="ml-2 country-point">Сан-Томе и Принсипи</span></div>
                                <div class="d-flex align-items-center country-item" data-value="sa"><div class="iti__flag iti__sa"></div><span class="ml-2 country-point">Саудовская Аравия</span></div>
                                <div class="d-flex align-items-center country-item" data-value="sn"><div class="iti__flag iti__sn"></div><span class="ml-2 country-point">Сенегал</span></div>
                                <div class="d-flex align-items-center country-item" data-value="rs"><div class="iti__flag iti__rs"></div><span class="ml-2 country-point">Сербия</span></div>
                                <div class="d-flex align-items-center country-item" data-value="sc"><div class="iti__flag iti__sc"></div><span class="ml-2 country-point">Сейшелы</span></div>
                                <div class="d-flex align-items-center country-item" data-value="sl"><div class="iti__flag iti__sl"></div><span class="ml-2 country-point">Сьерре Леоне</span></div>
                                <div class="d-flex align-items-center country-item" data-value="sg"><div class="iti__flag iti__sg"></div><span class="ml-2 country-point">Сингапур</span></div>
                                <div class="d-flex align-items-center country-item" data-value="sx"><div class="iti__flag iti__sx"></div><span class="ml-2 country-point">Синт-Мартен</span></div>
                                <div class="d-flex align-items-center country-item" data-value="sk"><div class="iti__flag iti__sk"></div><span class="ml-2 country-point">Словакия</span></div>
                                <div class="d-flex align-items-center country-item" data-value="si"><div class="iti__flag iti__si"></div><span class="ml-2 country-point">Словения</span></div>
                                <div class="d-flex align-items-center country-item" data-value="sb"><div class="iti__flag iti__sb"></div><span class="ml-2 country-point">Соломоновы острова</span></div>
                                <div class="d-flex align-items-center country-item" data-value="so"><div class="iti__flag iti__so"></div><span class="ml-2 country-point">Сомали</span></div>
                                <div class="d-flex align-items-center country-item" data-value="za"><div class="iti__flag iti__za"></div><span class="ml-2 country-point">Южно-Африканская Республика</span></div>
                                <div class="d-flex align-items-center country-item" data-value="gs"><div class="iti__flag iti__gs"></div><span class="ml-2 country-point">Южная Георгия и Южные Сандвичевы острова</span></div>
                                <div class="d-flex align-items-center country-item" data-value="kr"><div class="iti__flag iti__kr"></div><span class="ml-2 country-point">Южная Корея</span></div>
                                <div class="d-flex align-items-center country-item" data-value="ss"><div class="iti__flag iti__ss"></div><span class="ml-2 country-point">Южный Судан</span></div>
                                <div class="d-flex align-items-center country-item" data-value="es"><div class="iti__flag iti__es"></div><span class="ml-2 country-point">Испания</span></div>
                                <div class="d-flex align-items-center country-item" data-value="lk"><div class="iti__flag iti__lk"></div><span class="ml-2 country-point">Шри Ланка</span></div>
                                <div class="d-flex align-items-center country-item" data-value="sd"><div class="iti__flag iti__sd"></div><span class="ml-2 country-point">Судан</span></div>
                                <div class="d-flex align-items-center country-item" data-value="sr"><div class="iti__flag iti__sr"></div><span class="ml-2 country-point">Суринам</span></div>
                                <div class="d-flex align-items-center country-item" data-value="sj"><div class="iti__flag iti__sj"></div><span class="ml-2 country-point">Шпицберг</span></div>
                                    <div class="d-flex align-items-center country-item" data-value="sz"><div class="iti__flag iti__sz"></div><span class="ml-2 country-point">Свазиленд</span></div>
                                    <div class="d-flex align-items-center country-item" data-value="se"><div class="iti__flag iti__se"></div><span class="ml-2 country-point">Швеция</span></div>
                                    <div class="d-flex align-items-center country-item" data-value="ch"><div class="iti__flag iti__ch"></div><span class="ml-2 country-point">Швейцария</span></div>
                                    <div class="d-flex align-items-center country-item" data-value="sy"><div class="iti__flag iti__sy"></div><span class="ml-2 country-point">Сирия</span></div>
                                    <div class="d-flex align-items-center country-item" data-value="tw"><div class="iti__flag iti__tw"></div><span class="ml-2 country-point">Тайвань</span></div>
                                    <div class="d-flex align-items-center country-item" data-value="tj"><div class="iti__flag iti__tj"></div><span class="ml-2 country-point">Таджикистан</span></div>
                                    <div class="d-flex align-items-center country-item" data-value="tz"><div class="iti__flag iti__tz"></div><span class="ml-2 country-point">Танзания</span></div>
                                    <div class="d-flex align-items-center country-item" data-value="th"><div class="iti__flag iti__th"></div><span class="ml-2 country-point">Тайланд</span></div>
                                    <div class="d-flex align-items-center country-item" data-value="tl"><div class="iti__flag iti__tl"></div><span class="ml-2 country-point">Восточный Тимор</span></div>
                                    <div class="d-flex align-items-center country-item" data-value="tg"><div class="iti__flag iti__tg"></div><span class="ml-2 country-point">Того</span></div>
                                    <div class="d-flex align-items-center country-item" data-value="tk"><div class="iti__flag iti__tk"></div><span class="ml-2 country-point">Токелау</span></div>
                                    <div class="d-flex align-items-center country-item" data-value="to"><div class="iti__flag iti__to"></div><span class="ml-2 country-point">Тонга</span></div>
                                    <div class="d-flex align-items-center country-item" data-value="tt"><div class="iti__flag iti__tt"></div><span class="ml-2 country-point">Тринидад и Тобаго</span></div>
                                    <div class="d-flex align-items-center country-item" data-value="tn"><div class="iti__flag iti__tn"></div><span class="ml-2 country-point">Тунис</span></div>
                                    <div class="d-flex align-items-center country-item" data-value="tr"><div class="iti__flag iti__tr"></div><span class="ml-2 country-point">Турция</span></div>
                                    <div class="d-flex align-items-center country-item" data-value="tm"><div class="iti__flag iti__tm"></div><span class="ml-2 country-point">Туркменистан</span></div>
                                    <div class="d-flex align-items-center country-item" data-value="tc"><div class="iti__flag iti__tc"></div><span class="ml-2 country-point">Острова Теркс и Кайкос</span></div>
                                    <div class="d-flex align-items-center country-item" data-value="tv"><div class="iti__flag iti__tv"></div><span class="ml-2 country-point">Тувалу</span></div>
                                    <div class="d-flex align-items-center country-item" data-value="ug"><div class="iti__flag iti__ug"></div><span class="ml-2 country-point">Уганда</span></div>
                                    <div class="d-flex align-items-center country-item" data-value="ua"><div class="iti__flag iti__ua"></div><span class="ml-2 country-point">Украина</span></div>
                                    <div class="d-flex align-items-center country-item" data-value="ae"><div class="iti__flag iti__ae"></div><span class="ml-2 country-point">ОАЭ</span></div>
                                    <div class="d-flex align-items-center country-item" data-value="gb"><div class="iti__flag iti__gb"></div><span class="ml-2 country-point">Великобритания</span></div>
                                    <div class="d-flex align-items-center country-item" data-value="us"><div class="iti__flag iti__us"></div><span class="ml-2 country-point">США</span></div>
                                    <div class="d-flex align-items-center country-item" data-value="um"><div class="iti__flag iti__um"></div><span class="ml-2 country-point">Внешние малые о-ва (США)</span></div>
                                    <div class="d-flex align-items-center country-item" data-value="uy"><div class="iti__flag iti__uy"></div><span class="ml-2 country-point">Уругвай</span></div>
                                    <div class="d-flex align-items-center country-item" data-value="vu"><div class="iti__flag iti__vu"></div><span class="ml-2 country-point">Вануату</span></div>
                                    <div class="d-flex align-items-center country-item" data-value="ve"><div class="iti__flag iti__ve"></div><span class="ml-2 country-point">Венесуэла</span></div>
                                    <div class="d-flex align-items-center country-item" data-value="vn"><div class="iti__flag iti__vn"></div><span class="ml-2 country-point">Вьетнам</span></div>
                                    <div class="d-flex align-items-center country-item" data-value="wf"><div class="iti__flag iti__wf"></div><span class="ml-2 country-point">о-ва Уоллис и Футуна</span></div>
                                    <div class="d-flex align-items-center country-item" data-value="eh"><div class="iti__flag iti__eh"></div><span class="ml-2 country-point">Западная Сахара</span></div>
                                    <div class="d-flex align-items-center country-item" data-value="ye"><div class="iti__flag iti__ye"></div><span class="ml-2 country-point">Йемен</span></div>
                                    <div class="d-flex align-items-center country-item" data-value="zm"><div class="iti__flag iti__zm"></div><span class="ml-2 country-point">Замбия</span></div>
                                    <div class="d-flex align-items-center country-item" data-value="zw"><div class="iti__flag iti__zw"></div><span class="ml-2 country-point">Зимбабве</span></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8 col-md-8 col-12 d-lg-flex d-none align-items-center justify-content-center pb-2 mt-lg-0 mt-md-0 mt-3">
                        <a href="" class="link-style">Создать заявку</a>
                        <div class="mx-2 h-100 bg-dark" style="width:1.5px;"></div>
                        <a href="" class="link-style">Добавить компанию</a>
                    </div>
                </div>
                <div id="announces_list">

                </div>
                <div class="row mt-4">
                    <div class="col-12">
                        <nav aria-label="Page navigation example">
                            <ul class="pagination pg-amber justify-content-center">
                                <li class="page-item disabled">
                                    <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
                                </li>
                                <li class="page-item"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item">
                                    <a class="page-link" href="#">Next</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection

@push('scripts')
    <script src="https://pagination.js.org/dist/2.1.4/pagination.min.js"></script>
    <script>
        function paginationWithDots(c, m) {
            var current = c,
                last = m,
                delta = 1,
                left = current - delta,
                right = current + delta + 1,
                range = [],
                rangeWithDots = [],
                l;
            for (let i = 1; i <= last; i++) {
                if (i == 1 || i == last || i >= left && i < right) {
                    range.push(i);
                }
            }
            for (let i of range) {
                if (l) {
                    if (i - l === 2) {
                        rangeWithDots.push(l + 1);
                    } else if (i - l !== 1) {
                        rangeWithDots.push('...');
                    }
                }
                rangeWithDots.push(i);
                l = i;
            }
            return rangeWithDots;
        }
        function registerPageButtons(data) {
            data.click(e => {
                e.preventDefault();
                let btn = $(e.currentTarget);
                let page = btn.data('page');
                if (page) {
                    params.page = page;
                    window.localStorage.setItem('productionsPage', page);
                    fetchProductions(params);
                }
            })
        }
    </script>
    <script>
        let params = [];
        let productionsPage = window.localStorage.getItem('productionsPage');
        if (productionsPage) {
            params.page = productionsPage;
        }
        $('button[data-type="switch"]').click(e => {
            let input = $(e.currentTarget);
            if(input.hasClass('active') == false)
                {
                    $('button[data-type="switch"]').removeClass('active');
                    input.addClass('active');
                    // params.page = 1;
                    // fetchProductions(params, input.data('value'));
                    // if(input.data('value') == 'product'){
                    //     $('h2[data-parent="title"]').text('База товаров наших производителей');
                    // }
                    // else if(input.data('value') == 'productions'){
                    //     $('h2[data-parent="title"]').text('Наши производители');
                    // }
                }
            // console.log(input.data('id'));
            let isChecked = (input.hasClass('active') == true ? true : false);
            // console.log(isChecked);
            let id = input.data('id');
            console.log(input.data('id'));
            if (input.data('id') == 'all')
            {
                params = [];
            }
            else
            {
                isChecked ? params = id : params.splice($.inArray(id, params), 1);
            }
            // input.data('id') == 'all' ? params = [] :
            // var btn = getType();
            params.page = 1;
            var country = $('.country-value').val();
            fetchProductions(params, country);
        });
        function getCountry(code){
            var country;

            code == 'none' ? country = '' : country = code;

            fetchProductions(params, country)
        }
        function getType()
        {
            var btn = document.querySelectorAll('button[data-parent="type"]' + '.active');
            return btn[0].dataset.value;
        }
        function fetchProductions(params, country) {
            $.ajax({
                url: '{{ route('announce/filter') }}',
                data: {
                    params: params,
                    country: country,
                    page: params.page,
                },
                success: data => {
                    let pagination = $('ul.pagination');
                    pagination.empty();
                    if (data.count) {
                        let paginationDots = paginationWithDots(data.announces.current_page, data.announces.last_page);
                        if (data.announces.last_page > 1) {
                            if (data.announces.current_page != 1) {
                                pagination.append('<li class="page-item d-none d-sm-inline-block"><a class="page-link" data-page="' + (data.productions.current_page - 1) + '" href="#">Пред</a></li>');
                            }
                        }
                        for (let item of paginationDots) {
                            if (item == '...') {
                                pagination.append('<li class="page-item disabled"><a class="page-link disabled" disabled onclick="event.preventDefault()">' + item + '</a></li>');
                            } else if (item == data.announces.current_page) {
                                pagination.append('<li class="page-item active"><a class="page-link" data-page="' + item + '" href="#">' + item + '</a></li>');
                            } else {
                                pagination.append('<li class="page-item"><a class="page-link" data-page="' + item + '" href="#">' + item + '</a></li>');
                            }
                        }
                        if (data.announces.last_page > 1) {
                            if (data.announces.current_page != data.announces.last_page) {
                                pagination.append('<li class="page-item d-none d-sm-inline-block"><a class="page-link" data-page="' + (data.announces.current_page + 1) + '" href="#">След</a></li>');
                            }
                        }
                    }
                    pagination.find('.page-link').each((e, i) => {
                        registerPageButtons($(i));
                    });


                    let result = $('#announces_list').hide().html(data.html).fadeIn('fast');
                    @if(auth()->check())
                    result.find('.favorite').each((e, i) => {
                        registerFavoriteButton($(i));
                    });
                    @endif
                    result.find('.call-btn').each((e, i) => {
                        registerCallButton($(i));
                    });
                    result.find('.div-lazy').each((e, i) => {
                        registerLazyLoad($(i));
                    })



                },
                error: () => {
                }
            })
        }
        function registerLazyLoad(item) {
            item.lazy();
        }
        @if(auth()->check())
        function registerFavoriteButton(item) {
            item.click((e) => {
                e.preventDefault();
                let btn = $(e.currentTarget);
                let id = btn.data('id');
                $.ajax({
                    method: "POST",
                    url: '{{ route('production.favorite') }}',
                    data: {
                        'id': id,
                        'user_id': '{{ \Illuminate\Support\Facades\Auth::user()->id }}'
                    },
                    success: data => {
                        if (data.status === 'success') {
                            if (data.isFavorited) {
                                btn.find('.fa-heart').removeClass('far').addClass('fas');
                            } else {
                                btn.find('.fa-heart').removeClass('fas').addClass('far');
                            }
                        }
                    },
                    error: () => {
                    }
                })
            });
        }
        @endif
        function registerCallButton(item) {
        }
        fetchProductions(params);
    </script>
    <script>
        $('.country-filter').click(function (e) {
            var item = $(e.currentTarget);

            if (item.hasClass('active') == true)
            {
                item.removeClass('active');
                $('.country-list').hide();
            }
            else
            {
                item.addClass('active');
                $('.country-list').show();
            }
        });

        $('.country-item').click(function (e) {
            var choice = $(e.currentTarget);

            $('.country-title').text(choice.find('.country-point').text());
            $('.country-value').val(choice.data('value'));
            getCountry(choice.data('value'));

        });
    </script>

    {{--<script>--}}
        {{--$('button[data-type="switch"]').click(function (e) {--}}
            {{--var btn = $(e.currentTarget);--}}

            {{--if (btn.hasClass('active') == true) {--}}
                {{--$.ajax({--}}
                    {{--method: "POST",--}}
                    {{--url: '{{ route('announce') }}',--}}
                    {{--data: {--}}
                        {{--'id': id,--}}
                        {{--'user_id': '{{ \Illuminate\Support\Facades\Auth::user()->id }}'--}}
                    {{--},--}}
                    {{--success: data => {--}}
                        {{--if (data.status === 'success') {--}}
                            {{--if (data.isFavorited) {--}}
                                {{--btn.find('.fa-heart').removeClass('far').addClass('fas');--}}
                            {{--} else {--}}
                                {{--btn.find('.fa-heart').removeClass('fas').addClass('far');--}}
                            {{--}--}}
                        {{--}--}}
                    {{--},--}}
                    {{--error: () => {--}}
                    {{--}--}}
                {{--})--}}
            {{--}--}}

            {{--$('button[data-type="switch"]').removeClass('active');--}}
            {{--btn.addClass('active');--}}
        {{--})--}}
    {{--</script>--}}
    <script>
        $(document).on('click', '.icon-like', function (e) {
            var btn = $(e.currentTarget);
            var id = btn.data('id');

            $.ajax({
                url: '{{ route('like_announce') }}',
                method: 'POST',
                data: {
                    "id": id,
                    "_token": "{{ csrf_token() }}",
                },
                success: data => {
                    if(data.status == true)
                    {
                        btn.find('.icon-announces').addClass('like-active');
                    }
                    else if(data.status == false)
                    {
                        btn.find('.icon-announces').removeClass('like-active');
                    }
                },
                error: () => {
                }
            });

        })
    </script>
@endpush