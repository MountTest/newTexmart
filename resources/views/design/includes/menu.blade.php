<div id="mySidenav" class="sidenav d-md-block d-none">
    <div class="menu-header p-4">
        <div class="menu-avatar" style="background-image: url({{asset('images/menu/default.svg')}})">

        </div>
        <img class="position-absolute menu-close" src="{{asset('images/menu-close.png')}}">
        <div class="d-flex font-size-14 mt-3">
            <a href="" class="text-white mr-2">
                Войти
            </a>
            <div class="border-left"></div>
            <a href="" class="text-white ml-2">
                Регистрация
            </a>
        </div>
    </div>
    <div class="p-4" style="overflow-y: auto; height:70vh;">
        <a href="#">
        <div class="d-flex pb-3 border-bottom menu-option">
            <img class="img-fluid menu-img" src="{{ asset('images/menu/home.svg') }}" alt="">
            <p class="mb-0 menu-point ml-3">
                Главная
            </p>
        </div>
        </a>
        <a href="#">
            <a class="fade-link" href="{{ route('new-design/catalog',['type' => 'product']) }}">
        <div class="d-flex pt-3 menu-option">
            <img class="img-fluid menu-img" src="{{ asset('images/menu/products.svg') }}" alt="">
            <p class="mb-0 menu-point ml-3">
                Товары
            </p>
        </div>
            </a>
        </a>
        <a href="#">
        <div class="d-flex pt-3 menu-option">
            <img class="img-fluid menu-img" src="{{ asset('images/menu/services.svg') }}" alt="">
            <p class="mb-0 menu-point ml-3">
                Услуги
            </p>
        </div>
        </a>
        <a href="#">
        <div class="d-flex pt-3 menu-option">
            <img class="img-fluid menu-img" src="{{ asset('images/menu/orders.svg') }}" alt="">
            <p class="mb-0 menu-point ml-3">
                Заказы
            </p>
        </div>
        </a>
        <a href="#">
        <div class="d-flex pt-3 menu-option">
            <img class="img-fluid menu-img" src="{{ asset('images/menu/delivery_product.svg') }}" alt="">
            <p class="mb-0 menu-point ml-3">
                Поставщики товаров
            </p>
        </div>
        </a>
        <a href="#">
        <div class="d-flex py-3 border-bottom menu-option">
            <img class="img-fluid menu-img" src="{{ asset('images/menu/delivery_service.svg') }}" alt="">
            <p class="mb-0 menu-point ml-3">
                Поставщики услуг
            </p>
        </div>
        </a>
        <a href="#">
        <div class="d-flex pt-3 menu-option">
            <img class="img-fluid menu-img" src="{{ asset('images/menu/create.svg') }}" alt="">
            <p class="mb-0 menu-point ml-3">
                Создать тендер
            </p>
        </div>
        </a>

        <a href="#">
        <div class="d-flex py-3 border-bottom menu-option">
            <img class="img-fluid menu-img" src="{{ asset('images/menu/add.svg') }}" alt="">
            <p class="mb-0 menu-point ml-3">
                Добавить компанию
            </p>
        </div>
        </a>
    </div>
</div>