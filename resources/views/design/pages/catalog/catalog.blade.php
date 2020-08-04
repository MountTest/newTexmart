@extends('design.layouts.app')
@section('title')
    @if(request('type') == 'productions')
        Производство одежды в Киргизии по низким ценам | texmart.kg
    @elseif(request('type') == 'product')
        Одежда оптом в Киргизии по низким ценам | texmart.kg
    @elseif(request('type') == 'service')
        Услуга в Киргизии по низким ценам | texmart.kg
    @else
        Производство одежды в Киргизии по низким ценам | texmart.kg
    @endif
@endsection
@section('seo_content')
    <meta name="description" content="Texmart.kg это первая интернет-платформа оптовых производителей текстильной и швейной продукции Кыргызской Республики. Вы можете заказать одежду оптом по очень низким ценам! Ведение бизнеса в формате В2В. Услуга логистики и доставки. Оформление документов экспортно-импортных документов.">
    <meta name="keywords" content="женская одежда , женская одежда оптом, женская одежда оптом от производителя , пошив женской одежды, женские платья оптом, женские костюмы оптом, мусульманская женская одежда , женские футболки оптом, женские шорты оптом, женское нижнее белье оптом, женские брюки оптом, женские блузки оптом, женская одежда из киргизии , женские платья оптом от производителя, женские юбки оптом, женские мусульманские платья , пошив женской одежды на заказ, одежда для беременных оптом, купить женские платья оптом, купить женские шорты оптом, женская одежда оптом из киргизии , женские спортивные костюмы оптом, купить женские футболки оптом, купить женские брюки оптом, женская одежда оптом из киргизии, женские блузки оптом от производителя, женские юбки оптом от производителя, женские брюки оптом от производителя, купить женское нижнее белье оптом, женские костюмы оптом от производителя, женское нижнее белье оптом от производителя, дешевая женская одежда оптом от производителя , интернет магазин женской одежды киргизия, шорты женские производители опт, киргизия женская одежда большие размеры , женские футболки оптом от производителя, одежда для беременных оптом от производителя, женские спортивные костюмы оптом от производителя, купить женские брюки оптом от производителя, женская одежда из киргизии оптом от производителя , женская одежда оптом из киргизии от производителя , женская одежда оптом из киргизии от производителя, женская одежда из киргизии оптом, женская одежда из киргизии оптом от производителя, женская одежда оптом от производителя из киргизии, женская одежда от производителя киргизия оптом, женские футболки майки оптом, пошив женской одежды малыми партиями, киргизия фабрики женской одежды , одежда для беременных и кормящих оптом, пижамы шелковые женские с шортами оптом, одежда для женщин интернет магазин из киргизии, женская одежда бишкек киргизия оптом , женские костюмы оптом недорого, недорогие женские платья оптом от производителя, женские футболки оверсайз оптом, одежда для женщин оптом киргизия , фабрики киргизии по пошиву женской одежды, фабрики киргизии по пошиву женской одежды, фабрики киргизии по пошиву женской одежды , женские футболки оптом модерн, женские костюмы оптом на продажу, одежда для беременных мелкий опт, женская одежда оптом производство киргизия, ритуальное женское платье оптом, pm брюки запах женские оптом, нижнее белье женское оптом от производителя дешево, купить оптом рубашку платье женскую,мужская одежда ,пошив мужских костюмов,мужская одежда оптом,мужская одежда оптом,пошив мужских брюк,пошив мужской одежды,мужские футболки оптом,мужские костюмы оптом,мужские шорты оптом,пошив мужской рубашки,пошив мужских костюмов на заказ,мужские рубашки оптом,мужские брюки оптом,купить мужские шорты оптом,купить мужские футболки оптом,пошить мужской костюм,купить оптом мужскую одежду,мужские спортивные костюмы оптом,мужская одежда оптом от производителя,купить мужские брюки оптом,мужские ветровки оптом,пошив мужской одежды на заказ,пошить мужской костюм на заказ,толстовки мужские оптом,поставщики мужской одежды оптом,ткани для пошива мужских костюмов,мужская спортивная одежда оптом,брендовая мужская одежда оптом,мужское нижнее белье оптом,модная мужская одежда оптом,мужские костюмы оптом от производителя,мужские футболки оптом от производителя,заказать пошив мужского костюма,футболки мужские вискоза купить оптом,мужская одежда больших размеров оптом,мужские брюки оптом от производителя,мужской классический костюм оптом,стильная мужская одежда оптом,оптом купить мужские футболки больших размеров,мужская одежда оптом без рядов,мужские шорты оптом от производителя,мужская одежда из киргизии,пилс мужская одежда оптом,мужская одежда в бишкеке,верхняя мужская одежда оптом,мужское нижнее белье купить оптом,ветровки мужские оптом от производителя,купить классические костюмы мужские оптом,толстовка с капюшоном теплая оптом мужская,строго пошив мужских костюмов,мужские деловые костюмы оптом,мужская одежда из киргизии,мужские вязаные одежда оптом, детская одежда, детская одежда интернет , одежда для детей, детская одежда оптом , детская одежда оптом, детская одежда оптом сайты , детская одежда оптом от производителя , детская одежда оптом от производителя, детская одежда для новорожденных, детская одежда для девочек, детская одежда для мальчиков, оптовая детская одежда , детские цены детская одежда оптом , магазин детской одежды для новорожденных, интернет магазин детской одежды оптом, детский размер одежда оптом, детская одежда для новорожденных интернет магазин, поставщики детской одежды оптом, детская одежда оптом без рядов, детская одежда оптом дешево, детская одежда по оптовым ценам , детская одежда мелким оптом, детская верхняя одежда оптом, детская одежда оптом от производителя дешево , фабрика детской одежды оптом, детская одежда оптом от производителя без рядов, модная детская одежда оптом, детская одежда оптом недорого, брендовая детская одежда оптом, стильная детская одежда оптом, детская верхняя одежда оптом от производителя, детская одежда мелким оптом без рядов, детская одежда беби опт, пошив детской одежды оптом, детская одежда оптом киргизия, поставщики детской одежды оптом от производителя, качественная детская одежда оптом, модная детская одежда для девочек, детская одежда для новорожденных мальчиков, детская одежда для новорожденных интернет магазин недорого, детская джинсовая одежда оптом, детская одежда для новорожденных девочек, детская одежда для новорожденных интернет магазин дешево, детская одежда из киргизии, детская одежда и обувь оптом, детская одежда оптом без размерных рядов, пошив детской одежды на заказ оптом, детская одежда принт оптом, выкройки детской одежды для новорожденных, детская одежда оптом из киргизии , детская школьная одежда для девочек, стильная детская одежда оптом от производителя, бишкек детская одежда оптом от производителя, детский размер интернет магазин детской одежды оптом, детская верхняя одежда без рядов оптом, детская одежда производство кыргызстан, поставщики детской верхней одежды оптом, детская теплая одежда мальчиков, бишкек рынок детской одежды, где покупать детскую одежду оптом для продажи, интернет магазин детской школьной одежды для девочек, распродажа детской зимней одежды для мальчиков, детская одежда из киргизии оптом от производителя , апрель детская одежда оптом от производителя, детский комплект комбинезон одежды оптом, детские платья киргизия оптом от производителя, официальная одежда , большая одежда , верхняя одежда , одежда по интернету , одежда больших размеров , модная одежда , одежда 2020 , одежда оптом , опт одежда , домашняя одежда , спортивная одежда , медицинская одежда , ремонт одежда , одежда заказ , производство одежда , одежда производитель опт , одежда оптом от производителя , оптовая одежда , одежда киргизия , одежда из киргизии , дешевый опт одежда, дешевая одежда оптом , одежда оптом размеры , киргизия опт , одежда оптом по низким , модная одежда оптом , одежда оптом по низким ценам , одежда больших размеров оптом , одежда по оптовым ценам , одежда оптом без , платье киргизия, интернет магазин киргизия , верхняя одежда оптом , одежда опт киргизия , одежда сток оптом , одежда мелкий опт , одежда оптом рядами, одежда оптом от производителя цены , одежда оптом без рядов , домашняя одежда оптом , одежда кыргызстан , одежда для новорожденных оптом , спортивная одежда оптом , одежда оптом по низким от производителя , одежда оптом от производителя по низким ценам , одежда оптом недорого , брендовая одежда оптом , производители киргизия , трикотаж одежда оптом , дешевая одежда оптом от производителя , одежда опт бишкек , одежда из киргизии больших размеров , киргизия опт платье, платья киргизия оптом , одежда из киргизии интернет магазин дешево, фабрика киргизия , одежда батал , одежда из киргизии оптом от производителя , одежда по оптовым ценам от производителя , дешевая и качественная одежда , одежда оптом от производителя без рядов дешево , одежда из киргизии в розницу большие размеры , платья киргизия оптом от производителя , одежда киргизия производство , kg киргизия одежда, киргизия оптом бишкек оптом, фабрики одежды киргизия , производитель платьев киргизия , оптовая одежда киргизия , поставщики киргизия одежда , пошив бишкек , одежда кг из киргизии, одежда официальный сайт киргизия, недорогая одежда из киргизии, одежда оптом из киргизии бишкека, швейная фабрика киргизия , купить одежду киргизия интернет магазин, киргизия одежда от производителя в розницу , одежда по оптовым ценам из киргизии, одежда оптом от производителя дешево с доставкой , одежда kg из киргизии оптом , одежда производство киргизия интернет магазин, одежда оптом из киргизии от производителя дешево , верхняя одежда киргизия, киргизия заказать одежду, швейные фабрики кыргызстана , пошив одежды в киргизии , текстиль киргизия , молодежная одежда из киргизии, молодежная одежда оптом от производителя дешево , поставщики одежды из киргизии оптом, товары из киргизии оптом от производителя, fashion одежда из киргизии, купить недорого одежду из киргизии, стильная одежда из киргизии, одежда для собак оптом от производителя дешево , фабрики киргизии оптом от производителя, производители одежды киргизия фабрики , пошив одежды кыргызстан,текстильное производство ,текстильный товар ,текстиль производство ,производство текстильных изделий,производство текстильных материалов ,производство текстильной продукции ,центры текстильного производства ,производство текстильных тканей ,текстильное и швейное производство ,производство готовых текстильных изделий ,центры производства текстильной промышленности ,текстильное производство масок ,текстильное производство компании,текстиль оптом,текстиль оптом от производителя,сайт опт текстиль,текстиль опт ткани,текстиль трикотаж оптом,купить текстиль оптом ,домашний текстиль оптом,текстиль для дома оптом,купить текстиль оптом от производителя,текстиль полотенца оптом ,одежда текстиль оптом,текстиль для гостиниц оптом,опт текстиль отзывы,домашний текстиль оптом от производителя,ритуальный текстиль оптом,текстильное производство купить ,текстиль оптом от производителя дешево,текстиль оптом склад,текстиль для гостиниц оптом от производителя,текстиль профи ткани оптом,текстиль для дома оптом от производителя,гостиничный текстиль оптом,ритуальный текстиль оптом от производителя,текстиль опт спецодежда,текстиль для новорожденных оптом,кухонный текстиль оптом,текстиль оптовик продажа трикотажного полотна оптом,домашний текстиль оптом недорого,текстиль для похорон оптом,текстиль для отелей оптом
">
@endsection
@section('og_content')
    @if(request('type') == 'productions')
        <meta name="description" content="Заказать производство одежды оптом в Киргизии по низким ценам от Тексмарт">
    @elseif(request('type') == 'product')
        <meta name="description" content="Купить одежду оптом в Киргизии по низким ценам от Тексмарт">
    @elseif(request('type') == 'service')
        <meta name="description" content="Заказать услугу в Киргизии по низким ценам от Тексмарт">
    @else
        <meta name="description" content="Заказать производство одежды оптом в Киргизии по низким ценам от Тексмарт">
    @endif
    <meta property="og:type" content="website" />
    <meta property="og:url" content="{{ request()->url() }}" />
    <meta property="og:image" content="{{ asset('img/logo.png') }}" />
    @if(request('type') == 'productions')
        <meta property="og:description" content="Заказать производство одежды оптом в Киргизии по низким ценам от Тексмарт">
    @elseif(request('type') == 'product')
        <meta property="og:description" content="Купить одежду оптом в Киргизии по низким ценам от Тексмарт">
    @elseif(request('type') == 'service')
        <meta property="og:description" content="Заказать услугу в Киргизии по низким ценам от Тексмарт">
    @else
        <meta property="og:description" content="Заказать производство одежды оптом в Киргизии по низким ценам от Тексмарт">
    @endif
@endsection
@section('content')
    <div class="mobile-backdrop"></div>
    <div class="mobile-catalog py-5 px-3" id="mobile-catalog">
        <i class="fas fa-times position-absolute fa-lg close-mobile-catalog" style="top:2%; right:10%;"></i>
        <p class="h3 texmart-text-primary">Каталог</p>
        @include('design.pages.catalog.includes.left_sidebar', ['toggle' => true])
    </div>
    <div class="container mt-5 pt-5">
        <div class="row">
            <div class="col-lg-3 col-md-3 col-12 d-lg-block d-none">
                    <div class="mb-1">
                        @include('design.pages.catalog.includes.left_sidebar', ['toggle' => true])
                    </div>

            </div>
            <div class="col-lg-9 col-md-9 col-12">
                <h2 class="texmart-text-primary h1" data-parent="title">База товаров наших производителей</h2>
                <div class="row my-4 d-lg-none d-block">
                    <div class="col-6"><i class="fas fa-bars fa-2x catalog-list"></i></div>
                    <div class="col-6"></div>
                </div>
                <div class="row my-3">
                    <div class="col-lg-6 col-md-6 col-12">
                        <button class="texmart-button" data-parent="type" data-value="productions">
                            Производители
                        </button>
                        <button class="texmart-button active" data-parent="type" data-value="product">
                            Товары
                        </button>
                    </div>
                    <div class="col-lg-6 col-md-6 col-12 d-lg-flex d-none align-items-center justify-content-center pb-2 mt-lg-0 mtmd-0 mt-3">
                        <a href="" class="link-style">Создать заявку</a>
                        <div class="mx-2 h-100 bg-dark" style="width:1.5px;"></div>
                        <a href="" class="link-style">Добавить компанию</a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12" id="productions-list">

                    </div>
                </div>

            </div>
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
        // let productionsPage = window.localStorage.getItem('productionsPage');
        // if (productionsPage) {
            params.page = 1;
        // }
        $('input[name="categories[]"]').change(e => {
            let input = $(e.currentTarget);
            let isChecked = input.is(':checked') ? true : false;
            let id = input.data('id');
            isChecked ? params.push(id) : params.splice($.inArray(id, params), 1);
            var btn = getType();
            params.page = 1;
            fetchProductions(params, btn);
        });
        $('button[data-parent="type"]').click(e => {
           let btn = $(e.currentTarget);
           if(btn.hasClass('active') == false)
           {
               $('button[data-parent="type"]').removeClass('active');
               btn.addClass('active');
               params.page = 1;
               fetchProductions(params, btn.data('value'));
               if(btn.data('value') == 'product'){
                   $('h2[data-parent="title"]').text('База товаров наших производителей');
               }
               else if(btn.data('value') == 'productions'){
                   $('h2[data-parent="title"]').text('Наши производители');
               }
           }
        });
        function getType()
        {
            var btn = document.querySelectorAll('button[data-parent="type"]' + '.active');
            return btn[0].dataset.value;
        }
        function fetchProductions(params, type) {
            $.ajax({
                url: '{{ route('productions.new_filter') }}',
                data: {
                    params: params,
                    page: params.page,
                    type: type ? type : '{{ request('type') }}'
                },
                success: data => {
                    let pagination = $('ul.pagination');
                    pagination.empty();
                    if (data.count) {
                        let paginationDots = paginationWithDots(data.productions.current_page, data.productions.last_page);
                        if (data.productions.last_page > 1) {
                            if (data.productions.current_page != 1) {
                                pagination.append('<li class="page-item d-none d-sm-inline-block"><a class="page-link" data-page="' + (data.productions.current_page - 1) + '" href="#">Пред</a></li>');
                            }
                        }
                        for (let item of paginationDots) {
                            if (item == '...') {
                                pagination.append('<li class="page-item disabled"><a class="page-link disabled" disabled onclick="event.preventDefault()">' + item + '</a></li>');
                            } else if (item == data.productions.current_page) {
                                pagination.append('<li class="page-item active"><a class="page-link" data-page="' + item + '" href="#">' + item + '</a></li>');
                            } else {
                                pagination.append('<li class="page-item"><a class="page-link" data-page="' + item + '" href="#">' + item + '</a></li>');
                            }
                        }
                        if (data.productions.last_page > 1) {
                            if (data.productions.current_page != data.productions.last_page) {
                                pagination.append('<li class="page-item d-none d-sm-inline-block"><a class="page-link" data-page="' + (data.productions.current_page + 1) + '" href="#">След</a></li>');
                            }
                        }
                    }
                    pagination.find('.page-link').each((e, i) => {
                        registerPageButtons($(i));
                    });


                    let result = $('#productions-list').hide().html(data.html).fadeIn('fast');
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
        $.fn.extend({
            treed: function (o) {
                var openedClass = 'fa-plus';
                var closedClass = 'fa-minus';
                if (typeof o != 'undefined'){
                    if (typeof o.openedClass != 'undefined'){
                        openedClass = o.openedClass;
                    }
                    if (typeof o.closedClass != 'undefined'){
                        closedClass = o.closedClass;
                    }
                }
                /* initialize each of the top levels */
                var tree = $(this);
                tree.addClass("tree");
                tree.find('li').has("ul").each(function () {
                    var branch = $(this);
                    branch.prepend("");
                    branch.addClass('branch');
                    branch.on('click', function (e) {
                        if (this == e.target) {
                            var icon = $(this).children('i:first');
                            icon.toggleClass(openedClass + " " + closedClass);
                            $(this).children().children().toggle();
                        }
                    });
                    branch.children().children().toggle();
                });
                /* fire event from the dynamically added icon */
                tree.find('.branch .indicator').each(function(){
                    $(this).on('click', function () {
                        $(this).closest('li').click();
                    });
                });
                /* fire event to open branch if the li contains an anchor instead of text */
                tree.find('.branch>a').each(function () {
                    $(this).on('click', function (e) {
                        $(this).closest('li').click();
                        e.preventDefault();
                    });
                });
                /* fire event to open branch if the li contains a button instead of text */
                tree.find('.branch>button').each(function () {
                    $(this).on('click', function (e) {
                        $(this).closest('li').click();
                        e.preventDefault();
                    });
                });
            }
        });
        $('#tree').treed();
    </script>
    <script>
        $('.catalog-list').on('click', function () {
            document.getElementById('mobile-catalog').style.left = "0px";
            $('.mobile-backdrop').show();
        });

        $('.mobile-backdrop').click(function () {
           $('.mobile-backdrop').hide();
            document.getElementById('mobile-catalog').style.left = "-300px";
        });

        $('.close-mobile-catalog').click(function () {
            $('.mobile-backdrop').hide();
            document.getElementById('mobile-catalog').style.left = "-300px";
        });
    </script>
@endpush